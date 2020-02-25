<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\UserResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','role_id', 'username', 'name', 'email', 'passrec', 'status', 'position','image','mime', 'phone', 'id_number', 'gender', 'faculty_id', 'course_id', 'year', 'semester'
    ];
    public $timestamps=true;


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roles(){
       // dd("Role");
        return $this->hasOne('App\Role','id','role_id');
    }
    private function CheckIfUserHasRole($need_role){
        return (strtolower($need_role)==strtolower($this->roles->name))? true : null;
    }
    public function hasRole($roles){
        if (is_array($roles)){
            foreach ($roles as $need_role) {
                if($this->CheckIfUserHasRole($need_role)){
                    return true;
                }
            }
        }else
        {
            return $this->CheckIfUserHasRole($roles);
        }
        return false;
    }
    public function discussions(){
        return $this->hasMany(Discussion::class);
    }
    public function threads(){
        return $this->hasMany(Thread::class);
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }
    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function isOnLine(){
        return Cache::has('user-is-online-' . $this->id);
    }

}
