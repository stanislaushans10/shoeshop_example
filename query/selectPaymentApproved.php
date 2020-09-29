<?php
    $sql = "SELECT transactionId, userId, SUM(harga), trfImage, status, isReceived  FROM cart  WHERE status = 2 GROUP BY transactionId";
    $result = mysqli_query($conn,$sql);
?>
