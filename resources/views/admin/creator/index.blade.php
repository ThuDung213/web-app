@extends('admin.layout.master')
@section('title', 'Creator')
@section('body')
    <div class="container justify-content-center" style="background-color: mintcream">
        <link rel="stylesheet" href="{{ asset('adminlte/custom.css') }}">
        @foreach ($creators as $creator)
        <div class="row ml-2">
            <div class="card my-card">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-radius card-img-top"
                    alt="User-Profile-Image">
                <div class="card-body">
                    <div class="text-section">
                        <h5 class="f-w-600 m-b-10"><a class="text-dark text-decoration-none"
                                href="{{ route('admin.creator.show', ['creator' => $creator->id]) }}">{{ $creator->name }}</a>
                        </h5>
                        <p class="text-muted">{{ $creator->email }}</p>
                    </div>
                    <div class="cta-section">
                        @foreach ($creator->projects as $project)
                            <div class="card inside-info-card inside-info-container">
                                <div class="card-body">
                                    <div class="info-box-content align-items-center">
                                        <span class="info-box-text">{{ $project->project_name }}</span>
                                        <br/>
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
        @endforeach
    </div>
    </div>

@endsection
