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
                        <h4 class="card-title">Produk</h4>
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambah-modal"><i class="fa fa-plus"></i> Tambah</button>
                        <a href="<?= base_url('admin') ?>" class="btn btn-dark mb-3"><i class="mdi mdi-gauge"></i> Dasbor</a>
                        <a href="<?= base_url('admin/kategori') ?>" class="btn btn-dark mb-3"><i class="mdi mdi-file-tree"></i> Kategori</a>
                        <a href="<?= base_url('order/index') ?>" class="btn btn-dark mb-3"><i class="fa fa-clock-o"></i> Order</a>
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
                                        <th>Kategori</th>
                                        <th>Foto</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th style="width:125px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($data != null) {
                                        $i = 1;
                                        foreach ($data as $value) :

                                            ?>
                                            <tr>
                                                <td><?= $i; ?>. </td>
                                                <td><?= $value['kategori']; ?></td>
                                                <td>
                                                    <img src="<?php echo base_url('assets/produk/') . $value['foto']; ?>" height="50px">
                                                </td>
                                                <td><?= $value['produk']; ?></td>
                                                <td>IDR. <?= number_format($value['harga']); ?></td>
                                                <td>
                                                    <?php if ($value['status'] == 1) : ?>
                                                        <form action="<?= base_url('admin/tap'); ?>" method="post">
                                                            <input type="hidden" name="id_produk" value="<?= $value['id_produk']; ?>">
                                                            <input type="hidden" name="status" value="0">
                                                            <button type="submit" class="btn btn-success btn-xs">Aktif</button>
                                                        </form>

                                                    <?php elseif ($value['status'] == 0) : ?>
                                                        <form action="<?= base_url('admin/ap'); ?>" method="post">
                                                            <input type="hidden" name="id_produk" value="<?= $value['id_produk']; ?>">
                                                            <input type="hidden" name="status" value="1">
                                                            <button type="submit" class="btn btn-danger btn-xs">Tidak Aktif</button>
                                                        </form>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('admin/edit_produk?id=' . $value['id_produk'] . '') ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?= base_url('admin/hp?id=' . $value['id_produk'] . '&pict=' . $value['foto']) ?>" data-toggle="tooltip" data-original-title="Hapus"> <i class="fa fa-close text-danger"></i> </a>
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

                                        </tr>
                                    <?php
                                }
                                ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>No. </th>
                                        <th>Kategori </th>
                                        <th>Foto</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
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
    <div id="tambah-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Tambah Produk</h4>
                </div>
                <form action="<?= base_url('admin/produk') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Kategori:</label><br>
                            <select name="id_kategori" id="id_kategori" class="form-control" autofocus>
                                <option value="">=====</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori']; ?>"><?= $k['kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Upload Foto:</label><br>
                            <input type="file" id="input-file-now" name="foto" class="dropify" />
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Produk:</label>
                            <input type="text" class="form-control" id="recipient-name" name="produk" autocomplete="off" autofocus value="<?= set_value('produk'); ?>">
                            <span class="text-center"><?= form_error('produk'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Harga:</label>
                            <input type="text" class="form-control" id="recipient-name" name="harga" autocomplete="off" value="<?= set_value('harga'); ?>">
                            <span class="text-center"><?= form_error('harga'); ?></span>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
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