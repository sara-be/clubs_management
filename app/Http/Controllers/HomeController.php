<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Member;
use App\Models\Responsable;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $totalClubs = Club::count();
        $totalMembers = Member::count();
        $totalResponsables = User::count();
        $totalEvents = Event::count();

        $monthlyEvents = Event::whereMonth('date', Carbon::now()->month)->count();
        $latestEvents = Event::orderBy('date', 'desc')->take(5)->get();
        $upcomingEvents = Event::where('date', '>', Carbon::now())->orderBy('date')->get();

        // Data for events per month
        $months = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 
            'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ];
        $eventsPerMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $eventsPerMonth[] = Event::whereMonth('date', $i)->count();
        }

        // Data for members per group
        $groups = Club::all();
        $groupNames = $groups->pluck('name')->toArray();
        $membersPerGroup = $groups->map(function ($group) {
            return $group->members()->count();
        })->toArray();

        return view('admin.dashboard', compact(
            'totalClubs', 'totalMembers', 'totalResponsables', 'totalEvents',
            'monthlyEvents', 'latestEvents', 'upcomingEvents',
            'months', 'eventsPerMonth', 'groupNames', 'membersPerGroup'
        ));
    }
}
