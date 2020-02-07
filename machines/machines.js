/*jslint browser: true, devel: true */
/*global jQuery */

(function ($) {
    "use strict";

    var clock = 0;


    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;  // add zero in front of numbers < 10
        }
        return i;
    }

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        setTimeout(startTime, 500);
        if (clock === 1) {
            $(".time").val(h + ":" + m + ":" + s);
        }
    }

    //enter key press event for input fields to generate dynamic rows
    $(".dynamic-inputs").keypress(function (event) {
        var keycode;
        var id = $(this).attr("id");
        if (event.keyCode) {
            keycode = event.keyCode;
        } else {
            keycode = event.which;
        }
        if (keycode === 13) {
            var td = "<tr>";
            td += "<td>07:00:00</td>";
            td += "<td>";
            td += "<div class=\"user-input100 validate-input\">";
            td += "<input class=\"user-input\" type=\"text\" name=\"\">";
            td += "</div></td></tr>";
            $("table." + id + " tbody").append(td);
        }
    });

    $(".start-time").click(function () {
        var name = $(this).text();
        if (name === "Starting" || name === "Resume") {
            $(".show-count").css("visibility", "visible");
            $(this).text("Pause");
            clock = 1;
            startTime();
        }
        if (name === "Pause") {
            $(".show-count").css("visibility", "visible");
            $(this).text("Resume");
            clock = 0;
            startTime();
        }
    });
}(jQuery));
