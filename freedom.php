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
   
      
      <!-- partial -->
      <div class="main-panel">

        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Striped Table</h4>
                                    <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Id Card
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Username
                          </th>
                          <th>
                            Password
                          </th>
                          <th>
                            Sex
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
                            $sql = "select * from member";
                            $q = mysqli_query($link, $sql);
                            $n = mysqli_num_rows($q);
                            if ($n > 0)
                             {
                                foreach ($q as $value) {
                                    echo "<tr>";
                                    echo "<td>" . $value['Id'] . "</td>";
                                    echo "<td>" . $value['User'] . "</td>";
                                    echo "<td>" . $value['Password'] . "</td>";
                                    echo "<td>" . $value['Name'] . "</td>";
                                    echo "<td>" . $value['Lastname'] . "</td>";
                                    echo "<td>" . $value['Age'] . "</td>";
                                    echo "<td>" . $value['Phone'] . "</td>";
                                    echo "<td>" . $value['Address'] . "</td>";
                                    echo "<td>" . $value['Idcard'] . "</td>";
                                    echo "<td>" . $value['Level'] . "</td>";
                                    echo "<td>";
                                    ?>
                        <button class="btn btn-warning" style="margin: 5px;" onclick="location.href='edit_member.php?id=<?php echo $value['Id']; ?>'">แก้ไข</button>
                        <button class="btn btn-danger" onclick="if(confirm('คุณแน่ใจว่าจะลบข้อมูลนี้')){location.href='system/delete.php?id=<?php echo $value['Id']; ?>&type=member'}">ลบ</button>
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

</body>

</html>
