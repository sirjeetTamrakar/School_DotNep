<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StaffDocument extends Model
{
    protected $fillable = [

        'title',
        'staff_id',
        'file',
        'school_id',

    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['title', 'file','staff_id','school_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }


    public function staff(){

        return $this->belongsTo(Staff::class, 'staff_id');
    }



    public function school(){

        return $this->belongsTo(Grade::class, 'school_id');
    }
}
