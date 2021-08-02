<?php

namespace App\Http\Controllers\admin;

use App\Model\Ethnicity;
use App\Model\Staff;
use App\Model\StaffDocument;
use App\Model\StaffExprience;
use App\Model\StaffType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class StaffController extends Controller
{
    public function index(){
        $staff_types= StaffType::all();
        $contents = Staff::all();
        return view('admin.staff.index',compact('contents','staff_types'));
    }

    public function details($staff_slug){
        if($staff = Staff::where('slug',$staff_slug)->first()) {
            return view('admin.staff.details', compact('staff'));
        }
        else{
            return redirect()->back();
        }
    }

    public function add(){
        $staff_types= StaffType::all();
        $ethnicities = Ethnicity::all();
        return view('admin.staff.add',compact('staff_types','ethnicities'));
    }

    public function store(Request $request){
//         dd($request);
        $staff = new Staff();
        $staff->school_id = 1;
        $staff->name = $request->name;
        $staff->job_title = $request->job_title;
        $staff->join_date = $request->join_date ;
        $staff->address = $request->address;
        $staff->gender = $request->gender;
        $staff->DOB = $request->DOB;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->staff_type_id = $request->staff_type_id;
        $staff->description = $request->description;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/staff/');
            $staff->image = $db_path;
        }

        if($staff->save()) {
            return redirect()->route('admin.staff.all')->with('success','New Staff Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New Staff Add Failed');
        }

    }

    public function edit($staff_slug){
        if($staff = Staff::where('slug',$staff_slug)->first()) {
            $staff_types = StaffType::all();
            $ethnicities = Ethnicity::all();
            return view('admin.staff.edit',compact('staff','staff_types','ethnicities'));
        }
        else{
            return redirect()->back();
        }

    }

    public function update(Request $request, $staff_slug){
//        dd($request);
        $staff = Staff::where('slug',$staff_slug)->first();

        $staff->name = $request->name;
        $staff->job_title = $request->job_title;
        $staff->join_date = $request->join_date ;
        $staff->address = $request->address;
        $staff->gender = $request->gender;
        $staff->DOB = $request->DOB;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->staff_type_id = $request->staff_type_id;
        $staff->description = $request->description;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/staff/');
            $staff->image = $db_path;
        }
        $save = $staff->update();

        if($save) {

            return redirect()->route('admin.staff.all')->with('success','Staff Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Staff Edit Failed');
        }

    }

    public function delete(Request $request){
        if($staff = Staff::findOrFail($request->staff_id)) {
            $name = $staff->name;
            if (isset($staff->expriences)) {
                foreach ($staff->expriences as $exp) {
                    $exp->delete();
                }
            }
            if (isset($staff->documents)) {
                foreach ($staff->documents as $document) {
                    $file_path = public_path() . '/' . $document->file;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                    $document->delete();
                }
            }
            $staff->delete();
            return redirect()->back()->with('success','Staff '.$name.' Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Staff Delete Error');
        }
    }

    public function qualifications_edit($staff_slug){
        if($staff = Staff::where('slug',$staff_slug)->first()) {
            return view('admin.staff.qualifications',compact('staff'));
        }
        else{
            return redirect()->back();
        }
    }

    public function qualifications_update(Request $request,$staff_slug){
        $staff = Staff::where('slug',$staff_slug)->first();
        foreach ($staff->expriences as $exp){
            $exp->delete();
        }
        if (isset($request->exp)) {
//                    dd($request);
            $exp = $request->exp;
            $keys = array_keys($exp['organization_name']);
            foreach ($keys as $key) {
                $experience = new StaffExprience();
                $experience->staff_id = $staff->id;
                $experience->school_id = 1;
                $experience->organization_name = $exp['organization_name'][$key];
                $experience->job_title = $exp['job_title'][$key];
                $experience->job_location = $exp['job_location'][$key];
                $experience->start_date = $exp['start_date'][$key];
                $experience->end_date = $exp['end_date'][$key];
                $experience->save();
            }
            return redirect()->route('admin.staff.all')->with('success','Staff Qualifications Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Staff Qualification Edit Failed');
        }
    }

    public function certificates_edit($staff_slug){
        if($staff = Staff::where('slug',$staff_slug)->first()) {
            return view('admin.staff.certificates',compact('staff'));
        }
        else{
            return redirect()->back();
        }
    }

    public function upload_doc(Request $request,$staff_id){
//        return dd($request);
        $staff = Staff::find($staff_id);
        $doc = new StaffDocument();
        if($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/admin/staff/documents/', $filename);
            $db_filename = 'admin/staff/documents/' . $filename;
            $doc->title = $request->title;
            $doc->file = $db_filename;
            $doc->staff_id = $staff->id;
            $doc->school_id = 1;
        }
        if($doc->save()){
            return response()->json("File Added",200);
        }
        else{
            return response()->json("Error",400);
        }
    }
    public function delete_doc($id){
        $image = StaffDocument::findOrFail($id);
        $file_path=public_path().'/'.$image->file;
        if(file_exists($file_path)){
            unlink($file_path);
        }
        if($image->delete()){
            return response()->json("File deleted",200);
        }
        else{
            return response()->json("Error",400);
        }
    }

    public function preview($id){
        $staff = Staff::findOrFail($id);
        $files = StaffDocument::where('staff_id',$staff->id)->get();
        return $files;
    }
}
