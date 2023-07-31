@extends('layouts.master')

@section('content')
    <div class="container principal">
        <!-- Search form -->
        <div class="row mb-5 d-flex justify-content-center">
            <form action="{{ route('home.client.search') }}" method="POST" class="mb-5">
                @csrf
                <br>
                {{-- <div class="container"> --}}
                <div class="row">
                    <div class="container-fluid">
                        <div class="form-gourp row justify-content-center">
                            <div class="col-sm-3 mb-3">
                                <input type="month" class="form-control" id="month" name="month"
                                    value="{{ $monthYear }}" required>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-auth" name="search" title="Search">検索</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </form>
        </div>
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
                                    <div class="card-section border rounded p-3 bg-white">
                                        <div class="card-header-first rounded pb-5 mb-4">
                                            <h2 class="card-header-title text-white pt-3">{{ $project->project_name }}</h2>
                                            <div class="text-center text-white">
                                                <h3>({{ $project->totalHours ?? 0 }} Hours)</h3>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex flex-row bordered overflow-auto">
                                            @foreach ($project->creators as $creator)
                                                <div class="col-md-4 text-center px-2">
                                                    @php($avatar = $creator->avatar)
                                                    <img width="38" height="45" class="img-radius rounded-circle"
                                                        src="@if ($avatar == null) https://bootdey.com/img/Content/avatar/avatar7.png
                                                    @else {{ asset('storage/' . $avatar) }} @endif"
                                                        alt="Avatar">
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
