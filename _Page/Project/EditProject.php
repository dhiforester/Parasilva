<!-- Start Blog  -->
<?php
    if($SessionAkses!=="Admin"){
        header('Location:index.php?page=project');
    }else{
        if(empty($_GET['id'])){
            $id_project="";
        }else{
            $id_project=$_GET['id'];
            $QryProject = mysqli_query($Conn,"SELECT * FROM project WHERE id_project='$id_project'")or die(mysqli_error($Conn));
            $DataProject = mysqli_fetch_array($QryProject);
            $id_akses= $DataProject['id_akses'];
            $id_project= $DataProject['id_project'];
            $tanggal= $DataProject['tanggal'];
            $name_project= $DataProject['name_project'];
            $url_demo= $DataProject['url_demo'];
            $deskripsi= $DataProject['deskripsi'];
            //Buka owner
            $QryOwner = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
            $DataOwner = mysqli_fetch_array($QryOwner);
            $NamaOwner= $DataOwner['nama'];
?>
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Form Edit Project</h1>
                    <p class="text-dark">
                        Buat project Baru Untuk Client Anda
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 blog-box">
                <div class="blog-content">
                    <div class="title-blog">
                        <form action="_Page/Project/ProsesEditProject.php" method="post" autocomplete="off">
                            <input type="hidden" name="id_project" value="<?php echo "$id_project"; ?>">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="id_akses"><b>Pilih Client :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <select name="id_akses" id="id_akses" class="form-control" required>
                                        <?php
                                            echo '<option value="">Pilih..</option>';
                                            $query = mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Client' ORDER BY id_akses DESC");
                                            while ($data = mysqli_fetch_array($query)) {
                                                $IdAksesList= $data['id_akses'];
                                                $nama= $data['nama'];
                                                if($id_akses=="$IdAksesList"){
                                                    echo '<option selected value="'.$IdAksesList.'">'.$nama.'</option>';
                                                }else{
                                                    echo '<option value="'.$IdAksesList.'">'.$nama.'</option>';
                                                }
                                                
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="tanggal"><b>Tanggal Project :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$tanggal"; ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="name_project"><b>Nama Project :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name_project" id="name_project" class="form-control" value="<?php echo "$name_project"; ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="url"><b>URL Demo :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="url_demo" id="url_demo" class="form-control" value="<?php echo "$url_demo"; ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="deskripsi"><b>Deskripsi :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"><?php echo "$deskripsi"; ?></textarea>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-6">
                                    <?php
                                        if(empty($_GET['Notifikasi'])){
                                            echo "<small>Pastikan bahwa informasi client yang anda masukan sudah benar.</small>";
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
                                        <i class="fa fa-plus-circle"></i> Simpan
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