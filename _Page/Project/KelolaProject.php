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
                        <h1>List All Project</h1>
                        <p class="text-dark">
                            Lihat Semua data project, menambah project dan menghapus project.
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
                                    <div class="col-md-12 mt-12 mb-12">
                                        <a href="index.php?page=project&subpage=AddProject" class="btn btn-md btn-primary mt-2 mr-2 mb-4">
                                            <i class="fa fa-plus"></i> Tambah Project
                                        </a>
                                        <a href="_Page/Logout/Logout.php" class="btn btn-md btn-dark mt-2 mr-2 mb-4">
                                            <i class="fa fa-sign-out"></i> Logout Project
                                        </a>
                                    </div>
                                </div>
                                <div class="table">
                                    <table class="table table-hover table-bordered">
                                        <?php
                                            //Menghitung Jumlah Project
                                            $JumlahProject = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM project"));
                                            if(empty($JumlahProject)){
                                                echo '<tr>';
                                                echo '  <td><i class="text-danger">Anda Tidak Memiliki Project</i></td>';
                                                echo '</tr>';
                                            }else{
                                                //Tampilkan List Project
                                                $query = mysqli_query($Conn, "SELECT*FROM project ORDER BY id_project DESC");
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
<?php } ?>