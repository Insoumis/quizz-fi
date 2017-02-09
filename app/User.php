<?php

namespace Melenquizz;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function add($name, $email, $password)
    {
        $me = new self;
        return $me->edit($name, $email, $password);
    }

    public function edit($name, $email, $password = null)
    {
        $this->name = $name;
        $this->email = $email;
        if ($password != null) {
            $this->password = bcrypt($password);
        }

        return $this;
    }
}
