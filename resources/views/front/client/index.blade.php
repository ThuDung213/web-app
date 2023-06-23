@extends('layouts.master')

@section('content')
    <div class="container principal">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @foreach ($projects as $project)
                    <div class="row mb-4">
                        <div class="col-lg-12 text-center">
                            <div class="row">
                                <div class="col mb-4">
                                    <div class="card-section border rounded p-3">
                                        <div class="card-header-first rounded pb-5 mb-4">
                                            <h2 class="card-header-title text-white pt-3">{{ $project->project_name }}</h2>
                                        </div>
                                        <div class="card-body d-flex flex-row bordered">
                                            @foreach ($project->creators as $creator)
                                                <div class="col-md-4 text-center px-2">
                                                    @php($avatar = $creator->avatar)
                                                    <img width="38" height="45" class="dropbtn rounded-circle"
                                                        src="@if ($avatar == null) https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg
                                                    @else {{ asset('storage/' . $avatar) }} @endif"
                                                        alt="Avatar" class="avatar">
                                                    <p>{{ $creator->name }}</p>
                                                    <div class="rounded bg-success text-white p-2">
                                                        <p class="mb-0">{{ $creator->totalWorkingHours ?? 0 }} Hours</p>
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
        </div>
    </div>
@endsection
