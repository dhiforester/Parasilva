<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_POST['id_project'])){
        header('Location:../../index.php?page=project&subpage=KelolaProject&Notifikasi=Gagal1');
    }else{
        $id_project=$_POST['id_project'];
        if(empty($_POST['id_akses'])){
            header('Location:../../index.php?page=project&subpage=AddRecord&idProject='.$id_project.'&Notifikasi=Gagal2');
        }else{
            if(empty($_POST['tanggal'])){
                header('Location:../../index.php?page=project&subpage=AddRecord&idProject='.$id_project.'&Notifikasi=Gagal3');
            }else{
                if(empty($_POST['waktu'])){
                    header('Location:../../index.php?page=project&subpage=AddRecord&idProject='.$id_project.'&Notifikasi=Gagal4');
                }else{
                    if(empty($_POST['deskripsi'])){
                        header('Location:../../index.php?page=project&subpage=AddRecord&idProject='.$id_project.'&Notifikasi=Gagal5');
                    }else{
                        $id_project=$_POST['id_project'];
                        $id_akses=$_POST['id_akses'];
                        $tanggal=$_POST['tanggal'];
                        $waktu=$_POST['waktu'];
                        $tanggal_waktu="$tanggal $waktu";
                        $deskripsi=$_POST['deskripsi'];
                        $entry="INSERT INTO project_progres (
                            id_project,
                            id_akses,
                            tanggal,
                            deskripsi
                        ) VALUES (
                            '$id_project',
                            '$id_akses',
                            '$tanggal_waktu',
                            '$deskripsi'
                        )";
                        $Input=mysqli_query($Conn, $entry);
                        if($Input){
                            header('Location:../../index.php?page=project&subpage=DetailProject&id='.$id_project.'');
                        }else{
                            header('Location:../../index.php?page=project&subpage=AddRecord&idProject='.$id_project.'&Notifikasi=Gagal6');
                        }
                    }
                }
            }
        }
    }
    
    
?>