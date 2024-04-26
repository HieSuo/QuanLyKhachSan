<?php
include "../database.php";
include "getThongtin.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu đặt phòng</title>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Booostrap -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <!-- Fullcalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- Datepicker -->
    <script src="../js/jquery.datetimepicker.full.min.js"></script>
    <link rel="stylesheet" href="../css/jquery.datetimepicker.min.css" />

    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/38926e5750.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="nav__logo"><?=$tencongty?></div>
        <ul class="nav__links">
            <li class="link"><a href="trangchu.php">Home</a></li>
            <li class="link"><a href="#">Tìm phòng</a></li>
            <li class="link"><a href="#datphong">Đặt phòng</a></li>
            <li class="link"><a href="#">Liên hệ</a></li>
            <li class="link"><a href="#" class="link_active">Tra cứu</a></li>
            <?php if (isset($_SESSION['id_tk_online'])) { ?>


                <li class="link"><a href="viewtaikhoan.php">Tài khoản</a></li>
            <?php
            } else {
            ?>
                <li class="link"><a href="loginonline.php">Đăng nhập</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
    <div class="container" style="min-height: 750px;">
        <h1>Nhập mã dặt phòng để kiểm tra tình trạng</h1>
        <form action="" method="get">
            <div class="mb-3">
                <label for="" class="form-label">Mã đặt phòng</label>
                <input type="text" class="form-control" name="id" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Có thể kiểm tra trong email của bạn!</small>
            </div>
            <button type="submit" class="btn btn-primary">Tra cứu</button>
        </form>
        <?php
        if (isset($_GET['id'])) {
            echo "Đang tra cứu thông tin đơn hàng " . $_GET['id'];
            $orderId = $_GET['id'];
            $sql = "SELECT * FROM booking_online INNER JOIN phong ON phong.id_phong = booking_online.id_phong INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong
                 WHERE orderId = '$orderId'";
            $qr = mysqli_query($connection, $sql);
            if (mysqli_num_rows($qr) > 0) {
                $bk = mysqli_fetch_assoc($qr);
                $madatphong = $bk['orderId'];
                $sophong = $bk['sophong'];
                $loaiphong =  $bk['loaiphong'];
                $giaphong = $bk['giaphong'];
                $sotiendathanhtoan = $bk['sotien'];
                $hoten = $bk['hoten'];
                $email = $bk['email'];
                $cccd = $bk['cccd'];
                $sdt = $bk['sdt'];
                $diachi = $bk['diachi'];
                $checkin = $bk['checkin'];
                $checkout = $bk['checkout'];
                $ngaytao = $bk['ngaytao'];
                $tranthai = $bk['trangthai'];
                $anhphong = $bk['anh'];
                $dateTimeCheckin = new DateTime($checkin);
                $dateTimeCheckou = new DateTime($checkout);

                // Tính số ngày chênh lệch
                $tongngay = $dateTimeCheckin->diff($dateTimeCheckou)->days;

        ?>
                <div class="row">
                    <div class="col-xl-7">

                        <div class="card">
                            <div class="card-body">
                                <ol class="activity-checkout mb-0 px-4 mt-3">
                                    <li class="checkout-item">
                                        <div class="avatar checkout-icon p-1">
                                            <div class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bxs-receipt text-white font-size-20"></i>
                                            </div>
                                        </div>
                                        <div class="feed-item-list">
                                            <div>
                                                <h5 class="font-size-16 mb-1">Thông tin đơn đặt phòng</h5>
                                                <p class="text-muted text-truncate mb-4">Thông tin liên hệ của khách hàng</p>
                                                <div class="mb-3">
                                                    <form>
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="billing-name">Họ và tên</label>
                                                                        <input readonly type="text" class="form-control" id="billing-name" value="<?= $hoten ?>" placeholder="Enter name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="billing-email-address">Địa chỉ Email</label>
                                                                        <input readonly type="email" class="form-control" id="billing-email-address" value="<?= $email ?>" placeholder="Enter email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="billing-phone">Số điện thoại</label>
                                                                        <input readonly type="text" class="form-control" id="billing-phone" value="<?= $sdt ?>" placeholder="Enter Phone no.">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label" for="billing-address">Địa chỉ</label>
                                                                <textarea readonly class="form-control" id="billing-address" rows="3" placeholder="Enter full address"><?= $diachi ?></textarea>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="mb-4 mb-lg-0">
                                                                        <label class="form-label" for="billing-city">Căn cước công dân</label>
                                                                        <input readonly type="text" class="form-control" id="cccd" value="<?= $cccd ?>" placeholder="Căn cước công dân">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4">
                                                                    <div class="mb-4 mb-lg-0">
                                                                        <label class="form-label" for="billing-city">Ngày tạo</label>
                                                                        <input readonly type="text" class="form-control" id="billing-city" value="<?= $ngaytao ?>" placeholder="Ngày tạo">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="checkout-item">
                                        <div class="avatar checkout-icon p-1">
                                            <div class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                            </div>
                                        </div>
                                        <div class="feed-item-list">
                                            <div>
                                                <h5 class="font-size-16 mb-1">Tình trạng đơn hàng</h5>
                                                <p class="text-muted text-truncate mb-4">Tra cứu tình trạng đơn hàng</p>
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-6">
                                                       <?php
                                                        if($tranthai=='Dat thanh cong'){
                                                            echo "<p style='fontweight: bold;'> Đặt thành công </p>";
                                                        }else if($tranthai=='Da checkin'){
                                                            echo "<p style='fontweight: bold;'> Đã checkin </p>";
                                                        }else if($tranthai=='Da thanh toan'){
                                                            echo "<p style='fontweight: bold;'> Đã thanh toán </p>";
                                                        }
                                                        ?>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>

                        <div class="row my-4">

                        </div> <!-- end row-->
                    </div>
                    <div class="col-xl-5">
                        <div class="card checkout-order-summary">
                            <div class="card-body">
                                <div class="p-3 bg-light mb-3">
                                    <h5 class="font-size-16 mb-0">Mã đặt phòng <span class="float-end ms-2"><?= $madatphong ?></span></h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-centered mb-0 table-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0" style="width: 120px;" scope="col">Phòng</th>
                                                <th class="border-top-0" scope="col">Loại phòng</th>
                                                <th class="border-top-0" style="width: 150px;" scope="col">Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><img src="../img/<?= $anhphong ?>" alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                                <td>
                                                    <h5 class="font-size-16 text-truncate"><a href="#" class="text-dark"><?php echo $loaiphong . "-" . $sophong ?></a></h5>
                                                    <p class="text-muted mb-0">
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star-half text-warning"></i>
                                                    </p>
                                                    <p class="text-muted mb-0 mt-1">$<?= $giaphong ?>x<?= $tongngay ?> ngày</p>
                                                </td>
                                                <td>$<?= $tongngay * $giaphong ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h5 class="font-size-14 m-0">Check in :</h5>
                                                </td>
                                                <td>
                                                    <?= $checkin ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h5 class="font-size-14 m-0">Checkout :</h5>
                                                </td>
                                                <td>
                                                    <?= $checkout ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h5 class="font-size-14 m-0">Tổng tiền :</h5>
                                                </td>
                                                <td>
                                                    $<?= $tongngay * $giaphong ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h5 class="font-size-14 m-0">Số tiền đã thanh toán :</h5>
                                                </td>
                                                <td>
                                                    $<?= $sotiendathanhtoan ?>
                                                </td>
                                            </tr>

                                            <tr class="bg-light">
                                                <td colspan="2">
                                                    <h5 class="font-size-14 m-0">Số tiền còn lại:</h5>
                                                </td>
                                                <td>
                                                    $<?= $tongngay * $giaphong - $sotiendathanhtoan ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

        <?php
            } else {
                echo "<br>Mã đặt phòng không hợp lê. Vui lòng kiểm tra lại.";
            }
        }
        ?>
    </div>
    <!-- <header class="section__container header__container">
    </header>  -->

    <footer class="footer">
        <div class="section__container">
            Nhóm 2 công nghệ phần mềm
        </div>
    </footer>

</body>


</html>