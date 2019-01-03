<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionRepository
 * @package App\Repositories
 * @version January 3, 2019, 8:39 am UTC
 *
 * @method Permission findWithoutFail($id, $columns = ['*'])
 * @method Permission find($id, $columns = ['*'])
 * @method Permission first($columns = ['*'])
*/
class PermissionRepository extends BaseRepository
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
        return Permission::class;
    }
}
