<?php

namespace App\Http\Controllers\Web;

use Auth;
use App\Models\Market;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Models\UserBasicDetail;
use Models\UserSecondaryDetails;
use App\Models\ViewersDetail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

use App\Http\Controllers\MailController;
use Mail;

class HomeController extends Controller
{
    /**
     * Home Listing
     * @param string 
     * @author Zoo/Ruban
    */
    public function home(Request $request) {
        
        $subject = Input::get('subject');
        $qualification = Input::get('qualification');
        $country = Input::get('country');
        $statePanchayat = Input::get('panchayat');
        $data =\DB::table('user_qualification_search')->orderBy('id','DESC');

        $allCountry = \DB::table('country')->where('is_active',1)->get();
        if($subject !=''){
            $data = $data->where('subject', 'like', '%'. $subject .'%');
        }
        if($qualification !='') {
            $data = $data->where('qualification', 'like','%'. $qualification. '%');
        }
        if($country !='') {
            $data = $data->where('country', '=', $country);
        }
        if ($statePanchayat != '') {
            $data = $data->orWhere(function($query){
                $statePanchayat = Input::get('panchayat');
                // print($statePanchayat); exit;
                $query->where('panchayath', 'like', '%'. $statePanchayat .'%')
                      ->where('state', 'like', '%'. $statePanchayat .'%')
                      ->where('city', 'like', '%'. $statePanchayat. '%');
                    });
        }

        $teachersDetailListing = $data->paginate(10);

    	return view('web/home',compact('teachersDetailListing',"statePanchayat", "subject", "country", "qualification", "allCountry"));
    }
    public function posthome (Request $request){

        exit();
        /*$org_Id = $request->org_Id;
        $id = $request->org_Id;*/

    }
    
    /**
     * Error 403 (Permission Denied)
     * @param string 
     * @author Zoo/Ruban
    */
    public function accessDenied(){
    	return view('errors/403',compact('data'));
    }

    public function account_details($id) {
        try {
            $profile_id = Crypt::decrypt($id);
            $viewed_by = Auth::user()->id;

            $viewerCount = ViewersDetail::where('profile_id',$profile_id)->where('viewed_by',$viewed_by)->get();
            
            if($viewerCount->count() ===0){
                $InsertViewerDetail = new ViewersDetail();
                $InsertViewerDetail->profile_id = $profile_id;
                $InsertViewerDetail->viewed_by = $viewed_by;
                $InsertViewerDetail->contacted = '0';
                $InsertViewerDetail->mail_status = '0';
                $InsertViewerDetail->save();
                $viewerId = $InsertViewerDetail->id;
            }else{
                $InsertViewerDetail = ViewersDetail::find($viewerCount[0]->id);
                $InsertViewerDetail->profile_id = $profile_id;
                $InsertViewerDetail->viewed_by = $viewed_by;
                $InsertViewerDetail->contacted = '0';
                $InsertViewerDetail->mail_status = '0';
                $InsertViewerDetail->view_count = $viewerCount->count();
                $InsertViewerDetail->save();
                $viewerId = $viewerCount[0]->id;
            }

            $data =\DB::table('user_qualification_search')
                    ->where('id','=', $profile_id)->first();

            //print_r($data);
            //exit();
            return view('web.user_details', compact("data","viewerId"))->render();
        } catch (Exception $e) {

        }
    }

    public function postAccountDetails($viewerId) {

        if($viewerId){

            $data = ViewersDetail::find($viewerId);
            $data->contacted = '1';
            $data->save();
            return redirect()->route('listing')->with('success_message', 'Your Request Sent to Admin , Contact Shortly');

          //   $userData = User::find($data->viewed_by);
          //   $userd = User::find($data->profile_id);
            $data = array('name'=>"Admin",'viewed_by',$userData->name,'viewed_by_number',$userData->phone);
               Mail::send('mail.mail', $data, function($message) {
             $message->to('rubinmon92@gmail.com', 'Contact')->subject
                ('Laravel Basic Testing Mail');
             $message->from('rubinmon92@gmail.com','New Member Wanted Coaching');
          });
        }
    }
}
