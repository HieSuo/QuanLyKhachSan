<?php
    include "./database.php";
    $sql = "SELECT * FROM  booking_online WHERE trangthai = 'Dat thanh cong'";
    $query = $connection->query($sql);
    echo "$query->num_rows";
?>