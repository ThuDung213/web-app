@extends('admin.layout.master')
@section('title', 'Creator Details')
@section('body')
    <div class="container">
        <link rel="stylesheet" href="{{ asset('adminlte/custom.css') }}">
        <div class="row">
            <div class="col-md-12">
                <div class="card user-card mt-4">
                    <div class="card-block">
                        <div class="user-image">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-radius"
                                alt="User-Profile-Image">
                        </div>
                        <h6 class="f-w-600 m-t-25 m-b-10"><a
                                href="">{{ $creator->name }}</a>
                        </h6>
                        <p class="text-muted">{{ $creator->email }}</p>
                        <hr>
                        <div class="m-t-10">
                            <div class="col">
                                @foreach ($workingHoursByProject as $projectId => $workingHoursByDay)
                                    <h6></h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th class="bg-success">{{ $creator->projects->find($projectId)->project_name }}</th>

                                                    @foreach ($workingHoursByDay as $day => $workingHours)
                                                        <th>{{ $day }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        {{ $creator->projects->find($projectId)->totalWorkingHours ?? 0 }}
                                                    </th>

                                                    @foreach ($workingHoursByDay as $day => $workingHours)
                                                        <td>{{ $workingHours }}</td>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
