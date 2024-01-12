<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'province',
        'district',
        'school_name',
        'school_adddress',
        'school_index',
        'is_visible'
    ];
}
