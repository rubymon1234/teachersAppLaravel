<?php

namespace App\Http\Controllers\Acl;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AclController extends Controller
{
    /**
     * ViewRole 
     * @author Zoo/Ruban
    */
   	public function getViewRole()
    {
        $roles = Role::paginate(15);
        return view('acl.roleView',compact('roles'));
    }

    /**
     * CreateRole
     * @author Zoo/Ruban
    */
    public function getCreateRole()
    {
        return view('acl.roleCreate');
    }

    /**
     * CreateRole ( Method=POST )
     * @param name, display_name,description
     * @author Zoo/Ruban
    */
    public function postCreateRole(Request $request)
    {
    	try {
    		
	    	if($request->Update =='Save'){

		    	$rule = [
		            'name' => 'required|unique:roles',
		            'display_name' => 'required',
		            'description' => 'required',
		        ];
		        $messages = [
		            'name.required' => 'Role Name is required',
		            'display_name.unique' => 'Role Name Already Exist',
		            'description.required' => 'Description is required',
		        ];

		        $validator = Validator::make(Input::all(), $rule, $messages);

		        if ($validator->fails()) {

		        	return redirect()->route('acl.role.manage')->withInput(Input::all())->withErrors($validator);

		        }else{

		        	Role::create([
		            'name' => $request->name,
		            'display_name' => $request->display_name,
		            'description' => $request->description,
		        ]);
		        return redirect()->route('acl.role.view')->with('success_message', 'New Role successfully Added ');

		        }
	    	}
	    	if ($request->Cancel =='cancel') {
	    		 return redirect()->route('acl.role.view')->with('warning_message', 'Request is Rollback');
	    	}
    	} catch (\Exception $e) {
        	return redirect()->route('acl.role.view')->with('warning_message', $e->getMessage());
    	}
    }

    /**
     * ViewPermissions ( Method=GET )
     * @param no
     * @author Zoo/Ruban
    */
    public function getViewPerms()
    {
        $perms = Permission::paginate(15);
        return view('acl.permsView',compact('perms'));
    }

    /**
     * CreatePermissions ( Method=GET )
     * @param no
     * @author Zoo/Ruban
    */
    public function getCreatePerms()
    {
        $perm_repo  = false;
        return view('acl.permsCreate');
    }

    /**
     * CreatePermissions ( Method=POST )
     * @param name,display_name,description
     * @author Zoo/Ruban
    */
    public function postCreatePerms(Request $request)
    {
        if($request->Update =='Save'){

            $rule = [
                'name' => 'required|unique:permissions',
                'display_name' => 'required',
                'description' => 'required',
            ];
            $messages = [
                'name.required' => 'Role Name is required',
                'display_name.unique' => 'Role Name Already Exist',
                'description.required' => 'Description is required',
            ];

            $validator = Validator::make(Input::all(), $rule, $messages);

            if ($validator->fails()) {
                return redirect()->route('acl.perms.manage')->withInput(Input::all())->withErrors($validator);
            }else{

                $newPermission = new Permission();
                $newPermission->name         = $request->get('name');
                $newPermission->display_name = $request->get('display_name');
                $newPermission->description  = $request->get('description');
                if($newPermission->save())
                    return redirect()->route('acl.perms.view')->with('success_message', 'New Permissoin successfully Added ');
            }
        }
        if ($request->Cancel =='cancel') {
            return redirect()->route('acl.perms.view')->with('warning_message', 'Request is Rollback');
        }
    }
    /**
     * View page - Assign permission for selected Role
     * @param  Integer $roleId role id
     * @return array         [description]
     */
    public function getPermissionAssign($roleId)
    {
        $role = Role::find($roleId);
        $role_permissions = $role->perms()->get();
        $permissions = Permission::get();

        return view('acl.assign-permissions', [
            'role' => $role,
            'role_permissions' => $role_permissions,
            'permissions' =>$permissions,
        ]);
    }
    /**
     * Form action -  assign permission for roles
     * @param  Request $request form contents
     * @return [type]           return with message
     */
    public function postPermissionAssign(Request $request, $roleId)
    {
        $role = Role::find($roleId);
        $role->perms()->sync($request->get('permissn'));
        return redirect()->route('acl.role.view')->with('success_message', 'Role Updated Successfully ');
    }
    /**
     * Form action -  Edit permission for roles
     * @param  Request $request form contents
     * @return [type]           return with message
     */
    public function getEditPerms($id){

        $perms = Permission::find($id);
        return view('acl.permsEdit',compact('perms','id'));
    }
    /**
     * Form action -  Edit permission for roles
     * @param  Request $request form contents
     * @return [type]           return with message
     */
    public function postEditPerms(Request $request,$id){

        if($id !='' && $request->name !='' && $request->display_name !=''){

            $perms = Permission::find($id);
            $perms->name = $request->name;
            $perms->display_name = $request->display_name;
            $perms->description = $request->description;
            $perms->save();
            return redirect()->route('acl.perms.view')->with('success_message', 'Permission Updated Successfully ');
        }else{
           return redirect()->route('acl.perms.view')->with('error_message', 'Error During Update'); 
        }
    }
    /**
     * DetetePermissions ( Method=GET )
     * @param array roles,permission
     * @author Zoo/Ruban
    */
    public function getDelPerms($permissionId){

        try {

            $user      = Auth::user(); 
            $roleId   = $user->roles->first()->id;
            $roleArr = Role::all();
            foreach ($roleArr as $key => $roleDetail) {
                $role = Role::find($roleDetail->id);
                $role->perms()->detach($permissionId);
            }
            $perms = Permission::findOrFail($permissionId);
            $perms->delete();

            return redirect()->route('acl.perms.view')->with('success_message', 'Permission Removed Successfully ');

        } catch (\Exception $e) {
            return redirect()->route('acl.perms.view')->with('error_message', $e->getMessage());
        }
    }
}
