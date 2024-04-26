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
    <title>Xác nhận thanh toán đặt phòng Luxury Homestay</title>

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
            <li class="link "><a href="index.php" class="link_active">1. Nhập thông tin</a></li>
            <li class="link"><a href="#">2. Xác nhận thông tin</a></li>
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
        $sql = "SELECT * FROM phong INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong WHERE id_phong = $id_phong";
        $qr = mysqli_query($connection, $sql);
        $room = mysqli_fetch_assoc($qr);
        if(isset($_SESSION['id_tk_online'])){
            $id_kh_online = $_SESSION['id_tk_online'];
            $qr_kh_online = mysqli_query($connection, "SELECT * FROM tk_kh_online WHERE id_tk_online = '$id_kh_online'");
            $kh_online = mysqli_fetch_assoc($qr_kh_online);
        }
        ?>
        <h1>Đặt phòng</h1>
        <h4>Hãy chắc chắn rằng tất cả thông tin trên trang này là chính xác trước khi tiến hành thanh toán.</h4>
    </div>
    <div class="container">
        <form action="xacnhanthongtin.php" method="post">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col-md-7">
                    <!-- thongtin phong thue -->
                    <input type="hidden" name="checkin" value="<?=$checkin?>">
                    <input type="hidden" name="checkout" value="<?=$checkout?>">
                    <input type="hidden" name="id_phong" value="<?=$id_phong?>">
                    <input type="hidden" name="tongngay" value="<?=$tongngay?>">
                    <input type="hidden" name="tongtien" value="<?=$tongtien?>">
                    <input type="hidden" name="id_kh_online" value="<?php if(isset($_SESSION['id_tk_online'])){echo $id_kh_online;}?>">
                    <h3>Thông tin liên hệ</h3>
                    <div class="mb-3">
                        <label for="" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="hoten" id="" aria-describedby="helpId" placeholder="" value="<?php if(isset($_SESSION['id_tk_online'])){echo $kh_online['hoten'];}?>">
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="sdt" id="" aria-describedby="helpId" placeholder="" value="<?php if(isset($_SESSION['id_tk_online'])){echo $kh_online['sdt'];}?>">
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="" value="<?php if(isset($_SESSION['id_tk_online'])){echo $kh_online['email'];}?>">
                 
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" id="diachi" aria-describedby="helpId" placeholder="" value="<?php if(isset($_SESSION['id_tk_online'])){echo $kh_online['diachi'];}?>">
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Căn cước công dân</label>
                        <input type="text" class="form-control" name="cccd" id="cccd" aria-describedby="helpId" placeholder="" value="<?php if(isset($_SESSION['id_tk_online'])){echo $kh_online['cccd'];}?>">
                    </div>
                    <h3>Thành tiền: &MediumSpace;   <?php echo $tongtien?></h3>
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
            <button type="submit" name="payfull" class="btn btn-success">Thanh toán toàn bộ</button>
            <button type="submit" name="payhalf" class="btn btn-success">Thanh toán 1 nửa số tiền</button>
            <a href="javascript:history.back()" onclick="return confirm('Bạn có chắc chắn muốn hủy đặt phòng?')" class="btn btn-danger">Hủy thanh toán</a>

        </form>
    </div>


</body>

<script src="ajax.js"></script>
<script>
    $(document).ready(function() {
        // Lấy ngày hôm nay
        var today = new Date();

        // Kích hoạt DateTimePicker cho cả hai trường
        $(".date-picker").datetimepicker({
            format: "Y-m-d", // Định dạng ngày giờ
            step: 15, // Bước thời gian là 15 phút
            timepicker: false, // Cho phép chọn thời gian
            datepicker: true, // Cho phép chọn ngày
            minDate: today, // Ngày tối thiểu là ngày hôm nay
        });

        // Xử lý sự kiện khi ngày đến thay đổi
        $("#date-from").on("change", function() {
            var selectedDate = new Date($("#date-from").val());
            var minDate = new Date(selectedDate);
            minDate.setDate(minDate.getDate() + 1); // Thêm một ngày

            // Cập nhật DateTimePicker của ngày đi để ngăn người dùng chọn ngày trước ngày đến
            $("#date-to").datetimepicker({
                minDate: minDate
            });
        });

        $("#stay-duration").on("change", function() {
            // Lấy giá trị của trường "Số ngày ở"
            var stayDuration = parseInt($(this).val());

            // Lấy ngày đến từ trường "Ngày đến"
            var arrivalDate = new Date($("#arrival-date").val());

            // Tính ngày đi bằng cộng số ngày ở vào ngày đến
            if (!isNaN(stayDuration)) {
                var departureDate = new Date(arrivalDate);
                departureDate.setDate(departureDate.getDate() + stayDuration);

                // Định dạng ngày đi theo "dd-MM-yyyy"
                var formattedDate =
                    ("0" + departureDate.getDate()).slice(-2) +
                    "-" +
                    ("0" + (departureDate.getMonth() + 1)).slice(-2) +
                    "-" +
                    departureDate.getFullYear();
                $("#departure-date").val(formattedDate);
            }
        });
    });
</script>

</html>