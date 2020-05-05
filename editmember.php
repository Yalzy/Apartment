<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>แก้ไขข้อมูลสมาชิก</title>
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
    </head>

    <body>
        <form action="system/update.php" method="post">
            <div class="container-scroller">
                <!-- partial:./partials/_navbar.html -->
                <?php
                include './nav.php';
                ?>

                <!-- partial -->
                <?php
                require './dbconnect.php';
                if (!empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql1 = "select * from member where Id = '$id'";
                    $q1 = mysqli_query($link, $sql1);
                    $n1 = mysqli_num_rows($q1);
                    if ($n1 > 0) {
                        foreach ($q1 as $value1) {
                            $user = $value1['User'];
                            $idcard = $value1['ID_Card'];
                            $fname = $value1['Name'];
                            $lname = $value1['Lastname'];
                            $age = $value1['Age'];
                            $gen = $value1['Gender'];
                            $idroom = $value1['ID_Room'];
                            $pass = $value1['Password'];
                            $phone = $value1['Phone'];
                            $level = $value1['Level'];
                            $address = $value1['Address'];
                            $Line_ID = $value1['Line_ID'];
                        }
                    }
                }
                ?>
                <div class="content-wrapper col-md-6 grid-margin stretch-card">


                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="usr"style="font-size: 18px">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control" id="user" name="user" value="<?php echo $user; ?>" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="usr"style="font-size: 18px">รหัสบัตรประชาชน</label>
                                <input type="number" class="form-control" id="idcard" name="idcard" value="<?php echo $idcard; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usr"style="font-size: 18px">Line</label>
                                <input type="text" class="form-control" id="Line_ID" style="width: 50%" name="Line_ID" value="<?php echo $Line_ID; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usr"style="font-size: 18px">ชื่อ</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usr"style="font-size: 18px">นามสกุล</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usr"style="font-size: 18px">อายุ</label>
                                <input type="number" class="form-control" id="age" name="age" value="<?php echo $age; ?>" required>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="content-wrapper col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="forms-sample">
                                <div class="form-group" >
                                    <label for="pwd">เพศ</label>
                                    <select name="gen" id="gen" value="<?= $gen; ?>" class="form-control">
                                        <option value="M">เพศชาย</option>
                                        <option value="F">เพศหญิง</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pwd"style="font-size: 18px">หมายเลขห้องพัก</label>
                                    <select class="form-control" id="idroom"  name="idroom" value="<?php echo $idroom; ?>">
                                        <?php
                                        $sql_se_t = "select * from room where Status = 2";
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
                                    <label for="pwd"style="font-size: 18px">เบอร์โทรศัพท์</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
                                </div>
                                <div class="form-group" >
                                    <label for="pwd" style="font-size: 18px">ระดับผู้ใช้งาน</label>
                                    <select name="level" id="level" class="form-control" value="<?php echo $level; ?>">
                                        <option value="A">แอดมิน</option>
                                        <option value="B">ผู้ใช้งาน</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pwd"style="font-size: 18px">ที่อยู่</label>
                                    <textarea  class="form-control" id="address" placeholder="กรอกที่อยู๋"  name="address" required><?php echo $address; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="user" name="type" value="member" readonly required>
                                    <input type="button" class="btn btn-success" id="ok" name="ok" onclick="edit()"value="แก้ไขข้อมูล">
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- content-wrapper ends -->
                <!-- partial:./partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
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
        <div id="res"></div>
        <script>

                                        function edit() {
                                            var user = $("#user").val();
                                            var idcard = $("#idcard").val();
                                            var Line_ID = $("#Line_ID").val();
                                            var fname = $("#fname").val();
                                            var lname = $("#lname").val();
                                            var age = $("#age").val();
                                            var gen = $("#gen").val();
                                            var phone = $("#phone").val();
                                            var level = $("#level").val();
                                            var address = $("#address").val();

                                            if (user !== "" && idcard !== "" && Line_ID !== "" && fname !== "" && lname !== "" && age !== "" && gen !== "" && phone !== "" && level !== "" && address !== "") {
                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'system/update.php',
                                                    data: 'type=member&user=' + user + "&idcard=" + idcard + "&Line_ID=" + Line_ID + "&fname=" + fname + "&lname=" + lname + "&age=" + age + "&gen=" + gen + "&phone=" + phone + "&level=" + level + "&address=" + address,
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
