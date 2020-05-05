<?php
include '../dbconnect.php';

if (!empty($_POST['type'])) {
    $type = $_POST['type'];
    if ($type == "load_recive_material") {
        if (!empty($_POST['m_id'])) {
            $m_id = $_POST['m_id'];
            $name = "";
            $room = "";
            $sql = "select m.Date_Import,CONCAT(mb.`Name`,' ',mb.Lastname)"
                    . " fullname,mb.ID_Room,i.url_img,m.Status  from material m,material_image i,member mb where i.id = m.ID AND m.ID_owner = mb.ID_Card AND m.ID = '$m_id' group by url_img";
            $que = mysqli_query($link, $sql);
            if (mysqli_num_rows($que) > 0) {
                foreach ($que as $row) {
                    $room = $row['ID_Room'];
                    $name = $row['fullname'];
                    $status = $row['Status'];
                    if ($status == 1) {
                        ?>
                        <div class="gallery">
                            <a target="_blank" href="<?= $row['url_img'] ?>">
                                <img src="<?= $row['url_img'] ?>" alt="5Terre" width="600" height="400">
                            </a>

                        </div>
                        <?php
                    }
                }
                if ($status == 1) {
                    ?>
                    <script>
                        swal({
                            title: "ยืนยันการรับพัสดุ?",
                            text: "ชื่อ <?= $name . " ห้อง " . $room ?> ?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText: "ยกเลิก"
                        })
                                .then((willDelete) => {
                                    if (willDelete) {

                                        confirm_recive('<?= $m_id ?>');
                                    } else {

                                    }
                                });
                    </script>

                    <?php
                } else {
                    echo "<script>swal('เตือน','พัสดุนี้มีการรับไปแล้ว','warning');</script>";
                }
            } else {
                echo "<script>swal('เตือน','ข้อมูลไม่ถูกต้อง','warning');</script>";
            }
        }
    }

    if ($type == "load_pay_ment_dataroom") {
        if (!empty($_POST['id_room'])) {
            $id_room = $_POST['id_room'];

            $sql = "select r.Price,m.ID_Card,m.Line_ID from room r,member m where r.ID_room = m.ID_Room and r.ID_room = '$id_room'";
            $que = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($que);
            ?>
            <script>
                $("#room_price").val(<?= $row['Price'] ?>);
                $("#idcard").val('<?= $row['ID_Card'] ?>');
                $("#line_id").val('<?= $row['Line_ID'] ?>');
            </script>
            <?php
        }
    }
}