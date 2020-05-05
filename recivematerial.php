
<?php
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Star Admin Free Bootstrap-4 Admin Dashboard Template</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- plugins:css -->
        <link rel="stylesheet" href="./vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="./vendors/css/vendor.bundle.addons.css">
        <link rel="stylesheet" href="./vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->


        <!-- endinject -->

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css">
        <link href="css/style1.css" rel="stylesheet">

        <link rel="shortcut icon" href="./images/favicon.png" />
        <script>

            function confirm_recive(mid) {

                // alert(c);
                if (mid !== "") {
                    $.ajax({
                        method: "POST",
                        url: "update_ajax.php",
                        data: "key=update_material&mid=" + mid,
                        success: function(data) {
                            $("#res").html(data);
                        }
                    });
                }
            }
        </script>
    </head>

    <body>
        <?php
        include './nav.php';
        ?>


        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="page-header text-center">
                                <div class="container" style="text-align: center">
                                    <h1> QR Code scanner Example </h1>
                                    <br><br>

                                    <div id="qr" style="display: inline-block; width: 600px; height: 450px; border: 1px solid silver"></div>
                                    <br><br>

                                    <div class="row" style="align-self: center;">
                                        <button id="scan" class="btn btn-success btn-sm">start scaning</button>
                                        <button id="stop" class="btn btn-warning btn-sm disabled">stop scanning</button>
                                        <button id="change" class="btn btn-warning btn-sm disabled">change camera</button>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <code>Start Scanning</code> <span class="feedback"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="re"></div>
                        <div id="res"></div>
                        <!-- content-wrapper ends -->
                    </div>
                </div>
            </div>


            <!-- partial:./partials/_footer.php -->
            <footer class="footer">
                <div class="container-fluid clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
                        <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                        <i class="mdi mdi-heart text-danger"></i>
                    </span>
                </div>
            </footer>
            <!-- partial -->

            <!-- main-panel ends -->


            <!-- page-body-wrapper ends -->
        </div>


        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="./vendors/js/vendor.bundle.base.js"></script>
        <script src="./vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="./js/off-canvas.js"></script>
        <script src="./js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
        <script type="text/javascript" src="js/filereader.js"></script>
        <!-- Using jquery version: -->
        <!--
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/qrcodelib.js"></script>
            <script type="text/javascript" src="js/webcodecamjquery.js"></script>
            <script type="text/javascript" src="js/mainjquery.js"></script>
        -->
        <script src="./js/jquery.js"></script>
        <script src="./js/jsqrcode-combined.js"></script>
        <script src="./js/html5-qrcode.js"></script>
        <script>
            $(document).ready(function() {
                $("#scan").on('click', function() {
                    $("code").html('scanning');
                    $('#qr').html5_qrcode(function(data) {
                        // do something when code is read
                        // alert(data);
                        load_recive(data);
                    },
                            function(error) {
                                //show read errors
                                $(".feedback").html('Unable to scan the code! Error: ' + error)
                            }, function(videoError) {
                        //the video stream could be opened
                        $(".feedback").html('Video error');
                    }
                    );

                    $("#scan").addClass('disabled');
                    $("#stop").removeClass('disabled');
                    $("#change").removeClass('disabled');
                });
                $("#stop").on('click', function() {
                    $("#qr").html5_qrcode_stop();
                    $("code").html('Start Scanning');

                    $("#scan").removeClass('disabled');
                    $("#stop").addClass('disabled');
                    $("#change").addClass('disabled');
                });
                $("#change").on('click', function() {
                    $("#qr").html5_qrcode_changeCamera();

                    $("#scan").addClass('disabled');
                    $("#stop").removeClass('disabled');
                });
            });



            function load_recive(da) {
                $.ajax({
                    method: "POST",
                    url: "system/loaddata.php",
                    data: "type=load_recive_material&m_id=" + da,
                    success: function(data) {
                        $("#re").html(data);
                    }
                });
            }


        </script>

    </body>

</html>
