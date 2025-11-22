<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Designer extends Model
{
    /** @use HasFactory<\Database\Factories\DesignerFactory> */
    use HasFactory; 

    protected $guarded = ['id'];

    public function parade(): BelongsTo{
        return $this->belongsTo(Parade::class);
    }
}
