<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>นำเข้าพัสดุ</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="./vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="./vendors/css/vendor.bundle.addons.css">
        <link rel="stylesheet" href="./vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
        <!-- endinject -->
        <!-- plugin css for this page -->


        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="./css/style.css">
        <!-- endinject -->

        <link rel="shortcut icon" href="./images/favicon.png" />

        <script>
            function lightbg_clr() {
                $('#qu').val("");
                $('#textbox-clr').text("");
                $('#search-layer').css({"width": "auto", "height": "auto"});
                $('#livesearch').css({"display": "none"});
                $("#qu").focus();
            }
            ;

            function fx(str)
            {
                var s1 = document.getElementById("qu").value;
                var xmlhttp;
                if (str.length == 0) {
                    document.getElementById("livesearch").innerHTML = "";
                    document.getElementById("livesearch").style.border = "0px";
                    document.getElementById("search-layer").style.width = "auto";
                    document.getElementById("search-layer").style.height = "auto";
                    document.getElementById("livesearch").style.display = "block";
                    $('#textbox-clr').text("");
                    return;
                }
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
                        document.getElementById("search-layer").style.width = "100%";
                        document.getElementById("search-layer").style.height = "100%";
                        document.getElementById("livesearch").style.display = "block";
                        $('#textbox-clr').text("X");
                    }
                }
                xmlhttp.open("GET", "system/search_user.php?n=" + s1, true);
                xmlhttp.send();
            }
        </script>


    </head>

    <body onload="init()">
        <?php
        include './nav.php';
        ?>


        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">


                    <div class="col-lg-6 ">
                        <div class="form-group">
                            <form action="search.php" method="get">
                                <div class="bk">
                                    <input type="text" onKeyUp="fx(this.value)" autocomplete="off" name="qu" id="qu" class="textbox" placeholder="ค้นหาจาก ชื่อ เบอร์ " tabindex="1">
                                    <button type="button" class="textbox-clr" id="textbox-clr" onClick="lightbg_clr()"></button>
                                    <button type="submit" class="query-submit" tabindex="2"><i class="fa fa-search" style="color:#727272; font-size:20px"></i></button>
                                    <div id="livesearch"></div>
                                </div>
                            </form>
                        </div>
                        <div class="form-group">
                            <label for="usr">รหัสบัตรประชาชน</label>
                            <input type="number" class="form-control" id="ID_owner" name="ID_owner" required>
                        </div>
                        <div class="form-group">
                            <label for="usr">ชื่อ</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="usr">ห้อง</label>
                            <input type="text" class="form-control" id="room" name="room" required>
                        </div>


                        <div class="form-group" >

                        </div>
                        <div class="form-group">
                            <input type="hidden" id="token_m" >
                            <input type="hidden" id="line_id" >
                            <input type="button" class="btn btn-success" id="ok" name="ok" onclick="insert_material()" value="เพิ่มพัสดุ">
                        </div>

                        <canvas  id="qr-code" width="350" height="350"></canvas>


                    </div>
                    <div class="col-lg-6 ">
                        <div >
                            <button onclick="startWebcam();" class="btn btn-success mr-2">Start WebCam</button>
                            <button onclick="stopWebcam();" class="btn btn-danger mr-2">Stop WebCam</button>
                            <button onclick="snapshot();">Take Snapshot</button>
                            <button onclick="save_img();">Save</button>
                        </div>
                        <div >
                            <video onclick="snapshot(this);" width=350 height=350 id="video" controls autoplay></video>

                            <canvas  id="myCanvas"></canvas>
                        </div>

                    </div>




                    <!--                <div class="form-group">
                                        <label for="usr">รหัสบัตรประชาชน</label>
                                        <input type="number" class="form-control" id="ID_owner" name="ID_owner" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="usr">วันที่รับพัสดุ</label>
                                        <input type="date" class="form-control" id="Date_Import" name="Date_Import" required>
                                    </div>

                                    <div class="form-group" >

                                    </div>
                                    <div class="form-group">

                                        <input type="submit" class="btn btn-success" id="ok" name="ok" value="เพิ่มพัสดุ">
                                    </div>-->



                    <!-- content-wrapper ends -->
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
                </div>
            </div>
        </div>

        <div id="res"></div>
        <!-- main-panel ends -->

        <!-- container-scroller -->
        <!-- plugins:js -->

        <script>


            function insert_material() {
                var id_card = $("#ID_owner").val();
                if (id_card !== "") {
                    $.ajax({
                        method: 'POST',
                        url: 'system/insert.php',
                        data: 'type=addmaterial&ID_owner=' + id_card,
                        success: function(data, textStatus, jqXHR) {
                            $("#res").html(data);
                            var d = $("#token_m").val();
                            redrawQrCode("qr-code", d, "6");
                            save_img_qr();
                        }
                    });
                } else {
                    swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');
                }

            }

            function set_value(id_card, name, room, line_id) {
                $("#ID_owner").val(id_card);
                $("#name").val(name);
                $("#room").val(room);
                $("#line_id").val(line_id);
                $("#qu").val("");
                fx("");
            }
            //  swal("Good job!", "You clicked the button!", "success");

            function save_img_qr() {
                var canvas = document.getElementById('qr-code');
                var context = canvas.getContext('2d');

                var lid = $("#line_id").val();
                var token_img = $("#token_m").val();
                var dataURL = canvas.toDataURL('image/png');
                $.ajax({
                    method: "POST",
                    url: "system/save_qrcode.php",
                    data: {'photo': dataURL, token: token_img, line_id: lid},
                    success: function(data, textStatus, jqXHR) {
                        $("#res").html(data);
                        // $("#myCanvas").hide();
                    }
                });
            }

            function save_img() {
                var canvas = document.getElementById('myCanvas');
                var context = canvas.getContext('2d');

                var token_img = $("#token_m").val();
                var dataURL = canvas.toDataURL('image/png');
                $.ajax({

                    method: "POST",
                    url: "system/save_img.php",
                    data: {'photo': dataURL, token: token_img},
                    success: function(data, textStatus, jqXHR) {
                        $("#res").html(data);
                        $("#myCanvas").hide();
                    }
                });
            }

