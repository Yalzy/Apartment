<?php
require '../dbconnect.php';
$s1 = $_REQUEST["n"];
$select_query = "SELECT ID_Card,Line_ID,ID_Room,CONCAT(`Name`,' ',Lastname) fullname from member where Phone LIKE '%" . $s1 . "%' OR `Name` LIKE '%" . $s1 . "%' OR Lastname LIKE  '%" . $s1 . "%' OR ID_Room LIKE '%" . $s1 . "%'";
$sql = mysqli_query($link, $select_query);
$s = "";
while ($row = mysqli_fetch_array($sql)) {
    ?>
    <a class='link-p-colr' onclick='set_value("<?= $row['ID_Card'] ?>", "<?= $row['fullname'] ?>", "<?= $row['ID_Room'] ?>", "<?= $row['Line_ID'] ?>")'>
        <div class='live-outer'>

            <div class='live-product-det'>
                <div class='live-product-name' style="font-weight: bold">
                    <p><?= $row['fullname'] ?></p>
                </div>
                <div class='live-product-price'>
                    <div class='live-product-price-text'><p style="color: #007bff">ห้อง <?= $row['ID_Room'] ?></p></div>
                </div>
            </div>
        </div>
    </a>
    <?php
}
echo $s;
?>
