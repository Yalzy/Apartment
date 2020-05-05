<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Star Admin Free Bootstrap-4 Admin Dashboard Template</title>
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

        <?php
        require './dbconnect.php';


        $sql1 = "select * from facility";
        $q1 = mysqli_query($link, $sql1);
        $n1 = mysqli_num_rows($q1);
        if ($n1 > 0) {
            foreach ($q1 as $value1) {
                $Water = $value1['Water'];
                $electric = $value1['electric'];
            }
        }
        ?>



        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="usr"style="font-size: 18px">ค่าน้ำ</label>
                        <input type="number" class="form-control"style="font-size: 18px" id="Water" name="Water" value="<?php echo $Water; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="usr"style="font-size: 18px">ค่าไฟฟ้า</label>
                        <input type="number" class="form-control" style="font-size: 18px"id="electric" name="electric" value="<?php echo $electric; ?>" required>
                    </div>

                    <div class="form-group">

                        <input type="submit" class="btn btn-success" id="ok" name="ok" value="แก้ไข">
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
if (!empty($_POST['Water'])) {
    if (!empty($_POST['electric'])) { {
            $Water = $_POST['Water'];
            $electric = $_POST['electric'];
            $sql2 = "update facility set Water = $Water ,electric = $electric";
            $q2 = mysqli_query($link, $sql2);
            if ($q2) {
                echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");</script>';
            } else {
                echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
            }
        }
    }
}
?>