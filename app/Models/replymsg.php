<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class replymsg extends Model
{
    use HasFactory;
    public function residency_details(): HasMany
    {
        return $this->hasMany(message::class);
    }
}
