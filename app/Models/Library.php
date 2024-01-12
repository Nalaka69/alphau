<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_name',
        'episode',
        'episode_date',
        'episode_time',
        'is_visible',
        'program_directory',
        'program_file',
        'duration',
        'category_name',
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
