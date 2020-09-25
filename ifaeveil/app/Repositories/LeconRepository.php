<?php

namespace App\Repositories;

use App\Models\Lecon;
use App\Repositories\BaseRepository;

/**
 * Class LeconRepository
 * @package App\Repositories
 * @version September 23, 2020, 9:30 pm UTC
*/

class LeconRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'matiere_id',
        'description',
        'contenu',
        'publier',
        'creer_par',
        'filename',
        'videoLink'
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
        return Lecon::class;
    }
}
