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
    <link rel="stylesheet" href="viewtaikhoan.css">
</head>

<body>
    <nav>
        <div class="nav__logo"><?=$tencongty?></div>
        <ul class="nav__links">
            <li class="link"><a href="trangchu.php">Home</a></li>
            <li class="link"><a href="#">Tìm phòng</a></li>
            <li class="link"><a href="#datphong">Đặt phòng</a></li>
            <li class="link"><a href="#">Liên hệ</a></li>
            <li class="link"><a href="tracuudonhang.php">Tra cứu</a></li>
            <?php if (isset($_SESSION['id_tk_online'])) { ?>


                <li class="link"><a href="viewtaikhoan.php" class="link_active">Tài khoản</a></li>
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
    $id_kh_online = $_SESSION['id_tk_online'];
    $qr_kh_online = mysqli_query($connection, "SELECT * FROM tk_kh_online WHERE id_tk_online = '$id_kh_online'");
    $kh_online = mysqli_fetch_assoc($qr_kh_online);

    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>Thông tin tài khoản</h3>
                    <hr>
                </div>
                <div class="response"></div>
                <!-- Form START -->
                <form class="file-upload" id="thongtin_tk_onl">
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Thông tin liên hệ</h4>
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Họ và tên *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Họ và tên" id="hoten" value="<?php echo $kh_online['hoten']; ?>">
                                    </div>
                                    <!-- Last name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Căn cước công dân *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="cccd" id="cccd" value="<?php echo $kh_online['cccd']; ?>">
                                    </div>
                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Số điện thoại *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number" id="sdt" value="<?php echo $kh_online['sdt']; ?>">
                                    </div>
                                    <!-- Mobile number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Địa chỉ *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="dicahi" id="diachi" value="<?php echo $kh_online['diachi']; ?>">
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" value="<?php echo $kh_online['email']; ?>" readonly>
                                    </div>
                                    <!-- id_kh_online -->
                                    <input type="hidden" name="" id="id_kh_online" value="<?php echo $id_kh_online; ?>">
                                </div> <!-- Row END -->
                            </div>
                        </div>
                        <!-- Upload profile -->
                    </div> <!-- Row END -->

            </div> <!-- Row END -->
            <!-- button -->
            <div class="gap-3 d-md-flex justify-content-md-end text-center">
                <a onclick="return confirm('Bạn có chắc chắn muốn Đăng xuất?')"  href="logoutonline.php" class="btn btn-danger btn-lg">Đăng xuất</a>
                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn lưu?')" class="btn btn-primary btn-lg">Lưu thông tin</button>
            </div>
            </form> <!-- Form END -->
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>Lịch sử đặt phòng</h3>
                    <hr>
                </div>
                <div class="response"></div>
                <!-- Form START -->
                <div class="row mb-5 gx-5">
                    <?php
                    $qr = mysqli_query($connection, "SELECT * FROM booking_online INNER JOIN phong ON booking_online.id_phong = phong.id_phong INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong WHERE id_tk_online = '$id_kh_online'");
                    if (mysqli_num_rows($qr) > 0) {
                    ?>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã đặt phòng</th>
                                    <th scope="col">Phòng</th>
                                    <th scope="col">Check-in</th>
                                    <th scope="col">Check-out</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt=1;
                                while ($row = mysqli_fetch_assoc($qr)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?=$stt++?></th>
                                        <td><?=$row['orderId']?></td>
                                        <td><?php echo $row['loaiphong'] . "-". $row['sophong'];?></td>
                                        <td><?=$row['checkin']?></td>
                                        <td><?=$row['checkout']?></td>
                                        <td><?=$row['ngaytao']?></td>
                                        <td><?=$row['trangthai']?></td>
                                        <td><a href="tracuudonhang.php?id=<?=$row['orderId']?>" class="btn btn-primary">Chi tiết</a></td>
                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>
                        </table>


                    <?php
                    } else {
                        echo "Không tồn tại lịch sử đặt phòng ";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="section__container">
            Nhóm 2 công nghệ phần mềm
        </div>
    </footer>

</body>
<script src="ajax.js"></script>

</html>