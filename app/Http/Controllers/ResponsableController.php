<?php

// app/Http/Controllers/ResponsableController.php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ResponsableController extends Controller 
{
    public function index()
    {
        $responsables = User::where('role', 'responsable')->get();

        return view('responsable.index', compact('responsables'));
    }

    public function create()
    {
        return view('responsable.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        $imagePath = $request->file('photo')->store('public/images');
        $imageName = basename($imagePath);
    
        // Create the user with a default password of '111'
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt('111'), // Hashed default password
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'photo' => $imageName,
            'role' => 'responsable',
        ]);
    
        return redirect()->route('responsables.index')->with('success', 'Responsable created successfully. Default password is 111.');
    }
    public function edit(User $responsable)
    {
        return view('responsable.edit', compact('responsable'));
    }
    public function update(Request $request, User $responsable)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $responsable->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'photo' => 'nullable|string',
        ]);

        $responsable->update($request->all());

        return redirect()->route('responsables.index')->with('success', 'Responsable updated successfully.');
    }
    public function destroy(user $responsable)
    {
        // Perform the deletion operation
        $responsable->delete();

        // Optionally, redirect the user to a different page
        return redirect()->route('responsables.index')
                         ->with('success', 'Responsable deleted successfully');
    }
}
