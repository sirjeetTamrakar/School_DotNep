<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffType extends Model
{
    use SoftDeletes;
    use Sluggable;
    protected $fillable = [

        'title',
        'slug',
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

    

    public function staffs(){

        return $this->hasMany(Staff::class, 'staff_type_id');
    }



    public function school(){

        return $this->belongsTo(Grade::class, 'school_id');
    }
}
