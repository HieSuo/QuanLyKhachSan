<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar no-padding">
  <div class="position-sticky">
    <ul class="nav flex-column">
      <!-- dashboard li -->
      <?php
      if (isset($_GET['dashboard'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?dashboard">
            </i> Dashboard
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?dashboard">
            </i> Dashboard
          </a>
        </li>
      <?php
      }
      ?>

      <!-- dashboard li -->
      <?php
      if (isset($_GET['datphong'])) {
      ?>
        <!-- <li class="nav-item active">
          <a class="nav-link" href="index.php?datphong">
             Đặt Phòng
          </a>
        </li> -->
      <?php
      } else { ?>
        <!-- <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?datphong">
             Đặt Phòng
          </a>
        </li> -->
      <?php
      }
      ?>

      <!-- Loại phòng li -->
      <?php
      if (isset($_GET['loaiphong'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?loaiphong">
            QL Loại Phòng
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item color-gray">
          <a class="nav-link color-gray" href="index.php?loaiphong">
            QL Loại Phòng
          </a>
        </li>
      <?php
      }
      ?>

      <!-- Loại phòng li -->
      <?php
      if (isset($_GET['phong'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?phong">
            QL Phòng
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item color-gray">
          <a class="nav-link color-gray" href="index.php?phong">
            QL Phòng
          </a>
        </li>
      <?php
      }
      ?>


      <!-- Dịch vụ li -->
      <?php
      if (isset($_GET['dichvu'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?dichvu">
            QL Dịch Vụ
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?dichvu">
            QL Dịch Vụ
          </a>
        </li>
      <?php
      }
      ?>
      <!-- khách hàng li -->
      <?php
      if (isset($_GET['khachhang'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?khachhang">
            Booking
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?khachhang">
            Booking
          </a>
        </li>
      <?php
      }
      ?>
      <!-- booking-online li -->
      <?php
      if (isset($_GET['bookingonline'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?bookingonline">
            Booking Online
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?bookingonline">
            Booking Online
          </a>
        </li>
      <?php
      }
      ?>
      <!-- Phiếu thu li -->
      <?php
      if (isset($_GET['phieuthu'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?phieuthu">
            Phiếu thu
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?phieuthu">
            Phiếu thu
          </a>
        </li>
      <?php
      }
      ?>
      <!-- Phiếu chi li -->
      <?php
      if (isset($_GET['phieuchi'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?phieuchi">
            Hóa đơn
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?phieuchi">
            Hóa đơn
          </a>
        </li>
      <?php
      }
      ?>
      <!-- Calendar li -->
      <?php
      if (isset($_GET['calendar'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?calendar">
            Lịch đặt phòng
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?calendar">
            Lịch đặt phòng
          </a>
        </li>
      <?php
      }
      ?>

      <!-- Tài khoản người dùng li -->
      <?php
      if (isset($_GET['taikhoan'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?taikhoan">
            Tài khoản người dùng
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?taikhoan">
            Tài khoản người dùng
          </a>
        </li>
      <?php
      }
      ?>
      <!-- Báo cáo thống kê li -->
      <?php
      if (isset($_GET['baocao'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?baocao">
            Báo cáo thống kê
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?baocao">
            Báo cáo thống kê
          </a>
        </li>
      <?php
      }
      ?>
      <!-- Cấu hình web li -->
      <?php
      if (isset($_GET['cauhinh'])) {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?cauhinh">
            Cấu hình Website
          </a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link color-gray" href="index.php?cauhinh">
            Cấu hình Website
          </a>
        </li>
      <?php
      }
      ?>
    </ul>
  </div>
</nav>