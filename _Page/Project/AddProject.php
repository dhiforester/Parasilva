<!-- Start Blog  -->
<?php
    if($SessionAkses!=="Admin"){
        header('Location:index.php?page=project');
    }else{
        if(empty($_GET['id'])){
            $id_akses="";
        }else{
            $id_akses=$_GET['id'];
        }
?>
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Form Tambah Project</h1>
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
                        <form action="_Page/Project/ProsesTambahProject.php" method="post" autocomplete="off">
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
                                                $email= $data['email'];
                                                $kontak= $data['kontak'];
                                                $password= $data['password'];
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
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="name_project"><b>Nama Project :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name_project" id="name_project" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="url"><b>URL Demo :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="url_demo" id="url_demo" class="form-control" required>
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
                                        <i class="fa fa-plus-circle"></i> Tambahkan Project
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
<?php } ?>