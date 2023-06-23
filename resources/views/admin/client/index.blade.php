@extends('admin.layout.master')

@section('title', 'Project')

@section('body')
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.client.create') }}" class="btn btn-success float-right m-2">Add</a>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover table-light">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                    <tr>
                                        <th scope="row">{{ $client->id }}</th>
                                        <td><a href="">{{ $client-> client_name }}</a></td>
                                        <td>{{ $client-> address }}</td>
                                        <td>{{ $client-> phone }}</td>
                                        <td>{{ $client-> email }}</td>
                                        <td>{{ $client-> city }}</td>
                                        <td>{{ $client-> country }}</td>

                                        <td class="text-right py-0 align-middle">
                                            <a href="{{ route('admin.client.edit', ['client' => $client->id]) }}"
                                                class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.client.destroy', ['client' => $client->id]) }}"
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
