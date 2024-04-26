<?php
    include "./database.php";
     $sql = "SELECT SUM(sotien) AS tong_so_tien FROM phieuthu";
    $query = $connection->query($sql);

    $row = $query->fetch_assoc();
    $tong_so_tien = $row['tong_so_tien'];
    echo $tong_so_tien;
?>