<?php
    include "./database.php";
    $sql = "SELECT * FROM  loaiphong";
    $query = $connection->query($sql);
    echo "$query->num_rows";
?>