<?php
    $sql = "SELECT DISTINCT  transactionId, userId, SUM(harga), status, isReceived  FROM cart WHERE userId = $ID AND (status = 1 OR status = 2) AND isReceived = 0";
    $result = mysqli_query($conn,$sql);
?>
