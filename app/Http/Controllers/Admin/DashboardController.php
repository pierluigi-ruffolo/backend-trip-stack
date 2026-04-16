<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $CountDestinations = Destination::count();
        $CountCountries = Country::count();
        $CountTags = Tag::count();
        $recentDestinations = Destination::with('country')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $popularTags = Tag::withCount('destinations')
            ->orderBy('destinations_count', 'desc')
            ->take(5)
            ->get();
        return view('admin.dashboard', compact('CountDestinations', 'CountCountries', 'CountTags', 'recentDestinations', 'popularTags'));
    }
}
