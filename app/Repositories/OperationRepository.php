<?php

namespace App\Repositories;

use App\Models\Operation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OperationRepository
 * @package App\Repositories
 * @version January 2, 2019, 8:55 pm UTC
 *
 * @method Operation findWithoutFail($id, $columns = ['*'])
 * @method Operation find($id, $columns = ['*'])
 * @method Operation first($columns = ['*'])
*/
class OperationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'mot',
        'compte_monetaire_id',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Operation::class;
    }
}
