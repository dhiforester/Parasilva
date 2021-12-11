<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Login Project</h1>
                    <p class="text-dark">
                        Anda akan mendapatkan login akses pada saat project sudah mulai dikerjakan. 
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 blog-box">
                <div class="blog-content">
                    <div class="title-blog">
                        <form action="_Page/Login/ProsesLogin.php" method="post" autocomplete="off">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="email"><b>Alamat Email :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="email"><b>Password :</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-6">
                                    <?php
                                        if(empty($_GET['Notifikasi'])){
                                            echo "<small>Isi alamat email dan password yang anda miliki untuk akses project anda.</small>";
                                        }else{
                                            echo '<small class="text-danger">Mungkin email atau password yang anda ketik salah.</small>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-md btn-primary">
                                        Login
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