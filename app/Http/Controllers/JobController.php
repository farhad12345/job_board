<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::query();

        // Search by title or company
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('company', 'like', '%' . $request->search . '%');
        }

        $jobs = $query->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'industry' => 'required',
        ]);

        // Create a new job and save it to the database
        Job::create($validatedData);

        // Redirect to the jobs index page with a success message
        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully!');
    }
    public function create()
    {
        return view('admin.jobs.create');
    }
    public function update(Request $request, Job $job)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        // Update the job
        $job->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully!');
    }
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }
    public function destroy($id)
    {
        $user = Job::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
    }
}
