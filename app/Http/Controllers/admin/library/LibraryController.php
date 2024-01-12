<?php

namespace App\Http\Controllers\admin\library;

use App\Http\Controllers\Controller;
use App\Models\Library;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;
use App\Models\assetCategory;

class LibraryController extends Controller
{
    public function storeLibrary(Request $request)
    {
        $data = $request->all();
        $archive_id = ProgramArchive::select('id', 'program_directory')
        ->where('program_name', $data['program_name'])
        ->first();
        $program_directory = $archive_id->program_directory;
      

        if ($request->hasFile('program_file')) {
            $file = $request->file('program_file');
            $getID3 = new \getID3();
            $file_path = 'resources/library/' . $program_directory . '/' . $data['program_name'] . '_' . $data['episode'] . '.' . $file->getClientOriginalExtension();
            $file->move('resources/library/' . $program_directory . '/', $file_path);
            $file_info = $getID3->analyze($file_path);
            $duration_seconds = isset($file_info['playtime_seconds']) ? $file_info['playtime_seconds'] : 0;

            $duration_formatted = sprintf(
                "%02d:%02d:%02d",
                floor($duration_seconds / 3600),
                floor(($duration_seconds % 3600) / 60),
                $duration_seconds % 60
            );
        }

        $program = Library::create([
            'program_name' => $data['program_name'],
            'episode' => $data['episode'],
            'episode_date' => $data['episode_date'],
            'episode_time' => $data['episode_time'],
            'is_visible' => 'show',
            'program_directory' => $program_directory,
            'program_file' => $file_path,
            'duration' =>  $duration_formatted,
            'category_name' => $data['category'],
            'archive_id' => $archive_id->id
        ]);
    }
    public function listLibraries()
    {
        $programs_list = Library::select('id', 'program_file', 'episode_date', 'episode_time')
            ->get();
        return response()->json(['programs_list' => $programs_list]);
    }
    public function deleteLibrary(Request $request)
    {
        $id = $request->id;
        $program = Library::findOrFail($id);
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
