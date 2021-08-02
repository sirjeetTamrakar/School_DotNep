<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Notice extends Model
{
    use Sluggable;
    protected $fillable = [

        'title',
        'slug',
        'image',
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

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['title', 'slug','image','content','status','school_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }
}
