<?php
    //panggil dari database
    $QryMedsos = mysqli_query($Conn,"SELECT * FROM setting_medsos WHERE id_setting_medsos='1'")or die(mysqli_error($Conn));
    $DataMedsos = mysqli_fetch_array($QryMedsos);
    //rincian profile user
    $id_setting_medsos= $DataMedsos['id_setting_medsos'];
    $nama_medsos= $DataMedsos['nama_medsos'];
    $nama_medsos= $DataMedsos['nama_medsos'];
?>