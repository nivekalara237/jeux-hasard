<?php

namespace App\Repositories;

use App\Models\Participation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ParticipationRepository
 * @package App\Repositories
 * @version January 2, 2019, 8:56 pm UTC
 *
 * @method Participation findWithoutFail($id, $columns = ['*'])
 * @method Participation find($id, $columns = ['*'])
 * @method Participation first($columns = ['*'])
*/
class ParticipationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mise',
        'joueur_id',
        'partie_id',
        'upated_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Participation::class;
    }
}
