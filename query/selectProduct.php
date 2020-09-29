<?php
    $sql = "SELECT *  FROM produk ORDER BY created_at LIMIT 10";
    $result = mysqli_query($conn,$sql);
?>
