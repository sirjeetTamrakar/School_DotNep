<?php

namespace App\Http\Controllers\admin;

use App\Model\Grade;
use App\Model\Staff;
use App\Model\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;

class IndexController extends Controller
{
    public function index(){
        $school_id = 1;
        $context = new Collection();
        $context->student_count = schoolStudentsCount($school_id);
        $context->staff_count = schoolTeacherCount($school_id) + schoolAdministrationCount($school_id);
        $students = Student::where('school_id',$school_id)->get();
        $context->male_student = $students->where('gender','Male')->count();
        $context->female_student = $students->where('gender','Male')->count();
//        $context->bar_chart = $this->genderByClass();
//        dd($context);
        return view('admin.index', compact('context'));
    }


    public function genderByClass(){
        $school_id = 1;
        $grades = Grade::where('school_id',$school_id)->get();
        $data = [];
        foreach ($grades as $key=>$grade){
            $data[$key]['grade'] = "Class ".$grade->title;
            $data[$key]['male'] = $grade->students->where('gender','Male')->count();
            $data[$key]['female'] = $grade->students->where('gender','Female')->count();
        }
        return $data;
    }


    public function logout(){
        Auth::logout();
        return redirect('/');
    }


    public function getStudentJson(){

        $grades = Grade::all();
        foreach ($grades as $grade){
            $grade->totalStudent = $grade->students->count();
            $grade->totalFemale = $grade->students->where('gender', 'Female')->count();
            $grade->totalMale = $grade->students->where('gender', 'Male')->count();

        }

        return $grades;
    }

    public function setLanguage(Request $request){

        $language= $request->language;
        \Session::put('lang_session', $language);

        return redirect()->back();

    }

    public function unauthorized(){
        return view('admin.layouts.unauthorized');
    }
}
