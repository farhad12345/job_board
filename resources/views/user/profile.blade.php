@extends('layouts.guest')

@section('content')
<div class="container my-5">
    <h1>Your Applications</h1>
    <ul class="list-group">
        @forelse ($applications as $application)
            <li class="list-group-item">
                <strong>{{ $application->job->title }}</strong>
                <p>{{ $application->job->company }} - {{ $application->job->location }}</p>
                <p><em>{{ $application->cv_text }}</em></p>
            </li>
        @empty
            <p>No applications submitted yet.</p>
        @endforelse
    </ul>
</div>
@endsection
