<?php

namespace App;

use App\User;
use App\Notifications\verifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','token','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     
     //checking if the user is verified or not: if !null then, the user needs a new verification email
    public function verified(){
        return  $this->token === null;
    }  
     
    //send the user with a verification email

    public function sendVerificationEmail(){

        $this->notify(new VerifyEmail($this));
    }
    public function orders() {
     return $this->hasMany(Order::class);
    }
    public function orderdetails() {
     return $this->hasMany(OrderDetail::class);
    }
}
