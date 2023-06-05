@extends('admin.layout.master')

@section('title', 'Project')

@section('body')
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.project.create') }}" class="btn btn-success float-right m-2">Add</a>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover table-light">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row">{{ $project->id }}</th>
                                        <td><a href="{{ route('admin.project.show', ['project' => $project-> id]) }}">{{ $project-> project_name }}</a></td>
                                        <td>{{ $project-> Client-> client_name }}</td>
                                        <td>{{ $project-> start_date }}</td>
                                        <td>{{ $project-> end_date }}</td>
                                        <td class="project-state">
                                            <span class="badge badge-success">{{ $project -> status }}</span>
                                        </td>
                                        <td>{{ $project-> description }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <a href="{{ route('admin.project.edit', ['project' => $project->id]) }}"
                                                class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.project.destroy', ['project' => $project->id]) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs"
                                                    onclick="return confirm('Are you sure you want to delete this project?')"><i
                                                    class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
@endsection