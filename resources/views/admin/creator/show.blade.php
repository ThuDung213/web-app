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
                            @php($avatar = $creator->avatar)
                            <img src="@if ($avatar == null) https://bootdey.com/img/Content/avatar/avatar7.png
                                 @else {{ asset('storage/' . $avatar) }} @endif"
                                class="img-radius card-img-top" alt="Avatar">
                        </div>
                        <h6 class="f-w-600 m-t-25 m-b-10"><a href="">{{ $creator->name }}</a>
                        </h6>
                        <p class="text-muted">{{ $creator->email }}</p>
                        <hr>
                        <div class="row justify-content-center">
                            <form id="searchForm" class="mb-2"
                                action="{{ route('admin.creator.search', ['creator' => $creator->id]) }}" method="POST">
                                @csrf
                                <br>
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="form-group row justify-content-center">
                                            <div class="col-9">
                                                <input type="month" class="form-control" id="month" name="month"
                                                    value="{{ $monthYear }}" required>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" class="btn btn-success text-nowrap" name="search"
                                                    title="Search">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="m-t-10">
                            <div class="col">
                                <?php $totalHours = 0; ?>
                                @foreach ($workingHoursByProject as $projectId => $workingHoursByDay)
                                    <?php
                                        $projectTotalHours = $creator->projects->find($projectId)->totalWorkingHours ?? 0;
                                        $totalHours += $projectTotalHours;
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th class="bg-success">
                                                        {{ $creator->projects->find($projectId)->project_name }}</th>

                                                    @foreach ($workingHoursByDay as $day => $workingHours)
                                                        <th>{{ $day }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        {{ $projectTotalHours }}
                                                    </th>

                                                    @foreach ($workingHoursByDay as $day => $workingHours)
                                                        <td>{{ $workingHours }}</td>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                                <div class="justify-content-center mt-3">
                                    <label class="bg-success p-2 rounded">Total: {{ $totalHours }}H</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
