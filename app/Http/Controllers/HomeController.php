<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function jobsindex(Request $request)
    {
        $query = Job::query();

        // Search by title or company
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('company', 'like', '%' . $request->search . '%');
        }

        $jobs = $query->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    public function jobsshow($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }
    public function jobDtails($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.Details', compact('job'));
    }

}
