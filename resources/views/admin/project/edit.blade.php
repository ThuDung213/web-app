@extends('admin.layout.master')

@section('title', 'Edit Project')

@section('body')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Project</h3>
                        </div>
                        <form method="post" action="{{ route('admin.project.update', ['project' => $project->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="project_name">Name</label>
                                    <input type="text" class="form-control" id="project_name" name="project_name"
                                        placeholder="Project name" value="{{ $project->project_name }}">
                                </div>

                                <div class="form-group">
                                    <label>Client name (Company name)</label>
                                    <select required class="form-control" id="client_id" name="client_id">
                                        <option value="">Client name</option>
                                        @foreach ($clients as $client)
                                            <option {{ $project->client_id == $client->id ? 'selected' : '' }}
                                                value={{ $client->id }}>
                                                {{ $client->client_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Start date</label>
                                    <input type="date" class="form-control" id="start_date" required
                                        placeholder="Start date" name="start_date"
                                        value="{{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }}">
                                </div>
                                <div class="form-group">
                                    <label for="end_date">End date</label>
                                    <input type="date" class="form-control" id="end_date" required
                                        placeholder="End date" name="end_date"
                                        value="{{ \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') }}">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select required id="status" name="status" class="form-control">
                                        <option value="{{ $project->status }}">{{ $project->status }}</option>
                                        <option value="upcoming">Upcoming</option>
                                        <option value="inprogress">In progress</option>
                                        <option value="done">Done</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" required
                                        placeholder="Description" value="{{ $project->description }}">
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
