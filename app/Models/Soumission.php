<?php

namespace App\Models;
use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Soumission
 * @package App\Models
 * @version September 24, 2020, 11:32 pm UTC
 *
 * @property \App\Models\Exam $exam
 * @property integer $exam_id
 * @property string $description
 * @property string $filename
 * @property integer $eleve_id
 */
class Soumission extends Model
{
    use SoftDeletes;

    public $table = 'soumissions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'exam_id',
        'description',
        'filename',
        'eleve_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'exam_id' => 'integer',
        'description' => 'string',
        'filename' => 'string',
        'eleve_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'exam_id' => 'nullable|integer',
        'description' => 'nullable|string|max:255',
        // 'filename' => 'nullable|string|max:255',
        'eleve_id' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function exam()
    {
        return $this->belongsTo(\App\Models\Exam::class, 'exam_id');
    }
   
    public function eleve($eleve_id)
    {
        return Eleve::where('user_id',$eleve_id)->first();
    }
 

}
