<?php

namespace App\Http\Controllers\admin;

use App\Model\School;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index(){
        $schools = School::all();
        return view('admin.logs.index',compact('schools'));
    }

    public function getJson($school_id){
        if($user = User::where('school_id',$school_id)->first()) {
            $logs = Activity::where('causer_type', 'App\User')->orderBy('created_at', 'asc')->get();
            $count = 1;
            foreach ($logs as $log) {
                $log->count = $count;
                $log->model = class_basename($log->subject);
                $count++;
            }
            return datatables($logs)->toJson();
        }else{
            $logs = Collection::make(new Activity());
            return datatables($logs)->toJson();
        }
    }

    public function details($id)
    {
        $log = Activity::find($id);
        return view('admin.logs.details', compact('log'));
    }

}
