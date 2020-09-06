<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use App\Models\ViewersDetail;
use App\Models\User;
//use User;
use URL;
use Redirect;


class AuthController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    public function index(){

    	return view('auth.login');
    }

   
    
    public function login(Request $request){
        //exit();
        try {
           
        	$this->validate($request, [
                'email' => 'required|email', 'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if ($this->auth->attempt($credentials, $request->has('remember')))
            { 	
                $request->session()->forget('userImage');
            	//this if validate if the user is on the database line 1
            	$user 		= Auth::user(); 
                $roleName 	= $user->roles->first()->name;
                $userImage = \DB::table('user_basic_details')->where('user_id', $user->id)->select("userImages")->value('userImages');
                if($userImage) {
                    $userImage = json_decode($userImage)[0];
                    $request->session()->put('userImage', $userImage);
                }
    	        if($roleName =='admin'){

    	            return redirect('admin/home');  

    	        }else{
                    return redirect('/');
                }
            }
            
            return Redirect::back()->withInput($request->only('email', 'remember'))->withErrors([
                            'email' => 'User name OR password does not Matched',
                    ]);
            
        } catch (\Exception $e) {

            return Redirect::back()->with('error_message', $e->getMessage());
        }
    }

    
    public function  ajaxlogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'email' => 'required|',
            'password' =>  'required|string',
            
        ]);

        if ($validator->passes()) {

            $credentials = $request->only('email', 'password');

            if ($this->auth->attempt($credentials, $request->has('remember')))
            {   
                //this if validate if the user is on the database line 1
                $user       = Auth::user(); 

                $roleName   = $user->roles->first()->name;

                if($user->status == 1){
                
                    if($roleName =='admin'){

                        $url = route('adminhome'); 
                        return response()->json(['status'=>'success','url'=>$url]);

                    }elseif ($roleName =='customer') {

                        $url =  route('home'); 
                        return response()->json(['status'=>'success','url'=>$url]);

                    }elseif ($roleName =='stall_manager') {

                        $url =  route('owner/home');
                        return response()->json(['status'=>'success','url'=>$url]);
                    }
                }
                else{

                    Auth::logout();

                    return response()->json(['status'=>'waiting','msg'=>"Please wait for admin approval"]);
                }
            }
            else{
                return response()->json(['status'=>'failed','msg'=>"Invalid User details"]);
            }
        }

    	return response()->json(['status'=>'failed','msg'=>$validator->errors()->all()]);
        
    }

    public function homelanding(Request $request)
    {
        $viewerDetail = ViewersDetail::Orderby('created_at')->paginate(100);

        foreach ($viewerDetail as $key => $value) {
            $viewed_by = User::find($value->viewed_by);
            $profile_id = User::find($value->profile_id);
            $viewerDetail[$key]['viewer_name'] = $viewed_by->name;
            $viewerDetail[$key]['profile_name'] = $profile_id->name;
        }
        return view('admin.login.home',compact('viewerDetail'));
    }

    public function otherlanding(Request $request){

    	return view('organizer.home.home');
    }

    public function frontendlogin(Request $request){

        return view('auth.frontendlogin');
    }
}
