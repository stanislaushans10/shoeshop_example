<?php
    $sql = "SELECT DISTINCT  transactionId, userId, SUM(harga), trfImage, status, isReceived  FROM cart WHERE status = 1";
    $result = mysqli_query($conn,$sql);
?>
