<?php

namespace App\Http\Controllers\admin;

use App\Model\Ethnicity;
use App\Model\Grade;
use App\Model\StudentDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function index(){
        $contents = Grade::all();
        $ethnicities = Ethnicity::all();
        foreach ($contents as $content){
            $count = 0;
            $male = [];
            $female = [];
            foreach ($content->student_details as $detail){
                $ethnicity = Ethnicity::where('id',$detail->ethnicity_id)->first();
                if($ethnicity){
                    $male[$ethnicity->id] = $detail->male;
                    $female[$ethnicity->id] = $detail->female;
                    $count = $count + $detail->male + $detail->female;
                }
            }
            $content->male = $male;
            $content->female = $female;
            $content->total_students = $count;
            $content->details_ethnicities = $content->student_details()->pluck('ethnicity_id')->toArray();
        }
        return view('admin.grade.index',compact('contents','ethnicities'));
    }
    public function add(Request $request){
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required'
        ]);
        $grade = new Grade();
        $grade->school_id = 1;
        $grade->title = $request->title;
        $grade->subtitle = $request->subtitle;
        $grade->remarks = $request->remarks;
        $gradesuccess = $grade->save();
        if($gradesuccess){
            try{
//                foreach ($grade->student_details as $detail){
//                    $detail->delete();
//                }
                $males = $request->ethnicity['male'];
                $females = $request->ethnicity['female'];
                $keys = array_keys($males);
                foreach ($keys as $key){
                    $detail = new StudentDetail();
                    $detail->grade_id = $grade->id;
                    $detail->ethnicity_id = $key;
                    $detail->male = $males[$key] ? $males[$key] : 0;
                    $detail->female = $females[$key] ? $females[$key] : 0;
                    $detail->save();
                }
            }catch (\Exception $e){
                return redirect()->back()->with('error','New Grade Add Failed');
            }
            return redirect()->back()->with('success','New Grade Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New Grade Add Failed');
        }

    }

    public function edit(Request $request, $grade_id){
        $grade = Grade::findOrFail($grade_id);
        $grade->title = $request->title;
        $grade->subtitle = $request->subtitle;
        $grade->remarks = $request->remarks;

        if($grade->save()){
            try{
                foreach ($grade->student_details as $detail){
                    $detail->delete();
                }
                $males = $request->ethnicity['male'];
                $females = $request->ethnicity['female'];
                $keys = array_keys($males);
                foreach ($keys as $key){
                    $detail = new StudentDetail();
                    $detail->grade_id = $grade->id;
                    $detail->ethnicity_id = $key;
                    $detail->male = $males[$key] ? $males[$key] : 0;
                    $detail->female = $females[$key] ? $females[$key] : 0;
                    $detail->save();
                }
            }catch (\Exception $e){
                return redirect()->back()->with('error','New Grade Edit Failed');
            }
            return redirect()->back()->with('success','Grade Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Grade Edit Failed');
        }
    }

    public function delete(Request $request){
        if($grade = Grade::findOrFail($request->grade_id)){
            if($grade->students->count() > 0 || $grade->results->count() > 0){
                return redirect()->back()->with('error','Grade Deleted Failed. Delete Students and Results of this Grade');
            }
            foreach ($grade->student_details as $detail){
                $detail->delete();
            }
            $grade->delete();
            return redirect()->back()->with('success','Grade Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Grade Delete Failed, Please Reload The Page');
        }
    }
}
