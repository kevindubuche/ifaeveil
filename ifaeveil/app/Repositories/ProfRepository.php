<?php

namespace App\Repositories;

use App\Models\Prof;
use App\Repositories\BaseRepository;

/**
 * Class ProfRepository
 * @package App\Repositories
 * @version September 22, 2020, 9:28 pm UTC
*/

class ProfRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'username',
        'user_id',
        'sexe',
        'statusmatrimonial',
        'datenaissance',
        'tel',
        'adresse',
        'date_entree_en_service',
        'religion',
        'nif',
        'niveau',
        'option',
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
        return Prof::class;
    }
}
