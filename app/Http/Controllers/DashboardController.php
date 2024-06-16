<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Member;
use App\Models\Responsable;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $totalClubs = Club::count();
    //     $totalMembers = Member::count();
    //     $totalResponsables = User::count();
    //     $totalEvents = Event::count();

    //     $monthlyEvents = Event::whereMonth('date', Carbon::now()->month)->count();
    //     $latestEvents = Event::orderBy('date', 'desc')->take(5)->get();
    //     $upcomingEvents = Event::where('date', '>', Carbon::now())->orderBy('date')->get();

    //     return view('dashboard', compact(
    //         'totalClubs', 'totalMembers', 'totalResponsables', 'totalEvents',
    //         'monthlyEvents', 'latestEvents', 'upcomingEvents'
    //     ));
    // }
}
