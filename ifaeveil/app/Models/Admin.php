<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Admin
 * @package App\Models
 * @version September 22, 2020, 3:14 am UTC
 *
 * @property \App\Models\User $user
 * @property string $nom
 * @property string $prenom
 * @property integer $user_id
 */
class Admin extends Model
{
    use SoftDeletes;

    public $table = 'admins';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prenom',
        'user_id',
        'username',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'prenom' => 'string',
        'user_id' => 'integer',
        'username' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'nullable|string|max:45',
        'prenom' => 'nullable|string|max:45',
        'user_id' => 'nullable',
        'username' => 'nullable|string|max:45',
        'password' => 'nullable|string|max:20',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
