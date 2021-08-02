<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentDetail extends Model
{
    protected $table = "student_details";
    protected $fillable = [
        'class_id', 'ethnicity_id', 'male', 'female',
    ];

    use LogsActivity;

    public function grades(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function ethnicity(){
        return $this->belongsTo(Ethnicity::class,'ethnicity_id');
    }

}
