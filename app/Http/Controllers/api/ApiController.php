<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Program;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function programsList()
    {
        // comment
        $programs_list = Program::select('id', 'program_name', 'episode', 'duration', 'program_file', 'episode_date', 'episode_time')
            ->get();
        return response()->json(['programs_list' => $programs_list]);
    }
    public function programsDateFiltered(Request $request, $_date)
    {
        $programs_filtered = Program::whereDate('episode_date', $_date)
            ->select('id', 'program_name', 'episode',  'duration', 'program_file', 'episode_date', 'episode_time')
            ->get();
        return response()->json(['programs_filtered' => $programs_filtered]);
    }
    public function programSingle(Request $request, $_id)
    {
        $program_single = Program::findOrFail($_id);
        return response()->json(['program_single' => $program_single]);
    }

    public function programArchivesList()
    {
        $programArchivesList = ProgramArchive::select('id', 'program_name')->get()->toArray();
        return response()->json(['programArchivesList' => $programArchivesList]);
    }

    public function welcomeArchiveProgramsList(Request $request)
    {
        $selectedProgram = $request->input('selectedArchive');
        $archive_programs = Program::where('program_name', $selectedProgram)
            ->select('id', 'program_name', 'episode', 'program_file', 'duration', 'program_thumbanail', 'program_genre', 'episode_date')
            ->get();

        return response()->json(['archive_programs' => $archive_programs]);
    }

    // chat------------------------------------------------
    public function storeStudentMessage(Request $request)
    {
        $data = $request->all();
        $msg = Message::create([
            'student_id' => $data['id'],
            'student_name' => $data['send_msg'],
            'message' => $data['send_msg'],
            'message_status' => 'sent'
        ]);
        return response()->json(['message' => 'Message sent successfully'], 201);
    }

    public function storeAdminReply(Request $request)
    {
        $data = $request->all();
        $rply = Message::where('id', $data['msg_id'])->update(['reply' => $data['reply_msg'], 'message_status' => 'seen']);
    }

    public function listStudentChat($student_id)
    {
        $student_messages = Message::where('student_id',$student_id)->get();
        return response()->json(['student_messages' => $student_messages]);
    }
    public function listAdminChat()
    {
        $admin_messages = Message::all();
        return response()->json(['admin_messages' => $admin_messages]);
    }
}
