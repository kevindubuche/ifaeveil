<?php

namespace App\Models;
use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lecon
 * @package App\Models
 * @version September 23, 2020, 9:30 pm UTC
 *
 * @property \App\Models\Matiere $matiere
 * @property string $nom
 * @property integer $matiere_id
 * @property string $description
 * @property string $contenu
 * @property integer $publier
 * @property integer $creer_par
 * @property string $filename
 * @property string $videoLink
 */
class Lecon extends Model
{
    use SoftDeletes;

    public $table = 'lecons';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'matiere_id',
        'description',
        'contenu',
        'publier',
        'creer_par',
        'filename',
        'videoLink'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'matiere_id' => 'integer',
        'description' => 'string',
        'contenu' => 'string',
        'publier' => 'integer',
        'creer_par' => 'integer',
        'filename' => 'string',
        'videoLink' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'nullable|string|max:45',
        'matiere_id' => 'nullable|integer',
        'description' => 'nullable|string',
        'contenu' => 'nullable|string',
        'publier' => 'nullable|integer',
        'creer_par' => 'nullable',
        'filename' => 'nullable|string|max:255',
        'videoLink' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function matiere()
    {
        return $this->belongsTo(\App\Models\Matiere::class, 'matiere_id');
    }
    public  function GetUser($id){

        $user = Prof::where('user_id',$id)
           ->first();
       
       return $user;
    }
}
