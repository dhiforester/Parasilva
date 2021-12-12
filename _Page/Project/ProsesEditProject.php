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
            header('Location:../../index.php?page=project&subpage=EditProject&id='.$id_project.'&Notifikasi=Gagal1');
        }else{
            if(empty($_POST['tanggal'])){
                header('Location:../../index.php?page=project&subpage=EditProject&id='.$id_project.'&Notifikasi=Gagal2');
            }else{
                if(empty($_POST['name_project'])){
                    header('Location:../../index.php?page=project&subpage=EditProject&id='.$id_project.'&Notifikasi=Gagal3');
                }else{
                    if(empty($_POST['url_demo'])){
                        header('Location:../../index.php?page=project&subpage=EditProject&id='.$id_project.'&Notifikasi=Gagal4');
                    }else{
                        if(empty($_POST['deskripsi'])){
                            header('Location:../../index.php?page=project&subpage=EditProject&id='.$id_project.'&Notifikasi=Gagal5');
                        }else{
                            $id_project=$_POST['id_project'];
                            $id_akses=$_POST['id_akses'];
                            $tanggal=$_POST['tanggal'];
                            $name_project=$_POST['name_project'];
                            $url_demo=$_POST['url_demo'];
                            $deskripsi=$_POST['deskripsi'];
                            $UpdateProject = mysqli_query($Conn,"UPDATE project SET 
                                id_akses='$id_akses',
                                tanggal='$tanggal',
                                name_project='$name_project',
                                url_demo='$url_demo',
                                deskripsi='$deskripsi'
                            WHERE id_project='$id_project'") or die(mysqli_error($Conn)); 
                            if($UpdateProject){
                                header('Location:../../index.php?page=project&subpage=DetailProject&id='.$id_project.'');
                            }else{
                                header('Location:../../index.php?page=project&subpage=EditProject&id='.$id_project.'&Notifikasi=Gagal6');
                            }
                        }
                    }
                }
            }
        }
    }
?>