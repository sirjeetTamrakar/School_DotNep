<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('super-admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.add',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//dd($request);
        $this->validate($request,[
            'name'=>'required',
            'role'=>'required',
            'email'=>'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->role_id = $request->role;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->school_id = 1;

        if($request->file('image')){
            $requestedimage = $request->image;
            $orginalPath = 'images/users/';
            $db_path = imageUpload( $requestedimage,$orginalPath );
            // $db_path = imageUpload($image,  'images/users/');
            $user->image = $db_path;
        }

        if($request->password != $request->password_confrimation){

            return redirect()->back()->with('error', 'Password Doesnot Match');
        }

        $response = $user->save();

        if($response){

            return redirect()->back()->with('success', 'User Successfully Added.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'role'=>'required',
            'email'=>'required',
        ]);

        $user = User::where('id', $request->user_id)->first();
        $user->name = $request->name;
        $user->role_id = $request->role;
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
                // str_replace(" ","",time().$file->GetClientOriginalName());
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
     
            $db_filename = imageUpload($image,'images/users/');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =User::find($id);
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

        $response = $user->delete();

        if($response){

            return redirect()->back()->with('success', 'User Successfully Deleted.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function getJson(){
        $users = User::all();
        $count = 1;
        foreach ($users as $user){
            $user->count = $count;
            $user->role = isset($user->role_id) ? Role::find($user->role_id)->name : 'None';
            $user->image = asset('thumbnail/'.$user->image);
            $count++;
        }
        return datatables($users)->toJson();
    }
}
