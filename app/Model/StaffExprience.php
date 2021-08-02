<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StaffExprience extends Model
{
    protected $fillable = [

        'staff_id',
        'organization_name',
        'job_title',
        'job_location',
        'start_date',
        'end_date',
        'remarks',
        'school_id',

    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['staff_id', 'organization_name','job_title','job_location','start_date','end_date','remarks','school_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }


    public function staff(){

        return $this->belongsTo(Staff::class, 'staff_type_id');
    }



    public function school(){

        return $this->belongsTo(Grade::class, 'school_id');
    }
}
