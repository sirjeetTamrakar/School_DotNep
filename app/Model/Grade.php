<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Grade extends Model
{
    use Sluggable;
    use SoftDeletes;

    protected $fillable = [

       'title',
       'slug',
       'subtitle',
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

    // use LogsActivity;
    // protected static $logOnlyDirty = true;
    // protected static $logAttributes = ['title', 'slug','remarks','school_id'];

    // public function getDescriptionForEvent($eventName)
    // {
    //     return "{$eventName}";
    // }

    public function grades(){

        return $this->belongsToMany(Grade::class, 'exam_grade', 'grade_id');
    }


    public function staffs(){

        return $this->belongsToMany(Grade::class, 'exam_grade', 'grade_id');
    }


    public function students(){

        return $this->hasMany(Student::class, 'grade_id');
    }


    public function school(){

        return $this->belongsTo(School::class, 'school_id');
    }

    public function subjects(){
        return $this->hasMany(Subject::class,'grade_id');
    }

    public function results(){
        return $this->hasMany(Result::class,'grade_id');
    }

    public function student_details(){
        return $this->hasMany(StudentDetail::class,'grade_id');
    }
}



