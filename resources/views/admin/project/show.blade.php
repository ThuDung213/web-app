@extends('admin.layout.master')

@section('title', 'Project')

@section('body')
    <!-- Main content -->

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects Detail</h3>

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
                                        <span class="info-box-text">Status</span>
                                        <span class="info-box-number">{{ $project->status }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-warning">
                                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Start Date</span>
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
                                        <span class="info-box-text">End Date</span>
                                        <span
                                            class="info-box-number">{{ \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <h4>Recent Activity</h4>
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg"
                                            alt="user image">
                                        <span class="username">
                                            <a href="#">Jonathan Burke Jr.</a>
                                        </span>
                                        <span class="description">Shared publicly - 7:45 PM today</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                    </p>

                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo
                                            File 1 v2</a>
                                    </p>
                                </div>

                                <div class="post clearfix">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg"
                                            alt="User Image">
                                        <span class="username">
                                            <a href="#">Sarah Ross</a>
                                        </span>
                                        <span class="description">Sent you a message - 3 days ago</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                    </p>
                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo
                                            File 2</a>
                                    </p>
                                </div>

                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg"
                                            alt="user image">
                                        <span class="username">
                                            <a href="#">Jonathan Burke Jr.</a>
                                        </span>
                                        <span class="description">Shared publicly - 5 days ago</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                    </p>

                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo
                                            File 1 v1</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i>{{ $project->project_name }}</h3>
                        <p class="text-muted">{{ $project->description }}</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Client Company
                                <b class="d-block text-danger">{{ $project->Client->client_name }}</b>
                            </p>
                            <p class="text-sm">Project Leader
                                <b class="d-block">Tony Chicken</b>
                            </p>
                        </div>

                        <ul class="list-unstyled" >
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tasks</h4>
                                </div>
                                <div class="card-body">
                                    <!-- the task -->
                                    <div id="external-events">
                                        @foreach ($tasks as $task)
                                        <div class="external-event bg-success">
                                            <a href="#" class="btn-link text-secondary" id="tasks">
                                                <i class="far fa-fw"></i>
                                                {{ $task->task_name }}
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </ul>

                        <div class="text-center mt-5 mb-3">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info"
                                data-url="{{ route('admin.task.create') }}" id="add-task" data-target="#addTaskModal">Add
                                Task</a>
                            @include('admin.task.add')
                            <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
