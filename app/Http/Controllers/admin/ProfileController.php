<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(){
        $user = Auth::user();
        return view('admin.profile.profile',compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->school_id = 1;

        if($request->password){
            if($request->password != $request->password_confrimation){

                return redirect()->back()->with('error', 'Password Doesnot Match');
            }
            $user->password = Hash::make($request->password);
        }

        if($request->file('image')){
            if($user->image){
                $file_path = public_path().'/'.$user->image;
                $thumbnail_path = public_path().'/thumbnail/'.$user->image;
                if(file_exists($file_path)){
                    unlink($file_path);
                }
                if(file_exists($thumbnail_path)){
                    unlink($thumbnail_path);
                }
            }
            $image = $request->file('image');
            $db_filename = imageUpload($image,'images/students/');
            $user->image = $db_filename;
        }

        $response = $user->update();

        if($response){

            return redirect()->back()->with('success', 'User Successfully Updated.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }
}
