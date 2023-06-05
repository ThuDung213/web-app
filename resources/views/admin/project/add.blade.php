@extends('admin.layout.master')

@section('title', 'Add Project')

@section('body')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('admin.project.index') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="project_name">Project name</label>
                            <input type="text" class="form-control" id="project_name" name="project_name"
                            placeholder="Project name" value="">
                        </div>

                        <div class="form-group">
                            <label>Client name (Company name)</label>
                            <select required class="form-control" id="client_id" name="client_id">
                                <option value="">Client name</option>
                                @foreach ($clients as $client)
                                    <option value={{ $client->id }}>
                                        {{ $client->client_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" required
                                placeholder="Start date" name="start_date">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" required
                                placeholder="End date" name="end_date">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select required id="status" name="status" class="form-control">
                                <option value="0">Status</option>
                                <option value="upcoming">Upcoming</option>
                                <option value="inprogress">In progress</option>
                                <option value="done">Done</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required
                                placeholder="Description">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
