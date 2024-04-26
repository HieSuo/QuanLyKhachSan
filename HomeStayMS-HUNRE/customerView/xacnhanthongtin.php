<?php
include "../database.php";
include "getThongtin.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận thông tin</title>

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
            <li class="link "><a href="index.php">1. Nhập thông tin</a></li>
            <li class="link"><a href="#" class="link_active">2. Xác nhận thông tin</a></li>
            <li class="link"><a href="#datphong">3. Thanh Toán</a></li>
            <li class="link"><a href="#">4. Xử lý</a></li>
            <li class="link"><a href="#">5. Gửi phiếu đặt phòng</a></li>
        </ul>
    </nav>
    <!-- <header class="section__container header__container">
    </header>  -->

    <div class="container">
        <?php
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $id_phong = $_POST['id_phong'];
        $tongngay = $_POST['tongngay'];
        $tongtien = $_POST['tongtien'];
        if (isset($_POST['payfull'])) {
            $tongtien = $_POST['tongtien'];
        } elseif (isset($_POST['payhalf'])) {
            $tongtien = $tongtien / 2;
        }
        $id_kh_online = $_POST['id_kh_online'];
        $sql = "SELECT * FROM phong INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong WHERE id_phong = $id_phong";
        $qr = mysqli_query($connection, $sql);
        $room = mysqli_fetch_assoc($qr);

        ?>
        <h1>Thông tin đặt phòng</h1>
        <h4>Hãy chắc chắn rằng tất cả thông tin trên trang này là chính xác trước khi tiến hành thanh toán.</h4>
    </div>
    <div class="container">
        <form action="xulythanhtoan.php" method="post">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col-md-7">
                    <!-- thongtin phong thue -->
                    <input type="hidden" name="checkin" value="<?= $checkin ?>">
                    <input type="hidden" name="checkout" value="<?= $checkout ?>">
                    <input type="hidden" name="id_phong" value="<?= $id_phong ?>">
                    <input type="hidden" name="tongngay" value="<?= $tongngay ?>">
                    <input type="hidden" name="tongtien" value="<?= $tongtien ?>">
                    <input type="hidden" name="id_kh_online" value="<?= $id_kh_online ?>">
                    <h3>Thông tin liên hệ</h3>
                    <div class="mb-3">
                        <label for="" class="form-label">Họ và tên</label>
                        <input type="text" value="<?= $_POST['hoten'] ?>" class="form-control" name="hoten" id="" aria-describedby="helpId" readonly placeholder="">

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Số điện thoại</label>
                        <input type="text" value="<?= $_POST['sdt'] ?>" class="form-control" name="sdt" id="" aria-describedby="helpId" readonly placeholder="">

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" value="<?= $_POST['email'] ?>" class="form-control" name="email" id="" aria-describedby="helpId" readonly placeholder="">

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Địa chỉ</label>
                        <input type="text" value="<?= $_POST['diachi'] ?>" class="form-control" name="diachi" id="diachi" aria-describedby="helpId" readonly placeholder="">

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Căn cước công dân</label>
                        <input type="text" value="<?= $_POST['cccd'] ?>" class="form-control" name="cccd" id="cccd" aria-describedby="helpId" readonly placeholder="">
                    </div>
                    <h3><?php if (isset($_POST['payfull'])) {
                           echo "Thanh toán toàn bộ tiền phòng";
                        } elseif (isset($_POST['payhalf'])) {
                            echo "Thanh toán 1 nửa tiền phòng";
                        } ?>: &MediumSpace; <?php echo $tongtien ?></h3>
                </div>
                <div class="col-md-5">
                    <h3>Thông tin phòng</h3>
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">Ngày nhận phòng:</div>
                        <div class="col"><?php echo $checkin; ?></div>
                    </div>
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">Ngày trả phòng:</div>
                        <div class="col"><?php echo $checkout; ?></div>
                    </div>
                    <h4><?php echo $room['loaiphong'] . "-" . $room['sophong'] ?></h4>
                    <img src="../img/<?= $room['anh'] ?>" alt="">
                    <p><?php echo $room['mota'] ?></p>
                </div>
            </div>
            <button type="submit" name="payUrl" class="btn btn-success" onclick="return confirm('Bạn có chắc chắn muốn đặt phòng?')">Thanh Toán MOMO</button>
        </form>
    </div>


</body>

<!-- <script src="ajax.js"></script> -->

</html>