<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'sex', 'password', 'phone', 'email', 'ssno', 'street', 'zipCode', 'houseNo', 'city', 'isAdmin', 'status', 'vaccination_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Ein*e User*in kann genau 1 Impftermin haben
     * @return BelongsTo
     */
    public function vaccination() : BelongsTo {
        return $this->belongsTo(Vaccination::class);

    }

    /* ---- auth JWT ---- */
    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this ->getKey();
    }

    /**
     * @return array
     * */
    public function getJWTCustomClaims()
    {
        return [ 'user' => [
            'id' => $this->id,
            'isAdmin' => $this->isAdmin,
            'status' => $this->status
        ]];
    }

}
