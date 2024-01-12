<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayToggle extends Model
{
    use HasFactory;
    protected $fillable = [
        'current_status'
    ];
}
