<?php
    include "./database.php";
    // Lấy ngày hôm nay
    $ngay_hom_nay = date("Y-m-d H:i");


    $sql = "SELECT * FROM  phong";
    $query = $connection->query($sql);
    $rooms =  $query->num_rows;

    $sqlq = "SELECT p.id_phong, p.sophong
    FROM phong p
    INNER JOIN phieuthuephong pt ON p.id_phong = pt.id_phong
    WHERE '$ngay_hom_nay' BETWEEN pt.checkin AND pt.checkout";
    
    $queryq = $connection->query($sqlq);

    $roomed = $queryq->num_rows;
    echo $rooms - $roomed;
    // echo "$query->num_rows";
    // echo $ngay_hom_sau;
?>