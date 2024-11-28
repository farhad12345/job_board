@extends('layouts.home')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Job Detail Card -->
            <div class="card shadow-lg border-light rounded-lg">
                <div class="card-body">
                    <!-- Job Title and Company -->
                    <h1 class="display-3 font-weight-bold text-primary mb-3">{{ $job->title }}</h1>
                    <p class="text-muted mb-4"><strong>{{ $job->company }}</strong> - <em>{{ $job->location }}</em></p>

                    <!-- Job Description Section -->
                    <div class="mb-4">
                        <h4 class="font-weight-bold">Job Description</h4>
                        <p class="lead text-dark">{{ $job->description }}</p>
                    </div>

                    <!-- Job Details: Industry, Posted Date, Type -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><strong>Industry:</strong> <span class="text-muted">{{ $job->industry ?? 'Not specified' }}</span></p>
                            <p><strong>Posted On:</strong> <span class="text-muted">{{ $job->created_at->format('F d, Y') }}</span></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Location:</strong> <span class="text-muted">{{ $job->location }}</span></p>
                            <p><strong>Job Type:</strong> <span class="text-muted">{{ $job->job_type ?? 'Not specified' }}</span></p>
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <!-- Apply Now Section -->
                    @auth
                    <div class="apply-section mt-5">
                        <h4 class="font-weight-bold mb-3">Apply for this Job</h4>
                        <form action="{{ route('jobs.apply', $job->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="cv_text" class="font-weight-bold">Cover Letter / CV</label>
                                <textarea name="cv_text" class="form-control" rows="6" placeholder="Write your cover letter or paste your CV here..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg mt-3">Apply Now</button>
                        </form>
                    </div>
                    @else
                    <div class="mt-5">
                        <p class="text-center">To apply for this job, please <a href="{{ route('login') }}" class="btn btn-primary">Login</a>.</p>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
