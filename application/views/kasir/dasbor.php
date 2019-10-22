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
                                        <h6 class="card-subtitle">Order ID <code><?= date('ymd').''.rand(1000,4000) ?></code></h6>
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
                                                     if($cart_session == NULL):?>
                                                     <tr>
                                                         <td>Empty Card</td>
                                                     </tr>
                                                    <?php else:?>
                                                    <?php
                                                    foreach($cart_session as $val):
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
                                                                <input iprd="<?//= $val->id_produk ?>" harga="<?//= $val->harga?>" id="c_<?//= $val->id?>"  value="<?//= $val->quantity ?>" min="1" class="form-control count ab" type="number">
                                                                </div>
                                                            </small> -->
                                                        </td>
                                                        <td> <small id="total_item_<?= $val->id ?>"><?= 'Rp. '.$val->total ?></small> </td>
                                                        <td> <button type="button" title="Remove" class="btn btn-xs btn-danger remove hapusCart" cartid="<?= $val->id ?>"><i class="fa fa-times"></i></button> </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
                                                  
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Total</th>
                                                        <th colspan="2"> <small id="totalPrices"><?=($totals == 0 ? '' : 'Rp. '.$totals)  ?></small></th>
                                                        <input type="hidden" id="bayarfield_hidden" class="form-control form-sm form-control-line" value="<?= $totals ?>">
                                                    </tr>
                                                   <tr>
                                                        <th>Bayar</th>
                                                        <th colspan="2">
                                                         <small id="totalPrices">
                                                            <input type="number" id="bayarfield" class="form-control form-sm form-control-line">
                                                         </small>
                                                        </th>
                                                   </tr>
                                                   <tr>
                                                       <th>Kembalian</th>
                                                       <th colspan="2">
                                                        <small id="kembalian">
                                                            <input readonly type="number" id="kembalian_field" class="form-control form-sm form-control-line">
                                                         </small>
                                                       </th>
                                                   </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <button class="btn btn-warning" id="cancelsMenu"> Cancel </button>
                                        <button class="btn btn-info" id="ordersMenu"> Order </button>
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