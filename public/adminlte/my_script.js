$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Add Task
$(function () {
    // Initialize Select2 Elements
    $(".select2").select2();

    // Initialize Select2 Elements
    $(".select2bs4").select2({
        theme: "bootstrap4",
    });

    $('body').on('click', '#add-task', function () {
        var userURL = $(this).data('url');
        $.get(userURL, function (data) {
            $('#addTaskModal').modal('show');
        });
    });

    $('#submitBtn').on('click', function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        var formData = {
            task_name: $('#task_name').val(),
            description: $('#description').val(),
            status: $('#status').val()
        };

        $.ajax({
            url: $('#formAddTask').attr('action'),
            type: 'POST',
            data: $('#formAddTask').serialize(),
            dataType: 'json',
            success: function (response) {
                // Handle the successful response
                console.log(response.message);
                console.log(response.task_html);
                $('#addTaskModal').modal('hide');

                // Display the task
                $('#external-events').append(response.task_html);
            },
            error: function (xhr, status, error) {
                // Handle the error response
                console.error(xhr.responseText);
            }
        });
    });

    // Add Member
    $('#addMemberBtn').on('click', function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        addMember();
    });
    // Delete Member
    $('#deleteMemberBtn').on('click', function (e) {
        e.preventDefault();
        var creatorId = $(this).data('creator-id');
        var projectId = $('#project_id').val();
        console.log(creatorId);
        console.log(projectId);
        deleteMember(creatorId);
    });

    // $('#searchForm').submit(function (e) {
    //     e.preventDefault();
    //     var selectedMonthYear = $("#month").val();
    //     var project_id = $('#project_id').val();
    //     searchWorkingTime(project_id, selectedMonthYear);
    // });
});


function addMember() {
    $.ajax({
        url: $('#addMemberForm').attr('action'),
        type: 'POST',
        data: $('#addMemberForm').serialize(),
        dataType: 'json',
        success: function (response) {
            //Update the list of creators
            console.log(response);
            $('#addMemberModal').modal('hide');
            $('#creators').append(response.creatorsHtml);

            // Handle the successful response
            console.log(response.message);


        },
        error: function (xhr, status, error) {
            // Handle the error response
            console.error(error);
        },

    });
}

function deleteMember(creatorId) {
    //Delete creator from project
    if (confirm('Are you sure you want to delete this creator?')) {
        $.ajax({
            url: $('#deleteMemberForm').attr('action'),
            type: 'POST',
            data: $('#deleteMemberForm').serialize(),
            dataType: 'json',
            success: function (response) {
                //Update the list of creators
                $('#creators').append(response.html);
            },
            error: function (xhr, status, error) {
                // Handle the error response
                console.error(error);
            }
        });
    }
}

//Search working time
// function searchWorkingTime(project_id, month) {
//     var base_url = 'http://127.0.0.1:8000';
//     $.ajax({
//         url: base_url+"/admin/project/search",
//         type: 'POST',
//         data: {
//             project_id : project_id,
//             month: month,
//         },
//         success: function(response) {
//             $('html').html(response);
//             console.log(response);
//         },
//         error: function(xhr, status, error) {
//             console.error(error);
//         }
//     });
// }
