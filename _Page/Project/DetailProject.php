<!-- Start Blog  -->
<?php
    //Menangkap id
    if(empty($_GET['id'])){
        echo 'Belum ada project yang dipilih untuk ditampilkan';
    }else{
        $idProject=$_GET['id'];
        $QryProject = mysqli_query($Conn,"SELECT * FROM project WHERE id_project='$idProject'")or die(mysqli_error($Conn));
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
                    <div class="title-all text-left">
                        <h1>Detail Project</h1>
                        <p class="text-dark">
                            Lihat Informasi Nama Project dan Progres Project
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4 bg-white">
                    <div class="mt-3 mb-3 ml-3 mr-3">
                        <h3><i class="fa fa-cloud-upload" aria-hidden="true"></i> Profile Project</h3>
                        <div class="table">
                            <table class="table">
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td>:</td>
                                    <td><?php echo "$name_project"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal</b></td>
                                    <td>:</td>
                                    <td><?php echo "$tanggal"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>URL Demo</b></td>
                                    <td>:</td>
                                    <td><?php echo "$url_demo"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Deskripsi</b></td>
                                    <td>:</td>
                                    <td><?php echo "$deskripsi"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Owner</b></td>
                                    <td>:</td>
                                    <td><?php echo "$NamaOwner"; ?></td>
                                </tr>
                                <tr>
                                    <td><b></b></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    if($SessionAkses=="Admin"){
                                        echo '<a href="index.php?page=project&subpage=AddRecord&idProject='.$idProject.'" class="btn btn-sm btn-primary mt-2 mr-2"><i class="fa fa-plus"></i>Add Record</a>';
                                        echo '<a href="index.php?page=project&subpage=EditProject&id='.$idProject.'" class="btn btn-sm btn-info mt-2 mr-2"><i class="fa fa-pencil"></i> Edit</a>';
                                        echo '<a href="_Page/Project/DeleteProject.php?id='.$idProject.'" class="btn btn-sm btn-danger mt-2 mr-2"><i class="fa fa-trash"></i> Delete</a>';
                                    }
                                    echo '<a href="index.php?page=project" class="btn btn-sm btn-dark mt-2 mr-2"><i class="fa fa-home"></i> Home</a>';
                                    echo '<a href="_Page/Logout/Logout.php" class="btn btn-sm btn-dark mr-2 mt-2"><i class="fa fa-sign-out"></i> Logout</a>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8 col-xl-8 bg-white">
                    <div class="mt-3 mb-3 ml-3 mr-3">
                        <h3><i class="fa fa-list"></i> Project Record</h3>
                        <div class="table pre-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center"><b>No</b></th>
                                        <th class="text-center"><b>Keterangan Record</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        //apakah ada id yang ditangkap?
                                        if(empty($_GET['id'])){
                                            echo '<tr>';
                                            echo '  <td colspan="2">Belum ada project yang dipilih untuk ditampilkan</td>';
                                            echo '</tr>';
                                        }else{
                                            $idProject=$_GET['id'];
                                            //Cek jumlah record project
                                            $JumlahRecord = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM project_progres WHERE id_project='$idProject'"));
                                            if(empty($JumlahRecord)){
                                                echo '<tr>';
                                                echo '  <td colspan="2">Project yang anda pilih belum punya record progress</td>';
                                                echo '</tr>';
                                            }else{
                                                //Arraykan data progress
                                                $no=1;
                                                $query = mysqli_query($Conn, "SELECT*FROM project_progres WHERE id_project='$idProject' ORDER BY tanggal DESC");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $id_project_progres= $data['id_project_progres'];
                                                    $id_project= $data['id_project'];
                                                    $tanggal= $data['tanggal'];
                                                    $deskripsi= $data['deskripsi'];
                                                    echo '<tr>';
                                                    echo '  <td class="text-center">'.$no.'</td>';
                                                    echo '  <td class="text-left"><b>'.$deskripsi.'</b><br><small>Date/Time: '.$tanggal.' <a href="_Page/Project/ProsesHapusRecord.php?id='.$id_project_progres.'" class="text-danger">X Hapus</a></small></td>';
                                                    echo '</tr>';
                                                $no++;}
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>