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
                        <h4 class="card-title">Kategori</h4>
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambah-modal"><i class="fa fa-plus"></i> Tambah</button>
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
                                        <th>Nama Kategori</th>
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
                                                    <a href="<?= base_url('admin/edit_kategori?id=' . $value['id_kategori'] . '') ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?= base_url('admin/hk?id=' . $value['id_kategori'] . '') ?>" data-toggle="tooltip" data-original-title="Hapus"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        endforeach; ?>

                                    <?php
                                } else { ?>
                                        <tr>
                                            <td colspan="3" class="text-center"><?php echo "Kategori Kosong" ?></td>
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
                                        <th>Nama Kategori</th>
                                        <th style="width:125px;">Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
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
<div id="tambah-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tambah Kategori</h4>
            </div>
            <form action="<?= base_url('admin/kategori') ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kategori:</label>
                        <input autofocus type="text" class="form-control" id="recipient-name" name="kategori" autocomplete="off" value="<?= set_value('kategori'); ?>">
                        <span class="text-center"><?= form_error('kategori'); ?></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                </div>
            </form>
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