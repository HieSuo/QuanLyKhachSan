<?php
    include "./database.php";
    $sql = "SELECT * FROM  dichvu";
    $query = $connection->query($sql);
    echo "$query->num_rows";
?>