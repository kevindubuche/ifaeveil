<?php

namespace App\Repositories;

use App\Models\Messages_assignation;
use App\Repositories\BaseRepository;

/**
 * Class Messages_assignationRepository
 * @package App\Repositories
 * @version September 25, 2020, 1:36 am UTC
*/

class Messages_assignationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'message_id',
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
        return Messages_assignation::class;
    }
}
