<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoleRepository
 * @package App\Repositories
 * @version January 3, 2019, 6:50 am UTC
 *
 * @method Role findWithoutFail($id, $columns = ['*'])
 * @method Role find($id, $columns = ['*'])
 * @method Role first($columns = ['*'])
*/
class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Role::class;
    }
}
