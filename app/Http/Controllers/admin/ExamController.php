<?php

namespace App\Http\Controllers\admin;

use App\Model\Exam;
use App\Model\Grade;
use App\Model\Result;
use App\Model\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        $exams = Exam::orderBy('created_at','desc')->get();

        $count = 1;
        foreach ($exams as $exam){
            $exam->count = $count;
            $exam->month = \Carbon\Carbon::parse($exam->start_date)->format('m');
            $exam->grade = $exam->grades->pluck('title');
            $count++;
        }
        return view('admin.exam.index', compact('grades', 'exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title'=>'required',
            'start_date'=>'required',
        ]);

        $exam = new Exam();
        $exam->title = $request->title;
        $exam->start_date = $request->start_date;
        $exam->remarks = $request->remarks;
        $exam->school_id = 1;



        $response = $exam->save();
        if($request->grade_id){
            $exam->grades()->attach($request->grade_id);
        }
        if($response){

            return redirect()->back()->with('success', 'Exam Successfully Added.');
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
        $exam= Exam::find($id);
        $grades = Grade::all();
        return view('admin.exam.edit', compact( 'grades', 'exam'));
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
            'title'=>'required',
            'start_date'=>'required',
        ]);

        $exam = Exam::where('id', $request->exam_id)->first();
        $exam->title = $request->title;
        $exam->start_date = $request->start_date;
        $exam->remarks = $request->remarks;
        $exam->school_id = 1;



        $response = $exam->update();
        if($response){
            $exam->grades()->detach();
            $exam->grades()->attach($request->grade_id);
        }
        if($response){

            return redirect()->back()->with('success', 'Exam Successfully Updated.');
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
        $exam= Exam::find($id);
        $exam->grades()->detach();
        $response = $exam->delete();
        if($response){

            return redirect()->back()->with('success', 'Exam Successfully Deleted.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function examResult($id, $grade_id)
    {
        $exam= Exam::find($id);
        $grade = Grade::find($grade_id);
        $whereData = array(array('exam_id', $id) , array('grade_id', $grade_id));
        $result = DB::table('results')->where($whereData)->first();
//        dd($result);
//        $result = Result::where('exam_id', $id)->where('grade_id', $grade_id)->first();

        return view('admin.exam.result', compact('exam', 'grade', 'result'));
    }


    public function examResultUpdate(Request $request){



        $exam = Exam::where('id', $request->exam_id)->first();
        $whereData = array(array('exam_id', $request->exam_id) , array('grade_id', $request->grade_id));
        $prevResult = DB::table('results')->where($whereData)->first();
        if(!$prevResult){
            $this->validate($request,[
                'file'=>'required',
            ]);
        }
        $fileName = null;
        if($request->hasFile('file')){

            if(isset($prevResult->file)){
                File::delete(public_path($prevResult->file));
            }
            $file = $request->file;
            $fileName = time().'.'.$file->getClientOriginalName();
            $filePath = public_path('result/'.$exam->start_date.'/');
            $file->move($filePath, $fileName);

        }
        $response = Result::updateOrCreate(
            ['exam_id' => $request->exam_id,
                'grade_id' => $request->grade_id
            ],
            [
                'exam_id' => $request->exam_id,
                'grade_id' => $request->grade_id,
                'file' => $fileName?'result/'.$exam->start_date.'/'.$fileName:$prevResult->file,
                'remarks' => $request->remarks,
                'school_id' => 1,
            ]);


        if($response){

            return redirect()->back()->with('success', 'Result Successfully Updated.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }

    }


    public function examPassStudent($id){
        $grades = Grade::all();
        $grade = Grade::find($id);
        $students = $grade->students;
        return view('admin.exam.pass-student', compact('grade', 'students', 'grades'));


    }


    public function examPassStudentUpdate(Request $request){

        $grade_id = $request->grade_id;
        $students = $request->student;

        foreach ($students as $student){

            $updateStudent = Student::find((int)$student);
            $updateStudent->grade_id = $grade_id;
            $updateStudent->update();
        }

        return redirect()->route('admin.exams')->with('success', 'Successfully Updated.');
    }


}
