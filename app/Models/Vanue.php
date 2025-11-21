<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vanue extends Model
{
    /** @use HasFactory<\Database\Factories\VanueFactory> */
    use HasFactory;

    protected $guarded = ['id'];
}
