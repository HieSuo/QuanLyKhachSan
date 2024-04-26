<?php
    include "./database.php";
    // Lấy ngày hôm nay
    $ngay_hom_nay = date("Y-m-d H:i");

// Truy vấn để lấy danh sách các phòng trống trong ngày hôm nay
    $sql = "SELECT p.id_phong, p.sophong
    FROM phong p
    INNER JOIN phieuthuephong pt ON p.id_phong = pt.id_phong
    WHERE '$ngay_hom_nay' BETWEEN pt.checkin AND pt.checkout";
    
    $query = $connection->query($sql);

    echo "$query->num_rows";
?>