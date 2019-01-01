<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Jeu
 * @package App\Models
 * @version January 1, 2019, 1:49 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection participation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string libelle
 * @property string description
 * @property integer max_joueur
 * @property integer min_joueur
 * @property float mise_unitaire
 */
class Jeu extends Model
{
    use SoftDeletes;

    public $table = 'jeu';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle',
        'description',
        'max_joueur',
        'min_joueur',
        'mise_unitaire'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string',
        'description' => 'string',
        'max_joueur' => 'integer',
        'min_joueur' => 'integer',
        'mise_unitaire' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
