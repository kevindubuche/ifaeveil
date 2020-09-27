<?php

namespace App\Repositories;

use App\Models\AllUser;
use App\Repositories\BaseRepository;

/**
 * Class AllUserRepository
 * @package App\Repositories
 * @version September 23, 2020, 11:36 am UTC
*/

class AllUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username',
        'role',
        'password',
        'remember_token'
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
        return AllUser::class;
    }
}
