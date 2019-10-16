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
                        <form class="form-horizontal form-material" id="loginform" action="<?= base_url('login'); ?>" method="POST">
                            <h3 class="box-title m-b-20">Login</h3>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input class="form-control" name="username" type="text" placeholder="Username" value="<?= set_value('username'); ?>" autocomplete="off" autofocus> </div>
                                <span class="text-center text-danger"><?= form_error('username'); ?></span>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" name="password" type="password" placeholder="Password"> </div>
                                <span class="text-center text-danger"><?= form_error('password'); ?></span>
                            </div>

                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button class="btn btn-rounded btn-block btn-outline-info" type="submit">Log In</button>
                                </div>
                            </div>

                        </form>
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