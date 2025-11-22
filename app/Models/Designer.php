<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Designer extends Model
{
    /** @use HasFactory<\Database\Factories\DesignerFactory> */
    use HasFactory; 

    protected $guarded = ['id'];

    public function parade(): BelongsTo{
        return $this->belongsTo(Parade::class);
    }

    public function tiket(): HasMany{
        return $this->hasMany(Tiket::class);
    }
}
