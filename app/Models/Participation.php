<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Participation
 * @package App\Models
 * @version January 1, 2019, 1:52 pm UTC
 *
 * @property \App\Models\Partie partie
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property float mise
 * @property bigInteger joueur_id
 * @property integer partie_id
 * @property string|\Carbon\Carbon upated_at
 */
class Participation extends Model
{
    use SoftDeletes;

    public $table = 'participation';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'mise',
        'joueur_id',
        'partie_id',
        'upated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mise' => 'float',
        'partie_id' => 'integer'
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
    public function partie()
    {
        return $this->belongsTo(\App\Models\Partie::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
