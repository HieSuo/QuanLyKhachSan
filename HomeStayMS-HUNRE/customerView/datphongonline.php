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
    <title>Thông tin phòng Luxury Homestay</title>

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
            <li class="link"><a href="#datphong" class="link_active">Đặt phòng</a></li>
            <li class="link"><a href="#">Liên hệ</a></li>
            <li class="link"><a href="tracuudonhang.php">Tra cứu</a></li>
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
    <!-- <header class="section__container header__container">
    </header>  -->
    <?php
    $checkin = base64_decode($_GET['checkin']);
    $checkout = base64_decode($_GET['checkout']);
    if (isset($_GET['id'])) {
        $id_phong = $_GET['id'];
        $sql = "SELECT * FROM phong INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong WHERE id_phong = $id_phong";
        $qr = mysqli_query($connection, $sql);
        $room = mysqli_fetch_assoc($qr);
    }
    ?>
    <div class="section__container" id="room">
        <h2>Thông tin phòng </h2>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <?php
                echo "<img src='../img/" . $room['anh'] . "' class='img-item' alt='...'>";
                ?>
            </div>
            <div class="col">
                <h2><?php echo $room['loaiphong'] . "-" . $room['sophong'] ?></h2>
                <div class="row justify-content-center align-items-center g-2">
                    <form action="xacnhandatphong.php" method="post">
                        <input type="hidden" name="id_phong" value="<?= $room['id_phong'] ?>">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Checkin</label>
                                <input type="text" class="form-control" name="checkin" id="checkin" value="<?= $checkin ?> 12:00" aria-describedby="helpId" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Checkout</label>
                                <input type="text" class="form-control" name="checkout" id="checkout" value="<?= $checkout ?> 12:00" aria-describedby="helpId" placeholder="" readonly>
                            </div>
                        </div>

                </div>
                <?php
                echo "<h5> Giá phòng: " . $room['giaphong'] . "$</h5>";
                // Tạo đối tượng DateTime từ chuỗi ngày
                $dateTimeCheckin = new DateTime($checkin);
                $dateTimeCheckou = new DateTime($checkout);

                // Tính số ngày chênh lệch
                $tongngay = $dateTimeCheckin->diff($dateTimeCheckou)->days;

                // In ra kết quả
                echo "<h5>Số ngày: " . $tongngay . "</h5>";
                $tongtien = $tongngay * $room['giaphong'];
                echo "<h5>Tổng tiền: " . $tongtien . "$</h5>";
                echo "<p> Mô tả phòng: " . $room['mota'] . "</p>";
                ?>
                <input type="hidden" name="tongngay" value="<?= $tongngay ?>">
                <input type="hidden" name="tongtien" value="<?= $tongtien ?>">
                <div class="d-grid gap-2">
                    <!-- <button type="button" name="" id="" class="btn btn-primary">Liên hệ đặt phòng</button> -->
                    <button type="submit" name="" id="" class="btn btn-primary">Đặt phòng</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="section__container" id="homestayinfor">
        <h2>Thông tin về <?=$tencongty?></h2>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-md-4">
                <h5>Giới thiệu vệ homestay</h5>
            </div>
            <div class="col-md-8">
                <h5>Trong khu vực</h5>
            </div>

        </div>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-md-4">

                <p><?=$motacongty?>
                </p>
            </div>
            <div class="col-md-8">

                <div class="row justify-content-center align-items-center g-2 ">
                    <div class="col">
                        <h6>Gần khu vui chơi</h6>
                        <p>Hồ Hoàn Kiếm</p>
                        <p>Nhà thờ lớn</p>
                    </div>
                    <div class="col">
                        <p>Hồ Hoàn Kiếm</p>
                        <p>Nhà thờ lớn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="section__container">
            Nhóm 2 công nghệ phần mềm
            <div class="row justify-content-center align-items-center g-2">
        <div class="col"><?=$tencongty?></div>
        <div class="col">Liên hệ <?=$sdtcongty?></div>
        <div class="col">Email <?=$emaicongty?></div>
      </div>
        </div>
    </footer>

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