<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_GET['id'])){
        header('Location:../../index.php?page=project&subpage=KelolaClient');
    }else{
        $id_akses=$_GET['id'];
        $query = mysqli_query($Conn, "DELETE FROM akses WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
        if ($query) {
            //Hapus project
            $query2 = mysqli_query($Conn, "DELETE FROM project WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
            if($query2){
                //hapus project_progres
                $query3= mysqli_query($Conn, "DELETE FROM project_progres WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
                if($query3){
                    header('Location:../../index.php?page=project&subpage=KelolaClient');
                }else{
                    header('Location:../../index.php?page=project&subpage=KelolaClient');
                }
            }else{
                header('Location:../../index.php?page=project&subpage=KelolaClient');
            }
        }else{
            header('Location:../../index.php?page=project&subpage=KelolaClient');
        }
    }
?>