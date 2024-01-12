<?php

namespace App\Http\Controllers\admin\automation;

use getID3;
use App\Http\Controllers\Controller;
use App\Models\Automation;
use App\Models\AutomationAudioFile;
use App\Models\Program;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;

class AutomationController extends Controller
{
    public function storeAutomation(Request $request)
    {
        $data = $request->all();
        $program = Program::where('program_name', $data['program_name'])
            ->where('episode', $data['episode'])
            ->first(['id', 'program_file', 'duration']);
        $day_program = Automation::create([
            'is_visible' => 'show',
            'automation_file' => $program->program_file,
            'duration' => $program->duration,
            'program_id' => $program->id
        ]);


        // updating the playlist
        $automation_audios =  Automation::pluck('automation_file')->toArray();
        $track_base = "file:///C:/Users/KW/Documents/projects/real-it/alphau-nie/laravel/alphau/public/";
        $playlist_path = public_path('resources/automation/automation.xspf');
        $xml = new SimpleXMLElement(
'<?xml version="1.0" encoding="UTF-8"?>
<playlist xmlns="http://xspf.org/ns/0/" version="1">
    <title>Alphau Automation Play List</title>
    <trackList></trackList>
</playlist>'
                                    );
        $trackList = $xml->trackList;
        foreach ($automation_audios as $audio_file) {
            $track = $trackList->addChild('track');
            $track->addChild('location', $track_base . $audio_file);
        }
        $updated_content = $xml->asXML();
        file_put_contents($playlist_path, $updated_content);
    }

    public function deleteAutomation(Request $request)
    {
        $id = $request->id;
        $automation = Automation::findOrFail($id);
        $automation->delete();

        // updating the playlist
        $automation_audios =  Automation::pluck('automation_file')->toArray();
        $track_base = "file:///C:/Users/KW/Documents/projects/real-it/alphau-nie/laravel/alphau/public/";
        $playlist_path = public_path('resources/automation/automation.xspf');
        $xml = new SimpleXMLElement(
'<?xml version="1.0" encoding="UTF-8"?>
<playlist xmlns="http://xspf.org/ns/0/" version="1">
    <title>Alphau Automation Play List</title>
    <trackList></trackList>
</playlist>'
                                    );
        $trackList = $xml->trackList;
        foreach ($automation_audios as $audio_file) {
            $track = $trackList->addChild('track');
            $track->addChild('location', $track_base . $audio_file);
        }
        $updated_content = $xml->asXML();
        file_put_contents($playlist_path, $updated_content);

        return response()->json(200);
    }

    public function listAutomations()
    {
        $automation_list = Automation::select('id', 'automation_file', 'duration')
            ->get();
        return response()->json(['automation_list' => $automation_list]);
    }
}
