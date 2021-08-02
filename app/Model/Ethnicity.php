<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Ethnicity extends Model
{
    use Sluggable;

    use SoftDeletes;
    protected $fillable = [

        'title',
        'slug',
        'remarks',

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
    protected static $logAttributes = ['title', 'slug', 'remarks'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }


    public function student(){

        return $this->hasMany(Student::class, 'ethnicity_id');
    }


    public function staff(){

        return $this->hasMany(Staff::class, 'ethnicity_id');
    }

    public function student_details(){
        return $this->hasMany(StudentDetail::class,'ethnicity_id');
    }
}
