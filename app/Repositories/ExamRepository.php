<?php

namespace App\Repositories;

use App\Models\Exam;
use App\Repositories\BaseRepository;

/**
 * Class ExamRepository
 * @package App\Repositories
 * @version September 24, 2020, 3:11 am UTC
*/

class ExamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matiere_id',
        'title',
        'description',
        'filename',
        'creer_par',
        'publier'
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
        return Exam::class;
    }
}
