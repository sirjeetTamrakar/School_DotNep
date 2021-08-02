<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use Sluggable;
    protected $fillable = [
        'name',
        'english_name',
        'nepali_name',
        'type',
    ];

    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'english_name'
            ]
        ];
    }
}
