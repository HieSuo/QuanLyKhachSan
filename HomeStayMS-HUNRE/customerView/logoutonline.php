<?php
session_start();
unset($_SESSION['id_tk_online']);
// Tất cả dữ liệu trong session đã bị xóa
header('location: trangchu.php');
?>