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
                    if($subpage=="TambahClient"){
                        include "_Page/Project/TambahClient.php";
                    }else{
                        if($subpage=="DetailClient"){
                            include "_Page/Project/DetailClient.php";
                        }else{
                            if($subpage=="AddProject"){
                                include "_Page/Project/AddProject.php";
                            }else{
                                include "_Page/Project/DetailProject.php";
                            }
                        }
                    }
                }
            }
        }
    }

?>