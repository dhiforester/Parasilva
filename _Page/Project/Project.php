<?php
    if(empty($_GET['subpage'])){
        if(empty($SessionIdAkses)){
            include "_Page/Login/Login.php";
        }else{
            include "_Page/Project/MyProject.php";
        }
    }else{
        $subpage=$_GET['subpage'];
        if($subpage=="DetailProject"){
            include "_Page/Project/DetailProject.php";
        }else{
            if($subpage=="KelolaProject"){
                include "_Page/Project/KelolaProject.php";
            }else{
                if($subpage=="KelolaClient"){
                    include "_Page/Project/KelolaClient.php";
                }else{
                    include "_Page/Project/DetailProject.php";
                }
            }
        }
    }

?>