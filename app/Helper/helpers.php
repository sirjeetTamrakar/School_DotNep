<?php


use App\Model\AssetCategory;
use App\Model\StaffType;
use Illuminate\Support\Facades\Schema;


function getAbout($key){

    $value = \App\Model\About::where( 'key', '=', $key )->first();
    if ( $value != null ) {
        return $value->value;
    }

    return null;

}


function getLanguage($key){
    $language = \App\Model\Language::where('name', $key)->where('type','Backend')->first();
    $langSession = \Illuminate\Support\Facades\Session::get('lang_session');

    if($language){
        if($langSession == "eng"){
            return $language->english_name;
        }
        else{
            return $language->english_name;
            // if($language->nepali_name == null || $language->nepali_name == "#"){
            //     return $language->english_name;
            // }
            // return $language->nepali_name;
        }
    }

    return null;
}

function get_asset_categories($school_id){
    if(Schema::hasTable('asset_categories')) {
        $asset_categories = AssetCategory::where('school_id', $school_id)->get();
    }
    else{
        $asset_categories = [];
    }
    return $asset_categories;
}

function get_staff_types($school_id){
    if(Schema::hasTable('staff_types')) {
        $asset_categories = StaffType::where('school_id', $school_id)->get();
    }
    else{
        $asset_categories = [];
    }
    return $asset_categories;
}

function get_result_years(){
    $school_id = 1;
    if(Schema::hasTable('exams')){
        $exam_years = \App\Model\Exam::where('school_id',$school_id)->get()->pluck('start_date')->toArray();
        $years = [];
        foreach ($exam_years as $y) {
            $years[] = date('Y', strtotime($y));
        }
        $years = array_unique($years,SORT_DESC);
        return $years;
    }
}

function get_courses(){
    $courses = \App\Course::all();
    return $courses;

}

function get_notices(){
    $school_id = 1;
    $slider_notices = \App\Model\Notice::where('school_id',$school_id)->where('status',1)->orderBy('created_at','desc')->get(['id','title','created_at'])->take(6);
    return $slider_notices->take(3);
}


function schoolStudentsCount($school_id){
    $grades = \App\Model\Grade::where('school_id',$school_id)->get();
    $students = 0;
    foreach ($grades as $grade){
        $students += isset($grade->students)? $grade->students->count() : 0;
    }
    return $students;
}

function schoolAdministrationCount($school_id){
    $staffTypes = \App\Model\StaffType::where('school_id',$school_id)->where('title','!=','Teacher')->get();
    $admins = 0;
    foreach ($staffTypes as $type){
        $admins += isset($type->staffs) ? $type->staffs->count() : 0;
    }
    return $admins;
}
function schoolTeacherCount($school_id)
{
    $staffType = \App\Model\StaffType::where('school_id', $school_id)->where('title', 'Teacher')->first();
    return isset($staffType->staffs) ? $staffType->staffs->count() : 0;
}

function getNepaliDate($date){
    if(isset($date)){
        return $date->format('Y-m-d');
    }else{
        return \Carbon\Carbon::now()->format('Y-m-d');
    }
}


function getFrontLanguage($key){
    $language = \App\Model\Language::where('name', $key)->where('type','Frontend')->first();
    $langSession = \Illuminate\Support\Facades\Session::get('front_lang_session');

    if($language){
        if($langSession == "eng"){
            return $language->english_name;
        }else{
            return $language->nepali_name;
            // if($language->nepali_name == null || $language->nepali_name == "#"){
                // return $language->english_name;
            // }
        }

    }

    return null;
}

function getAdminNotifications(){
    $logs = \Spatie\Activitylog\Models\Activity::orderBy('created_at','desc')->get()->take(4);
    return $logs;
}

function getNotificationIcon($description){
    if($description == "created")
        return "mdi mdi-library-plus";
    elseif ($description == "deleted")
        return "mdi mdi-delete-forever";
    elseif ($description == "updated")
        return "mdi mdi-format-text";
    else
        return null;
}

function getUnreadMessageCount(){
    $count = \App\Model\Contact::where('view',0)->count();
    return $count;
}

function getLatestMessages(){
    $messages = \App\Model\Contact::where('view',0)->orderBy('created_at','desc')->get()->take(5);
    return $messages;
}


?>
