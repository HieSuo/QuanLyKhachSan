<?php
include "../database.php";
include "getThongtin.php";
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán thành công</title>

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
            <li class="link"><a href="#">2. Xác nhận thông tin</a></li>
            <li class="link"><a href="#datphong">3. Thanh Toán</a></li>
            <li class="link"><a href="#">4. Xử lý</a></li>
            <li class="link"><a href="#" class="link_active">5. Gửi phiếu đặt phòng</a></li>
        </ul>
    </nav>
    <!-- <header class="section__container header__container">
    </header>  -->
    <div class="section__container">
        <h1>Thanh toán thành công!!</h1>
        <h3>Thông tin đơn hàng </h3>
        <h3>Mã đơn hàng: <?= $_GET['orderId'] ?></h3>
        <p style="font-size: 24px;">
            <?php
            if (isset($_GET['partnerCode'])) {
                $orderId = $_GET['orderId'];
                $sotien = $_GET['amount'];
                // echo "<h1>Thanh toán thành công</h1>";
                // Chuỗi cần tách
                $chuoi = $_GET['extraData'];


                // Giải mã URL
                $chuoi_giai_ma = urldecode($chuoi);

                // Phân tích chuỗi thành các biến
                parse_str($chuoi_giai_ma, $thong_tin);

                // Lấy ra các thông tin cần thiết
                $id_phong = $thong_tin['id_phong'] ?? '';
                $hoten = $thong_tin['hoten'] ?? '';
                $email = $thong_tin['email'] ?? '';
                $diachi = $thong_tin['diachi'] ?? '';
                $checkin = $thong_tin['checkin'] ?? '';
                $checkout = $thong_tin['checkout'] ?? '';
                $cccd = $thong_tin['cccd'] ?? '';
                $sdt = $thong_tin['sdt'] ?? '';
                $id_kh_online = $thong_tin['id_kh_online'] ?? '';

                // In kết quả
                echo "ID Phòng: $id_phong <br>";
                echo "Họ tên: $hoten <br>";
                echo "Căn cước công dân: $cccd <br>";
                echo "Số điện thoại: $sdt <br>";
                echo "Email: $email <br>";
                echo "Địa chỉ: $diachi <br>";
                echo "Checkin: $checkin <br>";
                echo "Checkout: $checkout <br>";
                $sqlcheckorder = "SELECT * FROM booking_online WHERE orderId = $orderId";
                $qrcheck = mysqli_query($connection, $sqlcheckorder);
                $allowsentmail = false;
                if (mysqli_num_rows($qrcheck) > 0) {
                    echo "Đã tồn tại orderid hãy kiểm tra ở đây";
                    $allowsentmail = false;
                } else {
                    $sqlKhachHang = "INSERT INTO `khachhang` (`id_khachhang`, `hoten`, `cccd`, `sdt`, `trangthai`, `diachi`)
                                        VALUES ('', '$hoten', '$cccd', '$sdt', '0', '$diachi')";
                    $qrKhachHang = mysqli_query($connection, $sqlKhachHang);
                    if ($qrKhachHang) {
                        $id_khachhang = mysqli_insert_id($connection);
                        echo $id_khachhang;
                        $sqlphongthue = "INSERT INTO `phieuthuephong` (`id`, `id_khachhang`, `id_phong`, `checkin`, `checkout`)
                                                     VALUES ('', '$id_khachhang','$id_phong','$checkin','$checkout')";
                        $qrPhongThue = mysqli_query($connection, $sqlphongthue);
                        if ($qrPhongThue) {
                            $sql = "INSERT INTO `booking_online`
                                          (`id`, `id_phong`, `orderId`, `id_khachhang`, `hoten`, `email`, `cccd`, `sdt`, `diachi`, `checkin`, `checkout`, `sotien`, `ngaytao`, `trangthai`, `id_tk_online`) 
                                           VALUES ('', '$id_phong', '$orderId', '$id_khachhang', '$hoten', '$email', '$cccd', '$sdt', '$diachi', '$checkin', '$checkout', '$sotien', NOW(), 'Dat thanh cong', '$id_kh_online')";
                            $qr = mysqli_query($connection, $sql);
                            if ($qr) {
                                $allowsentmail = true;
                                echo "themphongthanhcong";
                            }
                        }
                    }
                }
            }
            ?>
        </p>
        <p style="font-size: 24px; font-weight: 700">Hãy ghi nhớ mã đơn hàng, có thể tra cứu thông tin đơn hàng <a href="tracuudonhang.php?id=<?= $orderId ?>">Tại đây</a></p>
        <p style="font-size: 24px;">Quay trở lại <a href="trangchu.php">Trang chủ</a></p>
    </div>

    <?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;      //debug off                //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thanhieureal2509@gmail.com';                     //SMTP username
        $mail->Password   = 'ftvddabwblhdpkup';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('thanhieureal2509@gmail.com', 'Luxury Homestay');
        $mail->addAddress($email, $hoten);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Thanh toan dat phong thanh cong';
        $mail->Body    = 'Bạn đã đặt phòng thành công!!
                        <br>Đã thanh toán thành công ' . $sotien . '. Ngày checkin:'.$checkin.' | Ngày checkout: '.$checkout.' 
                        <br>Mã đặt phòng của bạn là:  ' . $orderId . '. Xin cảm ơn! 
                        <br>Lưu ý: Không để lộ mã đặt phòng của bạn!!
                        <br>Truy cập trang web http://localhost/HomeStayMS-HUNRE/customerView/tracuudonhang.php để kiểm tra tình trạng đơn hàng !!';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if ($allowsentmail) {

            $mail->send();
            echo 'Hãy kiểm tra email!';
        } else {
            echo 'Đã được gửi trước đó!';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    ?>

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