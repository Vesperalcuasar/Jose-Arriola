<?php
session_start();
if(file_exists('auth.php')){
    include('auth.php');
}else{
    include('../auth.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include '../includes/css.php'; ?>
</head>
<body>

<div class="limiter">
    <div class="container-box100">
        <div class="wrap-box100">
            <?php if( (int)$_SESSION["user"]["is_admin"] === 0 ) { ?>
                <a href="../users/logout.php">Logout</a>
            <?php } ?>
            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <a href="../machines">
                        <button class="box100-form-btn">
                            KERNELS DAY SHIFT
                        </button>
                    </a>
                </div>
            </div>

            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <button class="box100-form-btn">
                        KERNELS NIGHT SHIFT
                    </button>
                </div>
            </div>

            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <button class="box100-form-btn">
                        IN-SHELL DAY SHIFT
                    </button>
                </div>
            </div>

            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <button class="box100-form-btn">
                        IN-SHELL NIGHT SHIFT
                    </button>
                </div>
            </div>

            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <a href="packing-report.html">
                        <button class="box100-form-btn">
                            SCREEN REPORT
                        </button>
                    </a>
                </div>
            </div>

            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <a href="sheller-report.html">
                        <button class="box100-form-btn">
                            Print Production Report
                        </button>
                    </a>
                </div>
            </div>

            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <button class="box100-form-btn">
                        Packing Schedule
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div id="dropDownSelect1"></div>-->
<?php include '../includes/js.php' ?>
</body>
</html>