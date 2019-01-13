<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Partie
 * @package App\Models
 * @version January 2, 2019, 8:50 pm UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\Jeu jeu
 * @property \Illuminate\Database\Eloquent\Collection Participation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string libelle
 * @property string description
 * @property integer jeu_id
 * @property boolean statut
 * @property bigInteger superviseur_id
 */
class Partie extends Model
{
    use SoftDeletes;

    public $table = 'partie';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'libelle',
        'description',
        'jeu_id',
        'statut',
        'superviseur_id'
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
        'jeu_id' => 'integer',
        'statut' => 'boolean'
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,"superviseur_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jeu()
    {
        return $this->belongsTo(\App\Models\Jeu::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function participations()
    {
        return $this->hasMany(\App\Models\Participation::class);
    }
}
