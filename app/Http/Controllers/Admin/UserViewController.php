<?php

namespace App\Http\Controllers\admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ViewersDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class UserViewController extends Controller
{
        public function getViewUser()
    {   
        $userDetail = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->Leftjoin('user_basic_details', 'user_basic_details.user_id', '=', 'users.id')
                ->Leftjoin('user_secondary_details', 'user_secondary_details.user_basic_id', '=', 'user_basic_details.id')
                ->select('users.email as m_email','users.name as m_name','users.id as userId','user_basic_details.*','roles.id as roleId','roles.name as rolename','roles.display_name as role_display_name','user_secondary_details.*')
                ->where('roles.id','!=',1)
                ->paginate(15);
    
        return view('admin.user.listing',compact('userDetail'));
    }
    public function getContactUsList(){

         $contctDetail = DB::table('contact_us')
                        ->get();
        return view('admin.user.contact_us',compact('contctDetail'));
    }

    public function getViewDetail($id)
    {   
        $user_id = Crypt::decrypt($id);

        $userDetails = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->join('user_basic_details', 'user_basic_details.user_id', '=', 'users.id')
                ->join('user_secondary_details', 'user_secondary_details.user_basic_id', '=', 'user_basic_details.id')
                ->select('users.id','user_basic_details.*','roles.*','user_secondary_details.*')
                ->where('roles.id','!=',1)
                ->where('users.id','=',$user_id)
                ->get();
        /*echo "<pre>";
        print_r($userDetails);
        exit();*/
    
        return view('admin.user.viewDetail',compact('userDetails'));
    }
    public function getViewerDetail()
    { 
        $viewerDetail = ViewersDetail::paginate(15);

        foreach ($viewerDetail as $key => $value) {
            $viewed_by = User::find($value->viewed_by);
            $profile_id = User::find($value->profile_id);
            $viewerDetail[$key]['viewer_name'] = $viewed_by->name;
            $viewerDetail[$key]['profile_name'] = $profile_id->name;
        }
        return view('admin.viewer.viewer',compact('viewerDetail'));
    }


    public function getEditUser($id){

        $users = User::find($id);
        
        return view('admin.cms.userEdit',compact('users','id'));
    }

    /**
     * Form action -  Edit permission for roles
     * @param  Request $request form contents
     * @return [type]           return with message
     */
    public function postEditUser(Request $request,$id){

        request()->validate([
            
            'email' => 'email',

        ]);

        if($id !='' && $request->name !='' && $request->email !=''){

            $users = User::find($id);
            $users->name = $request->name;
            $users->email = $request->email;
            $users->status = $request->status;
            $users->save();
            
            return redirect()->route('admin.user.view')->with('success_message', 'Content Updated Successfully ');
        }else{
           return redirect()->route('admin.user.view')->with('error_message', 'Error During Update'); 
        }
    }

    public function getDelUser($id){

        try {

            
            $users = User::findOrFail($id);
            $users->delete();

            return redirect()->route('admin.user.view')->with('success_message', 'Content Removed Successfully ');

        } catch (\Exception $e) {
            return redirect()->route('admin.user.view')->with('error_message', $e->getMessage());
        }
    }

    //Search by name and email
    
