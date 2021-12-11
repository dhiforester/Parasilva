<?php
    if($SessionAkses!=="Admin"){
        header('Location:index.php?page=project');
    }else{
    //Menangkap id
    if(empty($_GET['id'])){
        echo 'Belum ada Clint yang dipilih untuk ditampilkan';
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
                    <div class="title-all text-left">
                        <h1>Detail Client</h1>
                        <p class="text-dark">
                            Lihat Informasi Cient, Project Client, Edit dan Hapus Client
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4 bg-white">
                    <div class="mt-3 mb-3 ml-3 mr-3">
                        <h3><i class="fa fa-user" aria-hidden="true"></i> Profile Clientt</h3>
                        <div class="table">
                            <div class="table">
                                <table class="table">
                                    <tr>
                                        <td><b>Nama</b></td>
                                        <td>:</td>
                                        <td><?php echo "$nama"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>email</b></td>
                                        <td>:</td>
                                        <td><?php echo "$email"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kontak</b></td>
                                        <td>:</td>
                                        <td><?php echo "$kontak"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b></b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="index.php?page=project&subpage=AddProject&id=<?php echo $id_akses;?>" class="btn btn-sm btn-primary mt-2 mr-2">
                                    <i class="fa fa-plus"></i> Add Project
                                </a>
                                <a href="index.php?page=project&subpage=EditClient&id=<?php echo $id_akses;?>" class="btn btn-sm btn-info mt-2 mr-2">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="_Page/Project/DeleteClient.php?id=<?php echo $id_akses;?>" class="btn btn-sm btn-danger mt-2 mr-2">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                                <a href="index.php?page=project&subpage=KelolaClient" class="btn btn-sm btn-dark mt-2 mr-2">
                                    <i class="fa fa-arrow-left"></i> Back
                                </a>
                                <a href="_Page/Logout/Logout.php" class="btn btn-sm btn-dark mt-2 mr-2">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8 col-xl-8 bg-white">
                    <div class="mt-3 mb-3 ml-3 mr-3">
                        <h3><i class="fa fa-list"></i> Project List</h3>
                        <div class="table pre-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center"><b>No</b></th>
                                        <th class="text-center"><b>Tanggal</b></th>
                                        <th class="text-center"><b>Project Name</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        //apakah ada id yang ditangkap?
                                        if(empty($_GET['id'])){
                                            echo '<tr>';
                                            echo '  <td colspan="3">Belum ada Client yang dipilih untuk ditampilkan</td>';
                                            echo '</tr>';
                                        }else{
                                            $id_akses=$_GET['id'];
                                            //Cek jumlah record project
                                            $JumlahRecord = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM project WHERE id_akses='$id_akses'"));
                                            if(empty($JumlahRecord)){
                                                echo '<tr>';
                                                echo '  <td colspan="3">Client yang anda pilih belum punya Project</td>';
                                                echo '</tr>';
                                            }else{
                                                //Arraykan data progress
                                                $no=1;
                                                $query = mysqli_query($Conn, "SELECT*FROM project WHERE id_akses='$id_akses' ORDER BY id_project DESC");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $id_project= $data['id_project'];
                                                    $id_akses= $data['id_akses'];
                                                    $tanggal= $data['tanggal'];
                                                    $name_project= $data['name_project'];
                                                    $url_demo= $data['url_demo'];
                                                    $deskripsi= $data['deskripsi'];
                                                    echo '<tr>';
                                                    echo '  <td class="text-center">'.$no.'</td>';
                                                    echo '  <td class="text-left">'.$tanggal.'</td>';
                                                    echo '  <td class="text-left"><b><a href="index.php?page=project&subpage=DetailProject&id='.$id_project.'">'.$name_project.'</a></b><br><small>'.$deskripsi.'</small><br>URL:'.$url_demo.'</td>';
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
<?php }} ?>
