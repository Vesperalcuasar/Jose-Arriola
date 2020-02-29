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
    //get URL machine parameter
    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split("&");
        var sParameterName;
        var i;

        for (i = 0; i < sURLVariables.length; i += 1) {
            sParameterName = sURLVariables[i].split("=");

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined
                    ? true
                    : decodeURIComponent(sParameterName[1]);
            }
        }
    }
    machine.machineType = getUrlParameter("machine");

    //update form data based on global data settings
    function updateFormData(id) {
        var count = 0;
        var offGradeBins = 0;
        var totalPallets = 0;
        var field = $("input[name=" + id + "]");
        var totalBins = $("input[name = 'total-bins']");
        var offGradeBinsField = $("input[name = 'off-grade-bins']");
        var totalPalletsField = $("input[name = 'total-pallets']");
        var shellerPoundPerHour = $("input[name=pounds-per-hour]");
        var tableClass = id.split("-pounds");
        tableClass = tableClass[0];
        $("table." + tableClass + " tbody tr").each(function () {
            count += parseFloat($(this).find("input").val());
            //count off grade bins numbers
            if ((machine.machineType === "sheller-bsi" || machine.machineType === "bsi-ls" || machine.machineType === "helius") && tableClass !== "accepts") {
                offGradeBins += parseFloat($(this).find("input").val());
            }
            //count total pallets number for Packing line machine
            if (machine.machineType === "packing-line" && tableClass === "pallet-weight") {
                totalPallets += parseFloat($(this).find("input").val());
            }
            //count off grades number for packing line machine
            if ((machine.machineType === "packing-line") && tableClass === "blower-box") {
                offGradeBins += parseFloat($(this).find("input").val());
            }
        });
        field.val(count);
        machine.totalPounds += count;
        totalBins.val(machine.totalBins);
        //update off grade bin field
        if ((machine.machineType === "sheller-bsi" || machine.machineType === "bsi-ls" || machine.machineType === "helius") && tableClass !== "accepts") {
            offGradeBinsField.val(offGradeBins);
        }
        //update off grade bin field for packing line machine
        if (machine.machineType === "packing-line" && tableClass === "blower-box") {
            offGradeBinsField.val(offGradeBins);
        }
        //update total pallets for packing line machine
        if (machine.machineType === "packing-line" && tableClass === "pallet-weight") {
            totalPalletsField.val(totalPallets);
        }
        //calculate total pounds per hour
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
            $("table." + id).addClass("non-empty");
            updateFormData(id + "-pounds");
        }
    });
    //form submit for saving machine data in database using ajax call
    $(".save-data").on("click", function () {
        $(".loader").show();
        $(".save-data").attr("disabled", true);
        $(".save-data, .edit-btn").hide();
        $(".main-container").css({"opacity": "0.5"});
        var data = [];
        var pounds = [];
        $(".dynamic-tables.non-empty").each(function (ind) {
            var table = $(this).attr("class").split(" ")[1];
            var tr = $(this).find("tr");
            if (tr.length > 0) {
                pounds.push({table: []});
                var count = 0;
                $(this).find("tr").each(function () {
                    var date = $(this).find("td").first().text();
                    var value = parseFloat($(this).find("td").last().find("input").val());
                    count += value;
                    pounds[ind].table.total = count;
                    pounds[ind].table.name = table;
                    pounds[ind].table.push({date: date, value: value});
                });
            }
        });
        data.push({
            pounds: JSON.stringify(pounds),
            date: $("input[name='date']").val(),
            productType: $("input[name='product-type']").val(),
            variety: $("input[name='variety']").val(),
            lotNumber: $("input[name='lot-number']").val(),
            totalPallets: $("input[name='total-pallets']").val(),
            totalBins: $("input[name='total-bins']").val(),
            offGradeBins: $("input[name='off-grade-bins']").val(),
            caseWeight: $("input[name='case-weight']").val(),
            productionMinutes: $("input[name='production-minutes']").val(),
            productionHours: $("input[name='production-hours']").val(),
            name: $("input[name='name']").val(),
            poundsPerHour: $("input[name='pounds-per-hour']").val(),
            goalOfTheDay: $("input[name='goal-of the day']").val(),
            machineType: $("input[name='machine-type']").val(),
            action: $("input[name='action']").val()
        });
        $.ajax({
            url: "controller.php",
            type: "post",
            data: {data: data},
            dataType: "json",
            success: function (data) {
                $(".main-container").css({"opacity": "1"});
                $(".loader").hide();
                if (!data.success) {
                    $(".modal-body p").text(data.error);
                    $(".modal-title").text("Oops!");
                } else {
                    $(".modal-title").text("Congratulations!");
                    $(".modal-body p").text(data.message);
                }
                $("#messageModal").modal("show");
            }
        });
    });
}(jQuery));
