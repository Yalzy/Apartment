<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>จัดการห้องพัก</title>
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
                            <h4 class="card-title"style="font-size: 20px">ข้อมูลห้องพัก</h4>
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID Room
                                            </th>

                                            <th>
                                                Type
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Other
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require './dbconnect.php';
                                        $sql = "select r.ID_room,t.Name_type,r.Price,r.`Status` from room r, typeroom t where r.type = t.ID_type";
                                        $q = mysqli_query($link, $sql);
                                        $n = mysqli_num_rows($q);
                                        if ($n > 0) {
                                            foreach ($q as $value) {
                                                if ($value['Status'] == '1')
                                                    $rstatus = 'ห้องไม่ว่าง';
                                                else
                                                    $rstatus = 'ห้องว่าง';
                                                echo "<tr>";
                                                echo "<td>" . $value['ID_room'] . "</td>";
                                                echo "<td>" . $value['Name_type'] . "</td>";
                                                echo "<td>" . $value['Price'] . "</td>";
                                                echo "<td>" . $rstatus . "</td>";
                                                echo "<td>";
                                                ?>
                                            <button class="btn btn-warning" style="margin: 5px;" onclick="location.href = 'editroom.php?id=<?php echo $value['ID_room']; ?>'">แก้ไข</button>
                                            <button class="btn btn-danger" onclick="deldata('<?php echo $value['ID_room']; ?>')">ลบ</button>
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
                                        function deldata(id) {
                                            swal("คุณแน่ใจ", "จะลบข้อมูลนี้", "error", {
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
                                                                    type: "room",
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
