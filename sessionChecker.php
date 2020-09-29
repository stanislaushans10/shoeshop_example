<?php
    if(session_status() == 2){
        // echo session_status();
        if(empty($_SESSION['login_ID'])){
            // echo " masuk sini";
            session_destroy();
        }
        else{
            $ID = $_SESSION['login_ID'];
            $nama = $_SESSION['login_Nama'];
            $status = $_SESSION['login_Status'];
        }
    }
?>
