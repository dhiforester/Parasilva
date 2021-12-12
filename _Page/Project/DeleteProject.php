<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_GET['id'])){
        header('Location:../../index.php?page=project&subpage=KelolaProject');
    }else{
        $id_project=$_GET['id'];
       //Hapus project
        $query2 = mysqli_query($Conn, "DELETE FROM project WHERE id_project='$id_project'") or die(mysqli_error($Conn));
        if($query2){
            //hapus project_progres
            $query3= mysqli_query($Conn, "DELETE FROM project_progres WHERE id_project='$id_project'") or die(mysqli_error($Conn));
            if($query3){
                header('Location:../../index.php?page=project&subpage=KelolaProject');
            }else{
                header('Location:../../index.php?page=project&subpage=KelolaProject');
            }
        }else{
            header('Location:../../index.php?page=project&subpage=KelolaProject');
        }
    }
?>