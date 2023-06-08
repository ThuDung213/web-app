$.ajaxSetup({
    headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});
$(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Initialize Select2 Elements
    $(".select2bs4").select2({
        theme: "bootstrap4",
    });

    $('body').on('click', '#add-task', function () {
        var userURL = $(this).data('url');
        $.get(userURL, function (data) {
            $('#addTaskModal').modal('show');
        })
    });

    $('#submitBtn').on('click', function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        var formData = {
            task_name: $('#task_name').val(),
            description: $('#description').val(),
            status: $('#status').val()
        }

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

                //Display the task
                $('#tasks').append(response.task_html);
            },
            error: function(xhr, status, error) {
                // Handle the error response
                console.error(xhr.responseText);
            }
        })
    })
});
