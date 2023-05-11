<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function PHPUnit\Framework\returnValue;

class RoleController extends Controller
{
    public function AllPermission(){

        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permissions'));

    }//end method

    public function AddPermission(){

        return view('backend.pages.permission.add_permission');

    } // End Method


    public function StorePermission(Request $request){

         Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);

        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);

    }// End Method

    public function EditPermission($id){

        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));

    }

    public function UpdatePermission(Request $request){

        $permission_id = $request->id;

        Permission::findById($permission_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    } //end method

    public  function DeletePermission($id){

        Permission::findById($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);

    }//end method


    ////////////////roles ////////////////////////

    public function AllRoles(){

        $roles = Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));

    }// End Method


    public function AddRoles(){

        return view('backend.pages.roles.add_roles');

    }// End Method


    public function StoreRoles(Request $request){

         Role::create([
            'name' => $request->name,

        ]);

        $notification = array(
            'message' => 'Role Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);

    }// End Method


    public function EditRoles($id){

        $roles = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles',compact('roles'));

    }// End Method

    public function UpdateRoles(Request $request){

        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name' => $request->name,

        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);

    }// End Method


    public function DeleteRoles($id){

        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method



    //////////////// Add Roles Permission All Method ////////////


    public function AddRolesPermission(){

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissiongroup();
        return view('backend.pages.roles.add_roles_permission',compact('roles','permissions','permission_groups'));

    }// End Method

    public function RolePermissionStore(Request $request){

        $data = [];

        $permissions  = $request->permission;

        foreach ($permissions as $Key => $permission){

            $data['permission_id'] = $permission;
            $data['role_id'] = $request->role_id;
            DB::table('role_has_permissions')->insert($data);

        }
        $notification = array(
            'message' => 'Role And Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);

    }//end method

    public function AllRolePermission(){

        $roles = Role::all();
        return view('backend.pages.roles.all_role_permission',compact('roles'));

    }//end method


    public function EditRolePermission($id){

        $role = Role::findById($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissiongroup();
        return view('backend.pages.roles.edit_role_permission',compact('role','permissions','permission_groups'));

    }//end method

    public function UpdateRolePermission(Request $request,$id){

        $role = Role::findById($id);
        $permissions = $request->permission;
        if( !empty($permissions)){
            $role->syncPermissions($permissions);
        }
        $notification = array(
            'message' => 'Role And Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);

    }//end method

    public function DeleteRolePermission($id){

        $role = Role::findOrFail($id);
        if ( !is_null($role)){
            $role->delete();
        }
        $notification = array(
            'message' => 'Role And Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }//end method


}
