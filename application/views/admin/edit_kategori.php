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
                        <form action="<?= base_url('admin/edit_kategori') ?>" method="POST">
                            <input type="hidden" class="form-control" id="id_kategori" name="id_kategori" value="<?= $data['id_kategori'], set_value('id_kategori'); ?>">
                            <div class="form-group">
                                <label class="control-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $data['kategori'], set_value('kategori'); ?>">
                                <small class="form-control-feedback text-danger"> <?= form_error('kategori'); ?> </small>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan Perubahan</button>
                                <a href="<?= base_url('admin/kategori') ?>" class="btn btn-inverse"> <i class="fa fa-arrow-left"></i> Kembali</a>
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