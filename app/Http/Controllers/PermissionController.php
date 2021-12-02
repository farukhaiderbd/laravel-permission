<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function Permission()
    {
        $user_permission = Permission::where('slug','create-tasks')->first();
        $admin_permission = Permission::where('slug', 'edit-users')->first();

        //RoleTableSeeder.php
        $user_role = new Role();
        $user_role->slug = 'user';
        $user_role->name = 'User_Name';
        $user_role->save();
        $user_role->permissions()->attach($user_permission);

        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Admin_Name';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);

        $user_role = Role::where('slug','user')->first();
        $admin_role = Role::where('slug', 'admin')->first();

        $createTasks = new Permission();
        $createTasks->slug = 'create-tasks';
        $createTasks->name = 'Create Tasks';
        $createTasks->save();
        $createTasks->roles()->attach($user_role);

        $editUsers = new Permission();
        $editUsers->slug = 'edit-users';
        $editUsers->name = 'Edit Users';
        $editUsers->save();
        $editUsers->roles()->attach($admin_role);

        $user_role = Role::where('slug','user')->first();
        $admin_role = Role::where('slug', 'admin')->first();
        $user_perm = Permission::where('slug','create-tasks')->first();
        $admin_perm = Permission::where('slug','edit-users')->first();

        $user = new User();
        $user->name = 'Test_User';
        $user->email = 'test_user@gmail.com';
        $user->password = Hash::make('1234567');
        $user->save();
        $user->roles()->attach($user_role);
        $user->permissions()->attach($user_perm);

        $admin = new User();
        $admin->name = 'Test_Admin';
        $admin->email = 'test_admin@gmail.com';
        $admin->password = Hash::make('1234567');
        $admin->save();
        $admin->roles()->attach($admin_role);
        $admin->permissions()->attach($admin_perm);


        return redirect()->back();
    }//



    public function roles()
    {
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));

    }
    public function roleadd()
    {
        return view('admin.role.create');

    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $role =$request->name;
        Role::create(['name' => $role, 'slug' => Str::slug($role)]);
        $notification = array(
            'messege'   =>  'Role create successfully!',
            'alert-type'=>  'success'
        );
        return redirect()->route('roles')->with($notification);

    }
    public function edit($id)
    {
        $role = Role::find($id);
        //    $user_id =  Auth::user()->id;
        //    $user = User::find($user_id);
        //    $user->assignRole('Super Admin');
        // Permission::create(['name' => 'k']);
        // $role->givePermissionTo('index user');
        return view('admin.role.edit',compact('role'));

    }
    public function update(Request $request)
    {
        $id = $request->id;
        $role = Role::find($id)->update(['name' => $request->name]);
        $notification = array(
            'messege'   =>  'Role Update successfully!',
            'alert-type'=>  'success'
        );
        return redirect()->back()->with($notification);

    }
    public function delete($id)
    {
        $role = Role::find($id)->delete();
        $notification = array(
            'messege'   =>  'Role Delete successfully!',
            'alert-type'=>  'success'
        );
        return redirect()->back()->with($notification);

    }
    public function permissonupdate(Request $request)
    {
        $id = $request->id;
        $check = $request->check;
        $permission = $request->permission;
        if($check == 'true'){
            $role = Role::find($id);
            $role->givePermissionTo($permission);
            return response()->json(['success' => 'This role give this permission']);
        }elseif($check == 'false'){
            $role = Role::find($id);
            $role->revokePermissionTo($permission);
            return response()->json(['success' => 'This role remove this permission']);

        }

    }



}
