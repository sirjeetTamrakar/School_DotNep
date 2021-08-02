<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StaffClassSubject extends Model
{
    protected $fillable = [

        'staff_id',
        'grade_id',
        'subject_id',
        'school_id',
    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }
}
