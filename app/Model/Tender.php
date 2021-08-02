<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Tender extends Model
{
    use Sluggable;
    protected $fillable = [

        'title',
        'slug',
        'file',
        'content',
        'status',
        'school_id',

    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['name',
        'title',
        'slug',
        'file',
        'content',
        'status',
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
}
