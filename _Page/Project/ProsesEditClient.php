<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_POST['id_akses'])){
        header('Location:../../index.php?page=project&subpage=KelolaClient');
    }else{
        $id_akses=$_POST['id_akses'];
        if(empty($_POST['nama'])){
            header('Location:../../index.php?page=project&subpage=EditClient&id='.$id_akses.'&Notifikasi=Gagal1');
        }else{
            if(empty($_POST['email'])){
                header('Location:../../index.php?page=project&subpage=EditClient&id='.$id_akses.'&Notifikasi=Gagal2');
            }else{
                if(empty($_POST['kontak'])){
                    header('Location:../../index.php?page=project&subpage=EditClient&id='.$id_akses.'&Notifikasi=Gagal3');
                }else{
                    if(empty($_POST['password1'])){
                        header('Location:../../index.php?page=project&subpage=EditClient&id='.$id_akses.'&Notifikasi=Gagal4');
                    }else{
                        if(empty($_POST['password2'])){
                            header('Location:../../index.php?page=project&subpage=EditClient&id='.$id_akses.'&Notifikasi=Gagal5');
                        }else{
                            $nama=$_POST['nama'];
                            $email=$_POST['email'];
                            $kontak=$_POST['kontak'];
                            $password1=$_POST['password1'];
                            $password2=$_POST['password2'];
                            $akses="Client";
                            if($password1!==$password2){
                                header('Location:../../index.php?page=project&subpage=EditClient&id='.$id_akses.'&Notifikasi=Gagal7');
                            }else{
                                $UpdateAkses = mysqli_query($Conn,"UPDATE akses SET 
                                    nama='$nama',
                                    email='$email',
                                    kontak='$kontak',
                                    password='$password1'
                                WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
                                if($UpdateAkses){
                                    header('Location:../../index.php?page=project&subpage=DetailClient&id='.$id_akses.'');
                                }else{
                                    header('Location:../../index.php?page=project&subpage=EditClient&id='.$id_akses.'&Notifikasi=Gagal8');
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>