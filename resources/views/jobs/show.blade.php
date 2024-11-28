@extends('layouts.home')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $job->title }}</h1>
            <p class="text-muted">{{ $job->company }} - {{ $job->location }}</p>
            <p>{{ $job->description }}</p>

            @auth
                <form action="{{ route('jobs.apply', $job->id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <textarea name="cv_text" class="form-control" rows="5" placeholder="Paste your CV here"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Apply Now</button>
                </form>
            @else
                <p class="mt-4">
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a> to apply for this job.
                </p>
            @endauth
        </div>
    </div>
</div>
@endsection
