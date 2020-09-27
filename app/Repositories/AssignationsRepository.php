<?php

namespace App\Repositories;

use App\Models\Assignations;
use App\Repositories\BaseRepository;

/**
 * Class AssignationsRepository
 * @package App\Repositories
 * @version September 23, 2020, 2:48 am UTC
*/

class AssignationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prof_id',
        'class_id'
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
        return Assignations::class;
    }
}
