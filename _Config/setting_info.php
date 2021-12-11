<?php
    //panggil dari database
    $QrySettingInfo = mysqli_query($Conn,"SELECT * FROM setting_info WHERE id_setting_info='1'")or die(mysqli_error($Conn));
    $DataSettingInfo = mysqli_fetch_array($QrySettingInfo);
    //rincian profile user
    $JudulWeb= $DataSettingInfo['judul_web'];
    $KeywordWeb= $DataSettingInfo['keyword'];
    $DeskripsiWeb= $DataSettingInfo['deskripsi'];
    $PendiriWeb= $DataSettingInfo['pendiri'];
    $FaviconWeb= $DataSettingInfo['favicon'];
    $HeaderLogoWeb= $DataSettingInfo['header_logo'];
?>