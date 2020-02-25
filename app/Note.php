<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable=['file', 'mime', 'description', 'course_id', 'faculty_id', 'user_id'];
    public function getShortContentAttribute(){

        return substr($this->description,0, random_int(100, 101)).'...';
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
