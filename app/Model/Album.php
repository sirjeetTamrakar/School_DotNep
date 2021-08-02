<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Album extends Model
{
    use Sluggable;
    use SoftDeletes;

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['title', 'slug', 'school_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }

    protected $fillable = [

        'title',
        'slug',
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


    public function gallerys(){

        return $this->hasMany(Gallery::class, 'album_id');
    }

    public function school(){

        return $this->belongsTo(School::class, 'school_id');
    }
}
