<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class AssetCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'remarks',
        'school_id',
    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['title', 'remakrs', 'school_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }

    public function assets(){

        return $this->hasMany(Asset::class, 'asset_category_id');
    }

    public function school(){

        return $this->belongsTo(School::class, 'school_id');
    }
}
