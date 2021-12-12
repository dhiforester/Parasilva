<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_GET['id'])){
        header('Location:../../index.php?page=project');
    }else{
        $id_project_progres=$_GET['id'];
        //Membuka data id_project
        $QryProject = mysqli_query($Conn,"SELECT * FROM project_progres WHERE id_project_progres='$id_project_progres'")or die(mysqli_error($Conn));
        $DataProject = mysqli_fetch_array($QryProject);
        $id_project= $DataProject['id_project'];
        $query = mysqli_query($Conn, "DELETE FROM project_progres WHERE id_project_progres='$id_project_progres'") or die(mysqli_error($Conn));
        if ($query) {
            header('Location:../../index.php?page=project&subpage=DetailProject&id='.$id_project.'');
        }else{
            header('Location:../../index.php?page=project&subpage=DetailProject&id='.$id_project.'');
        }
    }
?>