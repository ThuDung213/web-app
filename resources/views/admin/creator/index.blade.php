@extends('admin.layout.master')
@section('title', 'Creator')
@section('body')
    <div class="container justify-content-center" style="background-color: mintcream">
        <link rel="stylesheet" href="{{ asset('adminlte/custom.css') }}">
        @foreach ($creators as $creator)
            <div class="row ml-2">
                <div class="card my-card">
                    <div class="col-md-2">
                        @php($avatar = $creator->avatar)
                        <img src="@if ($avatar == null) https://bootdey.com/img/Content/avatar/avatar7.png
                             @else {{ asset('storage/' . $avatar) }} @endif"
                            class="img-radius card-img-top" alt="Avatar">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <div class="col-lg-6 mb-4">
                                <div class="text-section">
                                    <h5 class="f-w-600 m-b-10"><a class="text-dark text-decoration-none"
                                            href="{{ route('admin.creator.show', ['creator' => $creator->id]) }}">{{ $creator->name }}</a>
                                    </h5>
                                    <p class="text-muted">{{ $creator->email }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">

                                @foreach ($creator->projects as $project)
                                    <div class="card sm-card">
                                        <div class="card-body">
                                            <div class="info-box-content align-items-center">
                                                <span class="info-box-text">{{ $project->project_name }}:</span>
                                                <span class="info-box-number">{{ $project->totalWorkingHours ?? 0 }}
                                                    Hours</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>

@endsection
