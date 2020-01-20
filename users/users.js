/**
 * js code for user's page
 */

$(document).ready(function () {
    // ajax request fot submitting add user form data
    $('form#add-user-form').submit(function (event) {
        event.preventDefault();
        var data = $('form#add-user-form').serializeArray();
        $.ajax({
            url: 'users/controller.php',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function (data) {
                if (!data.success) {
                    $('.modal-body p').text(data.error);
                    $('.modal-title').text('Oops!');
                } else {
                    $('.modal-title').text('Congratulations!');
                    $('.modal-body p').text(data.message);
                }
                $('#messageModal').modal('show');
            }
        });
    });
});


