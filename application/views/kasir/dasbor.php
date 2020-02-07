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
                        <h1 class="text-center">Dasbor Kasir</h1>
                        <br>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <a href="<?= base_url('prosesmenu') ?>">
                                    <div class="card card-inverse card-primary">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="m-r-20 align-self-center">
                                                    <h1 class="text-white"><i class="mdi mdi-av-timer"></i></h1>
                                                </div>
                                                <div>
                                                    <h3 class="card-title">Menu Proses</h3>
                                                    <h6 class="card-subtitle">Kelola Proses</h6>
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
            <div class="row">
                <div class="col-md-8 col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <!-- Produk Content -->
                                <div class="row el-element-overlay">
                                    <div class="col-lg-12">
                                        <h4 class="card-title">Produk Otodidak Coffee</h4>
                                        <input type="hidden" name="url" id="url" value="<?= base_url() ?>">
                                        <br>


                                    </div>

                                    <?php foreach ($produk as $value) : ?>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                            <div class="card">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1"> <img src="<?= base_url('assets/produk/') . $value['foto'] ?>" alt="user" />

                                                    </div>
                                                    <div class="el-card-content">
                                                        <h3 class="box-title"><?= $value['produk'] ?></h3>
                                                        <small> <?= 'Rp. ' . $value['harga'] ?> </small>
                                                        <br>
                                                        <small> <?= $value['kategori'] ?> </small>
                                                        <br>
                                                        <button class="btn btn-sm btn-info order" idprod="<?= $value['id_produk'] ?>" nmprod="<?= $value['produk'] ?>" hrgprod="<?= $value['harga'] ?>">Order </button>
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </div>
                                <!-- End Produk Content -->

                            </div>
                        </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center"> Cart </h5>
                            <div class="row">
                                <!-- Cart Content -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Order : <?= date('d - m - Y') ?></h4>
                                            <h6 class="card-subtitle">Order ID <code id="idord"></code></h6>
                                            <input type="hidden" name="" id="orderid" value="">
                                            <div class="table-responsive">
                                                <table id="adrs" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Produk</th>
                                                            <th>Qty</th>
                                                            <th>Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $totals = 0;
                                                        if ($cart_session == NULL) : ?>
                                                            <tr>
                                                                <td>Empty Card</td>
                                                            </tr>
                                                        <?php else : ?>
                                                            <?php
                                                            foreach ($cart_session as $val) :
                                                                $totals += $val->total;
                                                                ?>
                                                                <tr id="<?= $val->id ?>">
                                                                    <td> <small><?= $val->nama_produk ?></small> </td>
                                                                    <td class="text-center">
                                                                        <small>
                                                                            <?= $val->quantity ?>
                                                                        </small>
                                                                        <!-- <small>
                                                                                                                                                                                                                                                            <div class="col-12">
                                                                                                                                                                                                                                                            <input iprd="<?
                                                                                                                                                                                                                                                                            ?>" harga="<?
                                                                                                                                                                                                                                                                                        ?>" id="c_<?
                                                                                                                                                                                                                                                                                                    ?>"  value="<?
                                                                                                                                                                                                                                                                                                                ?>" min="1" class="form-control count ab" type="number">
                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                        </small> -->
                                                                    </td>
                                                                    <td> <small id="total_item_<?= $val->id ?>"><?= 'Rp. ' . $val->total ?></small> </td>
                                                                    <td> <button type="button" title="Remove" class="btn btn-xs btn-danger remove hapusCart" cartid="<?= $val->id ?>"><i class="fa fa-times"></i></button> </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>

                                                    </tbody>
                                                    <tfoot>
                                                        <form id="form_order" action="#" method="post">
                                                            <tr>
                                                                <th>Total</th>
                                                                <th colspan="2"> <small id="totalPrices"><?= ($totals == 0 ? '' : 'Rp. ' . $totals)  ?></small></th>
                                                                <input type="hidden" id="bayarfield_hidden" class="form-control form-sm form-control-line" value="<?= $totals ?>">
                                                            </tr>
                                                            <tr>
                                                                <th>Bayar</th>
                                                                <th colspan="2">
                                                                    <small id="totalPrices">
                                                                        <input required type="number" id="bayarfield" class="form-control form-sm form-control-line">
                                                                    </small>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Kembalian</th>
                                                                <th colspan="2">
                                                                    <small id="kembalian">
                                                                        <input required readonly type="number" id="kembalian_field" class="form-control form-sm form-control-line">
                                                                    </small>
                                                                </th>
                                                            </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <button class="btn btn-warning" id="cancelsMenu"> Cancel </button>
                                            <button class="btn btn-info" type="submit" id="ordersMenu"> Order </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Cart Content -->
                            </div>
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