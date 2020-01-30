var clock = 0;
$(document).ready(function () {
    $('.start-time').click(function () {
        var name = $(this).text();
        if (name == "Starting" || name == "Resume") {
            $('.show-count').css('visibility', 'visible');
            $(this).text('Pause')
            clock = 1;
            startTime();
        }

        if (name == "Pause") {
            $('.show-count').css('visibility', 'visible');
            $(this).text('Resume')
            clock = 0;
            startTime();
        }
    });
});

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    var t = setTimeout(startTime, 500);
    if (clock == 1) {
        $('.time').val(h + ":" + m + ":" + s);
    }


}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    }
    ;  // add zero in front of numbers < 10
    return i;
}