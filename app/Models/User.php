<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App\Models
 * @version January 1, 2019, 1:58 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection CompteMonetaire
 * @property \Illuminate\Database\Eloquent\Collection Participation
 * @property \Illuminate\Database\Eloquent\Collection Partie
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 * @property string telephone
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasRoles;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'telephone',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'telephone' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
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
    public function compteMonetaires()
    {
        return $this->hasMany(\App\Models\CompteMonetaire::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function participations()
    {
        return $this->hasMany(\App\Models\Participation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parties()
    {
        return $this->hasMany(\App\Models\Partie::class);
    }
}
