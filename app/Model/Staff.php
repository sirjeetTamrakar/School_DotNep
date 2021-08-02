<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Staff extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [

        'name',
        'slug',
        'job_title',
        'join_date',
        'address',
        'gender',
        'DOB',
        'phone',
        'email',
        'staff_type_id',
        'school_id',

    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['name', 'slug','job_title','join_date','address','gender','DOB','phone','email','staff_type_id','schoo_id'];

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


    public function grades(){

        return $this->belongsToMany(Grade::class, 'staff_class_subjects', 'staff_id');
    }


    public function subjects(){

        return $this->belongsToMany(Subject::class, 'staff_class_subjects', 'staff_id');
    }


    public function expriences(){

        return $this->hasMany(StaffExprience::class, 'staff_id');
    }


    public function documents(){

        return $this->hasMany(StaffDocument::class, 'staff_id');
    }


    public function staffType(){

        return $this->belongsTo(StaffType::class, 'staff_type_id');
    }



    public function school(){

        return $this->belongsTo(Grade::class, 'school_id');
    }
}
