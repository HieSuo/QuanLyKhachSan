<?php
    include "./database.php";
    $sql = "SELECT * FROM  nguoidung";
    $query = $connection->query($sql);
    echo "$query->num_rows";
?>