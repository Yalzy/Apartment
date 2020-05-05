
<?php
session_start();
if (empty($_SESSION['UserID']))
    Header("Location: error-404.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="application/javascript" src="js/qrcodegen.js"></script>
<script type="application/javascript" src="js/qrcodegen-demo.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
<style>
    .font-text{
        font-size: 17px;
    }
    .font-text-b{
        font-size: 17px;
        font-weight: bold;
    }
</style>
<style>

    #lowrbdy{
        width:100%;
        height:581px;
        position:absolute;
        top:74px;
        left:0px;
    }
    #lowrbdy img{
        width:100%;
        height:100%;
    }
    /***********************************/
    header{
        width:100%;
        height:auto;
        background:#0071b4;
        box-shadow:0px 0px 8px 2px #333;
        position:fixed;
        z-index:99999;
        top:0px;
        left:0px;
    }
    /***********************************/
    .logo{
        width:181px;
        height:61px;
        position:relative;
        top:5px;
        left:10px;
        float:left;
    }
    .logo a{
        text-decoration:none;
        color:#fff;
        font-size:60px;
        margin:0px 20px;
        line-height:0.9em;
    }
    /***********************************/
    .srbox{
        width:580px;
        height:70px;
        float:left;
        margin-left:120px;
        margin-top:4px;
    }
    .textbox{
        border-radius: 8px 0px 0px 8px;
        background-color:#fff;
        float:left;
        border:none;
        height:40px;
        padding:1px 12px;
        font-size:15px;
        line-height: 1.42857;
        color:#000;
        width:420px;
        margin-top:13px;
    }
    .query-submit{
        border-radius: 0px 8px 8px 0px;
        cursor:pointer;
        background:#fbfbfb;
        width:85px;
        padding:1px 6px;
        float:left;
        border:none;
        margin-top:13px;
        height:42px;
    }
    .textbox-clr{
        cursor:pointer;
        background:#fff;
        width:20px;
        height:42px;
        float:left;
        border:none;
        margin-top:13px;
        text-align:center;
    }
    /***********************************/
    .acount{
        width:170px;
        height:30px;
        float:left;
        margin-top:27px;
        margin-left:40px;
    }
    .aclogo{
        width:20px;
        height:20px;
        float:left;
        border:2px solid #fff;
        border-radius:50%;
        text-align:center;
    }
    .actext{
        width:130px;
        float:left;
        line-height:1.6em;
        margin-left:8px;
        font-size:15px;
        color:#fff;
    }
    /***********************************/
    .cart{
        width:120px;
        height:36px;
        float:left;
        border:2px solid #fff;
        border-radius:40px;
        margin-top:18px;
        margin-left:40px;
    }
    .cart i{
        line-height:1.6em;
        color:#fff;
        font-size:20px;
        margin-left:10px;
        float:left;
    }
    .cart-e{
        color:#fff;
        font-size:20px;
        line-height:1.6em;
        float:left;
        margin:0px;
        margin-left:10px;
    }
    .cart-f{
        color:#000;
        float:left;
        background:#fff;
        padding:2px 6px;
        border-radius:50%;
        margin:5px 0px 0px 11px;
        font-size:16px;
        line-height: normal;
    }
    /***********************************/
    #search-layer{
        position:absolute;
        background:rgba(255,255,255,0.5);
        z-index:9;
        left:0px;
        top:0px;
    }
    /***********************************/
    #livesearch{
        z-index:9999;
        background:#0071b4;
        max-height:260px;
        overflow:auto;
        width:92%;
        box-shadow:0px 2px 4px #444;
        margin-left:1.2%;
    }
    /***********************************/
    .live-outer{
        width:100%;
        height:60px;
        border-bottom:1px solid #ccc;
        background:#fff;
    }
    .live-outer:hover{
        background:#F3F3F3;
    }
    .live-im{
        float:left;
        width:10%;
        height:60px;
    }
    .live-im img{
        width:100%;
        height:100%;
    }
    .live-product-det{
        float:left;
        width:90%;
        height:60px;
    }
    .live-product-name{
        width:100%;
        height:22px;
        margin-top:4px;
    }
    .live-product-name p{
        margin:0px;
        color:#333;
        text-shadow: 1px 1px 1px #DDDDDD;
        font-size:17px;
    }
    .live-product-price{
        width:100%;
        height:25px;
    }
    .live-product-price-text{
        float:left;
        width:50%;
    }
    .live-product-price-text p{
        margin:0px;
        font-size:16px;
    }

    div.gallery {
        margin: 5px;
        border: 1px solid #ccc;
        float: left;
        width: 180px;
    }

    div.gallery:hover {
        border: 1px solid #777;
    }

    div.gallery img {
        width: 100%;
        height: auto;
    }

    div.desc {
        padding: 15px;
        text-align: center;
    }
