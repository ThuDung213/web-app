@extends('admin.layout.master')

@section('title', 'Add Client')

@section('body')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('admin.client.update', ['client' => $client->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="client_name">Client name</label>
                            <input type="text" class="form-control" id="client_name" name="client_name"
                            placeholder="Client name" value="{{ $client-> client_name }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Email</label>
                            <input type="text" class="form-control" id="email" required
                                placeholder="Email" name="email" value="{{ $client-> email }}">
                        </div>

                        <div class="form-group">
                            <label for="start_date">Address</label>
                            <input type="text" class="form-control" id="address" required
                                placeholder="Address" name="address" value="{{ $client-> address }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="phone" class="form-control" id="phone" required
                                placeholder="Phone" name="phone" value="{{ $client-> phone }}">
                        </div>

                        <div class="form-group">
                            <label for="description">City</label>
                            <input type="text" class="form-control" id="city" name="city" required
                                placeholder="city" value="{{ $client-> city }}">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" required
                                placeholder="Country" value="{{ $client-> country }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
