<?php

namespace App\Http\Controllers\admin;

use App\Model\StaffType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffTypeController extends Controller
{
    public function index(){
        $contents = StaffType::all();
        return view('admin.staff_type.index',compact('contents'));
    }

    public function add(Request $request){
        // dd($request);
        $staff_type = new StaffType();
        $staff_type->school_id = 1;
        $staff_type->title = $request->title;
        $staff_type->remarks = $request->remarks;

        if($staff_type->save()){
            return redirect()->back()->with('success','New Staff Type Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New Staff Type Add Failed');   
        }

    }

    public function edit(Request $request, $staff_type_id){
        $staff_type = StaffType::findOrFail($staff_type_id);
        $staff_type->title = $request->title;
        $staff_type->remarks = $request->remarks;

        if($staff_type->save()){
            return redirect()->back()->with('success','Staff Type Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Staff Type Edit Failed');   
        }
    }

    public function delete(Request $request){
        if($staff_type = StaffType::findOrFail($request->staff_type_id)){
            $staff_type->delete();
            return redirect()->back()->with('success','Staff Type Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Staff Type Delete Failed, Please Reload The Page');
        }
    }
}
