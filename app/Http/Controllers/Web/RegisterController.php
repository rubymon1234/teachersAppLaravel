<?php

namespace App\Http\Controllers\Web;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\UserBasicDetail;
use App\Models\UserSecondaryDetails;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\UserQualification;
use Illuminate\Support\Facades\Hash;
use Toastr;

class RegisterController extends Controller
{
    public function index() {
        try {
            $roleList = \DB::table('roles')->where('name','!=', 'admin')->get();
            $countryList = \DB::table('country')->where('is_active', '=',1)->get();
            return view('web.register', compact("roleList", "countryList"))->render();
        } catch (Exception $e) {
            report($e);
        }
    }

    public function getStateList() {
        try {
            $countryId = Input::get('countryId');
            $countryList = \DB::table('state')
                            ->where('is_active', '=',1)
                            ->where('country_id', $countryId)
                            ->get();
            $stateData = '<option value="">Choose State</option>';
            foreach($countryList as $row) {
                $stateData .= '<option value="'. $row->id .'">'. $row->state .'</option>';
            }
            return response($stateData);
        } catch (Exception $e) {

        }
    }

    public function getCityList() {
        try {
            $countryId = Input::get('countryId');
            $stateId = Input::get('stateId');
            $countryList = \DB::table('city')
                            ->where('is_active', '=',1)
                            ->where('country', $countryId)
                            ->where('state', $stateId)
                            ->get();
            $stateData = '<option value="">Choose City</option>';
            foreach($countryList as $row) {
                $stateData .= '<option value="'. $row->id .'">'. $row->city .'</option>';
            }
            return response($stateData);
        } catch (Exception $e) {

        }
    }

    public function getPanchayathList() {
        try {
            $countryId = Input::get('countryId');
            $stateId = Input::get('stateId');
            $cityId = Input::get('cityId');
            $countryList = \DB::table('panchayath')
                            ->where('is_active', '=',1)
                            ->where('country', $countryId)
                            ->where('state', $stateId)
                            ->where('city', $cityId)
                            ->get();
            $stateData = '<option value="">Choose Panchayath</option>';
            foreach($countryList as $row) {
                $stateData .= '<option value="'. $row->id .'">'. $row->panchayath .'</option>';
            }
            return response($stateData);
        } catch (Exception $e) {

        }
    }

    public function getPincode() {
        try {
            $countryId = Input::get('countryId');
            $stateId = Input::get('stateId');
            $cityId = Input::get('cityId');
            $panchatathId = Input::get('panchatathId');
            $countryList = \DB::table('pincode')
                            ->where('is_active', '=',1)
                            ->where('country', $countryId)
                            ->where('state', $stateId)
                            ->where('city', $cityId)
                            ->where('panchayath', $panchatathId)
                            ->get();
            $stateData = '<option value="">Choose Pincode</option>';
            foreach($countryList as $row) {
                $stateData .= '<option value="'. $row->id .'">'. $row->pincode .'</option>';
            }
            return response($stateData);
        } catch (Exception $e) {

        }
    }

