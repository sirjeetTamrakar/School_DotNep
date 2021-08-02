<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Exam extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [

        'title',
        'slug',
        'start_date',
        'remarks',
        'school_id',

    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['title', 'slug', 'start_date', 'remarks', 'school_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }

    public function grades(){

        return $this->belongsToMany(Grade::class, 'exam_grade', 'exam_id');
    }



    public function results(){

        return $this->belongsTo(School::class, 'school_id');
    }



    public function school(){

        return $this->belongsTo(School::class, 'school_id');
    }
}
