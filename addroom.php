<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>เพิ่มห้องพัก</title>
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
        require './dbconnect.php';
        ?>


        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="usr"style="font-size: 18px">รหัสห้อง</label>
                        <input type="number" class="form-control" id="id_room" name="id_room" required>
                    </div>

                    <div class="form-group" >
                        <label for="pwd"style="font-size: 18px">ประเภท</label>
                        <select name="Type" id="Type" class="form-control"style="font-size: 18px">
                            <?php
                            $sql_se_t = "select * from typeroom";
                            $q_se = mysqli_query($link, $sql_se_t);
                            $n = @mysqli_num_rows($q_se);
                            if ($n > 0) {
                                foreach ($q_se as $key) {
                                    echo "<option value='" . $key['ID_type'] . "'>" . $key['Name_type'] . "</option>";
                                }
                            } else {
                                echo "<option>ไม่มีข้อมูล</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usr"style="font-size: 18px">ราคาห้อง</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="form-group" >

                    </div>
                    <div class="form-group">

                        <input type="submit" class="btn btn-success" id="ok" name="ok" value="เพิ่มห้อง">
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
if (!empty($_POST['id_room'])) {
    if (!empty($_POST['Type'])) {
        if (!empty($_POST['price'])) {
            $id_room = $_POST['id_room'];
            $Type = $_POST['Type'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $sql = "insert into room value('$id_room','$Type','$price','')";
            $sql2 = "update room set Status = 2 Where ID_room = $id_room";
            $q = mysqli_query($link, $sql);
            $q2 = mysqli_query($link, $sql2);
            if ($q) {
                echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");</script>';
            } else {
                echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
            }
        }
    }
}
?>