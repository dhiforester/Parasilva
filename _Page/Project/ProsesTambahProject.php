<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_POST['id_akses'])){
        header('Location:../../index.php?page=project&subpage=AddProject&Notifikasi=Gagal1');
    }else{
        if(empty($_POST['tanggal'])){
            header('Location:../../index.php?page=project&subpage=AddProject&Notifikasi=Gagal2');
        }else{
            if(empty($_POST['name_project'])){
                header('Location:../../index.php?page=project&subpage=AddProject&Notifikasi=Gagal3');
            }else{
                if(empty($_POST['url_demo'])){
                    header('Location:../../index.php?page=project&subpage=AddProject&Notifikasi=Gagal4');
                }else{
                    if(empty($_POST['deskripsi'])){
                        header('Location:../../index.php?page=project&subpage=AddProject&Notifikasi=Gagal5');
                    }else{
                        $id_akses=$_POST['id_akses'];
                        $tanggal=$_POST['tanggal'];
                        $name_project=$_POST['name_project'];
                        $url_demo=$_POST['url_demo'];
                        $deskripsi=$_POST['deskripsi'];
                        $entry="INSERT INTO project (
                            id_akses,
                            tanggal,
                            name_project,
                            url_demo,
                            deskripsi
                        ) VALUES (
                            '$id_akses',
                            '$tanggal',
                            '$name_project',
                            '$url_demo',
                            '$deskripsi'
                        )";
                        $Input=mysqli_query($Conn, $entry);
                        if($Input){
                            header('Location:../../index.php?page=project&subpage=DetailClient&id='.$id_akses.'');
                        }else{
                            header('Location:../../index.php?page=project&subpage=AddProject&Notifikasi=Gagal6');
                        }
                    }
                }
            }
        }
    }
    
    
?>