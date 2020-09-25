<?php

namespace App\Repositories;

use App\Models\Quiz_reponse;
use App\Repositories\BaseRepository;

/**
 * Class Quiz_reponseRepository
 * @package App\Repositories
 * @version September 25, 2020, 6:03 pm UTC
*/

class Quiz_reponseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_question',
        'explication'
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
        return Quiz_reponse::class;
    }
}
