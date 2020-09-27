<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Repositories\BaseRepository;

/**
 * Class AdminRepository
 * @package App\Repositories
 * @version September 22, 2020, 3:14 am UTC
*/

class AdminRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'user_id',
        'username',
        'password'
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
        return Admin::class;
    }
}
