<?php

namespace App\Repositories;

use App\Models\Matiere;
use App\Repositories\BaseRepository;

/**
 * Class MatiereRepository
 * @package App\Repositories
 * @version September 23, 2020, 8:30 pm UTC
*/

class MatiereRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'class_id',
        'prof_id'
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
        return Matiere::class;
    }
}
