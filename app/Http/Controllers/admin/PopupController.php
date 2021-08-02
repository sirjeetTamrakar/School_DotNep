<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Popup;
use Illuminate\Support\Facades\File;

class PopupController extends Controller
{
    public function index(){
        $allpopups = Popup::orderBy('position')->paginate(10);
        return view('admin.popup.index',compact('allpopups'));
    }


    public function add(){
        return view('admin.popup.add');
    }


    public function addSubmit(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'link' => 'required',
            'position' => 'required',
            'status' => 'required'
        ]);
        if($request->hasFile('image')){
            $requestedimage = $request->image;
            $imagename = time().$requestedimage->GetClientOriginalName();
            $path = public_path('images/popup');
            $requestedimage->move($path,$imagename);
            $image = 'images/popup/'.$imagename;
        }


        Popup::create([
            'title' => $request->title,
            'image' => $image,
            'link' => $request->link,
            'position' => $request->position,
            'status' => $request->status
        ]);
        return redirect()->back()->with('succes','Pop-up Added Successfully!!');
    }


    public function edit($id){
        $popup = Popup::findOrFail($id);
        return view('admin.popup.edit',compact('popup'));
    }

    public function editSubmit(Request $request,$id){
        $popup = Popup::findOrFail($id);
        $popup->title = $request->title;
        $popup->link = $request->link;
        $popup->status = $request->status;
        if($request->hasFile('image')){
            if(File::exists(public_path($popup->image))){
                File::delete(public_path($popup->image));
            }
            $requestedfile = $request->image;
            $image = time().$requestedfile->GetClientOriginalName();
            $path = public_path('images\course');
            $requestedfile->move($path,$image);
            $popup->image = 'images/course/'.$image;
        }
        $popup->position = $request->position;
        $popup->update();

        return redirect()->back()->with('success','Updated Successfully!!!');

    }

    public function delete($id){
        $popup = Popup::findOrFail($id);
        if(File::exists(public_path($popup->image))){
            File::delete(public_path($popup->image));
        }
        $popup->delete();
        return redirect()->back()->with('error','Course Deleted Successfully!!!');
    }
}
