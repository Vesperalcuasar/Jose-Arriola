/*jslint browser: true, devel: true */
/*global jQuery */

(function ($) {
    "use strict";

    var clock = 0;
    var machine = {
        totalBins: 0
    };

    //update form data based on global data settings
    function updateFormData() {
        var totalBins = $("input[name = 'total-bins']");
        totalBins.val(machine.totalBins);
    }

    //formatting time with additional 0 digit
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;  // add zero in front of numbers < 10
        }
        return i;
    }
    // start a timer
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
    //start timer on right side starting from current time once user clicked on start button
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
            machine.totalBins += 1;
            updateFormData();
            var td = "<tr>";
            td += "<td>07:00:00</td>";
            td += "<td>";
            td += "<div class=\"user-input100 validate-input\">";
            td += "<input class=\"user-input\" type=\"text\" name=\"\">";
            td += "</div></td></tr>";
            $("table." + id + " tbody").append(td);
        }
    });

    //initialize settings
    updateFormData();
}(jQuery));
