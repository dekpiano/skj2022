<!-- Topbar Start -->
<div class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <!-- <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Career</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Terms</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Privacy</a></li> -->
            </ol>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <div class="h-100 d-inline-flex align-items-center">
                <a class="btn-square text-primary border-end rounded-0" href="https://www.facebook.com/SKJNS160"><i class="fab fa-facebook-f"></i></a>
                <a class="btn-square text-primary border-end rounded-0" href="https://www.youtube.com/channel/UC7p4cQQuIFLyrF68p7JbWDw"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Brand & Contact Start -->
<div class="container-fluid py-4 px-3 wow fadeIn" data-wow-delay="0.1s">
    <div class="row align-items-center top-bar">
        <div class="col-lg-6 col-md-12 text-center text-lg-start">
            <a href="<?=base_url('/');?>" class="navbar-brand m-0 p-0">
                <h3 class="fw-bold text-primary m-0" style="font-family:'Pattaya'">

                    <div class="row  con-header">
                        <div class="d-flex align-items-center justify-content-lg-start justify-content-md-center">
                            <div class="mx-3">
                                <img src="<?=base_url()?>/assets/img/logo/Logo-nav.png" alt="Logo">
                            </div>
                            <div class="text-header">
                                <div class="text-thai">
                                    สวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์
                                </div>
                                <div class="text-eng">
                                    Suankularb Wittayalai (Jiraprawat) Nakornsawan
                                </div>
                            </div>
                        </div>

                    </div>


                </h3>
                <!-- <img src="<?=base_url()?>/assets/img/logo.png" alt="Logo"> -->
            </a>
        </div>
        <div class="col-lg-6 col-md-7 d-none d-lg-block">
            <div class="row">
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="far fa-clock text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">เวลาทำการ</p>
                            <h6 class="mb-0">จันทร์ - ศุกร์, 8:30 - 16:30</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="fa fa-phone text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">ติดต่อ</p>
                            <h6 class="mb-0">056-009-667</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="far fa-envelope text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">Email Us</p>
                            <h6 class="mb-0">skjns160@skj.ac.th</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand & Contact End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s"
    style="font-size: 14px;border-top: 5px solid #38B8F5;">
    <a href="<?=base_url('/');?>" class="navbar-brand ms-3 d-lg-none">MENU</a>
    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0">

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-house"></i> เกี่ยวกับ สกจ
                </a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <?php foreach ($AboutSchool as $key => $v_AboutSchool) : ?>
                    <a href="<?=base_url('About/'. urlencode($v_AboutSchool->about_menu))?>" class="dropdown-item"><i
                            class="fa-sharp fa-solid fa-caret-right"></i> <?=$v_AboutSchool->about_menu?></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-users"></i>
                    บุคลากร</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="<?=base_url('Personnal/'.urlencode("สายบริหาร/ผู้บริหารสถานศึกษา"))?>" class="dropdown-item"><i
                            class="fa-sharp fa-solid fa-caret-right"></i> ผู้บริหารสถานศึกษา</a>
                    <?php foreach ($Lear as $key => $v_Lear) : ?>
                    <a href="<?=base_url('Personnal/'.urlencode("สายการสอน/").str_replace(" ", "-", urlencode($v_Lear->lear_namethai)))?>"
                        class="dropdown-item"><i class="fa-sharp fa-solid fa-caret-right"></i>
                        <?=$v_Lear->lear_namethai;?></a>
                    <?php endforeach; ?>
                    <?php foreach ($PosiOther as $key => $v_PosiOther) : ?>
                    <a href="<?=base_url('Personnal/สายสนับสนุน/'.str_replace(" ", "-", urlencode($v_PosiOther->posi_name)))?>"
                        class="dropdown-item"><i class="fa-sharp fa-solid fa-caret-right"></i>
                        <?=$v_PosiOther->posi_name;?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <a href="<?=base_url('News')?>" class="nav-item nav-link"><i class="fa-solid fa-newspaper"></i>
                ประชาสัมพันธ์</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa-solid fa-layer-group"></i> กลุ่มบริหาร</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="https://academic.skj.ac.th/" class="dropdown-item"><i
                            class="fa-sharp fa-solid fa-caret-right"></i> วิชาการ</a>
                    <a href="#" class="dropdown-item"><i class="fa-sharp fa-solid fa-caret-right"></i>
                        กิจการนักเรียน</a>
                    <a href="#" class="dropdown-item"><i class="fa-sharp fa-solid fa-caret-right"></i> ทั่วไป</a>
                    <a href="#" class="dropdown-item"><i class="fa-sharp fa-solid fa-caret-right"></i>
                        งบประมาณและแผน</a>
                </div>
            </div>
            <a href="<?=base_url('Contact')?>" class="nav-item nav-link"><i class="fa-solid fa-address-book"></i>
                ติดต่อ</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-bars"></i>
                    SKJ บริการ</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="https://admission.skj.ac.th/" class="dropdown-item">
                        <i class="fa-solid fa-user-plus"></i>
                        รับสมัครนักเรียน
                    </a>
                    <a href="https://academic.skj.ac.th/LearningOnline" class="dropdown-item">
                        <i class="fa-solid fa-globe"></i> ห้องเรียนออนไลน์
                    </a>
                    <a href="<?=base_url('PageGroup')?>" class="dropdown-item">
                        <i class="fa-brands fa-facebook"></i>
                        Fecebook กลุ่ม
                    </a>

                    <a href="https://skj.ac.th/Email" class="dropdown-item">
                        <i class="fa-solid fa-envelope"></i> Email
                        โรงเรียน
                    </a>
                    <a href="https://learnsuan.skj.ac.th/" class="dropdown-item">
                        <i class="fa-solid fa-passport"></i>
                        สวนกุหลาบศึกษา
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-item dropdown ">
            <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light border-2 py-2 px-4"
                data-bs-toggle="dropdown" style="font-size: 16px;"><i class="fa-solid fa-right-to-bracket"></i>
                เข้าสู่ระบบ</a>
            <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                <a href="https://academic.skj.ac.th/LoginStudent" class="dropdown-item">นักเรียน</a>
                <a href="https://teacher.skj.ac.th/" class="dropdown-item">ครูผู้สอน</a>
            </div>
        </div>

    </div>
</nav>
<!-- Navbar End -->