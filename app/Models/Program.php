<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_name',
        'episode',
        'episode_date',
        'episode_time',
        'is_visible',
        'program_directory',
        'program_genre',
        'program_thumbanail',
        'program_file',
        'duration',
        'archive_id'

    ];
    public function program_archives()
    {
        return $this->belongsTo(ProgramArchive::class);
    }
    public function day_archives()
    {
        return $this->hasMany(DayArchive::class);
    }
    public function automations()
    {
        return $this->hasMany(Automation::class);
    }
}