    public function update(Request $request) {
        try {
            $UserBasicDetail = new UserBasicDetail();
            $User = new User();
            $UserSecondaryDetails = new UserSecondaryDetails();
            $User->name = Input::get('name');
            $User->email = Input::get('email');
            $User->password = Hash::make(Input::get('password'));
            $User->save();
            $userID = $User->id;
            $roleUser = new RoleUser();
            $roleUser->role_id = Input::get("userType");
            $roleUser->user_id = $userID;
            if($request->hasfile('filenames'))

            {
               foreach($request->file('filenames') as $file)
   
               {
   
                   echo $name=$file->getClientOriginalName();
   
                   $file->move(public_path().'/userImages/', $name);  
   
                   $data[] = $name;  
   
               }
               $UserBasicDetail->userImages=json_encode($data);
   
            }
   
     
   
            // $roleUser->save();
            if ($roleUser->save()) {
                if ($userID) {
                    $UserBasicDetail->name = Input::get('name');
                    $UserBasicDetail->user_id = $userID;
                    // $UserBasicDetail->subject = Input::get('subject');
                    $UserBasicDetail->address_house_name = Input::get('address_house_name');
                    $UserBasicDetail->address_house_no = Input::get('address_house_no');
                    $UserBasicDetail->address_landmark = Input::get('address_landmark');
                    $UserBasicDetail->address_village = Input::get('address_village');
                    $UserBasicDetail->address_postoffice = Input::get('address_postoffice');
                    $UserBasicDetail->address_block = Input::get('address_block');
                    $UserBasicDetail->age = Input::get('age');
                    $UserBasicDetail->date_of_birth = Input::get('date_of_birth');
                    $UserBasicDetail->sex = Input::get('sex');
                    $UserBasicDetail->father_or_spouse_name = Input::get('father_or_spouse_name');
                    $UserBasicDetail->father_or_spouse_relation = Input::get('father_or_spouse_relation');
                    $UserBasicDetail->father_or_spouse_contact_no = Input::get('father_or_spouse_contact_no');
                    $UserBasicDetail->father_or_spouse_email = Input::get('father_or_spouse_email');
                    $UserBasicDetail->religion = Input::get('religion');
                    $UserBasicDetail->community = Input::get('community');
                    $UserBasicDetail->expected_salary = Input::get('expected_salary');
                    $UserBasicDetail->country = Input::get('country');
                    $UserBasicDetail->state = Input::get('state');
                    $UserBasicDetail->city = Input::get('city');
                    $UserBasicDetail->panchayath = Input::get('panchayath');
                    $UserBasicDetail->pincode = Input::get('pincode');
                    $UserBasicDetail->save();
                    $userBasicId = $UserBasicDetail->id;
                    if ($userBasicId) {
                        $qualification = Input::get('qualification');
                        foreach($qualification as $key => $data) {
                            if ($qualification[$key]) {
                                $UserQualification = new UserQualification();
                                $UserQualification->user = $userID;
                                $UserQualification->qualification = $qualification[$key];
                                $UserQualification->subject = Input::get('subject')[$key];
                                $UserQualification->year_passout = Input::get('year_passout')[$key];
                                $UserQualification->save();
                            }
                        }
                        $UserSecondaryDetails->name = Input::get('name');
                        $UserSecondaryDetails->user_basic_id = $userBasicId;
                        $UserSecondaryDetails->mobile_number = Input::get('mobile_number');
                        $UserSecondaryDetails->alt_number = Input::get('alt_number');
                        $UserSecondaryDetails->whatsup_number = Input::get('whatsup_number');
                        $UserSecondaryDetails->email = Input::get('email');
                        $UserSecondaryDetails->physically_challanged = Input::get('physically_challanged');
                        $UserSecondaryDetails->working_exp = Input::get('working_exp');
                        $UserSecondaryDetails->presently_working = Input::get('presently_working');
                        if (Input::get('presently_working')) {
                            $UserSecondaryDetails->presently_working_description = Input::get('presently_working_description');
                        }
                        $UserSecondaryDetails->done_any_course = Input::get('done_any_course');
                        if (Input::get('done_any_course')) {
                            $UserSecondaryDetails->done_any_course_description = Input::get('done_any_course_description');;
                        }
                        $UserSecondaryDetails->intrested_to_work = Input::get('intrested_to_work');
    
                        $UserSecondaryDetails->last_working = Input::get('last_working');
                        if (Input::get('last_working')) {
                            $UserSecondaryDetails->last_working_name = Input::get('last_working_name');
                            $UserSecondaryDetails->last_working_address = Input::get('last_working_address');
                            $UserSecondaryDetails->last_working_duration = Input::get('last_working_duration');
                            $UserSecondaryDetails->reason_vacate = Input::get('reason_vacate');
                        }
                    // $UserSecondaryDetails->other_facilities = Input::get('other_facilities');
                        $UserSecondaryDetails->other_facilities_accomodation = Input::get('other_facilities_accomodation');
                        $UserSecondaryDetails->other_facilities_spouce_stay = Input::get('other_facilities_spouce_stay');
                        $UserSecondaryDetails->other_facilities_transportation = Input::get('other_facilities_transportation');
                        $UserSecondaryDetails->landPhone = Input::get('landPhone');
                        $UserSecondaryDetails->marital_status = Input::get('marital_status');
                        if($UserSecondaryDetails->save()) {
                            Toastr::success("Success");
                            return redirect()->route('login');
                        }
                    }
                }
            }
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function register_user() {
        try {
            return view('web.user-register')->render();
        } catch (Exception $e) {

        }
    }

    public function update_user() {
        
        try {
            $user = new User();
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->phone_numer = Input::get('phone_numer');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            $userID = $user->id;
            $roleUser = new RoleUser();
            $roleUser->role_id = Input::get("userType");
            $roleUser->user_id = $userID;
            $roleUser->save();
            Toastr::success("Account created Successfuly..!!");
            return redirect()->route('login');
        } catch (Exception $e) {
            Toastr::error($e);
        }
    }

    public function edit_account(Request $request) {
        try {
            if (Auth::user()) {

                $userId = Auth::user()->id;
                $userDetails = DB::table('user_basic_details')
                                    ->join('user_secondary_details', 'user_secondary_details.user_basic_id', '=', 'user_basic_details.id')
                                    ->join('user_qualifications', 'user_qualifications.user', '=', 'user_basic_details.user_id')
                                    ->select(
                                    'user_basic_details.id as user_basic_details',
                                    'user_secondary_details.id as user_secondary_details',
                                    'user_basic_details.address_house_name as address_house_name',
                                    'user_basic_details.address_house_no as address_house_no',
                                    'user_basic_details.address_landmark as address_landmark',
                                    'user_basic_details.address_village as address_village',
                                    'user_basic_details.address_postoffice as address_postoffice',
                                    'user_basic_details.address_block as address_block',
                                    'user_basic_details.country as country',
                                    'user_basic_details.state as state',
                                    'user_basic_details.panchayath as panchayath',
                                    'user_basic_details.city as city',
                                    'user_basic_details.pincode as pincode',
                                    'user_secondary_details.intrested_to_work as intrested_to_work',
                                    'user_secondary_details.other_facilities_accomodation as accomodation',
                                    'user_secondary_details.other_facilities_spouce_stay as spouce_stay',
                                    'user_secondary_details.other_facilities_transportation as transportation',
                                    'user_secondary_details.mobile_number as mobile_number',
                                    'user_secondary_details.whatsup_number as whatsup_number',
                                    DB::raw('GROUP_CONCAT(user_qualifications.qualification) as qualification'),
                                    DB::raw('(select state.state from state where state.id = user_basic_details.state) as state_name'),
                                    DB::raw('(select city.city from city where city.id = user_basic_details.city) as city_name'),
                                    DB::raw('(select panchayath.panchayath from panchayath where panchayath.id = user_basic_details.panchayath) as panchayath_name'),
                                    DB::raw('(select pincode.pincode from pincode where pincode.id = user_basic_details.pincode) as pincode_name'),
                                    DB::raw('GROUP_CONCAT(user_qualifications.subject) as subject'),
                                    DB::raw('GROUP_CONCAT(user_qualifications.year_passout) as year_passout'),
                                    DB::raw('GROUP_CONCAT(user_qualifications.id) as qualification_id'),
                                    'user_basic_details.userImages as userImages'
                                    )
                                    ->where('user_basic_details.user_id',$userId)
                                    ->first();
                                    
                $countryList = \DB::table('country')->where('is_active', '=',1)->get();
                return view('web.edit_account', compact("userDetails", "countryList"))->render();
            } else {
                return redirect()->route('login');
            }
        }
        catch (Exception $e) {
            return redirect()->route('/');
        }
    }

    public function update_profile(Request $request) {
        try {
            $user_basic_details = UserBasicDetail::find(Input::get('user_basic_details'));
            // print_r($user_basic_details); exit; 
            $user_secondary_details = UserSecondaryDetails::find(Input::get('user_secondary_details'));
            $qualification = new UserQualification();
            if(Auth::user()) {
                $userId = Auth::user()->id;
                $user_basic_details->address_house_name = Input::get('address_house_name');
                $user_basic_details->address_house_no = Input::get('address_house_no');
                $user_basic_details->address_landmark = Input::get('address_landmark');
                $user_basic_details->address_village = Input::get('address_village');
                $user_basic_details->address_postoffice = Input::get('address_postoffice');
                $user_basic_details->country = Input::get('country');
                $user_basic_details->state = Input::get('state');
                $user_basic_details->city = Input::get('city');
                $user_basic_details->panchayath = Input::get('panchayath');
                $user_basic_details->pincode = Input::get('pincode');
                $data = json_decode(Input::get("imagesList"));

                if($request->hasfile('filenames'))

                    {
                        //exit();
        
                    foreach($request->file('filenames') as $file)
        
                    {
        
                        $name=$file->getClientOriginalName();
        
                        $file->move(public_path().'/userImages/', $name);  
        
                        array_push($data,$name);  
        
                    }
                    
                    $user_basic_details->userImages = json_encode($data);
                    
        
                    }
        
                $user_basic_details->save();
                $user_secondary_details->other_facilities_accomodation = Input::get('other_facilities_accomodation');
                $user_secondary_details->other_facilities_spouce_stay = Input::get('other_facilities_spouce_stay');
                $user_secondary_details->other_facilities_transportation = Input::get('other_facilities_transportation');
                $user_secondary_details->mobile_number = Input::get('mobile_number');
                $user_secondary_details->whatsup_number = Input::get('whatsup_number');
                $user_secondary_details->save();
                $qualification = Input::get('qualification');
                UserQualification::where('user', $userId)->delete();
                foreach($qualification as $key => $data) {
                    if ($qualification[$key]) {
                        $UserQualification = new UserQualification();
                        $UserQualification->user = $userId;
                        $UserQualification->qualification = $qualification[$key];
                        $UserQualification->subject = Input::get('subject')[$key];
                        $UserQualification->year_passout = Input::get('year_passout')[$key];
                        $UserQualification->save();
                    }
                }
                // exit();
                return redirect()->route('home');

            }
            else {
                return redirect()->route('login');
            }
        }
        catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function profile_view() {
        try {
            if (Auth::user()) {
                $viewers_details = DB::table('viewers_details')
                                    ->where('viewed_by', Auth::user()->id)
                                    ->limit(10)
                                    ->select(
                                        'view_count',
                                        DB::raw('(select users.name from users where users.id = viewers_details.profile_id) as name'),
                                        DB::raw('(select (select roles.display_name from roles where roles.id = role_user.role_id) from role_user where role_user.user_id = viewers_details.profile_id) as user_role'),
                                        DB::raw('(select GROUP_CONCAT(qualification) from user_qualifications where user_qualifications.user = viewers_details.profile_id) as qualification')
                                    )
                                    ->orderBy('updated_at', 'desc')
                                    ->get();
                return view('web.profile_view', compact("viewers_details"));
            }
        } catch (Exception $e) {

        } 
    }

    public function verifyEmail() {
        $response = [];
        try {
            $email = DB::table('users')
                    ->where('email', Input::get('email'))
                    ->first();
            if($email) {
                $response['exist'] = 1;
            } else {
                $response['exist'] = 0;
            }
        } catch (Exception $e) {
            $response['exist'] = 1;
        }
        return json_encode($response);
    }
}
