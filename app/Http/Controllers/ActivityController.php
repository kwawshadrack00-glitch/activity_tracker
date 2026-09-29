<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    // 1. The Main Dashboard
    public function index()
    {
        // Get all activities and their most recent update
        $activities = Activity::with(['updates' => function($query) {
            $query->latest();
        }])->get();

        return view('activities.index', compact('activities'));
    }

    // 2. Updating an Activity
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'status' => 'required|in:done,pending',
            'remark' => 'nullable|string|max:500',
        ]);

        // Create a new update record (capturing bio/time automatically)
        ActivityUpdate::create([
            'activity_id' => $activity->id,
            'user_id' => Auth::id(),
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        return back()->with('success', 'Activity updated successfully!');
    }

    // 3. Individual Activity History
    public function history(Activity $activity)
    {
        $updates = $activity->updates()->with('user')->latest()->get();
        return view('activities.history', compact('activity', 'updates'));
    }

    // 4. Daily Handover Log
    public function handover()
    {
        // Get all updates that happened today, with the activity and user details
        $todaysUpdates = ActivityUpdate::with(['user', 'activity'])
            ->whereDate('created_at', date('Y-m-d'))
            ->latest()
            ->get();

        return view('activities.handover', compact('todaysUpdates'));
    }

    // 5. Custom Duration Reports
    public function reports(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $updates = ActivityUpdate::with(['user', 'activity']);

        if ($startDate && $endDate) {
            // Filter updates between the two dates
            $updates->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
        }

        $reportData = $updates->latest()->get();

        return view('activities.reports', compact('reportData', 'startDate', 'endDate'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        Activity::create([
            'description' => $request->description,
        ]);

       return back()->with('success', 'New activity added successfully!');
    }
}