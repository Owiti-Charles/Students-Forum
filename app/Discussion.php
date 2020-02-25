<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable=['title','content', 'file','mime','user_id', 'status'];

    public function getShortContentAttribute(){

        return substr($this->content,0, random_int(200, 201)).'...';
    }
    public function getFrontContentAttribute(){

        return substr($this->content,0, random_int(300, 301)).'...';
    }
    public function threads(){
        return $this->hasMany(Thread::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getAdminShortContentAttribute(){

        return substr($this->content,0, random_int(70, 71)).'...';
    }
     public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
     public function course(){
        return $this->belongsTo(Course::class);
    }
}
