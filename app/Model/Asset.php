<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Asset extends Model
{
    use Sluggable;
    use SoftDeletes;

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['title', 'slug', 'quantity', 'asset_category_id','remarks','school_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }

    protected $fillable = [
        'title',
        'slug',
        'quantity',
        'remarks',
        'asset_category_id',
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


    public function assetCategory(){

        return $this->belongsTo(AssetCategory::class, 'asset_category_id');
    }


    public function assetImages(){

        return $this->hasMany(AssetImage::class, 'asset_id');
    }

    public function school(){

        return $this->belongsTo(School::class, 'school_id');
    }
}
