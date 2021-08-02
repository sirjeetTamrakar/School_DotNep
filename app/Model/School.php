<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class School extends Model
{
    use SoftDeletes;
    protected $fillable = [

        'title',
        'logo',

    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['title', 'logo'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }

    public function albums(){

        return $this->hasMany(Album::class);
    }

    public function exams(){

        return $this->hasMany(Exam::class);
    }

    public function gallerys(){

        return $this->hasMany(Gallery::class);
    }

    public function grades(){

        return $this->hasMany(Grade::class);
    }

    public function results(){

        return $this->hasMany(Result::class);
    }

    public function staffs(){

        return $this->hasMany(Staff::class);
    }

    public function staffDocuments(){

        return $this->hasMany(StaffDocument::class);
    }

    public function staffExpriences(){

        return $this->hasMany(StaffExprience::class);
    }

    public function students(){

        return $this->hasMany(Student::class);
    }
}
