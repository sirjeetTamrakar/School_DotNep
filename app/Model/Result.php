<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Result extends Model
{

    protected $fillable = [

        'exam_id',
        'grade_id',
        'file',
        'remarks',
        'school_id',

    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['exam_id', 'grade_id','file','remarks'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }

    public function exam(){

        return $this->belongsTo(School::class, 'school_id');
    }

    public function garde(){

        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function school(){

        return $this->belongsTo(School::class, 'school_id');
    }
}
