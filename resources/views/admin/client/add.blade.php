@extends('admin.layout.master')

@section('title', 'Add Client')

@section('body')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('admin.client.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="client_name">Client name</label>
                            <input type="text" class="form-control" id="client_name" name="client_name"
                            placeholder="Client name" value="">
                        </div>

                        <div class="form-group">
                            <label for="status">Email</label>
                            <input type="text" class="form-control" id="email" required
                                placeholder="Email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="status">Password</label>
                            <input type="password" class="form-control" id="password" required
                                placeholder="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="start_date">Address</label>
                            <input type="text" class="form-control" id="address" required
                                placeholder="Address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="phone" class="form-control" id="phone" required
                                placeholder="Phone" name="phone">
                        </div>

                        <div class="form-group">
                            <label for="description">City</label>
                            <input type="text" class="form-control" id="city" name="city" required
                                placeholder="city">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" required
                                placeholder="Country">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
