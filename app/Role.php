<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Sluggable;

    protected $table = "roles";
    protected $fillable = ['name','slug'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function users(){
        return $this->hasMany(User::class,'role_id');
    }
}
