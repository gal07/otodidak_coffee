<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Antrian</h1>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    <!-- Produk Content -->
                    <div class="row el-element-overlay">
                            <div class="col-md-12">
                                <h4 class="card-title text-center">Proses</h4>
                                <br>
                            </div>

                            <?php foreach($produk as $value):?>

                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1"> <img src="<?= base_url('assets/produk/').$value['foto'] ?>" alt="user" />
                                            <div class="el-overlay">
                                                <ul class="el-info">
                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="../plugins/images/users/1.jpg"><i class="icon-magnifier"></i></a></li>
                                                    <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="el-card-content">
                                            <h5 class="box-title"><?= $value['produk'] ?></h5> 
                                            <small> <?= 'Rp. '.$value['harga'] ?> </small>
                                            <br>
                                            <small> <?= $value['kategori'] ?> </small>
                                            <br>
                                            <button class="btn btn-sm btn-info"> Order </button>
                                            <br/> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php endforeach;?>
                    </div>
                        <!-- End Produk Content -->

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    <!-- Produk Content -->
                    <div class="row el-element-overlay">
                            <div class="col-md-12">
                                <h4 class="card-title text-center">Pesanan Siap</h4>
                                <br>
                            </div>

                            <?php foreach($produk as $value):?>

                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1"> <img src="<?= base_url('assets/produk/').$value['foto'] ?>" alt="user" />
                                            <div class="el-overlay">
                                                <ul class="el-info">
                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="../plugins/images/users/1.jpg"><i class="icon-magnifier"></i></a></li>
                                                    <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="el-card-content">
                                            <h5 class="box-title"><?= $value['produk'] ?></h5> 
                                            <small> <?= 'Rp. '.$value['harga'] ?> </small>
                                            <br>
                                            <small> <?= $value['kategori'] ?> </small>
                                            <br>
                                            <button class="btn btn-sm btn-info"> Order </button>
                                            <br/> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php endforeach;?>
                    </div>
                        <!-- End Produk Content -->

                    </div>
                </div>
            </div>
            

        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->

        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>