<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'username', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function GetUser($role, $id){
        $prof = User::join('profs', 'profs.user_id','=', 'users.id')
                    ->where('users.id',$id)
                    ->first();
      $eleve = User::join('eleves', 'eleves.user_id','=', 'users.id')
                   ->where('users.id',$id)
                   ->first();
     $admin = User::join('admins', 'admins.user_id','=', 'users.id')
                   ->where('users.id',$id)
                   ->first();
            if ($role == 1){
    
            return $admin;
        }
        if ($role == 2){
            
            return $prof;
        }
       
       return $eleve;
    }
}
