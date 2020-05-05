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
            $idcard = $value1['Idcard'];
            $fname = $value1['Name'];
            $lname = $value1['Lastname'];
            $age = $value1['Age'];
            $pass = $value1['Password'];
            $phone = $value1['Phone'];
            $level = $value1['Level'];
            $address = $value1['Address'];
        }
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>หอพักหญิง M2 </title>
        <link rel="stylesheet" href="css/amember.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Limelight|Raleway|Sacramento" rel="stylesheet">
        <link rel="shortcut icon" href="img/thinking.png"/>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    </head>


    <body>
        <nav>
            <a class="a0" href="admin_member.php">สมาชิก</a>
            <a class="a0" href="add_member.php">เพิ่มสมาชิก</a>
            <a class="a2" href="logout.php">ออกจากระบบ</a>
        </nav>

        <div class="container card" style="width: 50%">
            <h2>เพิ่มผู้ใช้งาน</h2>
            <p>The form below contains two input elements; one of type text and one of type password:</p>
            <form action="system/update.php" method="post">
                <div class="form-group">
                    <label for="usr">ชื่อผู้ใช้งาน</label>
                    <input type="text" class="form-control" id="user" name="user" value="<?php echo $user; ?>" readonly required>
                </div>
                <div class="form-group">
                    <label for="usr">รหัสบัตรประชาชน</label>
                    <input type="number" class="form-control" id="idcard" name="idcard" value="<?php echo $idcard; ?>" required>
                </div>
                <div class="form-group">
                    <label for="usr">ชื่อ</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>" required>
                </div>
                <div class="form-group">
                    <label for="usr">นามสกุล</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname; ?>" required>
                </div>
                <div class="form-group">
                    <label for="usr">อายุ</label>
                    <input type="number" class="form-control" id="age" name="age" value="<?php echo $age; ?>" required>
                </div>

                <div class="form-group">
                    <label for="pwd">เบอร์โทรศัพท์</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
                </div>
                <div class="form-group" >
                    <label for="pwd">ระดับผู้ใช้งาน</label>
                    <select name="level" id="level" class="form-control" value="<?php echo $level; ?>">
                        <option value="A">แอดมิน</option>
                        <option value="B">ผู้ใช้งาน</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pwd">ที่อยู่</label>
                    <textarea  class="form-control" id="address" placeholder="กรอกที่อยู๋"  name="address" required><?php echo $address; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="user" name="type" value="member" readonly required>
                    <input type="submit" class="btn btn-success" id="ok" name="ok" value="แก้ไขข้อมูล">
                </div>

            </form>
        </div>


        <footer>
            <a id="stopa" href="https://www.facebook.com/sakura.yuz" target="_blank"> @_@ เพื่อในการนำเสนอโปรเจค </a>
        </footer>

    </body>

</html>
<?php



