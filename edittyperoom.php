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
            $sql1 = "select * from typeroom where ID_type = '$id'";
            $q1 = mysqli_query($link, $sql1);
            $n1 = mysqli_num_rows($q1);
            if ($n1 > 0) {
                foreach ($q1 as $value1) {
                    $ID_type = $value1['ID_type'];
                    $Name_type = $value1['Name_type'];
                }
            }
        }
        ?>



        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <form action="system/update.php" method="post">
                    <div class="form-group">
                        <label for="usr">รหัสประเภท</label>
                        <input type="number" class="form-control" id="ID_type" name="ID_type" value="<?php echo $ID_type; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="usr">ชื่อประเภท</label>
                        <input type="text" class="form-control" id="Name_type" name="Name_type" value="<?php echo $Name_type; ?>" required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user" name="type" value="roomtype" readonly required>
                        <input type="button" class="btn btn-success" id="ok" name="ok" onclick="edit()" value="แก้ไข">
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
<div id="res"></div>
<!-- container-scroller -->
<!-- plugins:js -->
<script>

    function edit() {
        var id_type = $("#ID_type").val();
        var name_type = $("#Name_type").val();
        if (id_type !== "" && name_type !== "") {
            $.ajax({
                method: 'POST',
                url: 'system/update.php',
                data: 'type=roomtype&ID_type=' + id_type + "&Name_type=" + name_type,
                success: function(data, textStatus, jqXHR) {
                    $("#res").html(data);
                }
            });
        } else {
            swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');
        }
    }



</script>
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
