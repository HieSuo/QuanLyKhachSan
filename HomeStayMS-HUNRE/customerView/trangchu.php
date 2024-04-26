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
  <title>Welcome Luxury Homestay</title>

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
      <li class="link"><a href="#" class="link_active">Home</a></li>
      <li class="link"><a href="#datphong">Tìm phòng</a></li>
      <li class="link"><a href="#datphong">Đặt phòng</a></li>
      <li class="link"><a href="#lienhe">Liên hệ</a></li>
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
  <header class="section__container header__container">
    <div class="header__image__container">
      <div class="header__content">
        <h1>TẬN HƯỞNG <br>KỲ NGHỈ CỦA BẠN</h1>
        <p>Liên hệ đặt phòng ngay hôm nay!!</p>
      </div>
      <div class="booking__container">
        <form method="post" id="searchform">
          <div class="form__group">
            <div class="input__group">
              <input type="text" name="checkin" id="checkin" class="date-picker" autocomplete="off"
              value="<?php if(isset($_POST['checkin'])){echo $_POST['checkin'];}else{echo "";}?>" />
              <label>Check In</label>
            </div>
            <p>Chọn ngày</p>
          </div>
          <div class="form__group">
            <div class="input__group">
              <input type="text" name="checkout" id="checkout" class="date-picker" autocomplete="off"
              value="<?php if(isset($_POST['checkout'])){echo $_POST['checkout'];}else{echo "";}?>" />
              <label>Check Out</label>
            </div>
            <p>Chọn ngày</p>
          </div>
          <div class="form__group">
            <div class="input__group">
              <input type="number" name="songuoi" id="songuoi"
              value="<?php if(isset($_POST['songuoi'])){echo $_POST['songuoi'];}else{echo "";}?>" />
              <label>Số giường</label>
            </div>
            <p>Chọn số người</p>
          </div>
          <input type="hidden" name="searchroom">
          <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></i></button>
        </form>
      </div>
    </div>
  </header>
  <div class="section__container" id="datphong">
    <?php
    if (isset($_POST['searchroom'])) {
      $checkout = $_POST['checkout'];
      $checkin = $_POST['checkin'];
      $songuoi = $_POST['songuoi'];

      $dateCheckin = new DateTime($checkin);
      $dateCheckout = new DateTime($checkout);
      // So sánh ngày
      if ($dateCheckin < $dateCheckout) {
        $sql = "SELECT phong.id_phong, phong.sophong,loaiphong.loaiphong, loaiphong.giaphong, loaiphong.songuoi, loaiphong.mota, phong.anh FROM phong
      INNER JOIN loaiphong ON phong.id_loaiphong = loaiphong.id_loaiphong
      LEFT JOIN phieuthuephong ON phong.id_phong = phieuthuephong.id_phong
      LEFT JOIN khachhang ON phieuthuephong.id_khachhang = khachhang.id_khachhang
      WHERE  (phieuthuephong.id_phong IS NULL OR ('$checkout' < phieuthuephong.checkin OR '$checkin' > phieuthuephong.checkout))
       AND loaiphong.songuoi = '$songuoi'";
        $qr = mysqli_query($connection, $sql);
        if (mysqli_num_rows($qr) > 0) {
          echo "<h2 class='section__header'>Phòng " . $songuoi . " người từ ngày " . $checkin . " đến " . $checkout . "</h2>";
          while ($room = mysqli_fetch_assoc($qr)) {
            echo " <div class='card' style='width: 18rem; display: inline-block;'>";
            echo "<img src='../img/" . $room['anh'] . "' class='card-img-top card-room' alt='...'>";
            echo      "<div class='card-body'>";
            echo        "<h5 class='card-title'>" . $room['loaiphong'] . "-" . $room['sophong'] . "</h5>";
            echo        "<p class='card-text'>Số người tối đa: " . $room['songuoi'] . ".</p>";
            $mota = substr($room['mota'], 0, 38) . "...";
            echo        "<p class='card-text'>" . $room['mota'] . ".</p>";
            echo        "<p class='card-text'>" . $room['giaphong'] . "$</p>";
            $checkincode = base64_encode($checkin);
            $checkoutcode = base64_encode($checkout);
            echo        "<a href='../customerView/datphongonline.php?id=" . $room['id_phong'] . '&checkin=' . $checkincode . '&checkout=' . $checkoutcode . "' class='btn btn-primary'>Liên hệ đặt phòng</a>";
            echo        "</div>";
            echo      "</div>";
          }
        } else {
          echo "<h2 class='section__header'>Không có Phòng " . $songuoi . " người từ ngày " . $checkin . " đến " . $checkout . "</h2>";
        }
      } elseif ($dateCheckin > $dateCheckout) {
        echo "<h2 class='section__header'>Checkin phải nhỏ hơn checkout. Vui lòng nhập lại!</h2>";
      } else {
        echo "<h2 class='section__header'>Checkin phải nhỏ hơn checkout. Vui lòng nhập lại!</h2>";
      }
    } else {
      echo "<h2 class='section__header'>Phòng trống trong hôm nay</h2>";
      $ngay_hom_nay = date("Y-m-d H:i");
      $qrloaiphong = mysqli_query($connection, "SELECT * FROM phong INNER JOIN loaiphong ON loaiphong.id_loaiphong = phong.id_loaiphong LEFT JOIN phieuthuephong ON phong.id_phong = phieuthuephong.id_phong
      WHERE (phieuthuephong.id_phong IS NULL OR ('$ngay_hom_nay' < phieuthuephong.checkin OR '$ngay_hom_nay' > phieuthuephong.checkout)) GROUP BY phong.id_phong ORDER BY phong.id_loaiphong");
      while ($row = mysqli_fetch_assoc($qrloaiphong)) {
        // echo $row['loaiphong']."-Giá phong:". $row['giaphong']. "<br>mota: ". $row['mota'] . "<br>";  
    ?>
        <div class="container mt-5">
          <div class="row justify-content-center g-2">
            <div class="col-md-3">
              <h4><?php echo $row['loaiphong'] . "-" . $row['sophong'] ?></h4>
              <img src="../img/<?= $row['anh'] ?>" alt="" style="object-fit: cover">
            </div>
            <div class="col-md-9">
              <h6>Chi tiết thông tin phòng</h6>
              <p>Sô người: <?= $row['songuoi'] ?></p>
              <p>Giá phòng: $<?= $row['giaphong'] ?> </p>
              <p>Mô tả: <?= $row['mota'] ?></p>
              <!-- <a name="" id="" class="btn btn-primary" href="#" role="button">Button</a> -->
            </div>
            <!-- <a name="" id="" class="btn btn-primary" href="timphong.php?loai=<?= $row['id_loaiphong'] ?>" style="width: 120px" role="button">Tìm phòng</a> -->
          </div>
        </div>

    <?php
      }
    }
    ?>

  </div>
  <div class="section__container">
    <h2 class="section__header">HOMESTAY REVIEW</h2>
    <iframe width="100%" height="655px" src="https://www.youtube.com/embed/ahy5o5nT4oI" title="DUBAI, United Arab Emirates In 8K ULTRA HD HDR 60 FPS." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
  </div>
  <div class="section__container">
    <h2 class="section__header">HOMESTAY LOCATION</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1694.412361207917!2d105.81572526784335!3d21.002137088447963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad7e34c38417%3A0xc71349f59f79d12d!2sRoyal%20thanh%20xu%C3%A2n!5e0!3m2!1svi!2s!4v1700068657941!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="section__container" id="lienhe">
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
<script src="ajax.js"></script>

</html>