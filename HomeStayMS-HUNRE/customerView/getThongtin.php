<?php
    include "../database.php";
    $rs = mysqli_query($connection, "SELECT * FROM thongtinhethong");
    $row = mysqli_fetch_assoc($rs);
    $tencongty = $row['tencongty'];
    $motacongty = $row['mota'];
    $emaicongty = $row['email'];
    $sdtcongty = $row['sdt'];
?>