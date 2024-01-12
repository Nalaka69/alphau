<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramArchive extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_thumbanail',
        'program_name',
        'program_genre',
        'program_directory',
        'is_visible',
        'genre_id'
    ];
    public function genres()
    {
        return $this->belongsTo(Genre::class);
    }
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
    public function libraries()
    {
        return $this->hasMany(Library::class);
    }
    public function day_archives()
    {
        return $this->hasMany(DayArchive::class);
    }
}
