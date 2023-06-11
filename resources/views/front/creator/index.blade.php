@extends('layouts.master')

@section('title', 'Add Project')
@section('content')
    <div class="container">
        <div class="row g-3">
            @foreach ($projects as $project)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow">
                        <a href="{{ route('time.index', ['creator' => $creator, 'project' => $project->id]) }}">
                            <img src="{{ asset('img/bg.jpg') }}" alt="Europe" class="card-img-top" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->project_name }}</h5>
                                <p class="card-text">Toi la junjun ngok nghek</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
