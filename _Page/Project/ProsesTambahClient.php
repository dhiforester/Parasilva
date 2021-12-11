<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_POST['nama'])){
        header('Location:../../index.php?page=project&subpage=TambahClient&Notifikasi=Gagal1');
    }else{
        if(empty($_POST['email'])){
            header('Location:../../index.php?page=project&subpage=TambahClient&Notifikasi=Gagal2');
        }else{
            if(empty($_POST['kontak'])){
                header('Location:../../index.php?page=project&subpage=TambahClient&Notifikasi=Gagal3');
            }else{
                if(empty($_POST['password1'])){
                    header('Location:../../index.php?page=project&subpage=TambahClient&Notifikasi=Gagal4');
                }else{
                    if(empty($_POST['password2'])){
                        header('Location:../../index.php?page=project&subpage=TambahClient&Notifikasi=Gagal5');
                    }else{
                        $nama=$_POST['nama'];
                        $email=$_POST['email'];
                        $kontak=$_POST['kontak'];
                        $password1=$_POST['password1'];
                        $password2=$_POST['password2'];
                        $akses="Client";
                        $ValidasiEmailSama=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE email='$email'"));
                        if(!empty($ValidasiEmailSama)){
                            header('Location:../../index.php?page=project&subpage=TambahClient&Notifikasi=Gagal6');
                        }else{
                            if($password1!==$password2){
                                header('Location:../../index.php?page=project&subpage=TambahClient&Notifikasi=Gagal7');
                            }else{
                                $entry="INSERT INTO akses (
                                    nama,
                                    email,
                                    kontak,
                                    password,
                                    akses
                                ) VALUES (
                                    '$nama',
                                    '$email',
                                    '$kontak',
                                    '$password1',
                                    '$akses'
                                )";
                                $Input=mysqli_query($Conn, $entry);
                                if($Input){
                                    header('Location:../../index.php?page=project&subpage=KelolaClient');
                                }else{
                                    header('Location:../../index.php?page=project&subpage=TambahClient&Notifikasi=Gagal8');
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    
    
?>