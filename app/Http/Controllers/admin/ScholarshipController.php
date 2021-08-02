<?php

namespace App\Http\Controllers\admin;

use App\Model\Scholarship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScholarshipController extends Controller
{
    public function index(){
        $contents = Scholarship::all();
        return view('admin.scholarship.index',compact('contents'));
    }

    public function add(){
        return view('admin.scholarship.add');
    }

    public function store(Request $request){
//        dd($request);
        $scholarship = new Scholarship();
        $scholarship->school_id = 1;
        $scholarship->title = $request->title;
        $scholarship->content = $request->contents;
        $scholarship->status  = $request->status;

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admin/scholarship/', $filename);
            $db_filename = 'admin/scholarship/' . $filename;
            $scholarship->file = $db_filename;
        }

        if($scholarship->save()){
            return redirect()->back()->with('success','New Scholarship Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New Scholarship Add Failed');
        }

    }

    public function edit($scholarship_slug){
        if($scholarship = Scholarship::where('slug',$scholarship_slug)->first()){
            return view('admin.scholarship.edit',compact('scholarship'));
        }
        else{
            return redirect()->back()->with('error','Scholarship Not Found, Please Reload The Page');
        }
    }

    public function update(Request $request, $scholarship_slug){
//        dd($request);
        $scholarship = Scholarship::where('slug',$scholarship_slug)->first();
        $scholarship->title = $request->title;
        $scholarship->content = $request->contents;
        $scholarship->status  = $request->status;

        if($request->hasFile('file')){
            $file_path=public_path().'/'.$scholarship->file;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            $file = $request->file('file');
            $filename = time() . '-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admin/scholarship/', $filename);
            $db_filename = 'admin/scholarship/' . $filename;
            $scholarship->file = $db_filename;
        }

        if($scholarship->save()){
            return redirect()->back()->with('success','Scholarship Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Failed to edit Scholarship');
        }
    }

    public function delete(Request $request){
        if($scholarship = Scholarship::findOrFail($request->scholarship_id)){
            $file_path=public_path().'/'.$scholarship->file;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            $scholarship->delete();
            return redirect()->back()->with('success','Scholarship Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Scholarship Delete Failed, Please Reload The Page');
        }
    }

    public function changestatus($scholarship_id){
        $scholarship = Scholarship::find($scholarship_id);
        if($scholarship->status == "Active"){
            $scholarship->status = "Inactive";
        }else{
            $scholarship->status = "Active";
        }
        $return = $scholarship->update();

        return redirect()->back()->with('success','Status Changed');
    }
}
