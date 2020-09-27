<?php

namespace App\Repositories;

use App\Models\Classe;
use App\Repositories\BaseRepository;

/**
 * Class ClasseRepository
 * @package App\Repositories
 * @version September 22, 2020, 8:19 pm UTC
*/

class ClasseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom'
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
        return Classe::class;
    }
}
