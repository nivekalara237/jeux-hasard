<?php

namespace App\Repositories;

use App\Models\Jeu;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JeuRepository
 * @package App\Repositories
 * @version January 1, 2019, 1:49 pm UTC
 *
 * @method Jeu findWithoutFail($id, $columns = ['*'])
 * @method Jeu find($id, $columns = ['*'])
 * @method Jeu first($columns = ['*'])
*/
class JeuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'description',
        'max_joueur',
        'min_joueur',
        'mise_unitaire'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Jeu::class;
    }
}
