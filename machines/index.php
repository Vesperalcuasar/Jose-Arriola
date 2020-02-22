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
    <title>box</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include '../includes/css.php'; ?>
</head>
<body>

<div class="limiter">
    <div class="container-box100">
        <div class="wrap-box100">
            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <a href="form.php?machine=sheller">
                        <button class="box100-form-btn">
                            SHELLER
                        </button>
                    </a>
                </div>
            </div>

            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <a href="form.php?machine=sheller-bsi">
                        <button class="box100-form-btn">
                            Sheller BSI-LS 9000
                        </button>
                    </a>
                </div>
            </div>

            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <a href="form.php?machine=bsi-ls">
                        <button class="box100-form-btn">
                            BSI-LS 9000
                        </button>
                    </a>
                </div>
            </div>

            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <a href="form.php?machine=helius">
                        <button class="box100-form-btn">
                            Helius
                        </button>
                    </a>
                </div>
            </div>

            <div class="container-box100-form-btn">
                <div class="wrap-box100-form-btn">
                    <div class="box100-form-bgbtn"></div>
                    <a href="form.php?machine=packing-line">
                        <button class="box100-form-btn">
                            Packing Line
                        </button>
                    </a?
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div id="dropDownSelect1"></div>-->

<?php include '../includes/js.php' ?>
</body>
</html>