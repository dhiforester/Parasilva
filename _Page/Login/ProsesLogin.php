<?php
    //KONEKSI KE DATABASE SQL
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //TANGKAP VARIABEL DARI FORMULIR LOGIN.PHP
    $email=$_POST["email"];
    $password=$_POST["password"];
    //QUERY MEMANGGIL DATA DARI DATABASE PELANGGAN
    $QueryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE email='$email' AND password='$password'")or die(mysqli_error($conn));
    $DataAkses = mysqli_fetch_array($QueryAkses);
    $MyIdAkses=$DataAkses["id_akses"];
    //Apabila user ada pada database
    if(!empty($DataAkses["id_akses"])){
        //Jika valid-langsung masuk SESSION
        session_start();
        $_SESSION ["id_akses"]= $MyIdAkses;
        header('Location:../../index.php?page=project');
    }else{
        header('Location:../../index.php?page=project&Notifikasi=error');
    }	
?>