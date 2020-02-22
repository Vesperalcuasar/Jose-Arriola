/*jslint browser: true, devel: true */
/*global jQuery */

(function ($) {
    "use strict";

    var clock = 0;
    var machine = {
        totalBins: 0,
        startTime: 0,
        currentTime: 0,
        totalPounds: 0
    };

    //update form data based on global data settings
    function updateFormData(id) {
        var count = 0;
        var field = $("input[name=" + id + "]");
        var totalBins = $("input[name = 'total-bins']");
        var shellerPoundPerHour = $("input[name=sheller-pound-per-hour]");
        var tableClass = id.split("-pounds");
        tableClass = tableClass[0];
        $("table." + tableClass + " tbody tr").each(function () {
            count += parseFloat($(this).find("input").val());
        });
        field.val(count);
        machine.totalPounds += count;
        totalBins.val(machine.totalBins);
        if (parseFloat($("input[name=production-hours]").val()) >= 1) {
            shellerPoundPerHour.val(machine.totalPounds / parseFloat($("input[name=production-hours]").val()));
        }
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
        if (clock === 1) {
            $(".time").val(h + ":" + m + ":" + s);
            setTimeout(startTime, 1000);
            //update production minutes and hours fields continously
            machine.currentTime += 1;
            $("input[name=production-minutes]").val(parseFloat(machine.currentTime / 60).toFixed(2));
            $("input[name=production-hours]").val(parseFloat(machine.currentTime / 3600).toFixed(2));
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
        if (keycode === 13 && $(this).val() !== "") {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            machine.totalBins += 1;
            var time = h + ":" + m + ":" + s;
            var td = "<tr>";
            td += "<td>" + time + "</td>";
            td += "<td>";
            td += "<div class=\"user-input100 validate-input\">";
            td += "<input class=\"user-input\" readonly type=\"number\" value='" + $(this).val() + "' name=\"\">";
            td += "</div></td></tr>";
            $("table." + id + " tbody").append(td);
            updateFormData(id + "-pounds");
        }
    });
    //form submit for saving machine data in database using ajax call
    $("form#machine-form").on("submit", function (e) {
        e.preventDefault();
        var data = $("form#machine-form").serializeArray();
        $.ajax({
            url: "controller.php",
            type: "post",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
            }
        });
    });
}(jQuery));
