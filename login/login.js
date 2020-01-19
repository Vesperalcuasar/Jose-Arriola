$('form').submit(function (event) {
    event.preventDefault();
    var data = $('form#form-data').serializeArray();
    data.push({name: 'group_main_service', value: group_main_service});
    data.push({name: 'system_design', value: system_design});
    data.push({name: 'system_stresses_and_loads', value: system_stresses_and_loads});
    $.ajax({
        url: 'Controller.php',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function (data) {
            console.log(data);
        }
    });
});
