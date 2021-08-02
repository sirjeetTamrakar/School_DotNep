<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Committee extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $fillable = [
        'name',
        'slug',
        'degination',
        'image',
        'show_in_front',
        'status',
        'message',
    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['name', 'slug', 'designation','message','status'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }
}
