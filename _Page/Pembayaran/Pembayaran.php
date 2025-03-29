<?php
    if(empty($_GET['id'])){
        echo "Error No ID ";
    }else{
        $id=$_GET['id'];
        if($id=="SLM1"){
            include "_Page/Pembayaran/Pembayaran1.php";
        }else{
            if($id=="ISTQ1"){
                include "_Page/Pembayaran/Pembayaran2.php";
            }else{
                echo "Error ID Invalid";
            }
        }
    }
?>