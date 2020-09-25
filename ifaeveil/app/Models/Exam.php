<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Exam
 * @package App\Models
 * @version September 24, 2020, 3:11 am UTC
 *
 * @property \App\Models\User $creerPar
 * @property \App\Models\Matiere $matiere
 * @property integer $matiere_id
 * @property string $title
 * @property string $description
 * @property string $filename
 * @property integer $creer_par
 * @property integer $publier
 */
class Exam extends Model
{
    use SoftDeletes;

    public $table = 'exams';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'matiere_id',
        'title',
        'description',
        'filename',
        'creer_par',
        'publier'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'matiere_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'filename' => 'string',
        'creer_par' => 'integer',
        'publier' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matiere_id' => 'nullable|integer',
        'title' => 'nullable|string|max:45',
        'description' => 'nullable|string',
        // 'filename' => 'nullable|string|max:255',
        'creer_par' => 'nullable',
        'publier' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function creerPar()
    {
        return $this->belongsTo(\App\User::class, 'creer_par');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function matiere()
    {
        return $this->belongsTo(\App\Models\Matiere::class, 'matiere_id');
    }
    public function GetClass($examID){
        return Classe::join('matieres','matieres.class_id','=','classes.id')//qui sont dans l'horaire de l'etudiant
        ->join('exams','exams.matiere_id','=','matieres.id')
        ->where('exams.id',$examID)->first();    
    }
    public  function GetConnectedStudent($id){

        $user = Eleve::where('eleves.user_id',$id)
           ->first();
       
       return $user;
    }

    
}
