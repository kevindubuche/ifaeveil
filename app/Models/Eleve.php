<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Eleve
 * @package App\Models
 * @version September 23, 2020, 3:49 am UTC
 *
 * @property \App\Models\Class $class
 * @property \App\Models\User $user
 * @property string $nom
 * @property string $prenom
 * @property integer $class_id
 * @property string $username
 * @property string $sexe
 * @property string $tel
 * @property string $adresse
 * @property string $religion
 * @property string $nom_pere
 * @property string $nom_mere
 * @property string $tel_mere
 * @property string $nom_reponsable
 * @property string $tel_responsable
 * @property string $date_naissance
 * @property string $date_admission
 * @property integer $user_id
 * @property string $image
 */
class Eleve extends Model
{
    use SoftDeletes;

    public $table = 'eleves';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prenom',
        'class_id',
        'username',
        'sexe',
        'tel',
        'adresse',
        'religion',
        'nom_pere',
        'tel_pere',
        'nom_mere',
        'tel_mere',
        'nom_reponsable',
        'tel_responsable',
        'date_naissance',
        'date_admission',
        'user_id',
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
        'class_id' => 'integer',
        'username' => 'string',
        'sexe' => 'string',
        'tel' => 'string',
        'adresse' => 'string',
        'religion' => 'string',
        'nom_pere' => 'string',
        'tel_pere' => 'string',
        'nom_mere' => 'string',
        'tel_mere' => 'string',
        'nom_reponsable' => 'string',
        'tel_responsable' => 'string',
        'date_naissance' => 'string',
        'date_admission' => 'string',
        'user_id' => 'integer',
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
        'class_id' => 'nullable|integer',
        'username' => 'nullable|string|max:45',
        'sexe' => 'nullable|string|max:45',
        'tel' => 'nullable|string|max:45',
        'adresse' => 'nullable|string|max:45',
        'religion' => 'nullable|string|max:45',
        'nom_pere' => 'nullable|string|max:45',
        'tel_pere' => 'nullable|string|max:45',
        'nom_mere' => 'nullable|string|max:45',
        'tel_mere' => 'nullable|string|max:45',
        'nom_reponsable' => 'nullable|string|max:45',
        'tel_responsable' => 'nullable|string|max:45',
        'date_naissance' => 'nullable|string|max:45',
        'date_admission' => 'nullable|string|max:45',
        'user_id' => 'nullable',
        // 'image' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function class()
    {
        return $this->belongsTo(\App\Models\Classe::class, 'class_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
