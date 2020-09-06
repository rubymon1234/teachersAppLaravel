<?php

namespace App\Http\Controllers\Web;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\UserBasicDetail;
use App\Models\UserSecondaryDetails;
use App\Models\ContactUs;
use Toastr;
use Mail;
use App\Http\Requests;

class ContactController extends Controller
{
   

    public function update_contact() {
        
        try {
            $contact = new ContactUs();
            $contact->contact_name = Input::get('name');
            $contact->contact_email = Input::get('email');
            $contact->contact_landline = Input::get('landline');
            $contact->contact_mobile = Input::get('mobile');
            $contact->contact_message = Input::get('message');
            $contact->save();
             
//              Mail::raw('Hi, welcome user!', function ($message) {
//   $message->to('ssujithkumaronline@gmai.com')
//     ->subject('Email');
// });
            
            
            Toastr::success("Thank you! Your message has been successfully sent. We will contact you very soon!");
            return redirect()->route('contactUs');
        } catch (Exception $e) {
            Toastr::error($e);
        }
    }

   
}
