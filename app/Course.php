<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Faculty;
use App\Timetable;

class Course extends Model
{
    //
    protected $fillable=['faculty_id', 'course'];
    public $timestamps=['course'];

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    public function timetable(){
        return $this->hasOne(Timetable::class);
    }
    public function discussion(){
        return $this->hasOne(Discussion::class);
    }

}
