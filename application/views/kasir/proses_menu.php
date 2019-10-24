<div class="page-wrapper">
<input type="hidden" name="url" id="url" value="<?= base_url() ?>">

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
                                <?php
                                $order = $this->order_model->getOrderAntrian();
                                if($order != NULL): ?>
                                <?php
                                    foreach( $order as $vals ): ?>
                                    <div class="col-md-4 col-sm-4 p-20 menus" id="m_ord_<?= $vals->id_order ?>">
                                        <h4 class="card-title">#<?=$vals->id_order?> <a class="btn btn-danger text-white"><i class="fa fa-clock-o"></i></a></h4>
                                        <div class="list-group">
                                            <?php
                                            $antrian = $this->order_model->getAntrianDetail($vals->id_order);
                                            foreach( $antrian as $vall ): ?>
                                            <button type="button" class="list-group-item"><?= $vall->produk ?> <span class="badge badge-danger ml-auto"><?= $vall->qty ?></span></button>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                <h5>No Order</h5>
                                <?php endif; ?>
                                    
                            
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


                            <div class="row">
                                    <div class="col-md-4 col-sm-4 p-20">
                                    <h4 class="card-title">Button items  <a class="btn btn-success text-white">Selesai</a>  </h4>
                                        <div class="list-group">
                                            <button type="button" class="list-group-item">Cras justo odio 
                                            <ul>
                                                <li class="text-left">Kopi</li>
                                                <li class="text-left">Kentang</li>
                                            </ul>
                                            <a class="btn btn-success text-white">Selesai</a> </button>
                                            <button type="button" class="list-group-item">Dapibus ac facilisis in</button>
                                            <button type="button" class="list-group-item">Morbi leo risus</button>
                                            <button type="button" class="list-group-item">Porta ac consectetur ac</button>
                                            <button type="button" class="list-group-item">Vestibulum at eros</button>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4 p-20">
                                    <h4 class="card-title">Button items  <a class="btn btn-success text-white">Selesai</a>  </h4>
                                        <div class="list-group">
                                            <button type="button" class="list-group-item">Cras justo odio 
                                            <ul>
                                                <li class="text-left">Kopi</li>
                                                <li class="text-left">Kentang</li>
                                            </ul>
                                            <a class="btn btn-success text-white">Selesai</a> </button>
                                            <button type="button" class="list-group-item">Dapibus ac facilisis in</button>
                                            <button type="button" class="list-group-item">Porta ac consectetur ac</button>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4 p-20">
                                    <h4 class="card-title">Button items  <a class="btn btn-success text-white">Selesai</a>  </h4>
                                        <div class="list-group">
                                            <button type="button" class="list-group-item">Cras justo odio 
                                            <ul>
                                                <li class="text-left">Kopi</li>
                                                <li class="text-left">Kentang</li>
                                            </ul>
                                            <a class="btn btn-success text-white">Selesai</a> </button>
                                            <button type="button" class="list-group-item">Dapibus ac facilisis in</button>
                                            <button type="button" class="list-group-item">Morbi leo risus</button>
                                            <button type="button" class="list-group-item">Porta ac consectetur ac</button>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4 p-20">
                                    <h4 class="card-title">Button items  <a class="btn btn-sm btn-success text-white">a</a>  </h4>
                                        <div class="list-group">
                                            <button type="button" class="list-group-item">Cras justo odio 
                                            <ul>
                                                <li class="text-left">Kopi</li>
                                                <li class="text-left">Kentang</li>
                                            </ul>
                                            <a class="btn btn-success text-white">Selesai</a> </button>
                                            <button type="button" class="list-group-item">Dapibus ac facilisis in</button>
                                            <button type="button" class="list-group-item">Morbi leo risus</button>
                                            <button type="button" class="list-group-item">Porta ac consectetur ac</button>
                                            <button type="button" class="list-group-item">Vestibulum at eros</button>
                                        </div>
                                    </div>
                            </div>
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