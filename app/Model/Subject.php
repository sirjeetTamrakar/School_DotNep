<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Subject extends Model
{
    use SoftDeletes;
    use Sluggable;
    protected $fillable = [

        'title',
        'slug',
        'remarks',
        'grade_id',
        'school_id',

    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['name',
        'title',
        'slug',
        'remarks',
        'grade_id',
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


    public function grade(){

        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function school(){

        return $this->belongsTo(School::class, 'school_id');
    }

    public function staffs(){
        return $this->belongsToMany(Staff::class,'staff_class_subjects','subject_id');
    }
}
