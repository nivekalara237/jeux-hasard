<?php

namespace App\Repositories;

use App\Models\CompteMonetaire;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompteMonetaireRepository
 * @package App\Repositories
 * @version January 11, 2019, 1:38 pm UTC
 *
 * @method CompteMonetaire findWithoutFail($id, $columns = ['*'])
 * @method CompteMonetaire find($id, $columns = ['*'])
 * @method CompteMonetaire first($columns = ['*'])
*/
class CompteMonetaireRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'solde',
        'type_paiement',
        'joueur_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompteMonetaire::class;
    }
}
