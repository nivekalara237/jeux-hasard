<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operation
 * @package App\Models
 * @version January 1, 2019, 1:52 pm UTC
 *
 * @property \App\Models\CompteMonetaire compteMonetaire
 * @property \Illuminate\Database\Eloquent\Collection participation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string libelle
 * @property string mot
 * @property integer compte_monetaire_id
 * @property string type
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
