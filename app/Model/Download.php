<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Download extends Model
{
    use LogsActivity;

    protected $table="downloads";
    protected $fillable = [
        "title", 'description', 'status', 'file',
        ];

    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['title', 'description', 'file', 'status'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }

}
