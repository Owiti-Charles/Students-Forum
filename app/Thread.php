<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable=['thread', 'user_id', 'discussion_id'];
    public function discussion(){
        return $this->belongsTo(Discussion::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
