<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Operation",
 *      required={""},
 *      @SWG\Property(
 *          property="libelle",
 *          description="libelle",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mot",
 *          description="mot",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="compte_monetaire_id",
 *          description="compte_monetaire_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      )
 * )
 */
class Operation extends Model
{
    use SoftDeletes;

    public $table = 'operation';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle',
        'mot',
        'compte_monetaire_id',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'libelle' => 'string',
        'mot' => 'string',
        'compte_monetaire_id' => 'integer',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function compteMonetaire()
    {
        return $this->belongsTo(\App\Models\CompteMonetaire::class);
    }
}
