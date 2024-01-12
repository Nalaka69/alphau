<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AutomationAudioFile;
use App\Models\DayArchiveAudioFile;
use App\Models\Genre;
use App\Models\Program;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;
use App\Models\assetCategory;
use App\Models\timeTable;
use App\Models\sliderImage;

class LeftController extends Controller
{
    public function viewLeftHome()
    {
        $created_archive = ProgramArchive::select('program_name')->get();
        return view('app.admin.dashboard_left.automation', compact('created_archive'));
    }
    public function viewPrograms()
    {
        $programs_list = ProgramArchive::select('id', 'program_name', 'program_genre')
        ->get();
        $genre_list = Genre::select('genre')->get();
        return view('app.admin.dashboard_left.programs', compact( 'programs_list', 'genre_list'));
    }
    public function viewGenres()
    {
        // $programs_list = ProgramArchive::select('id', 'program_name', 'program_genre')
        // ->get();
        return view('app.admin.dashboard_left.genre');
    }
    public function viewProgramsArchive()
    {
        $created_archive = ProgramArchive::select('program_name')->get();
        $program_file_list = Program::select('id','program_name', 'program_file', 'episode_date', 'episode_time')
        ->get();
        return view('app.admin.dashboard_left.programarchive', compact('created_archive', 'program_file_list'));
    }
    public function viewDayPlaylist()
    {
        $created_archive = ProgramArchive::select('program_name')->get();
        return view('app.admin.dashboard_left.dayarchive', compact('created_archive'));
    }
    public function viewLibrary()
    {
        $created_archive = ProgramArchive::pluck('program_name');
        $asset_categories = AssetCategory::pluck('category_name');
        
        return view('app.admin.dashboard_left.library', compact('created_archive', 'asset_categories'));
    }
    public function viewDayEditHome()
    {
        return view('app.admin.dashboard_left.homepageedit');
    }

    public function storeTimeTable(Request $request)
    {
        $data = $request->all();
    
        if (isset($data['SubjectData'])) {
            foreach ($data['SubjectData'] as $newRowData) {
                $timeTable = timeTable::create([
                    'date' => $newRowData['date'],
                    'time' => $newRowData['time'],
                    'topic' => $newRowData['Topic'], // Note: 'Topic' instead of 'topic'
                ]);
            }
    
            // Check if at least one record was created
            if (isset($timeTable)) {
                return response()->json([
                    'status' => 'Success',
                    'message' => 'TimeTable records created successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'No TimeTable records were created'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'Error',
                'message' => 'SubjectData is not set or empty'
            ]);
        }
    }
   

    public function storeSliderImages(Request $request)
{
    $success = false;  // Initialize a flag to check if at least one image was successfully processed

    foreach ($request->file('SliderPic') as $index => $image) {
        $imageName = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
        $image->move('imgs/Welcome/Slider', $imageName);

        $sliderImage = new sliderImage();
        $sliderImage->image_name = $imageName;
        $sliderImage->save();

        $success = true;  // Set the flag to true if at least one image was successfully processed
    }

    if ($success) {
        return response()->json([
            'status' => 'Success',
            'message' => 'Slider images created successfully'
        ]);
    } else {
        return response()->json([
            'status' => 'Error',
            'message' => 'No slider images were created'
        ]);
    }
}

    
}
