<?php

namespace App\Http\Controllers\admin;

use App\Model\Ethnicity;
use App\Model\Grade;
use App\Model\Occupation;
use App\Model\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $grade = Grade::find($id);
        return view('admin.student.index', compact('grade'));
    }



    public function studentbyGrade()
    {
        $grades = Grade::all();
        return view('admin.student.grade', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ethnicitys = Ethnicity::all();
        $occupations = Occupation::all();
        $grades = Grade::all();
        return view('admin.student.add', compact('ethnicitys', 'occupations', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
            'name'=>'required',
            'grade_id'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'DOB'=>'required',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->grade_id = $request->grade_id;
        $student->ethnicity_id = $request->ethnicity_id;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->DOB = $request->DOB;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->guardian_address = $request->guardian_address;
        $student->guardian_phone = $request->guardian_phone;
        $student->guardian_email = $request->email;
        $student->occupation_id = $request->occupation_id;
        $student->school_id = 1;

        if($request->file('image')){
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/students/');
            $student->image = $db_path;
        }

        $response = $student->save();

        if($response){

            return redirect()->back()->with('success', 'Student Successfully Added.');
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
        $ethnicitys = Ethnicity::all();
        $occupations = Occupation::all();
        $grades = Grade::all();
        $student = Student::find($id);
        return view('admin.student.edit', compact('student', 'ethnicitys', 'occupations', 'grades'));
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
            'grade_id'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'DOB'=>'required',
        ]);

        $student = Student::where('id', $request->student_id)->first();
        $student->name = $request->name;
        $student->grade_id = $request->grade_id;
        $student->ethnicity_id = $request->ethnicity_id;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->DOB = $request->DOB;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->guardian_address = $request->guardian_address;
        $student->guardian_phone = $request->guardian_phone;
        $student->guardian_email = $request->email;
        $student->occupation_id = $request->occupation_id;
        $student->school_id = 1;

        if($request->file('image')){
            if($student->image){
                $file_path = public_path().'/'.$student->image;
                $thumbnail_path = public_path().'/thumbnail/'.$student->image;
                if(file_exists($file_path)){
                    unlink($file_path);
                }
                if(file_exists($thumbnail_path)){
                    unlink($thumbnail_path);
                }
            }
            $image = $request->file('image');
            $db_filename = imageUpload($image,'images/students/');
            $student->image = $db_filename;
        }

        $response = $student->update();

        if($response){

            return redirect()->back()->with('success', 'Student Successfully Updated.');
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
        $student =Student::find($id);
        if($student->image){
            $file_path = public_path().'/'.$student->image;
            $thumbnail_path = public_path().'/thumbnail/'.$student->image;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            if(file_exists($thumbnail_path)){
                unlink($thumbnail_path);
            }
        }

        $response = $student->delete();

        if($response){

            return redirect()->back()->with('success', 'Student Successfully Deleted.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function getJson($id){
        $grade = Grade::find($id);
        $students = $grade->students;
        $count = 1;
        $todayDate = Carbon::parse(date('Y-m-d'));
        foreach ($students as $student){
            $student->count = $count;
            $birthdate = Carbon::parse($student->DOB);
            $student->age = $student->DOB;
            $student->grade_name = $student->grade->title;
            $student->image = asset('thumbnail/'.$student->image);
            $count++;
        }
        return datatables($students)->toJson();
    }
}
