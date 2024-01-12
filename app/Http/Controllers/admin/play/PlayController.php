<?php

namespace App\Http\Controllers\admin\play;

use App\Http\Controllers\Controller;
use App\Models\PlayToggle;
use Illuminate\Http\Request;

class PlayController extends Controller
{
    public function getStatus(Request $request)
    {
        $current_status = PlayToggle::select('current_status')->first();
        return response()->json(['current_status' => $current_status], 200);
    }

    // start automation
    public function startAutomation(Request $request)
    {
        $status = $request->status;

        if ($status == 'AUTOMATION') {
            // $playlist_path = public_path('resources/automation/automation.xspf');
            // $batchContent = '@echo off' . PHP_EOL;
            // $batchContent .= 'start "" "' . $playlist_path . '"';
            $start_bat = public_path('resources/automation/start_automation.bat');
            // file_put_contents($start_bat, $batchContent);
            exec("start /B $start_bat");
            $update_db_status = PlayToggle::where('current_status', 'LIVE')->update(['current_status' => $request->status]);
            return response()->json(['_status' => 'AUTOMATION'], 200);
        } else {
            $stop_bat = public_path('resources/automation/stop_automation.bat');
            exec("start /B $stop_bat");
            $update_db_status = PlayToggle::where('current_status', 'AUTOMATION')->update(['current_status' => $request->status]);
            return response()->json(['_status' => 'LIVE'], 200);
        }
    }
}
