<?php
session_start();
if (file_exists('auth.php')) {
    include('auth.php');
} else {
    include('../auth.php');
}
$machineType = "";
if(isset($_GET["machine"])) {
    switch ($_GET["machine"]) {
        case "sheller":
            $machineType = "sheller";
            break;
        case "sheller-bsi":
            $machineType = "sheller-bsi";
            break;
        case "bsi-ls":
            $machineType = "bsi-ls";
            break;
        case "helius":
            $machineType = "helius";
            break;
        case "packing-line":
            $machineType = "packing-line";
            break;
        default :
            header("Location: ../dashboard");
    }
}
else {
    echo "go away";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sheller Selected</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <!--Includes Css files ===============================================================================================-->
    <?php include '../includes/css.php'; ?>
</head>
<body>
<form type="post" action="#" id="machine-form">
    <input class="input100" type="text" hidden name="action" value="save-machine">
    <div class="limiter">
        <div class="container-box100">
            <div class="wrap-seller">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5>Day Shift</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm">
                                <label>Starting time</label>
                            </div>
                            <div class="col-sm">
                                <button type="button" class="add-btn start-time">Starting</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label>Date</label>
                            </div>
                            <div class="col-sm">
                                <div class="user-input100 validate-input">
                                    <input class="user-input" value="<?php echo date('Y-m-d'); ?>" type="date"
                                           name="date" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label>Variety</label>
                            </div>
                            <div class="col-sm">
                                <div class="user-input100 validate-input">
                                    <input class="user-input" type="text" name="variety">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label>Lot # (if Available)</label>
                            </div>
                            <div class="col-sm">
                                <div class="user-input100 validate-input">
                                    <input class="user-input" type="text" name="lot-number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label>Total bins produced</label>
                            </div>
                            <div class="col-sm">
                                <div class="user-input100 validate-input">
                                    <input class="user-input" type="text" name="total-bins" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label>Production Minutes</label>
                            </div>
                            <div class="col-sm">
                                <div class="user-input100 validate-input">
                                    <input class="user-input" type="number" name="production-minutes" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label>Production Hours</label>
                            </div>
                            <div class="col-sm">
                                <div class="user-input100 validate-input">
                                    <input class="user-input" type="number" name="production-hours" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="row sheller-input1">
                            <div class="col-sm">
                                <label>Sheller Operator</label>
                            </div>
                            <div class="col-sm">
                                <div class="user-input100 validate-input">
                                    <input class="user-input sheller-input" type="text" placeholder="Name"
                                           name="sheller-operator-name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <button class="add-btn">Sheller Pound Per Hour</button>
                            </div>
                            <div class="col-sm">
                                <div class="user-input100 validate-input">
                                    <input class="user-input sheller-input" type="text" name="sheller-pound-per-hour"
                                           readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="row top-button">
                            <div class="col-12 text-right">
                                <?php if ((int)$_SESSION["user"]["is_admin"] === 1) { ?>
                                    <button class="add-btn">Edit</button>
                                <?php } ?>
                                <input type="submit" class="add-btn">
                                <button class="close-btn">Close</button>
                            </div>
                        </div>
                        <div class="row show-count">
                            Starting Time &nbsp;<input type="time" class="time" value="" readonly>
                        </div>
                        <div class="row left-section">
                            <div class="col-sm">
                                <button class="add-btn">Goal of the Day</button>
                            </div>
                            <div class="col-sm">
                                <div class="user-input100 validate-input">
                                    <input class="user-input" type="number" name="goal-of the day">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end first row -->
<!--                check the machine type and include respective pounds section-->
                <?php
                switch ($machineType) {
                    case "sheller":
                        include 'includes/sheller-pounds.php';
                        break;
                    case "sheller-bsi":
                    case "bsi-ls":
                    case "helius" :
                        include 'includes/product-size-with-four-columns.php';
                        break;
                    case "packing-line":
                        include 'includes/product-size-with-three-columns.php';
                        break;
                    default:
                        include 'includes/sheller-pounds.php';
                }
                ?>
                <div class="row bottom-button">
                    <div class="col-12 text-center">
                        <button class="add-btn">Edit</button>
                        <button class="add-btn">Save</button>
                        <a href="kernel-screen.html">
                            <button class="close-btn">Close</button>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="add-btn">Finish</button>
                    </div>
                </div>
            </div>
</form>

<div id="dropDownSelect1"></div>

<!--Include JSs files===============================================================================================-->
<?php include '../includes/js.php' ?>
</body>
</html>