<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class About extends Model
{
    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['key'];


    protected $fillable = [
        'key',
        'value',
        'school_id',
    ];

    public function getDescriptionForEvent($eventName)
    {
        return "This model has been {$eventName}";
    }
}
