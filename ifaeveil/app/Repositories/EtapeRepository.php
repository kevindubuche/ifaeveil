<?php

namespace App\Repositories;

use App\Models\Etape;
use App\Repositories\BaseRepository;

/**
 * Class EtapeRepository
 * @package App\Repositories
 * @version September 22, 2020, 8:44 pm UTC
*/

class EtapeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'annee',
        'duree',
        'description'
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
        return Etape::class;
    }
}
