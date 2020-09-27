<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Prof;

/**
 * Class Assignations
 * @package App\Models
 * @version September 23, 2020, 2:48 am UTC
 *
 * @property \App\Models\Class $class
 * @property integer $prof_id
 * @property integer $class_id
 */
class Assignations extends Model
{
    use SoftDeletes;

    public $table = 'assignations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'prof_id',
        'class_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'prof_id' => 'integer',
        'class_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'prof_id' => 'nullable',
        'class_id' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function InfoClass()
    {
        return $this->belongsTo(\App\Models\Classe::class, 'class_id');
    }
    public  function InfoTeacher( $id){
        $user = Prof::where('profs.user_id',$id)
                    ->first();
       
       return $user;
    }
   
     
}
