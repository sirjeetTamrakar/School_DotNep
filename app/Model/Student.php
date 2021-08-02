<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Student extends Model
{
    use SoftDeletes;
    use  Sluggable;
    protected $fillable = [

        'name',
        'slug',
        'image',
        'grade_id',
        'ethnicity_id',
        'address',
        'gender',
        'disability',
        'religion',
        'DOB',
        'guardian_name',
        'guardian_phone',
        'guardian_email',
        'occupation_id',
        'school_id',

    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['name',
        'slug',
        'image',
        'grade_id',
        'ethnicity_id',
        'address',
        'gender',
        'disability',
        'religion',
        'DOB',
        'guardian_name',
        'guardian_phone',
        'guardian_email',
        'occupation_id',
        'school_id',
    ];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function grade(){

        return $this->belongsTo(Grade::class, 'grade_id');
    }


    public function ethnicity(){

        return $this->belongsTo(Ethnicity::class, 'ethnicity_id');
    }


    public function occupation(){

        return $this->belongsTo(Occupation::class, 'occupation_id');
    }



    public function school(){

        return $this->belongsTo(School::class, 'school_id');
    }

}
