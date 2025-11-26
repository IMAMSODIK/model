<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AllAccessTicket extends Model
{
    /** @use HasFactory<\Database\Factories\AllAccessTicketFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function designer(): BelongsTo{
        return $this->belongsTo(Designer::class);
    }
}