//            function save_img_token(url) {
//                var token_img = $("#token_img").val();
//                $.ajax({
//
//                    method: "POST",
//                    url: "system/save_img.php",
//                    data: "url=" + url + "&token=" + token_img,
//                    success: function(data, textStatus, jqXHR) {
//                        $("#res").html(data);
//                    }
//                });
//            }
        </script>


        <script>
            //--------------------
            // GET USER MEDIA CODE
            //--------------------
            navigator.getUserMedia = (navigator.getUserMedia ||
                    navigator.webkitGetUserMedia ||
                    navigator.mozGetUserMedia ||
                    navigator.msGetUserMedia);

            var video;
            var webcamStream;

            function startWebcam() {
                if (navigator.getUserMedia) {
                    navigator.getUserMedia(
                            // constraints
                                    {
                                        video: true,
                                        audio: false
                                    },
                                    // successCallback
                                            function(localMediaStream) {
                                                video = document.querySelector('video');
                                                video.src = window.URL.createObjectURL(localMediaStream);
                                                webcamStream = localMediaStream;
                                            },
                                            // errorCallback
                                                    function(err) {
                                                        console.log("The following error occured: " + err);
                                                    }
                                            );
                                        } else {
                                    console.log("getUserMedia not supported");
                                }
                            }

                    function stopWebcam() {
                        webcamStream.stop();
                    }
                    //---------------------
                    // TAKE A SNAPSHOT CODE
                    //---------------------
                    var canvas, ctx;

                    function init() {
                        // Get the canvas and obtain a context for
                        // drawing in it
                        canvas = document.getElementById("myCanvas");
                        ctx = canvas.getContext('2d');
                    }

                    function snapshot() {
                        // Draws current image from the video element into the canvas
                        $("#myCanvas").show();
                        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    }




        </script>
        <script src="./vendors/js/vendor.bundle.base.js"></script>
        <script src="./vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <!--<script src="./js/off-canvas.js"></script>-->
        <script src="./js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
    </body>

</html>
<?php
require './dbconnect.php';
if (!empty($_POST['ID_owner'])) {
    if (!empty($_POST['Date_Import'])) {

        $ID_owner = $_POST['ID_owner'];
        $Date_Import = $_POST['Date_Import'];
        $sql = "insert into material value(null,'$ID_owner','$Date_Import',1,null)";
        $q = mysqli_query($link, $sql);
        if ($q) {
            echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
        } else {
            echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
        }
    }
}
?>