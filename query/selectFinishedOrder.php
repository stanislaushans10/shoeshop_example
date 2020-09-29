<?php
    $sql = "SELECT DISTINCT  transactionId, userId, SUM(harga), status, isReceived, MIN(isReviewed)
            FROM cart
            WHERE userId = $ID AND (status = 1 OR status = 2) AND isReceived = 1
            GROUP BY transactionId";
    $result = mysqli_query($conn,$sql);
?>
