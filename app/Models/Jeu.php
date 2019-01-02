<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Jeu",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="libelle",
 *          description="libelle",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="max_joueur",
 *          description="max_joueur",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="min_joueur",
 *          description="min_joueur",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="mise_unitaire",
 *          description="mise_unitaire",
 *          type="number",
 *          format="float"
 *      )
 * )
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parties()
    {
        return $this->hasMany(\App\Models\Partie::class);
    }
}
