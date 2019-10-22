            <br>
            <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>INVOICE</b> <span class="pull-right">#<?= ($order == NULL ? 'No ID':$order[0]->id_order) ?></span></h3>
                            <hr>
                            <div class="row">
                                <!-- <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">Monster Admin</b></h3>
                                            <p class="text-muted m-l-5">E 104, Dharti-2,
                                                <br/> Nr' Viswakarma Temple,
                                                <br/> Talaja Road,
                                                <br/> Bhavnagar - 364002</p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold">Gaala & Sons,</h4>
                                            <p class="text-muted m-l-30">E 104, Dharti-2,
                                                <br/> Nr' Viswakarma Temple,
                                                <br/> Talaja Road,
                                                <br/> Bhavnagar - 364002</p>
                                            <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 23rd Jan 2017</p>
                                            <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2017</p>
                                        </address>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Produk</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">Harga</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($order != NULL): ?>
                                                    <?php
                                                    $i = 1;
                                                    $total = 0;
                                                    $grandTotal = 0;
                                                     foreach($order as $value):
                                                    $total = $value->harga*$value->qty;
                                                    $grandTotal += $total;
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $i ?></td>
                                                            <td><?= $value->produk ?></td>
                                                            <td class="text-right"> <?= $value->qty ?> </td>
                                                            <td class="text-right"> <?= 'Rp. '.number_format($value->harga,0,',','.') ?> </td>
                                                            <td class="text-right"> <?= 'Rp. '.number_format($total,0,',','.') ?> </td>
                                                        </tr>
                                                    <?php 
                                                $i++;
                                                endforeach; ?>
                                                <?php else: ?>
                                                    <h4>No Record</h4>
                                                <?php endif; ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <?php if($order != NULL): ?>
                                    <div class="pull-right m-t-30 text-right">
                                        <!-- <p>Sub - Total amount: $13,848</p>
                                        <p>vat (10%) : $138 </p> -->
                                        <hr>
                                        <h3><b>Total :</b> <?= 'Rp. '.number_format($grandTotal,0,',','.') ?></h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <a href="<?= base_url().'order/index' ?>" class="btn btn-warning text-left"> Back </a>
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                    <?php else: ?>
                                    <h4>No Record</h4>
                                    <?php endif; ?>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              