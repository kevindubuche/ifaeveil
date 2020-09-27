<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AllUser
 * @package App\Models
 * @version September 23, 2020, 11:36 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $admins
 * @property \Illuminate\Database\Eloquent\Collection $eleves
 * @property \Illuminate\Database\Eloquent\Collection $profs
 * @property string $username
 * @property string $role
 * @property string $password
 * @property string $remember_token
 */
class AllUser extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'username',
        'role',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'username' => 'string',
        'role' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'nullable|string|max:45',
        'role' => 'nullable|string|max:45',
        'password' => 'nullable|string|max:255',
        'remember_token' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function admins()
    {
        return $this->hasMany(\App\Models\Admin::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eleves()
    {
        return $this->hasMany(\App\Models\Elefe::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function profs()
    {
        return $this->hasMany(\App\Models\Prof::class, 'user_id');
    }
}
