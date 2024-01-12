<?php

namespace App\Http\Controllers\admin\program;

use getID3;
use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Program;
use App\Models\ProgramArchive;
use App\Models\ProgramAudioFile;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function storeArchive(Request $request)
    {
        $data = $request->all();
        $genre_id = Genre::select('id')
            ->where('genre', $data['program_genre'])
            ->first();

        if ($request->hasFile('program_thumbanail')) {
            $file = $request->file('program_thumbanail');
            $timestamp = time();
            $extension = $file->getClientOriginalExtension();
            $file_name = $timestamp . '.' . $extension;
            $file_path = 'resources/thumbnails/' . $file_name;
            $file->move('resources/thumbnails/', $file_name);

            // Proceed to store in the database
            $program_archive = ProgramArchive::create([
                'program_thumbanail' => $file_path, // Store the path to the renamed file
                'program_name' => $data['program_name'],
                'program_genre' => $data['program_genre'],
                'program_directory' => $data['program_directory'],
                'is_visible' => 'show',
                'genre_id' => $genre_id->id
            ]);
        }
    }

    public function listArchives()
    {
        $programs_list = ProgramArchive::select('id', 'program_thumbanail', 'program_name', 'program_genre', 'program_directory')
            ->get();
        return response()->json(['programs_list' => $programs_list]);
    }

    public function deleteArchive(Request $request)
    {
        $id = $request->id;
        $automation = ProgramArchive::findOrFail($id);
        $automation->delete();
        return response()->json(200);
    }

    /**
     * The code above is a PHP function that stores a program, retrieves episodes of a program, lists
     * programs, and deletes a program.
     *
     * @param Request request The `` parameter is an instance of the `Illuminate\Http\Request`
     * class. It represents the HTTP request made to the server and contains information such as the
     * request method, headers, and input data.
     */
    public function storeProgram(Request $request)
    {
        $data = $request->all();
        $archive_id = ProgramArchive::select('id', 'program_directory', 'program_genre', 'program_thumbanail')
            ->where('program_name', $data['program_name'])
            ->first();
        $program_directory = $archive_id->program_directory;

        if ($request->hasFile('program_file')) {
            $file = $request->file('program_file');
            $getID3 = new \getID3();
            $file_path = 'resources/programs/' . $program_directory . '/' . $data['program_name'] . '_' . $data['episode'] . '.' . $file->getClientOriginalExtension();
            $file->move('resources/programs/' . $program_directory . '/', $file_path);
            $file_info = $getID3->analyze($file_path);
            $duration_seconds = isset($file_info['playtime_seconds']) ? $file_info['playtime_seconds'] : 0;

            $duration_formatted = sprintf(
                "%02d:%02d:%02d",
                floor($duration_seconds / 3600),
                floor(($duration_seconds % 3600) / 60),
                $duration_seconds % 60
            );
        }

        $program = Program::create([
            'program_name' => $data['program_name'],
            'episode' => $data['episode'],
            'episode_date' => $data['episode_date'],
            'episode_time' => $data['episode_time'],
            'is_visible' => 'show',
            'program_directory' => $program_directory,
            'program_genre' => $archive_id->program_genre,
            'program_thumbanail' => $archive_id->program_thumbanail,
            'program_file' => $file_path,
            'duration' =>  $duration_formatted,
            'archive_id' => $archive_id->id
        ]);
    }
    public function getEpisodes(Request $request)
    {
        $programName = $request->input('program_name');
        $episodes = Program::where('program_name', $programName)->get(['id', 'episode']);
        return response()->json($episodes);
    }
    public function listPrograms()
    {
        $programs_list = Program::select('id','program_name', 'program_file', 'episode_date', 'episode_time')
            ->get();
        return response()->json(['programs_list' => $programs_list]);
    }
    public function deleteProgram(Request $request)
    {
        $id = $request->id;
        $program = Program::findOrFail($id);
        $file_path = $program->program_file;
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                $program->delete();
                return response()->json(200);
            } else {
                return response()->json(500);
            }
        } else {
            return response()->json(404);
        }
    }
}
