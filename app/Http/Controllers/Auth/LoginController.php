<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Auth\AuthController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // /protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    

    public function logout(Request $request) {
        /*try {*/
      
            $user = Auth::user();
            $roleName   = $user->roles->first()->name;
            $data['userId'] = Auth::user()->id;
            $data['roleName'] = $roleName;
            Auth::logout();
            if($data['roleName'] =='admin'){

                return redirect('admin'); 

            }elseif ($data['roleName'] =='user') {  

                return redirect('/'); 

            }else{
                return redirect('/'); 
            }
            
        // } catch (\Exception $e) {
        //     return redirect('/')->with('error_message', $e->getMessage());
        // }
    }
}
