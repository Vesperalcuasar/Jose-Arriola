/*jslint browser: true, devel: true */
/*global jQuery */

(function ($) {
    "use strict";

    var clock = 0;
    var machine = {
        totalBins: 0,
        startTime: 0,
        currentTime: 0
    };

    //update form data based on global data settings
    function updateFormData() {
        var count = 0;
        var totalPounds = 0;
        var totalBins = $("input[name = 'total-bins']");
        var poundsSmallPieces = $("input[name=small-pieces-pounds]");
        var poundsMediumPieces = $("input[name=medium-pieces-pounds]");
        var poundsLargerPieces = $("input[name=large-pieces-pounds]");
        var poundsHalvesPieces = $("input[name=halves-pieces-pounds]");
        var poundsToppingPieces = $("input[name=topping-pieces-pounds]");
        var poundsOilStock = $("input[name=oil-stock-pounds]");
        var poundsBlowerBoxes = $("input[name=blower-boxes-pounds]");
        var shellerPoundPerHour = $("input[name=sheller-pound-per-hour]");
        $("table.small-pieces tbody tr").each(function () {
            count += parseFloat($(this).find("input").val());
        });
        poundsSmallPieces.val(count);
        totalPounds += count;
        count = 0;
        $("table.medium-pieces tbody tr").each(function () {
            count += parseFloat($(this).find("input").val());
        });
        poundsMediumPieces.val(count);
        totalPounds += count;
        count = 0;
        $("table.large-pieces tbody tr").each(function () {
            count += parseFloat($(this).find("input").val());
        });
        poundsLargerPieces.val(count);
        totalPounds += count;
        count = 0;
        $("table.halves-pieces tbody tr").each(function () {
            count += parseFloat($(this).find("input").val());
        });
        poundsHalvesPieces.val(count);
        totalPounds += count;
        count = 0;
        $("table.topping-pieces tbody tr").each(function () {
            count += parseFloat($(this).find("input").val());
        });
        poundsToppingPieces.val(count);
        totalPounds += count;
        count = 0;
        $("table.oil-stock tbody tr").each(function () {
            count += parseFloat($(this).find("input").val());
        });
        poundsOilStock.val(count);
        count = 0;
        $("table.blower-boxes tbody tr").each(function () {
            count += parseFloat($(this).find("input").val());
        });
        poundsBlowerBoxes.val(count);
        totalBins.val(machine.totalBins);
        if (parseFloat($("input[name=production-hours]").val()) >= 1) {
            shellerPoundPerHour.val(totalPounds / parseFloat($("input[name=production-hours]").val()));
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
            updateFormData();
        }
    });

    //initialize settings
    updateFormData();
}(jQuery));
