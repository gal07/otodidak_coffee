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
                        <h4 class="card-title">Order</h4>
                        <input type="hidden" name="url" id="url" value="<?= base_url() ?>">
                        <a href="<?= base_url('admin') ?>" class="btn btn-dark mb-3"><i class="mdi mdi-gauge"></i> Dasbor</a>
                        <a href="<?= base_url('admin/kategori') ?>" class="btn btn-dark mb-3"><i class="mdi mdi-file-tree"></i> Kategori</a>
                        <a href="<?= base_url('admin/produk') ?>" class="btn btn-dark mb-3"><i class="mdi mdi-cart"></i> Produk</a>
                        <!-- <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambah-modal"><i class="fa fa-plus"></i> Tambah</button> -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4> <?= validation_errors(); ?></h4>
                            </div>
                        <?php endif; ?>

                        <?= $this->session->flashdata('message'); ?>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>ID Order</th>
                                        <th>Tanggal</th>
                                        <th>Bayar</th>
                                        <th>Total</th>
                                        <th>Kembalian</th>
                                        <th>Status</th>
                                        <th style="width:125px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($order != null) {
                                        $i = 1;
                                        foreach ($order as $value) :

                                            ?>
                                            <tr id="c_<?= $value->id_order ?>">
                                                <td><?= $i; ?>. </td>
                                                <td><?= $value->id_order ?></td>
                                                <td><?= $value->tanggal ?></td>
                                                <td><?= 'Rp. ' . number_format($value->bayar, 0, ',', '.') ?></td>
                                                <td><?= 'Rp. ' . number_format($value->total_harga, 0, ',', '.') ?></td>
                                                <td><?= 'Rp. ' . number_format($value->kembalian, 0, ',', '.') ?></td>
                                                <td>
                                                    <?php if ($value->status == 3) : ?>
                                                        <form action="<?= base_url('admin/tak'); ?>" method="post">
                                                            <input type="hidden" name="id_produk" value="<?= $value->id_order; ?>">
                                                            <input type="hidden" name="status" value="0">
                                                            <button type="button" class="btn btn-success btn-xs">Selesai</button>
                                                        </form>

                                                    <?php elseif ($value->status == 1 || $value->status == 2) : ?>
                                                        <form action="<?= base_url('admin/ak'); ?>" method="post">
                                                            <input type="hidden" name="id_produk" value="<?= $value->id_order; ?>">
                                                            <input type="hidden" name="status" value="1">
                                                            <button type="button" class="btn btn-danger btn-xs">Pending</button>
                                                        </form>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('order/detail?id=' . $value->id_order) ?>" data-toggle="tooltip" data-original-title="Detail"> <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                                    <a href="#" class="deletes" idord="<?= $value->id_order ?>" data-toggle="tooltip" data-original-title="Hapus"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        endforeach; ?>

                                    <?php
                                } else { ?>
                                        <tr>
                                            <td colspan="7" class="text-center"><?php echo "Produk Kosong" ?></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>

                                        </tr>
                                    <?php
                                }
                                ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>No. </th>
                                        <th>ID Order</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Bayar</th>
                                        <th>Kembalian</th>
                                        <th>Status</th>
                                        <th style="width:125px;">Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
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