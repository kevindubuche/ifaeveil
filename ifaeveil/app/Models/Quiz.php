<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quiz
 * @package App\Models
 * @version September 25, 2020, 7:12 pm UTC
 *
 * @property \App\Models\Class $class
 * @property string $titre
 * @property integer $class_id
 * @property integer $duree
 * @property string $categorie
 * @property integer $nombre_questions
 */
class Quiz extends Model
{
    use SoftDeletes;

    public $table = 'quizs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'titre',
        'class_id',
        'duree',
        'categorie',
        'nombre_questions'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titre' => 'string',
        'class_id' => 'integer',
        'duree' => 'integer',
        'categorie' => 'string',
        'nombre_questions' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titre' => 'nullable|string|max:255',
        'class_id' => 'nullable|integer',
        'duree' => 'nullable|integer',
        'categorie' => 'nullable|string|max:255',
        'nombre_questions' => 'nullable|integer',
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
}
