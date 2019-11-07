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
                        <h4 class="card-title"><?= $title; ?></h4>
                        <form action="<?= base_url('admin/edit_produk') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?= $data['id_produk'], set_value('id_produk'); ?>">
                            <input type="hidden" name="old_foto" value="<?= $data['foto'] ?>">
                            <div class="form-group">
                                <label class="control-label">Produk</label>
                                <input type="text" class="form-control" id="produk" name="produk" value="<?= $data['produk'], set_value('produk'); ?>">
                                <small class="form-control-feedback text-danger"> <?= form_error('produk'); ?> </small>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['harga'], set_value('harga'); ?>">
                                <small class="form-control-feedback text-danger"> <?= form_error('harga'); ?> </small>
                            </div>
                            <div class="form-group">
                                <img src="<?php echo base_url('assets/produk/') . $data['foto']; ?>" height="100px">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Foto Produk Baru</label>
                                <input type="file" class="form-control-file" id="foto" name="foto">
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan Perubahan</button>
                                <a href="<?= base_url('admin/produk') ?>" class="btn btn-inverse"> <i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                        </form>
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