<?php
    session_start();
    if (isset($_SESSION['id_akses']) || !empty($_SESSION['id_akses'])){
        $SessionIdAkses=$_SESSION['id_akses'];
        //panggil dari database
        $QuerySessionAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$SessionIdAkses'")or die(mysqli_error($Conn));
        $DataSessionAkses = mysqli_fetch_array($QuerySessionAkses);
        //rincian profile user
        $SessionNama= $DataSessionAkses['nama'];
        $SessionEmail= $DataSessionAkses['email'];
        $SessionKontak= $DataSessionAkses['kontak'];
        $SessionPassword= $DataSessionAkses['password'];
        $SessionAkses= $DataSessionAkses['akses'];
    }else{
        $SessionIdAkses="";
        $SessionNama="";
        $SessionEmail="";
        $SessionKontak="";
        $SessionPassword="";
        $SessionAkses="";
    }
?>