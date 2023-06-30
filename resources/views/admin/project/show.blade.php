@extends('admin.layout.master')

@section('title', 'Project')

@section('body')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">プロジェクト詳細</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-info">
                                    <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">ステータス</span>
                                        <span class="info-box-number">{{ $project->status }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-warning">
                                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">開始期間</span>
                                        <span
                                            class="info-box-number">{{ \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-gradient-success">
                                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">終了期間</span>
                                        <span
                                            class="info-box-number">{{ \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <h4>クリエイター</h4>
                                <div class="row text-center">
                                    <div class="col-md-1 mb-3">
                                        <button type="button"
                                            class="btn btn-success btn-lg rounded-circle font-weight-bold"
                                            data-toggle="modal" data-target="#addMemberModal">+</button>
                                    </div>
                                    <div class="col-md-10 mb-3 text-center">
                                        <div id="creators" class="row">
                                            @foreach ($project->creators as $creator)
                                                <div class="col-12 col-sm-2" id="member">
                                                    <div class="d-flex justify-content-start position-relative">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                            width="50" class="rounded-circle" style="display: block">
                                                        <div class="overlay">
                                                            <form class="delete-member-form"
                                                                action="{{ route('admin.project.deleteMember', ['project' => $project->id, 'creator' => $creator->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="delete-btn" title="Delete"
                                                                    data-creator-id="{{ $creator->id }}">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="text-left">
                                                        <span class="name">{{ $creator->name }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <input type="hidden" id="project_id" value="{{ $project->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <form id="searchForm" class="mb-2"
                                action="{{ route('admin.project.search', ['project' => $project->id]) }}" method="POST">
                                @csrf
                                <br>
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="form-gourp row justify-content-center">
                                            <div class="col-9">
                                                <input type="month" class="form-control" id="month" name="month"
                                                    value="{{ $monthYear }}" required>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-success text-nowrap" name="search"
                                                    title="Search">検索</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="searchResultContainer">
                            @foreach ($project->creators as $creator)
                                <div class="row mt-3 mb-3">
                                    <div class="col-md-12">
                                        <div class="col">
                                            @foreach ($workingHoursByProject as $projectId => $workingHoursByDay)
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-sm " style="margin-bottom: 0">
                                                        <thead>
                                                            <tr>
                                                                <th class="bg-success">
                                                                    {{ $creator->name }}
                                                                </th>
                                                                @foreach ($workingHoursByDay as $day => $workingHours)
                                                                    <th>{{ $day }}</th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center">
                                                                    {{ $creator->totalWorkingHours ?? 0 }}
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
                            @endforeach
                        </div>
                    </div>


                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i>{{ $project->project_name }}</h3>
                        <p class="text-muted">{{ $project->description }}</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">クライアント
                                <b class="d-block text-danger">{{ $project->Client->client_name }}</b>
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">タスク</h4>
                            </div>
                            <div class="card-body">
                                <!-- the task -->
                                <div id="external-events">
                                    @foreach ($tasks as $task)
                                        <div class="card card-success collapsed-card mb-3">
                                            <div class="card-header p-2">
                                                <h3 class="card-title">{{ $task->task_name }}</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                    </button>
                                                    <form
                                                        action="{{ route('admin.task.destroy', ['task' => $task->id]) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this task?')"
                                                            class="btn btn-tool"
                                                            title="Remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <h5>Project Name: {{ $task->Project->project_name }}</h5>
                                                <p>Description: {{ $task->description }}</p>
                                                <p>Creators:</p>
                                                <ul>
                                                    @foreach ($task->creators as $creator)
                                                        <li>{{ $creator->name }}</li>
                                                    @endforeach
                                                </ul>
                                                <p>Status: {{ $task->status }}</p>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    @endforeach

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="text-center mt-5 mb-3">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info"
                                data-url="{{ route('admin.task.create') }}" id="add-task"
                                data-target="#addTaskModal">タスク作成
                                </a>
                            @include('admin.task.add')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

    {{-- Add members modal --}}
    <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-hidden="true"
        data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addMemberForm" method="POST"
                    action="{{ route('admin.project.addMember', ['id' => $project->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label>クリエイター</label>
                            <div class="select2-lightblue">
                                <select id="creators" name="creators[]" class="select2" multiple="multiple"
                                    data-placeholder="Select creators" data-dropdown-css-class="select2-lightblue"
                                    style="width: 100%;" required name="creator_id">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <button type="submit" id="addMemberBtn" class="btn btn-primary">作成</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
