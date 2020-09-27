<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prof
 * @package App\Models
 * @version September 22, 2020, 9:28 pm UTC
 *
 * @property \App\Models\User $user
 * @property string $nom
 * @property string $prenom
 * @property string $username
 * @property integer $user_id
 * @property string $sexe
 * @property string $statusmatrimonial
 * @property string $datenaissance
 * @property string $tel
 * @property string $adresse
 * @property string $date_entree_en_service
 * @property string $religion
 * @property string $nif
 * @property string $niveau
 * @property string $option
 * @property string $image
 */
class Prof extends Model
{
    use SoftDeletes;

    public $table = 'profs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prenom',
        'username',
        'user_id',
        'sexe',
        'statusmatrimonial',
        'datenaissance',
        'tel',
        'adresse',
        'date_entree_en_service',
        'religion',
        'nif',
        'niveau',
        'option',
        'image'
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
        'username' => 'string',
        'user_id' => 'integer',
        'sexe' => 'string',
        'statusmatrimonial' => 'string',
        'datenaissance' => 'string',
        'tel' => 'string',
        'adresse' => 'string',
        'date_entree_en_service' => 'string',
        'religion' => 'string',
        'nif' => 'string',
        'niveau' => 'string',
        'option' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'nullable|string|max:45',
        'prenom' => 'nullable|string|max:45',
        'username' => 'nullable|string|max:45',
        'user_id' => 'nullable',
        'sexe' => 'nullable|string|max:45',
        'statusmatrimonial' => 'nullable|string|max:45',
        'datenaissance' => 'nullable|string|max:45',
        'tel' => 'nullable|string|max:45',
        'adresse' => 'nullable|string|max:45',
        'date_entree_en_service' => 'nullable|string|max:45',
        'religion' => 'nullable|string|max:45',
        'nif' => 'nullable|string|max:45',
        'niveau' => 'nullable|string|max:45',
        'option' => 'nullable|string|max:45',
        // 'image' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
