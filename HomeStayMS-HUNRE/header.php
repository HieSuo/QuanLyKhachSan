<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Management System- Dashboard</title>

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
    <script src="js/jquery.datetimepicker.full.min.js"></script>
    <link rel="stylesheet" href="css/jquery.datetimepicker.min.css" />

    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/custom.css">
    
    <!-- fontawsome -->
    <script src="https://kit.fontawesome.com/38926e5750.js" crossorigin="anonymous"></script>
  </head>

<body>
<nav class="navbar navbar-light bg-light fixed-top header-navbar">
  <div class="container-fluid">
    <a class="navbar-brand header-logo" href="#" >
      <!-- <img src="img/user.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> -->
      <span>HOMESTAY</span> MANAGEMENT SYSTEM
    </a>
    <div class="account-header">
      <!-- HIỂN THỊ TÊN NG DUNG -->
        <a class="color-white no-deco" href=""><?php echo $_SESSION['username'];?></a>
        <a class="color-white no-deco" href="logout.php">Logout</a>

    </div>
  </div>
</nav>

