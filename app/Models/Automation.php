<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automation extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_visible',
        'automation_file',
        'duration',
        'program_id'

    ];
    public function program_archives()
    {
        return $this->belongsTo(Program::class);
    }
}
