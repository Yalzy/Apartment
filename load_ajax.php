<?php

include 'dbconnect.php';

if(!empty($_POST['key'])){
	$type = $_POST['key'];
	if($type == "load_recive_material"){
		$material_id = $_POST['mid'];
		$sql = "select * from material m,member b where m.ID_owner=b.ID_Card and m.ID='$material_id' group by m.ID";
		$qu = mysqli_query($link,$sql);
		$n =@mysqli_num_rows($qu);
		if($n>0){
			foreach ($qu as $key) {
			  echo "<script>confirm_recive('ยืนยันการรับ วัสดุเป็นของ".$key['Name'].$key['Lastname']."','".$material_id."');</script>";
			}
		}else{
			echo "<script>alert('No');</script>";
		}
		

	}
}