<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>เพิ่มประเภทพัสดุ</title>
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
    </head>

    <body>
        <?php
        include './nav.php';
        ?>


        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="usr"style="font-size: 18px">รหัสประเภท</label>
                        <input type="number" class="form-control" id="ID_type" name="ID_type" required>
                    </div>
                    <div class="form-group">
                        <label for="usr"style="font-size: 18px">ชื่อประเภท</label>
                        <input type="text" class="form-control" id="Name_type" name="Name_type" required>
                    </div>

                    <div class="form-group">

                        <input type="submit" class="btn btn-success" id="ok" name="ok" value="เพิ่มประเภทห้อง">
                    </div>

                </form>

            </div>
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
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
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

</body>

</html>
<?php
require './dbconnect.php';
if (!empty($_POST['ID_type'])) {
    if (!empty($_POST['Name_type'])) {


        $ID_type = $_POST['ID_type'];
        $Name_type = $_POST['Name_type'];
        $sql = "insert into typeroom value($ID_type,'$Name_type')";
        $q = mysqli_query($link, $sql);
        if ($q) {
            echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");</script>';
        } else {
            echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
        }
    }
}
?>