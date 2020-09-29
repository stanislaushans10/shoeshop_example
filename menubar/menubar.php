<?php
echo('
    <header><center><div style="background-color:#c5b1f2; border-radius: 10px;"><h1>Toko Sepatu</h1></div></center></header>
');
echo('<div class="navbar">');
    echo('<div class="flex-container">');



        echo('
            <a class="fas fa-home fa-2x" type="button" href="./home.php"></a>
        ');
        //menu 1
            echo('
                <div class="dropdown">
                    <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #8a46b8">Catalog
                    <span class="caret"></span></button>
            ');
                echo('
                    <ul class="dropdown-menu">
                ');
                        // echo('
                        //     <li class="dropdown-submenu">
                        //         <a class="test" href="#">Menu 1.1<span class="caret"></span></a>
                        //         <ul class="dropdown-menu">
                        // ');
                        //     echo('
                        //         <li><a href="#">menu 1.1.1</a></li>
                        //     ');
                        //     echo('
                        //         <li><a href="#">menu 1.1.2</a></li>
                        //     ');
                        // echo('
                        //         </ul>
                        //     </li>
                        // ');
                        echo('
                            <li><a tabindex="-1" href="product.php">All Product</a></li>
                        ');
                echo('
                    </ul>
                ');
            echo('
                </div>
            ');

        //menu 2
            if(!empty($_SESSION['login_ID'])){
            echo('
                <div class="dropdown">
                    <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #8a46b8">Pesanan
                    <span class="caret"></span></button>
            ');
                echo('<ul class="dropdown-menu">');
                        echo('
                            <li><a tabindex="-1" href="statusOrder.php">Pesanan Dalam Proses</a></li>
                        ');
                        echo('
                            <li><a tabindex="-1" href="myOrder.php">Pesanan Selesai</a></li>
                        ');
                echo('</ul>');
            echo('</div>');
            }


        //menu 3
            // echo('
            //     <div class="dropdown">
            //         <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #8a46b8">Utility
            //         <span class="caret"></span></button>
            // ');
            //     echo('<ul class="dropdown-menu">');
            //             echo('
            //                 <li><a tabindex="-1" href="#">Menu 3.1</a></li>
            //             ');
            //             echo('
            //                 <li><a tabindex="-1" href="menuAccess.php">Tabel Hak Akses Menu</a></li>
            //             ');
            //     echo('</ul>');
            // echo('</div>');

?>
