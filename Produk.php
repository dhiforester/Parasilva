<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <?php
                if(empty($_GET['produk'])){

                }else{
                    $produk=$_GET['produk'];
                    if($produk=="SambalRoa"){
                        include "SambalRoa.php";
                    }
                    if($produk=="berasbismati"){
                        include "berasbismati.php";
                    }
                    if($produk=="NasiKebuli"){
                        include "NasiKebuli.php";
                    }
                    if($produk=="ArabianFood"){
                        include "ArabianFood.php";
                    }
		   if($produk=="Abc"){
                        include "Abc.php";
                    }
                }
            ?>
        </div>
    </div>
</div>