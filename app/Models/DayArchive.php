<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayArchive extends Model
{
    use HasFactory;
    protected $fillable = [
        'archive_date',
        'archive_time',
        'is_visible',
        'program_file',
        'duration',
        'program_id'

    ];
    public function program_archives()
    {
        return $this->belongsTo(Program::class);
    }
}
