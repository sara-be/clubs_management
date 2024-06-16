<?php
// app/Http/Controllers/ClubController.php

// app/Http/Controllers/ClubController.php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Http\Request;

class ClubController extends Controller
{   
    public function show(string $id)
    {
        $clubs = Club::findOrFail($id);
        return view('userFront.show', compact('clubs'));
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $clubs = Club::with('responsable')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                             ->orWhereHas('responsable', function ($query) use ($search) {
                                 $query->where('name', 'like', '%' . $search . '%');
                             });
            })
            ->get();
        return view('clubs.index', compact('clubs'));
    }

    public function index2()
    {
        $events = Event::with('club')->get();
        $clubs = Club::with('responsable')->get();
        $responsables = User::where('role', 'responsable')->get();

        $totalClubs = Club::count();
        $totalMembers = Member::count();
        $totalResponsables = User::count();
        $totalEvents = Event::count();
        
        return view('userFront.index', compact('clubs', 'responsables', 'events', 'totalClubs', 'totalMembers', 'totalResponsables', 'totalEvents'));
    }

    public function create()
    {
        $responsables = User::where('role', 'responsable')->get();
        return view('clubs.create', compact('responsables'));
    }

    public function store(Request $request)
    {
        $imagePath = $request->file('photo')->store('public/images');
        $imageName = basename($imagePath);
        Club::create([
            'name' => $request->name,
            'description' => $request->description,
            'responsable_id' => $request->responsable_id,
            'photo' => $imageName,
        ]);

        return redirect()->route('clubs.index')->with('success', 'Club created successfully.');
    }

    public function edit(Club $club)
    {
        $responsables = User::where('role', 'responsable')->get();
        return view('clubs.edit', compact('club', 'responsables'));
    }

    public function update(Request $request, Club $club)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'responsable_id' => 'required|exists:users,id',
            'photo' => 'nullable|string',
        ]);

        $club->update($request->all());

        return redirect()->route('clubs.index')->with('success', 'Club updated successfully.');
    }

    public function destroy(Club $club)
    {
        $club->delete();

        return redirect()->route('clubs.index')->with('success', 'Club deleted successfully.');
    }
}
