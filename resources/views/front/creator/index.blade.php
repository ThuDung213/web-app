@extends('layouts.master')

@section('title', 'Add Project')
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="row g-3">
            @foreach ($projects as $key => $project)
                <div class="box">
                    <h3>{{ $project->project_name }}</h3>
                    <p>{{ $project->description }}</p>
                    <a href="{{ route('time.index', ['creator' => $creator, 'project' => $project->id]) }}"><button>詳細</button></a>
                    <span class="count">{{ $key + 1 }}</span>
                </div>
            @endforeach
        </div>

    </div>
@endsection
