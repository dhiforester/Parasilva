<?php
    if(empty($_GET['page'])){
        include "Home.php";
    }else{
        $Page=$_GET['page'];
        if($Page=="tentang"){
            include "Tentang.php";
        }else{
            if($Page=="lokasi"){
                include "Lokasi.php";
            }else{
                if($Page=="produk"){
                    include "Produk.php";
                }else{
                    if($Page=="project"){
                        include "_Page/Project/Project.php";
                    }else{
                        include "index.php";
                    }
                }
            }
        }
    }

?>