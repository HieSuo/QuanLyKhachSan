<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to HomeStayMS</title>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Booostrap -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/loginnew.css">
</head>

<body>

    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form action="ajax.php" method="GET">
                <h1>Đăng nhập</h1>
                <?php
                if (isset($_GET['empty'])) {
                    echo '<div class="alert alert-danger">Enter Username or Password</div>';
                } elseif (isset($_GET['loginE'])) {
                    echo '<div class="alert alert-danger">Tài khoản và mật khẩu không đúng</div>';
                } ?>
                <span>sử dụng email bạn đã đăng ký</span>
                <input required type="text" name="email" id="email" placeholder="Email" />
                <input required type="password" name="password" id="password" placeholder="Password" />
                <div class="response"></div>
                <a href="#">Quên mật khẩu?</a>
                <button type="submit" name="login">Đăng nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Phần Mềm Quản Lý</h1>
                    <p>Đăng nhập sử dụng ngay</p>
                    <a class="ghost" href="http://localhost/HomeStayMS-HUNRE/customerView/trangchu.php" id="signUp">Truy cập website</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>