<!DOCTYPE html>
<html ng-app lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>เพิ่มสมาชิก</title>
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

                $sql_se_one = "select * from facility";
                $que_se = mysqli_query($link, $sql_se_one);
                $data = mysqli_fetch_array($que_se);
                $water_price = $data['Water'];
                $electric_price = $data['electric'];
                ?>

                <!-- partial -->


                <div class="content-wrapper col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="forms-sample"  ng-app="myApp" ng-controller="myCtrl">
                                <div class="form-group" >
                                    <div class="form-group">
                                        <label for="exampleInputName1"style="font-size: 18px;">หมายเลขห้องพัก</label>
                                        <Select type="number" onchange="load_data_room(this.value)" class="form-control" id="idroom" name="idroom"  style="width: 90%;font-size: 14px"  required>
                                            <option>เลือกห้อง</option>
                                            <?php
                                            $sql_se_t = "select * from room where status = 1";
                                            $q_se = mysqli_query($link, $sql_se_t);
                                            $n = @mysqli_num_rows($q_se);
                                            if ($n > 0) {
                                                foreach ($q_se as $key) {
                                                    echo "<option value='" . $key['ID_room'] . "'>" . $key['ID_room'] . "</option>";
                                                }
                                            } else {
                                                echo "<option>ไม่มีข้อมูล</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1"style="font-size: 18px">ค่าห้องพัก</label>
                                        <input type="number" readonly="" onchange="calculate_room()" class="form-control" ng-model="room_price" id="room_price" style="width: 90%"  name="Electric_used"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1"style="font-size: 18px">ค่าน้ำ <span style="font-size: 0.7em;color: #737373"><?= $water_price ?> บาท/หน่วย</span></label>
                                        <input type="number" class="form-control" value="0" oninput="calculate_room()"  id="Water_used"  style="width: 90%" name="Water_used" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1"style="font-size: 18px">ค่าไฟ <span style="font-size: 0.7em;color: #737373"><?= $electric_price ?> บาท/หน่วย</span></label>
                                        <input type="number" class="form-control" value="0" oninput="calculate_room()" id="electric_used"  style="width: 90%" name="Water_used" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputName1"style="font-size: 18px">ค่าอื่นๆ</label>
                                        <input type="number" class="form-control" value="0" oninput="calculate_room()" id="other" name="other"  style="width: 90%"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1"style="font-size: 18px">หมายเหตุ</label>
                                        <input type="text" class="form-control" id="etc" name="etc"   style="width: 90%" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1"style="font-size: 18px">รวม</label>
                                        <input type="number" readonly class="form-control" id="total" value=""  style="width: 90%" name="totalp" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="line_id">
                                        <input type="hidden" id="idcard">
                                        <input type="button" class="btn btn-success" id="ok" name="ok" onclick="insert_payment()" value="เพิ่มข้อมูล">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>



            <div id="re"></div>
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
                                <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash < /a>. All rights reserved.<                                            /span >
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & ma                                                    de with
                                <i class="mdi mdi-heart text-danger"></i>
                    </span>
</div>
</footer>
partial
</d                                            iv>-->
            <!-- main-panel ends -->
        </div>
        <!--                                            page-body-wrapper ends -->
    </form>

    <script>

        function insert_payment(){
        var idroom = $("#idroom").val();
        var r = $("#room_price").val();
        var w = $("#Water_used").val();
        var e = $("#electric_used").val();
        var o = $("#other").val();
        var w_p = <?= $water_price ?>;
        var e_p =<?= $electric_price ?>;
        var total = $("#total").val();
        var idcard = $("#idcard").val();
        var etc = $("#etc").val();
        var line_id = $("#line_id").val();
        //alert(line_id);
        $.ajax({
        method: "POST",
                url: "system/insert.php",
                data: {type:"insert_payment",
                        idroom: idroom,
                        room_used: r,
                        water_used: w,
                        electric_used: e,
                        other: o,
                        water_price: w_p,
                        electric_price: e_p,
                        total:total,
                        idcard: idcard,
                        etc:etc,
                        line_id:line_id},
                success: function(data) {
                $("#re").html(data);
                }
        });
        }

        function calculate_room(){
        var r = $("#room_price").val();
        var w = $("#Water_used").val();
        var e = $("#electric_used").val();
        var o = $("#other").val();
        var w_p = <?= $water_price ?>;
        var e_p =<?= $electric_price ?>;
        var total = parseInt(r) + (parseInt(w) * parseInt(w_p)) + (parseInt(e) * parseInt(e_p)) + parseInt(o);
        $("#total").val(total);
        }


        function load_data_room(id) {
        $.ajax({
        method: "POST",
                url: "system/loaddata.php",
                data: "type=load_pay_ment_dataroom&id_room=" + id,
                success: function(data) {
                $("#re").html(data);
                }
        });
        }

    </script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./vendors/js/vendor.bundle.base.js"> < /script>
                                        <script src="./vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
<scr i pt src="./ j s/off-canvas.js"></script>
<script src="./js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->

</body>

</html>
