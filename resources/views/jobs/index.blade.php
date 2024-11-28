@extends('layouts.home')

@section('content')
<div class="container my-5">
    <!-- Page Heading -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4">Find Your Dream Job</h1>
            <p class="lead">Search and apply to jobs or manage your profile easily.</p>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('jobs.show') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search jobs by title or company" aria-label="Search jobs">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Job Listings -->
    <div class="row">
        @forelse ($jobs as $job)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body p-3">
                        <!-- Job Title -->
                        <h5 class="card-title text-dark font-weight-bold">{{ $job->title }}</h5>

                        <!-- Company and Location -->
                        <p class="text-muted mb-2">
                            <strong>Company:</strong> {{ $job->company }} - <strong>Location:</strong> {{ $job->location }}
                        </p>

                        <!-- Job Description -->
                        <p class="card-text text-secondary mb-3" style="font-size: 0.875rem;">
                            <strong>Description:</strong> {{ Str::limit($job->description, 100) }}
                        </p>

                        <!-- View Details Button -->
                        <a href="{{ route('job.detail', $job->id) }}" class="btn btn-primary btn-sm px-4 py-2 rounded-pill text-uppercase font-weight-semibold">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col text-center">
                <p class="text-muted">No jobs found. Try searching for something else.</p>
            </div>
        @endforelse
    </div>



    {{-- <!-- User Actions -->
    <div class="row mt-5">
        <!-- Not Registered Yet Section -->
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="p-4 border rounded-lg shadow-sm bg-light">
                <h5 class="font-weight-bold text-dark">Not Registered Yet?</h5>
                <p class="text-muted mb-4">Create an account to upload your CV and apply to jobs.</p>
                <a href="{{ route('register') }}" class="btn btn-success btn-lg px-5 py-3 rounded-pill">Register Now</a>
            </div>
        </div>

        <!-- Already Have an Account Section -->
        <div class="col-md-6">
            <div class="p-4 border rounded-lg shadow-sm bg-light">
                <h5 class="font-weight-bold text-dark">Already Have an Account?</h5>
                <p class="text-muted mb-4">Login to manage your profile and applications.</p>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Login</a>
            </div>
        </div>
    </div> --}}

</div>
@endsection
