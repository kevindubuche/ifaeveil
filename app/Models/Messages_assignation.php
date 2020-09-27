<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Messages_assignation
 * @package App\Models
 * @version September 25, 2020, 1:36 am UTC
 *
 * @property \App\Models\Class $class
 * @property \App\Models\Message $message
 * @property integer $message_id
 * @property integer $class_id
 */
class Messages_assignation extends Model
{
    use SoftDeletes;

    public $table = 'messages_assignations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'message_id',
        'class_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'message_id' => 'integer',
        'class_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'message_id' => 'nullable',
        'class_id' => 'nullable|integer',
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
    public function message()
    {
        return $this->belongsTo(\App\Models\Message::class, 'message_id');
    }
}
