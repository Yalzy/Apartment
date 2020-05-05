<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>เพิ่มสมาชิก</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="./vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="./vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->


        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="./css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="images/thinking.png" />
        <style >







        </style>>
    </head>

    <body>
        <form  action="" method="post">
            <div class="container-scroller">
                <!-- partial:./partials/_navbar.html -->
                <?php
                include_once './nav.php';
                require './dbconnect.php';
                ?>

                <!-- partial -->


                <div class="content-wrapper col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="forms-sample">
                                <div class="form-group" >
                                    <label for="exampleInputName1" class="font-text" style="font-size: 18px">ชื่อผู้ใช้งาน</label>
                                    <input type="text" class="form-control" id="user" style="width: 90%"  name="user"  required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1"style="font-size: 18px">รหัสบัตรประชาชน</label>
                                    <input type="number" class="form-control" id="idcard" style="width: 90%"  name="idcard" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1"style="font-size: 18px">Line</label>
                                    <input type="text" class="form-control" id="Line_ID" style="width: 90%" name="Line_ID" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1"style="font-size: 18px">ชื่อ</label>
                                    <input type="text" class="form-control" id="fname" style="width: 90%" name="fname" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1"style="font-size: 18px">นามสกุล</label>
                                    <input type="text" class="form-control" id="lname" style="width: 90%" name="lname" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1"style="font-size: 18px">อายุ</label>
                                    <input type="number" class="form-control" id="age"  style="width: 90%" name="age" required>
                                </div>
                                <div class="form-group" >
                                    <label for="exampleInputName1"style="font-size: 18px">เพศ</label>
                                    <select name="gen" id="gen" class="form-control"  style="width: 90%;font-size: 18px" >
                                        <option value="M">เพศชาย</option>
                                        <option value="F">เพศหญิง</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1"style="font-size: 18px">หมายเลขห้องพัก</label>
                                    <Select type="number" class="form-control" id="idroom" name="idroom"  style="width: 90%;font-size: 14px"  required>
                                        <?php
                                        $sql_se_t = "select * from room where status = 2";
                                        $q_se = mysqli_query($link, $sql_se_t);
                                        $n = @mysqli_num_rows($q_se);
                                        if ($n > 0) {
                                            foreach ($q_se as $key) {
                                                echo "<option value='" . $key['ID_room'] . "'>" . $key['Room_name'] . "</option>";
                                            }
                                        } else {
                                            echo "<option>ไม่มีข้อมูล</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1"style="font-size: 18px">รหัสผ่าน</label>
                                    <input type="password" class="form-control" id="pass" name="pass"  style="width: 90%"  required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1"style="font-size: 18px">ยืนยันรหัสผ่าน</label>
                                    <input type="password" class="form-control" id="cpass" name="cpass"   style="width: 90%" required>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-wrapper col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputName1"style="font-size: 18px">เบอร์โทรศัพท์</label>
                                    <input type="number" class="form-control" id="phone" name="phone" style="width: 90%"  required>
                                </div>
                                <div class="form-group" >
                                    <label for="exampleInputName1"style="font-size: 18px">ระดับผู้ใช้งาน</label>
                                    <select name="level" id="level" class="form-control" style="width: 90%;;font-size: 14px" >
                                        <option value="A">แอดมิน</option>
                                        <option value="B">ผู้ใช้งาน</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1"style="font-size: 18px">ที่อยู่</label>
                                    <textarea  class="form-control" id="address" placeholder="กรอกที่อยู๋" name="address"  style="width: 90%"  required></textarea>
                                </div>

                                <div class="form-group">

                                    <input type="submit" class="btn btn-success" id="ok" name="ok" value="สมัครสมาชิก">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!--            <div class="main-panel" style="float: center">
                                <div class="content-wrapper col-md-6 stretch-card">
                                    <form action="" method="post" class="forms-sample">


                                    </form>
                                </div>

                                 content-wrapper ends
                                 partial:./partials/_footer.html
                                <footer class="footer">
                                    <div class="container-fluid clearfix">
                                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
                                            <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                                            <i class="mdi mdi-heart text-danger"></i>
                                        </span>
                                    </div>
                                </footer>
                                 partial
                            </div>-->
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </form>
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
if (!empty($_POST['user'])) {
    if (!empty($_POST['idcard'])) {
        if (!empty($_POST['fname'])) {
            if (!empty($_POST['lname'])) {
                if (!empty($_POST['age'])) {
                    if (!empty($_POST['pass'])) {
                        if (!empty($_POST['cpass'])) {
                            if (!empty($_POST['address'])) {
                                if (!empty($_POST['phone'])) {
                                    if (!empty($_POST['idroom'])) {
                                        if (!empty($_POST['level'])) {
                                            if (!empty($_POST['Line_ID'])) {
                                                $user = $_POST['user'];
                                                $idcard = $_POST['idcard'];
                                                $fname = $_POST['fname'];
                                                $lname = $_POST['lname'];
                                                $age = $_POST['age'];
                                                $pass = $_POST['pass'];
                                                $cpass = $_POST['cpass'];
                                                $phone = $_POST['phone'];
                                                $level = $_POST['level'];
                                                $address = $_POST['address'];
                                                $idroom = $_POST['idroom'];
                                                $gen = $_POST['gen'];
                                                $Line_ID = $_POST['Line_ID'];

                                                if ($pass == $cpass) {
                                                    try {
                                                        $sql = "insert into member value(null,'$user','$pass','$fname','$lname','$age','$gen','$phone','$address','$idcard','$idroom','$level','$Line_ID')";
                                                        $q = mysqli_query($link, $sql);
                                                        if ($q) {
                                                            $sql1 = "update room set Status = 1 where ID_room = $idroom";
                                                            mysqli_query($link, $sql1);
                                                            echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");</script>';
                                                        } else {
                                                            echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
                                                        }
                                                    } catch (Exception $e) {
                                                        echo "<script>alert('$e');</script>";
                                                    }
                                                } else {
                                                    echo "<script>alert('รหัสผ่านไม่ตรงกัน');</script>";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>