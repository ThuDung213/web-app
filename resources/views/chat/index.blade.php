@extends('layouts.master')

@section('content')
    <!-- char-area -->
    <section class="message-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="chat-area">
                        <!-- chatlist -->
                        <div class="chatlist">
                            <div class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="chat-header">
                                        <div class="msg-search">
                                            <input type="text" class="form-control" id="inlineFormInputGroup"
                                                placeholder="Search" aria-label="search">
                                            <a class="add" href="#"><img class="img-fluid"
                                                    src="https://mehedihtml.com/chatbox/assets/img/add.svg"
                                                    alt="add"></a>
                                        </div>

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="Open-tab" data-bs-toggle="tab"
                                                    data-bs-target="#Open" type="button" role="tab"
                                                    aria-controls="Open" aria-selected="true">Open</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="Closed-tab" data-bs-toggle="tab"
                                                    data-bs-target="#Closed" type="button" role="tab"
                                                    aria-controls="Closed" aria-selected="false">Closed</button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="modal-body">
                                        <!-- chat-list -->
                                        <div class="chat-lists">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="Open" role="tabpanel"
                                                    aria-labelledby="Open-tab">
                                                    <!-- chat-list -->
                                                    <div class="chat-list">
                                                        @foreach ($friends as $key => $friend)
                                                            <a href="{{ route('chat.conversation', $friend->id) }}"
                                                                class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img src="@if ($friend->avatar == null) https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg
                                                                        @else {{ asset('storage/' . $avatar) }} @endif"
                                                                        alt="avatar" class="rounded-circle img-fluid"
                                                                        style="height: 70px;">
                                                                    <span class="active"></span>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>{{ $friend->name }}</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                        @endforeach

                                                    </div>
                                                    <!-- chat-list -->
                                                </div>
                                                <div class="tab-pane fade" id="Closed" role="tabpanel"
                                                    aria-labelledby="Closed-tab">

                                                    <!-- chat-list -->
                                                    <div class="chat-list">
                                                        <a href="#" class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img class="img-fluid"
                                                                    src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                    alt="user img">
                                                                <span class="active"></span>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>Mehedi Hasan</h3>
                                                                <p>front end developer</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <!-- chat-list -->
                                                </div>
                                            </div>

                                        </div>
                                        <!-- chat-list -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- chatlist -->

                        <!-- chatbox -->
                        <div class="chatbox">
                            <div class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="msg-body">
                                            <p>Select friend to begin</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- chatbox -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- char-area -->
@endsection

