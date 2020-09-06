<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use  App\Models;
use DB;

use Mail;
use App\Http\Controllers\Auth\Input;
use Illuminate\Foundation\Auth\RegistersUsers;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(Request $data)
    {  
       
      

       $User= User::create([
       
            'name' => $data['first_name'],
            'last_name'=>$data['last_name'],
            'email' => $data['email'],
            'phone_number'=> $data['phone_number'],
              'role' => $data['role'],
            'password' => Hash::make($data['password']),
           'authentication_otp'=> mt_rand(1000,9999),
         
        ]);
        $data1 = array('user_id'=> $User->id, 'role_id'=> $data['role']);

      DB::table('role_user')->insert($data1);
 
        
            try {   
                $name= 'name';  
                $last_name='last_name';
                $user_email='email';
                $phone_number='phone_number'; 
                $role= 'role'; 
                $password='password';
                $email =  'protest345@gmail.com'; //env('MAIL_USERNAME'); // 
                //$email =  'protest345@gmail.com';
               
                $userEmail = Mail::send('emailtemplates.contact-request', ['name' => $name, 'user_email' => $user_email, 'last_name'=> $last_name,'password'=>$password], function ($mail) use ($user_email, $name, $email,$last_name,$password) {
                    $mail->to($email, $name)->subject('INTER CONNEX|Contact Us');
                });
            }  
                catch (Exception $ex) {
    
                return 0;
            }
            try {   
                $authentication_otp= 'authentication_otp';  
                
                $email =  'protest345@gmail.com'; //env('MAIL_USERNAME'); // 
                //$email =  'protest345@gmail.com';
               
                $userEmail = Mail::send('emailtemplates.otp-request', ['authentication_otp' => $authentication_otp ], function ($mail) use ($authentication_otp, $email) {
                    $mail->to($email)->subject('Contact Us');
                });
                
                return view("web.includes.otpModal");
    
            } catch (Exception $ex) {
    
                return 0;
            }
           
        }
        public function resendotp($id)
    { 
        User::where('id', $id)->update(['authentication_otp'=>mt_rand(1000,9999)]);
        try {   
            $authentication_otp= 'authentication_otp';  
            
            $email =  'protest345@gmail.com'; //env('MAIL_USERNAME'); // 
            //$email =  'protest345@gmail.com';
           
            $userEmail = Mail::send('emailtemplates.otp-request', ['authentication_otp' => $authentication_otp ], function ($mail) use ($authentication_otp, $email) {
                $mail->to($email)->subject('Contact Us');
            });
            
            return view("web.includes.otpModal");

        } catch (Exception $ex) {

            return 0;
        }
    }


           
          
            
    
      
}