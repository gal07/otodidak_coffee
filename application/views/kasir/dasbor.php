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
                        <h1>Dasbor Kasir</h1>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                    <!-- Produk Content -->
                    <div class="row el-element-overlay">
                            <div class="col-md-12">
                                <h4 class="card-title">Produk Otodidak Coffee</h4>
                                <input type="hidden" name="url" id="url" value="<?= base_url() ?>">
                                <br>
                            </div>

                            <?php foreach($produk as $value):?>

                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1"> <img src="<?= base_url('assets/produk/').$value['foto'] ?>" alt="user" />
                                           
                                        </div>
                                        <div class="el-card-content">
                                            <h3 class="box-title"><?= $value['produk'] ?></h3>
                                            <small> <?= 'Rp. '.$value['harga'] ?> </small>
                                            <br>
                                            <small> <?= $value['kategori'] ?> </small>
                                            <br>
                                            <button class="btn btn-sm btn-info order" idprod="<?= $value['id_produk'] ?>" nmprod="<?= $value['produk'] ?>" hrgprod="<?= $value['harga'] ?>">Order </button>
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
            <div class="col-4">
               <div class="card">
                    <div class="card-body">
                        <h5 class="text-center"> Cart </h5>
                        <div class="row">
                            <!-- Cart Content -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Order : <?= date('d - m - Y') ?></h4>
                                        <h6 class="card-subtitle">Order ID <code><?=  rand() ?></code></h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Produk</th>
                                                        <th>Qty</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>kopi Luwak</td>
                                                        <td>3</td>
                                                        <td>Rp. 40000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>kopi Sianida</td>
                                                        <td>3</td>
                                                        <td>Rp. 140000</td>
                                                    </tr>
                                                
                                                </tbody>
                                                <tfoot>
                                                    <th>Total</th>
                                                    <th></th>
                                                    <th>Rp. 180000</th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Cart Content -->
                        </div>
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