<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    use HasFactory;

    /**
     * relation
     */
    public function performances(): HasMany
    {
        return $this->hasMany(Performance::class);
    }
}
