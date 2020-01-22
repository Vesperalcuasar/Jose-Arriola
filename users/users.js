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
                    getUsers();
                }
                $('#messageModal').modal('show');
            }
        });
    });

    if ($('.users-list').is(':visible')) {
        getUsers();
    }
});


function getUsers() {
    $.ajax({
        url: 'users/controller.php',
        type: 'get',
        data: {
            action: 'get-users-list'
        },
        dataType: 'json',
        success: function (data) {
            if (!data.success) {
                $('.modal-body p').text(data.error);
                $('.modal-title').text('Oops!');
                $('#messageModal').modal('show');
            } else {
                $('.user-table tbody').empty();
                if (data.users.length == 0) {
                    $('.user-table tbody').append('No Record found');
                } else {
                    $.each(data.users, function (index, value) {
                        let type = value.is_admin == '1' ? 'Admin' : 'User';
                        let tr = '<tr>';
                        tr += '<td>' + (index + 1) + '</td>';
                        tr += '<td>' + value.user_name + '</td>';
                        tr += '<td>' + type + '</td>';
                        tr += '<td><button class="delete-btn" id="' + value.id + '" onclick="deleteUser( ' + value.id + ')">Delete</button></td>';
                        tr += '</tr>';
                        $('.user-table tbody').append(tr);
                    });
                }
            }
        }
    });
}

function deleteUser($id) {
    $.ajax({
        url: 'users/controller.php',
        type: 'post',
        data: {
            action: 'delete-user',
            id: $id
        },
        dataType: 'json',
        success: function (data) {
            if (!data.success) {
                $('.modal-body p').text(data.error);
                $('.modal-title').text('Oops!');
            } else {
                $('.modal-title').text('Congratulations!');
                $('.modal-body p').text(data.message);
                getUsers();
            }
            $('#messageModal').modal('show');
        }
    });
}