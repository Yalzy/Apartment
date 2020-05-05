<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>แก้ไขห้องพัก</title>
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
            $sql1 = "select * from room where ID_room = '$id'";
            $q1 = mysqli_query($link, $sql1);
            $n1 = mysqli_num_rows($q1);
            if ($n1 > 0) {
                foreach ($q1 as $value1) {
                    $id_room = $value1['ID_room'];
                    $type1 = $value1['Type'];
                    $price = $value1['Price'];
                    $Status1 = $value1['Status'];
                }
            }
        }
        ?>



        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <form action="system/update.php" method="post">
                    <div class="form-group">
                        <label for="usr">รหัสห้อง</label>
                        <input type="number" class="form-control" id="id_room" name="id_room" value="<?php echo $id_room; ?>" required>
                    </div>
                    <div class="form-group" >
                        <label for="pwd">ประเภท</label>
                        <select name="type1" id="type1" class="form-control" value="<?php echo $type1; ?>">
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
                    <div class="form-group" >
                        <label for="pwd">สถานะ</label>
                        <select name="status1" id="status1" class="form-control" value="<?php echo $status1; ?>">
                            <option value="1">ไม่ว่าง</option>
                            <option value="2">ว่าง</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usr">ราคาห้อง</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user" name="type" value="room" readonly required>
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
<div id="res"></div>
<script>

                            function edit() {
                                var id_room = $("#id_room").val();

                                var type1 = $("#type1").val();
                                var status1 = $("#status1").val();
                                var price = $("#price").val();
                                if (id_room !== "" && type1 !== "" && status1 !== "" && price !== "") {
                                    $.ajax({
                                        method: 'POST',
                                        url: 'system/update.php',
                                        data: 'type=room&id_room=' + id_room + "&type1=" + type1 + "&status1= " + status1 + "&price=" + price,
                                        success: function(data, textStatus, jqXHR) {
                                            $("#res").html(data);
                                        }
                                    });
                                } else {
                                    swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');
                                }
                            }



</script>
</body>

</html>
<?php
/*
  require './dbconnect.php';
  if (!empty($_POST['id_room'])) {
  if (!empty($_POST['room_name'])) {
  if (!empty($_POST['type'])) {
  if (!empty($_POST['price'])) {
  $id_room = $_POST['id_room'];
  $room_name = $_POST['room_name'];
  $type = $_POST['type'];
  $price = $_POST['price'];
  $status = $_POST['status'];
  $sql = "insert into room value('$id_room','$room_name','$type','$price','0')";
  $q = mysqli_query($link, $sql);
  if ($q) {
  echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
  } else {
  echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
  }
  }
  }

  }
  }
 */
?>