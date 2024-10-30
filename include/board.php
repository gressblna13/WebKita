<?php
include "config.php";
$sql = mysqli_query($connection, "SELECT * FROM destinasi");
$jumlah = mysqli_num_rows($sql);
?>
<?php
include "config.php";
$sqlhotel = mysqli_query($connection, "SELECT * FROM grasyahotel");
$jumlahhotel = mysqli_num_rows($sqlhotel);
?>
<?php
include "config.php";
$sqlphoto = mysqli_query($connection, "SELECT * FROM photodestinasi");
$jumlahphoto = mysqli_num_rows($sqlphoto);
?>
<?php
include "config.php";
$sqltiket = mysqli_query($connection, "SELECT * FROM tiketting");
$jumlahtiket = mysqli_num_rows($sqltiket);
?>
<?php
include "config.php";
$sqlresto = mysqli_query($connection, "SELECT * FROM restaurant");
$jumlahresto = mysqli_num_rows($sqlresto);
?>
<?php
include "config.php";
$sqltravel = mysqli_query($connection, "SELECT * FROM destinasitravel");
$jumlahtravel = mysqli_num_rows($sqltravel);
?>
<?php
include "config.php";
$sqloleh = mysqli_query($connection, "SELECT * FROM penjualanoleholeh");
$jumlaholeh = mysqli_num_rows($sqloleh);
?>


<div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Destinasi Wisata :
                                        <?php echo $jumlah?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftardestinasi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">grasyahotel
                                    <?php echo $jumlahhotel?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarhotel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">photodestinasi
                                    <?php echo $jumlahphoto?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarphoto.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">tiketting
                                    <?php echo $jumlahtiket?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarticket.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">restaurant
                                    <?php echo $jumlahresto?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarresto.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                            <div class="card" style="background-color: #ffb6c1; color: white;">
                                <div class="card-body">destinasitravel
                                <?php echo $jumlahtravel?>
                                 </div>
                             <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="daftartravel.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
             </div>
             <div class="col-xl-3 col-md-6">
    <div class="card" style="background-color: #d8bfd8; color: white;">
        <div class="card-body">daftaroleholeh
            <?php echo $jumlaholeh?>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="daftaroleholeh.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>
 </div>
