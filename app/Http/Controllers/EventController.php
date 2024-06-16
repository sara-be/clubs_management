<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Club;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
    public function show(string $id){
        $events = Event::findOrFail($id);
        return view('userFront.showEvent', compact('events'));
    }
    
    public function create()
    {
        $clubs = Club::all();
        return view('events.create', compact('clubs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'club_id' => 'required|exists:clubs,id'
        ]);
        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }


    public function edit(Event $event)
    {
        $clubs = Club::all(); 
        return view('events.edit', compact('event', 'clubs'));
    }


    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'club_id' => 'required|exists:clubs,id'
        ]);
        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
       
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
