<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('messages.index', compact('messages'));
    }
    

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
            'read' => 'boolean',
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'read' => false,
        ]);

        return redirect()->route('userFront.index')->with('success', 'Message sent successfully!');
        
    }


    public function seen($id)
    {
        $message = Message::find($id);

        if ($message && !$message->read) {
            $message->read = true;
            $message->save();
            return redirect()->route('messages.index')->with('success', 'Event updated successfully.');
        }
        return redirect()->route('messages.index')->with('non');
    }
    
    public function hidden($id)
    {
        $message = Message::find($id);

        if ($message && !$message->hidden) {
            $message->hidden = true;
            $message->save();
            return redirect()->route('messages.index')->with('success', 'Event updated successfully.');
        }
        return redirect()->route('messages.index')->with('non');
    }

}
