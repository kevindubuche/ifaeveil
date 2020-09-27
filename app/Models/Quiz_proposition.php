<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quiz_proposition
 * @package App\Models
 * @version September 25, 2020, 6:06 pm UTC
 *
 * @property \App\Models\QuizQuestion $idQuestion
 * @property integer $id_question
 * @property string $content_prop
 */
class Quiz_proposition extends Model
{
    use SoftDeletes;

    public $table = 'quiz_propositions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_question',
        'content_prop'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_question' => 'integer',
        'content_prop' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_question' => 'nullable',
        'content_prop' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idQuestion()
    {
        return $this->belongsTo(\App\Models\QuizQuestion::class, 'id_question');
    }
}
