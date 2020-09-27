<?php

namespace App\Repositories;

use App\Models\Quiz_proposition;
use App\Repositories\BaseRepository;

/**
 * Class Quiz_propositionRepository
 * @package App\Repositories
 * @version September 25, 2020, 6:06 pm UTC
*/

class Quiz_propositionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_question',
        'content_prop'
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
        return Quiz_proposition::class;
    }
}
