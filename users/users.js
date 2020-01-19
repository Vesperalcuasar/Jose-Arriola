/**
 * js code for user's page
 */

$(document).ready(function () {
    $('form#add-user-form').submit(function (event) {
        event.preventDefault();
        var data = $('form#add-user-form').serializeArray();
        $.ajax({
            url: 'users/controller.php',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
            }
        });
    });
});


