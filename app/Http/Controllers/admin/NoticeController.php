<?php

namespace App\Http\Controllers\admin;

use App\Model\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NoticeController extends Controller
{
    public function index(){
        $contents = Notice::all();
        return view('admin.notice.index',compact('contents'));
    }

    public function add(){
        return view('admin.notice.add');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
//        dd($request);
        $Notice = new Notice();
        $Notice->school_id = 1;
        $Notice->title = $request->title;
        $Notice->content = $request->contents;
        $Notice->status  = $request->status;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/notice/');
            $Notice->image = $db_path;
        }

        if($Notice->save()){
            return redirect()->back()->with('success','New Notice Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New Notice Add Failed');
        }

    }

    public function edit($Notice_slug){
        if($notice = Notice::where('slug',$Notice_slug)->first()){
            return view('admin.notice.edit',compact('notice'));
        }
        else{
            return redirect()->back()->with('error','Notice Not Found, Please Reload The Page');
        }
    }

    public function update(Request $request, $Notice_slug){
//        dd($request);
        $Notice = Notice::where('slug',$Notice_slug)->first();
        $Notice->title = $request->title;
        $Notice->content = $request->contents;
        $Notice->status  = $request->status;

        if($request->hasFile('image')){
            $file_path=public_path().'/'.$Notice->image;
            $thumbnail_path = public_path().'/thumbnail/'.$Notice->image;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            if(file_exists($thumbnail_path)){
                unlink($thumbnail_path);
            }
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/notice/');
            $Notice->image = $db_path;
        }

        if($Notice->save()){
            return redirect()->back()->with('success','Notice Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Failed to edit Notice');
        }
    }

    public function delete(Request $request){
        if($Notice = Notice::findOrFail($request->notice_id)){
            $file_path=public_path().'/'.$Notice->image;
            $thumbnail_path = public_path().'/thumbnail/'.$Notice->image;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            if(file_exists($thumbnail_path)){
                unlink($thumbnail_path);
            }
            $Notice->delete();
            return redirect()->back()->with('success','Notice Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Notice Delete Failed, Please Reload The Page');
        }
    }

    public function changestatus($Notice_id){
        $Notice = Notice::find($Notice_id);
        if($Notice->status == "Active"){
            $Notice->status = "Inactive";
        }else{
            $Notice->status = "Active";
        }
        $return = $Notice->update();

        return redirect()->back()->with('success','Status Changed');
    }
}
