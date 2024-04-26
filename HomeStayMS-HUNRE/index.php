<?php
include "database.php";
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $userQuery = "SELECT * FROM nguoidung WHERE id_nguoidung = '$user_id'";
    $result = mysqli_query($connection, $userQuery);
    $user = mysqli_fetch_assoc($result);
} else {
    header('Location:login.php');
}

include_once "header.php";

// 
?>
<div class="container-fluid" style="margin-top: 56px;">
    <div class="row">


        <?php include_once "sidebar.php"; ?>


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
            <!-- Nội dung trang web của bạn sẽ nằm ở đây -->
            <?php

            if (isset($_GET['datphong'])) {
                include_once "datphong.php";
            } elseif (isset($_GET['dashboard'])) {
                include_once "dashboard.php";
            } elseif (isset($_GET['loaiphong'])) {
                include_once "qlyloaiphong.php";
            } elseif (isset($_GET['phong'])) {
                include_once "qlyphong.php";
            } elseif (isset($_GET['dichvu'])) {
                include_once "qldichvu.php";
            }elseif (isset($_GET['phieuchi'])) {
                include_once "phieuchi.php";
            }
             elseif (isset($_GET['taikhoan'])) {
                if ($_SESSION['role'] == 1) {
                    include_once "qlytaikhoan.php";
                } else {
                    include_once "noRole.php";
                }
            } elseif (isset($_GET['calendar'])) {
                include_once "calendar.php";
            } elseif (isset($_GET['khachhang'])) {
                include_once "khachhang.php";
            } elseif (isset($_GET['phieuthu'])) {
                if ($_SESSION['role'] == 1) {
                    include_once "phieuthu.php";
                } else {
                    include_once "noRole.php";
                }
            } elseif (isset($_GET['bookingonline'])) {
                  include_once "bookingonline.php";
                
            } elseif (isset($_GET['baocao'])) {
                if ($_SESSION['role'] == 1) {
                    include_once "baocaothongke.php";
                } else {
                    include_once "noRole.php";
                }
            }elseif (isset($_GET['cauhinh'])) {
                if ($_SESSION['role'] == 1) {
                    include_once "cauhinhweb.php";
                } else {
                    include_once "noRole.php";
                }
            } else {
                include_once "dashboard.php";
            }

            // include_once "footer.php";


            ?>
        </main>
    </div>
</div>
<script defer src="js/custom.js"></script>
<script defer src="ajax.js"></script>