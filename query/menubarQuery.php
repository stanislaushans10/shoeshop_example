<?php
    $sql = "SELECT menu1, menu2, menu3  FROM  menu WHERE NoAng = '$NoAng'";
    $result = mysqli_query($conn,$sql);
    $menulvl1 = mysqli_fetch_array($result);

    $sql = "SELECT menu11, menu12, menu21, menu22, menu31, menu32  FROM  menu WHERE NoAng = '$NoAng'";
    $result = mysqli_query($conn,$sql);
    $menulvl2 = mysqli_fetch_array($result);

    $sql = "SELECT menu111, menu112, menu121, menu122  FROM  menu WHERE NoAng = '$NoAng'";
    $result = mysqli_query($conn,$sql);
    $menulvl3 = mysqli_fetch_array($result);
?>
