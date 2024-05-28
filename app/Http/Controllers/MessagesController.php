<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\User;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $messages = Message::where('receiver_email', $user->email)->get();
        return view('message', compact('messages'));
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('messages.create', compact('users'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $message = new Message ();

        $message->sender_id = $user->id;
        $message->receiver_email = $request->userxName;
        $message->content = $request->content;

        $message->save();

        return redirect()->route('messages.index')->with('success', 'Message sent successfully.');
    }
}
