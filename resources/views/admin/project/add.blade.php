@extends('admin.layout.master')

@section('title', 'Add Project')

@section('body')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">プロジェクト新規作成フォーム</h3>
                        </div>
                        <form method="post" action="{{ route('admin.project.index') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="project_name">プロジェクト名</label>
                                    <input type="text" class="form-control" id="project_name" name="project_name"
                                        placeholder="Project name" value="">
                                </div>
                                <div class="form-group">
                                    <label>クライアン名 (会社名)</label>
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
                                    <label for="start_date">開始期間</label>
                                    <input type="date" class="form-control" id="start_date" required
                                        placeholder="Start date" name="start_date">
                                </div>
                                <div class="form-group">
                                    <label for="end_date">終了期間</label>
                                    <input type="date" class="form-control" id="end_date" required
                                        placeholder="End date" name="end_date">
                                </div>
                                <div class="form-group">
                                    <label for="status">ステータス</label>
                                    <select required id="status" name="status" class="form-control">
                                        <option value="0">ステータス</option>
                                        <option value="upcoming">Upcoming</option>
                                        <option value="inprogress">In progress</option>
                                        <option value="done">Done</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">ディスクライブ</label>
                                    <textarea type="text" class="form-control" id="description" name="description"
                                        required placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-info">作成</button>
                            </div>

                        </form>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
        </div>
    </div>

@endsection
