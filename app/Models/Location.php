<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'street', 'houseNo', 'zipCode', 'city'
    ];

    /**
     * An 1 Ort können N Impfungen stattfinden
     * @return HasMany
     */
    public function vaccinations() : HasMany {
        return $this->hasMany(Vaccination::class);
    }
}
