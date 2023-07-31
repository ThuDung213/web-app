@extends('admin.layout.master')

@section('title', 'Project')

@section('body')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-3 mb-3">
                    <a href="{{ route('admin.project.create') }}" class="btn btn-success float-right m-2">プロジェクト新規作成</a>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive ">
                    <table class="table table-bordered table-hover table-stripe bg-white">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">プロジェクト</th>
                                <th scope="col">クライアント</th>
                                <th scope="col">開始期間</th>
                                <th scope="col">終了期間</th>
                                <th scope="col">ステータス</th>
                                <th scope="col">アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $project->id }}</th>
                                    <td><a href="{{ route('admin.project.show', ['project' => $project->id]) }}">{{ $project->project_name }}</a></td>
                                    <td>{{ $project->Client->client_name }}</td>
                                    <td>{{ $project->start_date }}</td>
                                    <td>{{ $project->end_date }}</td>
                                    <td class="project-state">
                                        <span class="badge badge-success">{{ $project->status }}</span>
                                    </td>
                                    <td class="text-center py-0 align-middle">
                                        <a href="{{ route('admin.project.edit', ['project' => $project->id]) }}"
                                            class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.project.destroy', ['project' => $project->id]) }}"
                                            method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs"
                                                onclick="return confirm('このプロジェクトを削除してもよろし?')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
