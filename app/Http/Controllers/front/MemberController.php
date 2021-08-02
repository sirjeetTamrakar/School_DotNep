<?php

namespace App\Http\Controllers\front;

use App\Model\Ethnicity;
use App\Model\Grade;
use App\Model\Notice;
use App\Model\Staff;
use App\Model\StaffType;
use App\Model\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{

    public function staffs($slug){
//        dd($slug);
        $school_id = 1;
        $context = new Collection();
        $staff_type = StaffType::where('slug',$slug)->first();
        $context->staffType = $staff_type;
        $context->staffs = Staff::where('staff_type_id',$staff_type->id)->where('school_id',$school_id)->get();
        $context->recent_notices = Notice::where('school_id',$school_id)->where('status',1)->orderBy('created_at','desc')->get()->take(5);
        return view('front.members.staffs', compact('context'));
    }

    public function staffDetail($staff_id,$stafftypeSlug){
        $staffType = StaffType::where('slug',$stafftypeSlug)->first();
        $staff = Staff::where('id',$staff_id)->where('staff_type_id',$staffType->id)->first();
        return view('front.members.staff-detail',compact('staff','staffType'));
    }

    public function students(){
        $contents = Grade::all();
        $student_count = Student::count();
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
        $ethnicity_total_male=0;
        $ethnicity_total_female=0;
        $ethnicity_total_students=0;
        foreach ($ethnicities as $ethnicity){
            $male_count = 0;
            $female_count = 0;
            foreach ($ethnicity->student_details as $detail){
                $male_count += $detail->male;
                $female_count += $detail->female;
            }
            $ethnicity->male = $male_count;
            $ethnicity->female = $female_count;
            $ethnicity->total = $male_count + $female_count;
            $ethnicity_total_male+=$male_count;
            $ethnicity_total_female+=$female_count;
            $ethnicity_total_students+=$male_count + $female_count;
        }
        return view('front.members.students',compact('contents','ethnicities','ethnicity_total_male','ethnicity_total_female','ethnicity_total_students','student_count'));
    }
}
