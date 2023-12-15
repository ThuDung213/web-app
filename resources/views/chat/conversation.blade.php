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
                                                                    <span
                                                                        class="active user-icon-{{ $friend->id }}"></span>
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
                                                                <span class=""></span>
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
                                    <div class="msg-head">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="d-flex align-items-center">
                                                    <span class="chat-icon"><img class="img-fluid"
                                                            src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg"
                                                            alt="image title"></span>
                                                    <div class="flex-shrink-0">
                                                        <img class="img-fluid"
                                                            src="@if ($friend->avatar == null) https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg
                                                            @else {{ asset('storage/' . $avatar) }} @endif"
                                                            alt="avatar" class="rounded-circle img-fluid"
                                                            style="height: 60px;">
                                                        <span class="chat-list active"></span>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h3>{{ $chat_friend->name }}</h3>
                                                        <p>front end developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <ul class="moreoption">
                                                    <li class="navbar nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                                            <li><a class="dropdown-item" href="#">Another action</a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Something else
                                                                    here</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal-body">
                                        <div class="msg-body">
                                            <ul>
                                                @foreach ($messages as $key => $message)
                                                    @if ($chat_friend->id == $message->users->first()->id)
                                                        <li class="sender">
                                                            <p>{{ $message->message }}</p>
                                                            <span class="time">10:20 am</span>
                                                        </li>
                                                    @else
                                                    <li class="repaly">
                                                        <p> {{ $message->message }} </p>
                                                        <span class="time">10:06 am</span>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="send-box">
                                        <form action="">
                                            <textarea id="chatInput" class="form-control" aria-label="message…" placeholder="Write message…"></textarea>

                                            <button type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                Send</button>
                                        </form>

                                        <div class="send-btns">
                                            <div class="attach">
                                                <div class="button-wrapper">
                                                    <span class="label">
                                                        <img class="img-fluid"
                                                            src="https://mehedihtml.com/chatbox/assets/img/upload.svg"
                                                            alt="image title"> attached file
                                                    </span><input type="file" name="upload" id="upload"
                                                        class="upload-box" placeholder="Upload File"
                                                        aria-label="Upload File">
                                                </div>

                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Select template</option>
                                                    <option>Template 1</option>
                                                    <option>Template 2</option>
                                                </select>

                                                <div class="add-apoint">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#exampleModal4"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewbox="0 0 16 16" fill="none">
                                                            <path
                                                                d="M8 16C3.58862 16 0 12.4114 0 8C0 3.58862 3.58862 0 8 0C12.4114 0 16 3.58862 16 8C16 12.4114 12.4114 16 8 16ZM8 1C4.14001 1 1 4.14001 1 8C1 11.86 4.14001 15 8 15C11.86 15 15 11.86 15 8C15 4.14001 11.86 1 8 1Z"
                                                                fill="#7D7D7D" />
                                                            <path
                                                                d="M11.5 8.5H4.5C4.224 8.5 4 8.276 4 8C4 7.724 4.224 7.5 4.5 7.5H11.5C11.776 7.5 12 7.724 12 8C12 8.276 11.776 8.5 11.5 8.5Z"
                                                                fill="#7D7D7D" />
                                                            <path
                                                                d="M8 12C7.724 12 7.5 11.776 7.5 11.5V4.5C7.5 4.224 7.724 4 8 4C8.276 4 8.5 4.224 8.5 4.5V11.5C8.5 11.776 8.276 12 8 12Z"
                                                                fill="#7D7D7D" />
                                                        </svg> Appoinment</a>
                                                </div>
                                            </div>
                                        </div>

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
@push('scripts') $friend
    <script>
        $(function() {

            let user_id = {{ Auth::user()->id }};
            let friend_id = "{{ $chat_friend->id }}";
            let ip_address = '127.0.0.1';
            let socket_port = '3000';
            let socket = io(ip_address + ':' + socket_port);

            let chatInput = $('#chatInput');
            socket.emit("user_connected", user_id);

            // send messafes whenn press enter
            chatInput.keypress(function(e) {
                let message = $(this).val();
                console.log(message);
                const messageData = {
                    user_id: user_id,
                    message: message,
                };
                if (e.which == 13 && !e.shiftKey) {
                    socket.emit('sendChatToServer', messageData);
                    sendMessage(message);
                    chatInput.val('');
                    return false;
                }
            });

            // callback function to send messages to client
            socket.on('sendChatToClient', (message) => {
                if (message.user_id == user_id) {
                    $('.msg-body ul').append(
                    `<li class="repaly"><p>${message.message}</p><span class="time">10:20 am</span></li>`);
                } else {
                    $('.msg-body ul').append(
                    `<li class="sender"><p>${message.message}</p><span class="time">10:20 am</span></li>`);
                }
            });

            // callback function to update user status
            socket.on('updateUserStatus', (data) => {
                console.log('Data:', data);
                $.each(data, function(key, val) {
                    console.log('Processing user:', key);
                    let $userIcon = $('.user-icon-' + key);
                    if (val !== null && val !== 0) {
                        console.log('User', key, 'is online.');
                        $userIcon.removeClass('active');
                        $userIcon.addClass('online');
                    }
                });
            });

            function sendMessage(message) {
                let url = "{{ route('chat.sendMessage') }}";
                let form = $(this);
                let formData = new FormData();
                let token = "{{ csrf_token() }}";

                formData.append('message', message);
                formData.append('_token', token);
                formData.append('receiver_id', friend_id);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            console.log(response.data);
                        }
                    }
                });
            }
        });
    </script>
@endpush
