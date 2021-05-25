<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to', 'maxParticipants', 'location_id'];

    /**
     * Eine Impfung kann nur an 1 Ort stattfinden
     * @return BelongsTo
     */
    public function location() : BelongsTo {
        return $this->belongsTo(Location::class);

    }

    /**
     * Eine Impfung kann N Teilnehmer*innen haben
     * @return HasMany
     */
    public function users() : HasMany {
        return $this->hasMany(User::class);
    }

}
