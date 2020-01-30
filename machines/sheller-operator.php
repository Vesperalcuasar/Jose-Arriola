<?php
session_start();
if (file_exists('auth.php')) {
    include('auth.php');
} else {
    include('../auth.php');
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
                            <button class="add-btn start-time">Starting</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label>Date</label>
                        </div>
                        <div class="col-sm">
                            <div class="user-input100 validate-input">
                                <input class="user-input" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label>Variety</label>
                        </div>
                        <div class="col-sm">
                            <div class="user-input100 validate-input">
                                <input class="user-input" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label>Lot # (if Available)</label>
                        </div>
                        <div class="col-sm">
                            <div class="user-input100 validate-input">
                                <input class="user-input" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label>Total bins produced</label>
                        </div>
                        <div class="col-sm">
                            <div class="user-input100 validate-input">
                                <input class="user-input" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label>Production Minutes</label>
                        </div>
                        <div class="col-sm">
                            <div class="user-input100 validate-input">
                                <input class="user-input" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label>Production Hours</label>
                        </div>
                        <div class="col-sm">
                            <div class="user-input100 validate-input">
                                <input class="user-input" type="text" name="">
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
                                <input class="user-input sheller-input" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <button class="add-btn">Sheller Pound Per Hour</button>
                        </div>
                        <div class="col-sm">
                            <div class="user-input100 validate-input">
                                <input class="user-input sheller-input" type="text" name="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row top-button">
                        <div class="col-12 text-right">
                            <button class="add-btn">Edit</button>
                            <button class="add-btn">Save</button>
                            <a href="kernel-screen.html">
                                <button class="close-btn">Close</button>
                            </a>
                        </div>
                    </div>
                    <div class="row show-count">
                        Starting Time &nbsp;<input type="time" class="time" value="" readonly>
                    </div>
                    <div class="row left-section">
                        <div class="col-sm">
                            <button class="add-btn">Goal of tde Day</button>
                        </div>
                        <div class="col-sm">
                            <div class="user-input100 validate-input">
                                <input class="user-input" type="text" name="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end first row -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Pounds Per Hour</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>

                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>

                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="my-btn">Small& Pieces</button>
                                    </td>

                                    <td></td>
                                    <td>
                                        <button class="my-btn">Medium Pieces</button>
                                    </td>

                                    <td></td>
                                    <td>
                                        <button class="my-btn">Large Pieces</button>
                                    </td>

                                    <td></td>
                                    <td>
                                        <button class="my-btn">Halves and Pieces</button>
                                    </td>

                                    <td></td>
                                    <td>
                                        <button class="my-btn">Topping Pieces</button>
                                    </td>

                                    <td></td>
                                    <td>
                                        <button class="my-btn">Oil Stock</button>
                                    </td>

                                    <td></td>
                                    <td>
                                        <button class="my-btn">Blower Boxes</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>

                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>

                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td>07:00:00</td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="user-input100 validate-input">
                                            <input class="user-input" type="text" name="">
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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

        <div id="dropDownSelect1"></div>

        <!--Include JSs files===============================================================================================-->
        <?php include '../includes/js.php' ?>
</body>
</html>