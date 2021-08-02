<?php

namespace App\Http\Controllers\admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{

    public function index(){
        $allcourses = Course::paginate(10);
       return view('admin.course.index',compact('allcourses'));
    }

    public function add(){
        return view('admin.course.add');
    }

    public function addSubmit(Request $request){

        $request->validate([
            'course_image' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('course_image')){
            $requestedfile = $request->course_image;
            $image = time().$requestedfile->GetClientOriginalName();
            $path = public_path('images\course');
            $requestedfile->move($path,$image);
            $image = 'images/course/'.$image;
        }


        Course::create([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description
        ]);
        return redirect()->back()->with('success','Successully Added!!');
    }


    public function edit($id){
        $course = Course::findOrFail($id);
        return view('admin.course.edit',compact('course'));
    }

    public function editsubmit($id,Request $request){



        $course = Course::findOrFail($id);
        $course->title = $request->title;
        if($request->hasFile('course_image')){
            if(File::exists(public_path($course->image))){
                File::delete(public_path($course->image));
            }
            $requestedfile = $request->course_image;
            $image = time().$requestedfile->GetClientOriginalName();
            $path = public_path('images\course');
            $requestedfile->move($path,$image);
            $course->image = 'images/course/'.$image;
        }
        $course->description = $request->description;
        $course->update();
        return redirect()->back()->with('success','Course Edited Successfully!!!');

    }

    public function delete($id){
        $course = Course::findOrFail($id);
        if(File::exists(public_path($course->image))){
            File::delete(public_path($course->image));
        }
        $course->delete();
        return redirect()->back()->with('error','Course Deleted Successfully!!!');
    }

}
