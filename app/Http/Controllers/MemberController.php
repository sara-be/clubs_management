<?php


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Member;
// use App\Models\Club;
// use Illuminate\Support\Facades\Auth;

// class MemberController extends Controller
// {
//     public function index()
//     {
//         $user = Auth::user();
//         if ($user->role == 'responsable') {
//             $clubs = $user->clubs; // Assuming a responsable can manage multiple clubs
//             $members = Member::whereIn('club_id', $clubs->pluck('id'))->with('club')->get();
//         } else {
//             $members = Member::with('club')->get();
//         }

//         return view('members.index', compact('members'));
//     }

//     public function create()
//     {
//         $user = Auth::user();
//         if ($user->role == 'responsable') {
//             $clubs = $user->clubs; // Assuming a responsable can manage multiple clubs
//         } else {
//             $clubs = Club::all();
//         }
//         return view('members.create', compact('clubs'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'club_id' => 'required|exists:clubs,id'
//         ]);

//         $user = Auth::user();
//         if ($user->role == 'responsable') {
//             $clubs = $user->clubs->pluck('id')->toArray();
//             if (!in_array($request->club_id, $clubs)) {
//                 return redirect()->back()->with('error', 'Vous n\'avez pas le droit d\'ajouter des membres à ce club.');
//             }
//         }

//         Member::create([
//             'name' => $request->name,
//             'club_id' => $request->club_id
//         ]);

//         return redirect()->route('members.index')->with('success', 'Membre ajouté avec succès.');
//     }

//     public function edit($id)
//     {
//         $user = Auth::user();
//         $member = Member::findOrFail($id);

//         if ($user->role == 'responsable') {
//             $clubs = $user->clubs;
//             if (!in_array($member->club_id, $clubs->pluck('id')->toArray())) {
//                 return redirect()->back()->with('error', 'Vous n\'avez pas le droit de modifier ce membre.');
//             }
//         } else {
//             $clubs = Club::all();
//         }

//         return view('members.edit', compact('member', 'clubs'));
//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'club_id' => 'required|exists:clubs,id'
//         ]);

//         $user = Auth::user();
//         $member = Member::findOrFail($id);

//         if ($user->role == 'responsable') {
//             $clubs = $user->clubs->pluck('id')->toArray();
//             if (!in_array($request->club_id, $clubs)) {
//                 return redirect()->back()->with('error', 'Vous n\'avez pas le droit de mettre à jour des membres dans ce club.');
//             }
//         }

//         $member->update([
//             'name' => $request->name,
//             'club_id' => $request->club_id
//         ]);

//         return redirect()->route('members.index')->with('success', 'Membre mis à jour avec succès.');
//     }

//     public function destroy($id)
//     {
//         $user = Auth::user();
//         $member = Member::findOrFail($id);

//         if ($user->role == 'responsable') {
//             $clubs = $user->clubs->pluck('id')->toArray();
//             if (!in_array($member->club_id, $clubs)) {
//                 return redirect()->back()->with('error', 'Vous n\'avez pas le droit de supprimer ce membre.');
//             }
//         }

//         $member->delete();

//         return redirect()->route('members.index')->with('success', 'Membre supprimé avec succès.');
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Club;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'responsable') {
            $clubs = $user->clubs; // Assuming a responsable can manage multiple clubs
            $members = Member::whereIn('club_id', $clubs->pluck('id'))->with('club')->get();
        } else {
            $members = Member::with('club')->get();
        }

        return view('members.index', compact('members'));
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->role == 'responsable') {
            $clubs = $user->clubs; // Assuming a responsable can manage multiple clubs
        } else {
            $clubs = Club::all();
        }
        return view('members.create', compact('clubs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email',
            'phone' => 'required|string|max:20',
            'club_id' => 'required|exists:clubs,id',
            'annee' => 'required|in:1ere annee,2eme annee',
            'filiere' => 'required|string|max:255'
        ]);

        $user = Auth::user();
        if ($user->role == 'responsable') {
            $clubs = $user->clubs->pluck('id')->toArray();
            if (!in_array($request->club_id, $clubs)) {
                return redirect()->back()->with('error', 'Vous n\'avez pas le droit d\'ajouter des membres à ce club.');
            }
        }

        Member::create($request->all());

        return redirect()->route('members.index')->with('success', 'Membre ajouté avec succès.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $member = Member::findOrFail($id);

        if ($user->role == 'responsable') {
            $clubs = $user->clubs;
            if (!in_array($member->club_id, $clubs->pluck('id')->toArray())) {
                return redirect()->back()->with('error', 'Vous n\'avez pas le droit de modifier ce membre.');
            }
        } else {
            $clubs = Club::all();
        }

        return view('members.edit', compact('member', 'clubs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email,' . $id,
            'phone' => 'required|string|max:20',
            'club_id' => 'required|exists:clubs,id',
            'annee' => 'required|in:1ere annee,2eme annee',
            'filiere' => 'required|string|max:255'
        ]);

        $user = Auth::user();
        $member = Member::findOrFail($id);

        if ($user->role == 'responsable') {
            $clubs = $user->clubs->pluck('id')->toArray();
            if (!in_array($request->club_id, $clubs)) {
                return redirect()->back()->with('error', 'Vous n\'avez pas le droit de mettre à jour des membres dans ce club.');
            }
        }

        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Membre mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $member = Member::findOrFail($id);

        if ($user->role == 'responsable') {
            $clubs = $user->clubs->pluck('id')->toArray();
            if (!in_array($member->club_id, $clubs)) {
                return redirect()->back()->with('error', 'Vous n\'avez pas le droit de supprimer ce membre.');
            }
        }

        $member->delete();

        return redirect()->route('members.index')->with('success', 'Membre supprimé avec succès.');
    }
}
