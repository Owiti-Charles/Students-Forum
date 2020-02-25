<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable=['title', 'content', 'user_id'];
    public function getShortContentAttribute(){

        return substr($this->content,0, random_int(100, 101)).'...';
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
