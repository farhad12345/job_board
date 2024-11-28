<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
{
    $applications = Application::all(); // Or paginate if needed
    return view('admin.applications.index', compact('applications'));
}
public function store(Request $request, Job $job)
{
    // Validate the CV text
    $validated = $request->validate([
        'cv_text' => 'required',
    ]);

    // Check if the user has already applied for the job
    $existingApplication = $request->user()->applications()->where('job_id', $job->id)->first();

    // If the user has already applied, show a message and redirect back
    if ($existingApplication) {
        return redirect()->back()->with('error', 'You have already applied for this job.');
    }

    // If no previous application exists, create a new one
    $request->user()->applications()->create([
        'job_id' => $job->id,
        'cv_text' => $validated['cv_text'],
    ]);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Application submitted successfully!');
}

    public function profile()
    {
        $applications = Auth::user()->applications()->with('job')->get();
        return view('user.profile', compact('applications'));
    }

    public function destroy($id)
    {
        $Application = Application::findOrFail($id);
        $Application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Application deleted successfully.');
    }
}
