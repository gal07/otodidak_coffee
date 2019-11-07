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
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <a href="<?= base_url('kasir') ?>">
                                    <div class="card card-inverse card-primary">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="m-r-20 align-self-center">
                                                    <h1 class="text-white"><i class="mdi mdi-gauge"></i></h1>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">Dasbor</h3>
                                                    <h6 class="card-subtitle">Kelola Pemesanan</h6>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <a href="<?= base_url('antrian'); ?>">
                                    <div class="card card-inverse card-success">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="m-r-20 align-self-center">
                                                    <h1 class="text-white"><i class="mdi mdi-av-timer"></i></h1>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">Menu Antrian</h3>
                                                    <h6 class="card-subtitle">Kelola Antrian</h6>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Produk Content -->
                        <div class="row el-element-overlay ord_belum_selesai">
                            <div class="col-md-12">
                                <h4 class="card-title text-center">Proses</h4>
                                <br>
                            </div>
                            <?php
                            $order = $this->order_model->getOrderAntrian();
                            if ($order != NULL) : ?>
                                <?php
                                foreach ($order as $vals) : ?>
                                    <div class="col-md-4 col-sm-4 p-20 menus" id="m_ord_<?= $vals->id_order ?>">
                                        <h4 class="card-title">#<?= $vals->id_order ?> <a id="<?= $vals->id_order ?>" class="btn btn-danger text-white finishing"><i class="fa fa-clock-o"></i></a></h4>
                                        <div class="list-group">
                                            <?php
                                            $antrian = $this->order_model->getAntrianDetail($vals->id_order);
                                            foreach ($antrian as $vall) : ?>
                                                <button type="button" class="list-group-item"><?= $vall->produk ?> <span class="badge badge-danger ml-auto"><?= $vall->qty ?></span></button>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <!-- <h5>No Order</h5> -->
                            <?php endif; ?>


                        </div>
                        <!-- End Produk Content -->

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Produk Content -->
                        <div class="row el-element-overlay selesai_ord">
                            <div class="col-md-12">
                                <h4 class="card-title text-center">Finish</h4>
                                <br>
                            </div>
                            <?php
                            $orderfinish = $this->order_model->getOrderAntrian(NULL, 2);
                            if ($orderfinish != NULL) : ?>
                                <?php
                                foreach ($orderfinish as $valss) : ?>
                                    <div class="col-md-4 col-sm-4 p-20 menus2" id="selesai_<?= $valss->id_order ?>">
                                        <h4 class="card-title">#<?= $valss->id_order ?> <a id="<?= $valss->id_order ?>" class="btn btn-info text-white takeorder"><i class="fa fa-cutlery"></i></a></h4>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <!-- <h5>No Order</h5> -->
                            <?php endif; ?>


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