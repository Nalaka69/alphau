<?php

namespace App\Http\Controllers\admin\automation;

use getID3;
use App\Http\Controllers\Controller;
use App\Models\Automation;
use App\Models\AutomationAudioFile;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;

class AutomationController extends Controller
{
    public function storeAutomation(Request $request)
    {
        $data = $request->all();
        $archive_id = ProgramArchive::select('id', 'program_directory')
            ->where('program_name', $data['program_name'])
            ->first();
        $program_directory = $archive_id->program_directory;
        $automation = Automation::create([
            'program_name' => $data['program_name'],
            'automation_episode' => $data['automation_episode'],
            'automation_url' => $data['automation_url'],
            'is_visible' => 'show',
            'program_directory' => $program_directory,
            'archive_id' => $archive_id->id
        ]);

        // store program files
        $file_name = '';
        if ($request->hasFile('automation_file')) {
            $getID3 = new \getID3();
            foreach ($request->file('automation_file') as $index => $file) {
                $file_name = time() . rand(1, 9) . '.' . $file->getClientOriginalExtension();
                $file->move('resources/belt/', $file_name);
                // Get duration using getID3
                $file_path = public_path('resources/belt/') . $file_name;
                $file_info = $getID3->analyze($file_path);
                $duration = isset($file_info['playtime_seconds']) ? $file_info['playtime_seconds'] : 0;
                // Save to the database
                $automation_file = new AutomationAudioFile();
                $automation_file->automation_file = $file_name;
                $automation_file->duration = $duration;
                $automation_file->automation_id = $automation->id;
                $automation_file->save();
            }
        }

        // batch file--------------------------
        $audioFilePath = "C:\\xampp\\htdocs\\alphau\\public\\resources\\belt\\" . "$file_name";
        $batchContent = "@echo off\n";
        $batchContent .= "\"C:\\Program Files (x86)\\VideoLAN\\VLC\\vlc.exe\" \"$audioFilePath\"";
        $batchFilePath = "C:\\xampp\\htdocs\\alphau\\public\\resources\\belt\\PlayAudio.bat";
        file_put_contents($batchFilePath, $batchContent);
        // $start = exec("start /B $batchFilePath");
        // sleep(5);
    }

    public function executeBatchFile()
    {
        $result = exec("C:\\xampp\\htdocs\\alphau\\public\\resources\\belt\\PlayAudio.bat");
        return response()->json(['result' => $result]);
    }

    public function listAutomations()
    {
        $automation_list = AutomationAudioFile::select('id', 'automation_file', 'duration')
            ->get();
        return response()->json(['automation_list' => $automation_list]);
    }
}
