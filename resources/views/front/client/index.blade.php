@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- <div class="card"> --}}
                <div class="card-header">Dashboard</div>

                {{-- <div class="card-body"> --}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @foreach ($projects as $project)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-center">{{ $project->project_name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="card">
                                        <div class="card-body d-flex flex-row">
                                            @foreach ($project->creators as $creator)
                                                <div class="col-md-4 text-center px-2">
                                                    @php($avatar = $creator->avatar)
                                                    <img width="38" height="45" class="dropbtn rounded-circle" src="@if ($avatar == null) https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg
                                                    @else {{ asset('storage/' . $avatar) }} @endif" alt="Avatar" class="avatar">
                                                    <p>{{ $creator->name }}</p>
                                                    <div class="rounded bg-success text-white p-2">
                                                        <p class="mb-0">{{ $creator->Time->where('project_id', $project->id)->sum('working_hours') ?? 0 }} Hours</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- </div> --}}
        </div>
    </div>
@endsection
