<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Gallery extends Model
{

    protected $fillable = [

        'album_id',
        'title',
        'image',
        'school_id',

    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['album_id', 'title', 'image','school_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }


    public function album(){

        return $this->belongsTo(Album::class, 'album_id');
    }

    public function school(){

        return $this->belongsTo(School::class, 'school_id');
    }
}
