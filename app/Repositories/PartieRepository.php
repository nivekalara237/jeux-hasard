<?php

namespace App\Repositories;

use App\Models\Partie;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PartieRepository
 * @package App\Repositories
 * @version January 1, 2019, 1:54 pm UTC
 *
 * @method Partie findWithoutFail($id, $columns = ['*'])
 * @method Partie find($id, $columns = ['*'])
 * @method Partie first($columns = ['*'])
*/
class PartieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'description',
        'jeu_id',
        'statut',
        'superviseur_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Partie::class;
    }
}
