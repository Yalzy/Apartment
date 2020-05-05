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
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $sql1 = "select * from material where ID = '$id'";
            $q1 = mysqli_query($link, $sql1);
            $n1 = mysqli_num_rows($q1);
            if ($n1 > 0) {
                foreach ($q1 as $value1) {
                    $ID = $value1['ID'];
                    $ID_owner = $value1['ID_owner'];
                    $Date_Import = $value1['Date_Import'];
                    $Status = $value1['Status'];
                    $Date_recive = $value1['Date_recive'];
                }
            }
        }
        ?>



        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <form action="system/update.php" method="post">
                    <input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $ID; ?>" required>
                    <div class="form-group">
                        <label for="usr">รหัสบัตรประชาชน</label>
                        <input type="number" class="form-control" id="ID_owner" name="ID_owner" value="<?php echo $ID_owner; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="usr">วันที่นำเข้าพัสดุ</label>
                        <input type="date" class="form-control" id="Date_Import" name="Date_Import" value="<?php echo $Date_Import; ?>" required>
                    </div>
                    <div class="form-group" >
                        <label for="pwd">สถานะ</label>
                        <select name="Status" id="Status" class="form-control" value="<?php echo $Status; ?>">
                            <option value="1">ยังไม่ได้รับ</option>
                            <option value="2">รับ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usr">วันที่รับพัสดุ</label>
                        <input type="date" class="form-control" id="Date_recive" name="Date_recive" value="<?php echo $Date_recive; ?>">
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user" name="type" value="material" readonly required>
                        <input type="submit" class="btn btn-success" id="ok1" name="ok1" value="แก้ไข">
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
