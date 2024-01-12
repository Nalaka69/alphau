<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function storeStudentMessage(Request $request)
    {
        $data = $request->all();
        $msg = Message::create([
            'student_id' => auth()->user()->id,
            'student_name' => auth()->user()->first_name,
            'message' => $data['send_msg'],
            'message_status' => 'sent'
        ]);
    }
    public function storeAdminReply(Request $request)
    {
        $data = $request->all();
        $rply = Message::where('id', $data['msg_id'])->update(['reply' => $data['reply_msg'], 'message_status' => 'seen']);
    }

    public function listStudentChat()
    {
        $student_messages = Message::where('id', auth()->user()->id)->get();
        return response()->json(['student_messages' => $student_messages]);
    }
    public function listAdminChat()
    {
        $admin_messages = Message::all();
        return response()->json(['admin_messages' => $admin_messages]);
    }

    public function deleteGenre(Request $request)
    {
        $id = $request->id;
        $genre = Message::findOrFail($id);
        $genre->delete();
        return response()->json(200);
    }

    // api

}
