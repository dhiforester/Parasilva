<!-- Start Blog  -->
<?php
    if($SessionAkses!=="Admin"){
        header('Location:index.php?page=project');
    }else{
        if(empty($_GET['id'])){
            header('Location:index.php?page=project');
        }else{
            $id_akses=$_GET['id'];
            $Qry = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
            $Data = mysqli_fetch_array($Qry);
            $nama= $Data['nama'];
            $email= $Data['email'];
            $kontak= $Data['kontak'];
            $password= $Data['password'];
?>
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Form Edit Client</h1>
                    <p class="text-dark">
                        Catat dan Lengkapi Informasi Client Anda  
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 blog-box">
                <div class="blog-content">
                    <div class="title-blog">
                        <form action="_Page/Project/ProsesEditClient.php" method="post" autocomplete="off">
                            <input type="hidden" name="id_akses" value="<?php echo "$id_akses" ?>">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="email"><b>Nama Lengkap :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo "$nama" ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="email"><b>Kontak :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="kontak" id="kontak" class="form-control" value="<?php echo "$kontak" ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="email"><b>Alamat Email :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo "$email" ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="email"><b>Password :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="password1" id="password1" class="form-control" value="<?php echo "$password" ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="email"><b>Ulangi Password :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="password2" id="password2" class="form-control" value="<?php echo "$password" ?>" required>
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
                                                echo '<small class="text-danger">Nama Tidak Boleh Kosong</small>';
                                            }else{
                                                if($Notifikasi=="Gagal2"){
                                                    echo '<small class="text-danger">Email Tidak Boleh Kosong</small>';
                                                }else{
                                                    if($Notifikasi=="Gagal3"){
                                                        echo '<small class="text-danger">No.Kontak Tidak Boleh Kosong</small>';
                                                    }else{
                                                        if($Notifikasi=="Gagal4"){
                                                            echo '<small class="text-danger">Password Tidak Boleh Kosong</small>';
                                                        }else{
                                                            if($Notifikasi=="Gagal5"){
                                                                echo '<small class="text-danger">Password Tidak Sama</small>';
                                                            }else{
                                                                if($Notifikasi=="Gagal6"){
                                                                    echo '<small class="text-danger">Email Tadi Sudah Digunakan</small>';
                                                                }else{
                                                                    if($Notifikasi=="Gagal7"){
                                                                        echo '<small class="text-danger">Password Tidak Sama</small>';
                                                                    }else{
                                                                        if($Notifikasi=="Gagal8"){
                                                                            echo '<small class="text-danger">Proses Simpan Data Client Gagal!!.</small>';
                                                                        }else{
                                                                            echo '<small class="text-danger">Proses Simpan Data Client Gagal!!.</small>';
                                                                        }
                                                                    }
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
                                    <a href="index.php?page=project&subpage=DetailClient&id=<?php echo "$id_akses"; ?>" class="btn btn-md btn-dark mt-2 mr-2">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </a>
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