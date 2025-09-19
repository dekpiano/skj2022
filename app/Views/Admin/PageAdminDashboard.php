<?= $this->extend('Admin/layout/AdminLayout') ?>

<?= $this->section('content') ?>
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-lg-12 mb-4 order-0">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <h3 class="card-title text-primary">ยินดีต้อนรับ 🎉 <?php echo $AdminFullname;?></h3>
                                            <p class="mb-4">
                                                ระบบงานสารสนเทศเว็บไซต์โรเรียน
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-sm-5 text-center text-sm-left">
                                        <div class="card-body pb-0 px-0 px-md-4">
                                            <img src="<?=base_url()?>/assets/admin/assets/img/illustrations/man-with-laptop-light.png"
                                                height="140" alt="View Badge User"
                                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->
<?= $this->endSection() ?>