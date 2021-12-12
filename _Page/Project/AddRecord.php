<!-- Start Blog  -->
<?php
    date_default_timezone_set('Asia/Jakarta');
    if($SessionAkses!=="Admin"){
        header('Location:index.php?page=project');
    }else{
        if(empty($_GET['idProject'])){
            $id_project="";
        }else{
            $id_project=$_GET['idProject'];
            //Buka detail project
            $QryProject = mysqli_query($Conn,"SELECT * FROM project WHERE id_project='$id_project'")or die(mysqli_error($Conn));
            $DataProject = mysqli_fetch_array($QryProject);
            $id_akses= $DataProject['id_akses'];
            $nama_project= $DataProject['name_project'];
?>
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Form Tambah Record</h1>
                    <p class="text-dark">
                        Buat Record Untuk Progres Project Untuk Laporan Ke Client Anda
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 blog-box">
                <div class="blog-content">
                    <div class="title-blog">
                        <form action="_Page/Project/ProsesTambahRecord.php" method="post" autocomplete="off">
                            <input type="hidden" name="id_akses" value="<?php echo "$id_akses"; ?>">
                            <input type="hidden" name="id_project" value="<?php echo "$id_project"; ?>">
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="nama"><b>Nama Project :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" readonly name="nama" id="nama" class="form-control" value="<?php echo "$nama_project"; ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="tanggal"><b>Tanggal Project :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="waktu"><b>Waktu :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" name="waktu" id="waktu" class="form-control" value="<?php echo date('H:i'); ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="deskripsi"><b>Deskripsi :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-6">
                                    <?php
                                        if(empty($_GET['Notifikasi'])){
                                            echo "<small>Pastikan bahwa informasi progress yang anda masukan sudah benar.</small>";
                                        }else{
                                            $Notifikasi=$_GET['Notifikasi'];
                                            if($Notifikasi=="Gagal1"){
                                                echo '<small class="text-danger">Client Tidak Boleh Kosong</small>';
                                            }else{
                                                if($Notifikasi=="Gagal2"){
                                                    echo '<small class="text-danger">Tanggal Project Tidak Boleh Kosong</small>';
                                                }else{
                                                    if($Notifikasi=="Gagal3"){
                                                        echo '<small class="text-danger">Nama Project Tidak Boleh Kosong</small>';
                                                    }else{
                                                        if($Notifikasi=="Gagal4"){
                                                            echo '<small class="text-danger">URL Demo Tidak Boleh Kosong</small>';
                                                        }else{
                                                            if($Notifikasi=="Gagal5"){
                                                                echo '<small class="text-danger">Deskripsi Tidak Boleh Kosong</small>';
                                                            }else{
                                                                if($Notifikasi=="Gagal8"){
                                                                    echo '<small class="text-danger">Proses Input Data Project Gagal!!.</small>';
                                                                }else{
                                                                    echo '<small class="text-danger">Proses Input Data Project Gagal!!.</small>';
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-md btn-primary mt-2 mr-2">
                                        <i class="fa fa-plus-circle"></i> Tambahkan Progress
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }} ?>