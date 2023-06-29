@extends('admin.layout.master')

@section('title', 'Add Client')

@section('body')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">クライアント新規作成フォーム</h3>
                        </div>
                        <form  method="post" action="{{ route('admin.client.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="client_name">クライアン名</label>
                                    <input type="text" class="form-control" id="client_name" name="client_name"
                                        placeholder="Client name" value="">
                                </div>

                                <div class="form-group">
                                    <label for="status">メールアドレス</label>
                                    <input type="text" class="form-control" id="email" required placeholder="Email"
                                        name="email">
                                </div>

                                <div class="form-group">
                                    <label for="status">パスワード</label>
                                    <input type="password" class="form-control" id="password" required
                                        placeholder="password" name="password">
                                </div>

                                <div class="form-group">
                                    <label for="start_date">アドレス</label>
                                    <input type="text" class="form-control" id="address" required placeholder="Address"
                                        name="address">
                                </div>
                                <div class="form-group">
                                    <label for="phone">電話番号</label>
                                    <input type="phone" class="form-control" id="phone" required placeholder="Phone"
                                        name="phone">
                                </div>

                                <div class="form-group">
                                    <label for="description">町</label>
                                    <input type="text" class="form-control" id="city" name="city" required
                                        placeholder="city">
                                </div>
                                <div class="form-group">
                                    <label for="country">国</label>
                                    <input type="text" class="form-control" id="country" name="country" required
                                        placeholder="Country">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-info">登録</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
