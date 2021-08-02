<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AssetImage extends Model
{
    protected $fillable = [
        'asset_id',
        'image',
        'school_id',
    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['asset_id', 'image', 'school_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }

    public function asset(){

        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function school(){

        return $this->belongsTo(School::class, 'school_id');
    }
}
