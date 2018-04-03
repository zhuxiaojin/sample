<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param int $size
     * @return string :string $a
     * @author:Storm <qhj1989@qq.com>
     */
    public function gravatar($size = 100) {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    public function statuses() {
        return $this->hasMany(Status::class);
    }

    public function feed() {
        return $this->statuses()->orderBy('created_at', 'desc');
    }
}
