<?php

namespace App\Repositories;

use App\Models\Soumission;
use App\Repositories\BaseRepository;

/**
 * Class SoumissionRepository
 * @package App\Repositories
 * @version September 24, 2020, 11:32 pm UTC
*/

class SoumissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'exam_id',
        'description',
        'filename',
        'eleve_id'
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
        return Soumission::class;
    }
}
