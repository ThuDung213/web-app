@extends('layouts.master')

@section('content')
    <div class="container mt-4" style="background-color: rgb(255, 255, 255);">
        <form method="POST" enctype="multipart/form-data" id="profile_setup_frm"
            action="{{ route('profile.update', ['id' => $creator->id]) }}">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @php($avatar = auth()->user()->avatar)
                        <img class="rounded-circle mt-5 mb-4" style="width: 150px; height: 150px;"
                            src="@if ($avatar == null) https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg
                            @else {{ asset('storage/' . $avatar) }} @endif"
                            id="image_preview_container">

                        <span class="font-weight-bold">
                            <input type="file" name="avatar" id="avatar" class="form-control">
                        </span>

                    </div>
                </div>
                <div class="col-md-8 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Edit Profile</h4>
                        </div>
                        <div class="row" id="res"></div>
                        <div class="row mt-2 align-items-center">
                            <label class="col-form-label col-sm-3" for="name">Name</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name" value="{{ $creator->name ?? '' }}">
                            </div>
                        </div>
                        <div class="row mt-2 align-items-center">
                            <label class="col-form-label col-sm-3" for="email">Email</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your Email" value="{{ $creator->email ?? '' }}">
                            </div>
                        </div>
                        <div class="row mt-2 align-items-center">
                            <label class="col-form-label col-sm-3" for="phone">Phone</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter phone number" value="{{ $creator->phone ?? '' }}">
                            </div>
                        </div>

                        <div class="row mt-2 align-items-center">
                            <label class="col-form-label col-sm-3" for="address">Address</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter your address" value="{{ $creator->address ?? '' }}">
                            </div>
                        </div>

                        <div class="row mt-2 align-items-center">
                            <label class="col-form-label col-sm-3" for="description">Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Description" value="{{ $creator->description ?? '' }}">
                            </div>
                        </div>

                        <div class="mt-5 text-center"><button id="btn" class="btn btn-auth profile-button"
                                type="submit">Save Profile</button></div>
                    </div>
                </div>

            </div>

        </form>
    </div>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
@endsection
