<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Profile & Project</h1>
                    <p class="text-dark">
                        Lihat Informasi Akses, Project List dan Commite Project
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3><i class="fa fa-user"></i> Profile Akses</h3>
                            <div class="table">
                                <table class="table">
                                    <tr>
                                        <td><b>Nama</b></td>
                                        <td>:</td>
                                        <td><?php echo "$SessionNama"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>:</td>
                                        <td><?php echo "$SessionEmail"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kontak</b></td>
                                        <td>:</td>
                                        <td><?php echo "$SessionKontak"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b></b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                                <?php
                                    if($SessionAkses=="Admin"){
                                        echo '<a href="index.php?page=project&subpage=KelolaClient" class="btn btn-sm btn-primary mr-2 mt-2"><i class="fa fa-user-plus"></i> Client</a>';
                                        echo '<a href="index.php?page=project&subpage=KelolaProject" class="btn btn-sm btn-primary mr-2 mt-2"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Project</a>';
                                    }
                                    echo '<a href="_Page/Logout/Logout.php" class="btn btn-sm btn-dark mr-2 mt-2"><i class="fa fa-sign-out"></i> Logout</a>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-8 col-xl-8">
                <div class="blog-box">
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3><i class="fa fa-cloud-upload" aria-hidden="true"></i> Your Project List</h3>
                            <div class="table">
                                <table class="table table-hover table-bordered">
                                    <?php
                                        //Menghitung Jumlah Project
                                        if($SessionAkses=="Admin"){
                                            $JumlahProject = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM project"));
                                        }else{
                                            $JumlahProject = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM project WHERE id_akses='$SessionIdAkses'"));
                                        }
                                            if(empty($JumlahProject)){
                                            echo '<tr>';
                                            echo '  <td><i class="text-danger">Anda Tidak Memiliki Project</i></td>';
                                            echo '</tr>';
                                        }else{
                                            //Tampilkan List Project
                                            if($SessionAkses=="Admin"){
                                                $query = mysqli_query($Conn, "SELECT*FROM project ORDER BY id_project DESC");
                                            }else{
                                                $query = mysqli_query($Conn, "SELECT*FROM project WHERE id_akses='$SessionIdAkses' ORDER BY id_project DESC");
                                            }
                                            while ($data = mysqli_fetch_array($query)) {
                                                $id_project= $data['id_project'];
                                                $tanggal= $data['tanggal'];
                                                $name_project= $data['name_project'];
                                                $url_demo= $data['url_demo'];
                                                $deskripsi= $data['deskripsi'];
                                                echo '<tr>';
                                                echo '  <td>';
                                                echo '      <b class="text-info">';
                                                echo '          <a href="index.php?page=project&subpage=DetailProject&id='.$id_project.'" target="_blank" class="text-info"><i class="fa fa-external-link" aria-hidden="true"></i> '.$name_project.'</a><br>';
                                                echo '      </b>';
                                                echo '      <small><i class="fa fa-calendar" aria-hidden="true"></i> '.$tanggal.'</small> <br>';
                                                echo '      <small><a href="'.$url_demo.'"><i class="fa fa-code" aria-hidden="true"></i> '.$url_demo.'</small></a> <br>';
                                                echo '      <small>'.$deskripsi.'</small> <br>';
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