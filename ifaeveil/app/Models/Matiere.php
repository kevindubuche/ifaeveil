<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Matiere
 * @package App\Models
 * @version September 23, 2020, 8:30 pm UTC
 *
 * @property \App\Models\Class $class
 * @property string $nom
 * @property integer $class_id
 * @property integer $prof_id
 */
class Matiere extends Model
{
    use SoftDeletes;

    public $table = 'matieres';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'class_id',
        'prof_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'class_id' => 'integer',
        'prof_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'nullable|string|max:45',
        'class_id' => 'nullable|integer',
        'prof_id' => 'nullable',
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
    public function prof($prof_id)
    {
        return Prof::where('user_id',$prof_id)->first();
    }
}
