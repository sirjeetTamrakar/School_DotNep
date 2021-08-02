<?php

namespace App\Http\Controllers\admin;

use App\Model\Grade;
use App\Model\Staff;
use App\Model\StaffClassSubject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffClassController extends Controller
{
    public function index(){
        $contents = Grade::where('school_id',1)->get();
        $staffs = Staff::where('school_id',1)->get();
        return view('admin.staffbygrade.index',compact('contents','staffs'));
    }

    public function add(Request $request){
        $school_id = 1;
        $grade_id = $request->grade_id;
        $subject_id = $request->subject_id;
        $staffbygrades = StaffClassSubject::where('school_id',$school_id)->where('grade_id',$grade_id)->where('subject_id',$subject_id)->get();
        if($staffbygrades->count() > 0){
            foreach ($staffbygrades as $s){
                $s->delete();
            }
            foreach ($request->staff_id as $staff_id){
                $staff_subject_grade = new StaffClassSubject();
                $staff_subject_grade->school_id = $school_id;
                $staff_subject_grade->grade_id = $grade_id;
                $staff_subject_grade->subject_id = $subject_id;
                $staff_subject_grade->staff_id = $staff_id;
                $staff_subject_grade->save();
            }
        }else{
            foreach ($request->staff_id as $staff_id){
                $staff_subject_grade = new StaffClassSubject();
                $staff_subject_grade->school_id = $school_id;
                $staff_subject_grade->grade_id = $grade_id;
                $staff_subject_grade->subject_id = $subject_id;
                $staff_subject_grade->staff_id = $staff_id;
                $staff_subject_grade->save();
            }
        }
        return redirect()->back()->with('success','Staff Assigned to Subject');
    }
}