</style>
<div class="container-scroller">

    <!--<link rel="stylesheet" href="./vendors/iconfonts/font-awesome/css/font-awesome.min.css" />-->
    <link rel="shortcut icon" href="images/thinking.png" />

    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="index2.php">
                <img src="images/logo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index2.php">
                <img src="images/logo-mini.svg" alt="logo" />
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">


                    <div class="dropdown-divider"></div>

                <li class="nav-item dropdown">

                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 0 new notifications
                            </p>
                            <span class="badge badge-pill badge-warning float-right">View all</span>
                        </a>
                        <div class="dropdown-divider"></div>

                        <li class="nav-item dropdown d-none d-xl-inline-block">
                            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <span class="profile-text font-text-b" >ยินดีต้อนรับ, <?= $_SESSION['User']; ?></span>

                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                <a class="dropdown-item p-0">

                                </a>

                                <a class="dropdown-item" href="logout.php" style="text-align: center;">
                                    Sign Out
                                </a>
                            </div>
                        </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="user-wrapper">

                            <div class="preview-thumbnail">
                                <img src="images/m2icon.png" alt="image" class="profile-pic">
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name font-text-b"><?= $_SESSION['User']; ?></p>
                                <div>
                                    <?php
                                    if ($_SESSION["Userlevel"] == 'A')
                                        $ab = 'แอดมิน';
                                    else
                                        $ab = 'สมาชิก';
                                    ?>
                                    <small class="designation text-muted"> <?= $ab ?></small>
                                    <span class="status-indicator online"></span>
                                </div>

                            </div>
                        </div>


                        </button>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link font-text" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-title"><i class="fa fa-user" style="font-size: 17px;margin-right: 15px"></i>
                            สมาชิก</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item font-text">
                                <a class="nav-link" href="./amember.php">ข้อมูลสมาชิก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./addmember.php">เพิ่มสมาชิก</a>
                            </li>
                        </ul>
                    </div>
                </li>

                </a>


                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#room-basic" aria-expanded="false" aria-controls="room-basic">
                        <span class="menu-title"><i class="menu-icon mdi mdi-television" style="font-size: 15px;margin-right: 15px"></i>
                            ห้องพัก</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="room-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="./aroom.php">ข้อมูลห้องพัก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./addroom.php">เพิ่มห้องพัก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./atype.php">ข้อมูประเภทห้องพัก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./addroomtype.php">เพิ่มประเภทห้องพัก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./facility.php">ค่าน้ำค่าไฟฟ้า</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./apayment.php">ข้อมูลค่าหอพัก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./Payment.php">คำนวณค่าหอพัก</a>
                            </li>

                        </ul>

                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="menu-icon mdi mdi-restart"></i>
                        <span class="menu-title">พัสดุ</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="./amaterial.php">ข้อมูลพัสดุ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./addmaterial.php">เพิ่มพัสดุ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./recivematerial.php">รับพัสดุ</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>