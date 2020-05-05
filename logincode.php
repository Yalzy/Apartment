<?php 
session_start();
        if(isset($_REQUEST['Username'])){
				//connection
                  include("dbconnect.php");
				//รับค่า user & password
                  $Username = $_REQUEST['Username'];
                  $Password = $_REQUEST['Password'];
				//query 
                  $sql="SELECT * FROM member Where User='$Username' and Password='$Password' ";

                  $result = mysqli_query($link,$sql);
				
                  if(mysqli_num_rows($result)==1){

                        $row = mysqli_fetch_array($result);

                      $_SESSION["UserID"] = $row["Id"];
                      $_SESSION["User"] = $row["Name"]." ".$row["Lastname"];
                      $_SESSION["Userlevel"] = $row["Level"];

                      if($_SESSION["Userlevel"]=="A"){ 

                        Header("Location: amember.php");

                      }

                      if ($_SESSION["Userlevel"]=="M"){  

                        Header("Location: user_page.php");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: index.php"); //user & password incorrect back to login again

        }
?>