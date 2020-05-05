<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ข้อมูลสมาชิก</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
        <link rel="stylesheet" href="./vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="images/thinking.png" />
    </head>

    <body>
        <?php
        include './nav.php';
        ?>
        <script>
            $(document).ready(function() {
                $("#datatable").dataTable({

                    "oLanguage": {

                        "sSearch": "ค้นหา:",
                        "sLengthMenu": 'โชว์ <select class="form-control">' +
                                '<option value="5">5</option>' +
                                '<option value="10">10</option>' +
                                '<option value="20">20</option>' +
                                '<option value="30">30</option>' +
                                '<option value="40">40</option>' +
                                '<option value="50">50</option>' +
                                '<option value="100">100</option>' +
                                '<option value="-1">All</option>' +
                                '</select> แถว',
                        "sLoadingRecords": "กำลังโหลด..."


                    }

                });
            }
            );
        </script>

        <!-- partial -->
        <div class="main-panel">

            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="font-size: 20px">ข้อมูลสมาชิก</h4>
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable" >
                                    <thead>
                                        <tr>

                                            <th style="text-align: center;" >
                                                Name
                                            </th>
                                            <th>
                                                ID Card
                                            </th>
                                            <th>
                                                AGE
                                            </th>
                                            <th>
                                                Gender
                                            </th>
                                            <th>
                                                Phone
                                            </th>
                                            <th>
                                                Address
                                            </th>
                                            <th>
                                                ID Room
                                            </th>
                                            <th style="text-align: center;">
                                                Other
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require './dbconnect.php';
                                        $sql = "select CONCAT(`Name`,' ',Lastname) fullname ,ID_Card,Age,Gender,Phone,Address,ID_Room,Id from member ";
                                        $q = mysqli_query($link, $sql);
                                        $n = mysqli_num_rows($q);
                                        if ($n > 0) {
                                            foreach ($q as $value) {
                                                if ($value['Gender'] == 'M')
                                                    $ag = 'เพศชาย';
                                                else
                                                    $ag = 'เพศหญิง';
                                                echo "<tr>";
                                                echo "<td>" . $value['fullname'] . "</td>";
                                                echo "<td>" . $value['ID_Card'] . "</td>";
                                                echo "<td>" . $value['Age'] . "</td>";
                                                echo "<td>" . $ag . "</td>";
                                                echo "<td>" . $value['Phone'] . "</td>";
                                                echo "<td>" . $value['Address'] . "</td>";
                                                echo "<td>" . $value['ID_Room'] . "</td>";
                                                echo "<td>";
                                                ?>
                                            <button class="btn btn-warning" style="margin: 5px;" onclick="location.href = 'editmember.php?id=<?php echo $value['Id']; ?>'">แก้ไข</button>
                                            <button class="btn btn-danger" onclick="deldata('<?php echo $value['Id']; ?>')">ลบ</button>
                                            <?php
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='11'>ไม่มีข้อมูล</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->
<div id="res"></div>
<script>
                                                function deldata(id) {
                                                    swal("คุณแน่ใจ", "จะลบข้อมูลนี้?", "error", {
                                                        buttons: {
                                                            cancel: "ยกเลิก",
                                                            catch : {
                                                                text: "ยืนยัน",
                                                                value: "con",
                                                            },
                                                        },
                                                    })
                                                            .then((value) => {
                                                                if (value === "con") {
                                                                    $.ajax({
                                                                        method: 'get',
                                                                        url: 'system/delete.php',
                                                                        data: {
                                                                            type: "member",
                                                                            id: id
                                                                        },
                                                                        success: function(data, textStatus, jqXHR) {
                                                                            $("#res").html(data);
                                                                        }
                                                                    });
                                                                }
                                                            });
                                                }

</script>

</body>

</html>
