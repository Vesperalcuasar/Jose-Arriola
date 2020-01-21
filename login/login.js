/* JS file for login page */
/*jslint browser: true*/
/*global $, jQuery, alert, confirm, console, prompt*/

$('form#login-form').submit(function (event) {
    event.preventDefault();
    let data = $('form#login-form').serializeArray();
    $.ajax({
        url: 'login/controller.php',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function (data) {
            if (!data.success) {
                $('.modal-body p').text(data.error);
                $('.modal-title').text('Oops!');
                $('#messageModal').modal('show');
            } else {
                window.location.replace("index.php");
            }
        }
    });
});