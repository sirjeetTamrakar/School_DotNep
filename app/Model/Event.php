<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Event extends Model
{
    use Sluggable;
    protected $fillable = [

        'title',
        'slug',
        'image',
        'event_date',
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
    protected static $logAttributes = ['title', 'slug', 'image', 'event_date', 'content', 'status', 'school_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }

}
