<?php
    include "./database.php";
    $sql = "SELECT * FROM  phong";
    $query = $connection->query($sql);
    echo "$query->num_rows";
?>