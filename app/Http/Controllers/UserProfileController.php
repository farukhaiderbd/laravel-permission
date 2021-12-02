<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Image;

class UserProfileController extends Controller
{
    public function index(){
        $user= Auth::user();
        return view('admin.user.profile.index',compact('user'));
    }

    public function __construct(){
        $this->middleware('auth');
    }

    public function userByupdateInfo(Request $request){
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('user.profile');
    }
    public function userByupdateImage(Request $request)
    {
        $validatedData = $request->validate([
            'image'      =>  'required',
        ]);
        $image= $request->image;
        if ($image ) {
            if (Auth::user()->image != null) {
                unlink(Auth::user()->image);
            }
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(350,300)->save('uploads/user/'.$image_name);
            $user_photo='uploads/user/'.$image_name;
            $id =Auth::user()->id;
            $user =  User::find($id);
            $user->image =$user_photo;
            $user->save();


        }else{
            return redirect()->back()->with([
                'messege'       =>  'Try agin somthing is wrong',
                'alert-type'    =>  'error',
            ]);
        }

        return redirect()->back();
    }


    public function submit(Request $request){
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required|unique:users',
            'password' =>'required|confirmed',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
//        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $image = $request->image;
        if($image){
            $image_name= 'user_'.Str::random(8).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/user/'.$image_name);
            $user->image ='uploads/user/'.$image_name;
//            $user->assignRole($request->role);
            $success = $user->save();
        }else{
//            $user->assignRole($request->role);
            $success =$user->save();
        }

        if($success){
            Session::flash('success','value');
            return redirect('dashboard/user/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/user/add');
        }
    }

    public function view($id)
    {
        $user = User::find($id);
        // Permission::create(['name'=> 'Ok test']);
        return view('admin.user.view',compact('user'));
    }
    public function infoupdate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' =>'required',
        ],[

        ]);
        $id = $request->id;
        $user = User::find($id);
        if($user->role != ''){
            $user->removeRole($user->role);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
//        $user->role = $request->role;
        // if(Auth::user()->role == $request->role){

        // }else{
        //     $user->assignRole($request->role);
        // }

        $user->assignRole($request->role);
        $user->save();


        // $okk = $user->getRoleNames();
        // $user->removeRole($okk);
        // dd($user->getRoleNames());

        return redirect()->back();

    }
    public function softdelete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification=array(
            'messege'=>'Successfully Deleted User',
            'alert-type'=>'success'
        );
        return Redirect('dashboard/user')->with($notification);
    }
    public function passupdate(Request $request)
    {
        $password = Auth::user()->password;
        $oldpass= $request->old_password;
        $newpass= $request->password;
        $confirm= $request->password_confirmation;
        if (Hash::check($oldpass, $password)) {
            if ($newpass === $confirm) {
                $user = User::findorfail(Auth::id());
                $user->password = Hash::make($newpass);
                $user->save();
                Auth::logout();
                $notification=array(
                    'messege'=>'Successfully Chanage password and login with new password',
                    'alert-type'=>'success'
                );
                return Redirect()->route('login')->with($notification);
            }else {
                $notification=array(
                    'messege'=>'New password and Confirm Password not matched!',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }
        }else {
            $notification=array(
                'messege'=>'Old password not match',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
