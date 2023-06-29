@extends('layouts.master')

@section('title', 'Add Project')
@section('content')
    <div class="container ">
        @csrf
        <!-- Modal -->
        <div class="modal fade" id="timeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">工数入力</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="workingTime" placeholder="工数を入力してください">
                            <span id="hoursError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="workingContent" placeholder="仕事の内容">
                            <span id="contentError" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                        <button type="button" id="saveBtn" class="btn btn-primary">保存</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h4>タスク:</h4>
                <ul class="list-group months">
                    @foreach ($tasks as $task)
                        <li class="list-group-item list-group-item-success" id="1">{{ $task->task_name }}</li>
                    @endforeach
                </ul>
                <br>
            </div>
            <div class="col-sm-9">
                <div id='calendar' class="bg-white p-4 border-top border-5 border-info"></div>
            </div>
        </div>

    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            //show working time
            var time = @json($events);
            $('#calendar').fullCalendar({
                header: {
                    'left': 'prev, next today',
                    'center': 'title',
                    'right': 'month, agendaWeek, agendaDay',
                },
                displayEventTime: false,
                events: time,
                selectable: true,
                selectHelper: true,

                select: function(start, end, allDays) {
                    $('#timeModal').modal('toggle');

                    $('#saveBtn').click(function() {
                        var working_hours = $('#workingTime').val();
                        var working_date = moment(start).format('YYYY-MM-DD');
                        var working_content = $('#workingContent').val();
                        console.log(time);
                        //Add working time
                        $.ajax({
                            url: "{{ route('time.store', ['creator' => $creator, 'project' => $project]) }}",
                            type: "POST",
                            datatype: 'json',
                            data: {
                                working_hours,
                                working_date,
                                working_content
                            },
                            success: function(response) {
                                $('#timeModal').modal('hide');
                                var eventTitle = response.hours + 'H - ' + response
                                    .title;
                                $('#calendar').fullCalendar('renderEvent', {
                                    'title': eventTitle,
                                    'start': response.start,
                                    'end': response.end,
                                    'hours': response.hours,
                                    'color': response.color
                                });
                            },
                            error: function(error) {
                                if (error.responseJSON.errors) {
                                    $('#hoursError').html(error.responseJSON.errors
                                        .working_hours)
                                    $('#contentError').html(error.responseJSON
                                        .errors.working_content)
                                }
                            },
                        });
                    });
                },
                editable: true,
                //change working date
                eventDrop: function(event) {
                    var id = event.id;
                    var working_hours = event.working_hours;
                    var working_date = moment(event.start).format('YYYY-MM-DD');
                    var working_content = event.working_content;
                    $.ajax({
                        url: "{{ route('time.update', '') }}" + '/' + id,
                        type: "PATCH",
                        datatype: 'json',
                        data: {
                            working_hours,
                            working_date,
                            working_content,
                        },
                        success: function(response) {
                            swal("Good job!", "Event Updated!", "success");
                        },
                        error: function(error) {
                            console.log(error);
                        },
                    });
                },
                eventClick: function(event) {
                    var id = event.id;
                    //Delete working time
                    if (confirm('Are you sure want to remove it?')) {
                        $.ajax({
                            url: "{{ route('time.destroy', '') }}" + '/' + id,
                            type: "DELETE",
                            datatype: 'json',
                            success: function(response) {
                                $('#calendar').fullCalendar('removeEvents', id);
                                swal("Good job!", "Event Deleted!", "success");
                            },
                            error: function(error) {
                                console.log(error);
                            },
                        });
                    }
                },
                selectAllow: function(event) {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1,
                        'second').utcOffset(false), 'day');
                }

            });

            $('#timeModal').on("hidden.bs.modal", function() {
                $('#saveBtn').unbind();
            });

            $('.fc-event').css('font-size', '13px');
            $('.fc-event').css('height', '25px');
        });
    </script>
@endsection