    public function search(){
        $status = Input::get ('status');
        $user = Input::get ('user');
        //return $users;
        $search = Input::get ('search');
        if($search == "" &&  $status == "" && $user == ""){
        $users = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('users.*')
        ->where('roles.id','!=',2)
        ->get();
        //return $users;
        return view('admin.cms.userView',compact('users','search','status','user'));

    
        }
        if($search == "" && $status != "" && $user != ""){
            $users =  DB::table('users')
            ->join('role_user', function ($join) {
            $join->on('users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.*')
            ->where('roles.id','!=',2);
             })
            ->select('users.*')
            ->where('roles.id','=',$user)
            ->where('users.status','=',$status)
            ->get();
            //return $status;
            if(count($users) > 0){
            //return view('admin.cms.userView')->withDetails($users)->withQuery ( $search );
            return view('admin.cms.userView',['users' => $users, 'search' => $search,'status' => $status,'user' => $user]);

            }
            return view ('admin.cms.userView',['search' => $search,'status' => $status,'user' => $user])->withMessage('No Users found. Try to search again !');
    
        }
        if($search != "" && $status != "" && $user != ""){
            $users =  DB::table('users')
            ->join('role_user', function ($join) {
            $join->on('users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.*')
            ->where('roles.id','!=',2);
            })
            
            ->where(function ($query ) {
                $search = Input::get ('search');
                $query->where('users.name','LIKE','%'.$search.'%')
                ->orWhere('email','LIKE','%'.$search.'%');
            })
            ->select('users.*')
            ->where('roles.id','=',$user)
            ->where('users.status','=',$status)
            ->get();
            //return $status;
            if(count($users) > 0){
            //return view('admin.cms.userView')->withDetails($users)->withQuery ( $search );
            return view('admin.cms.userView',['users' => $users, 'search' => $search,'status' => $status,'user' => $user]);

        }
        return view ('admin.cms.userView',['search' => $search,'status' => $status,'user' => $user])->withMessage('No Users found. Try to search again !');

        }

        if($search != "" && $status == "" && $user != ""){
            $users =  DB::table('users')
            ->join('role_user', function ($join) {
            $join->on('users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.*')
            ->where('roles.id','!=',2);
             })
             ->where(function ($query ) {
                $search = Input::get ('search');
                $query->where('users.name','LIKE','%'.$search.'%')
                ->orWhere('email','LIKE','%'.$search.'%');
            })
            ->select('users.*')
            ->where('roles.id','=',$user)
            ->get();
            //return $status;
            if(count($users) > 0){
            //return view('admin.cms.userView')->withDetails($users)->withQuery ( $search );
            return view('admin.cms.userView',['users' => $users, 'search' => $search,'status' => $status,'user' => $user]);

        }
        return view ('admin.cms.userView',['search' => $search,'status' => $status,'user' => $user])->withMessage('No Users found. Try to search again !');
    
        }
        
        if($search != "" && $status != "" && $user == ""){
            $users =  DB::table('users')
            ->join('role_user', function ($join) {
            $join->on('users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.*')
            ->where('roles.id','!=',2);
            })
            ->where(function ($query ) {
                $search = Input::get ('search');
                $query->where('users.name','LIKE','%'.$search.'%')
                ->orWhere('email','LIKE','%'.$search.'%');
            })
            ->select('users.*')
            ->where('users.status','=',$status)
            ->get();
            //return $status;
            if(count($users) > 0){
            //return view('admin.cms.userView')->withDetails($users)->withQuery ( $search );
            return view('admin.cms.userView',['users' => $users, 'search' => $search,'status' => $status,'user' => $user]);

        }
        return view ('admin.cms.userView',['search' => $search,'status' => $status,'user' => $user])->withMessage('No Users found. Try to search again !');

        }
        if($search != ""){
            $users = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.*')
            ->where('users.name','LIKE','%'.$search.'%')
            ->orWhere('email','LIKE','%'.$search.'%')
            ->get();
            //return $users;
            return view('admin.cms.userView',compact('users','search','status','user'));
        }

        $users = DB::table('users')
                ->join('role_user', function ($join) {
                $join->on('users.id', '=', 'role_user.user_id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->select('users.*')
                ->where('roles.id','!=',2);
                 })
                 ->where(function ($query ) {
                    $search = Input::get ('search');
                    $query->where('users.name','LIKE','%'.$search.'%')
                    ->orWhere('email','LIKE','%'.$search.'%');
                })
                ->select('users.*')
                ->where('roles.id','=',$user)
                ->orwhere('users.status','=',$status)
                ->get();
                //return $status;
                if(count($users) > 0){
                //return view('admin.cms.userView')->withDetails($users)->withQuery ( $search );
                return view('admin.cms.userView',['users' => $users, 'search' => $search,'status' => $status,'user' => $user]);

        }
         return view ('admin.cms.userView',['search' => $search,'status' => $status,'user' => $user])->withMessage('No Users found. Try to search again !');
        
        }}