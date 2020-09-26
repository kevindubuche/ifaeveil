<?php

namespace App\Repositories;

use App\Models\Quiznote;
use App\Repositories\BaseRepository;

/**
 * Class QuiznoteRepository
 * @package App\Repositories
 * @version September 26, 2020, 12:13 am UTC
*/

class QuiznoteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_eleve',
        'quiz_id',
        'score'
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
        return Quiznote::class;
    }
}
