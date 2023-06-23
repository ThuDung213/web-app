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
                $('#tasks').append(response.task_html);
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
