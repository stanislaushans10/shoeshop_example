<?php
    include 'config.php';
    include 'sessionStarter.php';
    include 'sessionChecker.php';

    $sql = "SELECT MAX(transactionId) FROM cart";
    $result = mysqli_query($conn,$sql);
    $latestTransactionId = mysqli_fetch_array($result);
    $latestTransactionId[0] = $latestTransactionId[0] + 1;
    $transactionId = $latestTransactionId[0];
    // echo $transactionId;

    $sql = "UPDATE cart SET transactionId = '$transactionId', status = 1 WHERE userId = $ID AND transactionId IS NULL ";
    $result = mysqli_query($conn,$sql);

?>
<html>
    <p>confirmation success, your payment is under review</p>
    <meta http-equiv="refresh"
        content="5; url = home.php">
</html>
