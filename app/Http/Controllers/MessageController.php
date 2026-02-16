<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view("admin.messages.index", compact('messages'));
    }

    public function show(Message $message)
    {
        $message->update(['is_read' => true]);
        return response()->json($message);
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages')->with('success', 'Message supprimé avec succès.');
    }
}
