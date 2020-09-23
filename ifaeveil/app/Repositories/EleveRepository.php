<?php

namespace App\Repositories;

use App\Models\Eleve;
use App\Repositories\BaseRepository;

/**
 * Class EleveRepository
 * @package App\Repositories
 * @version September 23, 2020, 3:49 am UTC
*/

class EleveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'class_id',
        'username',
        'sexe',
        'tel',
        'adresse',
        'religion',
        'nom_pere',
        'nom_mere',
        'tel_mere',
        'nom_reponsable',
        'tel_responsable',
        'date_naissance',
        'date_admission',
        'user_id',
        'image'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Eleve::class;
    }
}
