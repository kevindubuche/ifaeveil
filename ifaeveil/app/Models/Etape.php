<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Etape
 * @package App\Models
 * @version September 22, 2020, 8:44 pm UTC
 *
 * @property string $nom
 * @property string $annee
 * @property string $duree
 * @property string $description
 */
class Etape extends Model
{
    use SoftDeletes;

    public $table = 'etapes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'annee',
        'duree',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'annee' => 'string',
        'duree' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'nullable|string|max:45',
        'annee' => 'nullable|string|max:45',
        'duree' => 'nullable|string|max:45',
        'description' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
