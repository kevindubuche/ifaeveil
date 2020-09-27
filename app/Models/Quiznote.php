<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quiznote
 * @package App\Models
 * @version September 26, 2020, 12:13 am UTC
 *
 * @property \App\Models\Quiz $quiz
 * @property integer $id_eleve
 * @property integer $quiz_id
 * @property number $score
 */
class Quiznote extends Model
{
    use SoftDeletes;

    public $table = 'quiznotes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_eleve',
        'quiz_id',
        'score'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_eleve' => 'integer',
        'quiz_id' => 'integer',
        'score' => 'decimal:0'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_eleve' => 'nullable',
        'quiz_id' => 'nullable|integer',
        'score' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function quiz()
    {
        return $this->belongsTo(\App\Models\Quiz::class, 'quiz_id');
    }

    public function eleve($eleve_id)
    {
        return Eleve::where('user_id',$eleve_id)->first();
    }
}
