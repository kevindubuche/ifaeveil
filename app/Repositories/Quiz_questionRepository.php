<?php

namespace App\Repositories;

use App\Models\Quiz_question;
use App\Repositories\BaseRepository;

/**
 * Class Quiz_questionRepository
 * @package App\Repositories
 * @version September 25, 2020, 5:42 pm UTC
*/

class Quiz_questionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'content',
        'categorie'
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
        return Quiz_question::class;
    }
}
