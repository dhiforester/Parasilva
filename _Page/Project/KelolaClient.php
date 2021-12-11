<!-- Start Blog  -->
<?php
    if($SessionAkses!=="Admin"){
        header('Location:index.php?page=project');
    }else{
?>
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>List All Client</h1>
                        <p class="text-dark">
                            Lihat Semua data client, menambah client dan menghapus client.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="blog-box">
                        <div class="blog-content">
                            <div class="title-blog">
                                <div class="row">
                                    <div class="col-md-12 mt-4 mb-4">
                                        <a href="index.php?page=project" class="btn btn-sm btn-dark mr-2 mt-2">
                                            <i class="fa fa-arrow-left"></i> kembali
                                        </a>
                                        <a href="index.php?page=project&subpage=TambahClient" class="btn btn-sm btn-primary mr-2 mt-2">
                                            <i class="fa fa-plus"></i> Tambah Client
                                        </a>
                                    </div>
                                </div>
                                <div class="table">
                                    <table class="table table-hover table-bordered">
                                        <?php
                                            //Menghitung Jumlah Client
                                            $JumlahClient = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Client'"));
                                            if(empty($JumlahClient)){
                                                echo '<tr>';
                                                echo '  <td><i class="text-danger">Anda Tidak Memiliki Klien Satupun</i></td>';
                                                echo '</tr>';
                                            }else{
                                                //Tampilkan List Client
                                                $query = mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Client' ORDER BY id_akses DESC");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $id_akses= $data['id_akses'];
                                                    $nama= $data['nama'];
                                                    $email= $data['email'];
                                                    $kontak= $data['kontak'];
                                                    $password= $data['password'];
                                                    echo '<tr>';
                                                    echo '  <td>';
                                                    echo '      <b class="text-info">';
                                                    echo '          <a href="index.php?page=project&subpage=DetailClient&id='.$id_akses.'" class="text-info"><i class="fa fa-external-link" aria-hidden="true"></i> '.$nama.'</a><br>';
                                                    echo '      </b>';
                                                    echo '      <small><i class="fa fa-mail-reply" aria-hidden="true"></i> '.$email.'</small> <br>';
                                                    echo '      <small><i class="fa fa-phone" aria-hidden="true"></i> '.$kontak.'</small> <br>';
                                                    echo '  </td>';
                                                    echo '</tr>';
                                                }
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>