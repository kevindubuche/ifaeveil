<?php

namespace App\Repositories;

use App\Models\Annee;
use App\Repositories\BaseRepository;

/**
 * Class AnneeRepository
 * @package App\Repositories
 * @version September 22, 2020, 8:55 pm UTC
*/

class AnneeRepository extends BaseRepository
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
        return Annee::class;
    }
}
