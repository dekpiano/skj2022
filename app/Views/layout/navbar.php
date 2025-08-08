<!-- Brand & Contact Start -->
<div class="container-fluid py-4 px-3 wow fadeIn d-none d-lg-block" data-wow-delay="0.1s">
    <div class="row align-items-center top-bar">
        <div class="col-lg-6 col-md-12 text-center text-lg-start">
            <a href="<?=base_url('/');?>" class="navbar-brand m-0 p-0 d-none d-lg-block">
                <h3 class="fw-bold text-primary m-0" style="font-family:'Pattaya'">

                    <div class="row  con-header">
                        <div class="d-flex align-items-center justify-content-lg-start justify-content-md-center">
                            <div class="mx-3">
                                <img data-src="<?=base_url()?>/assets/img/logo/Logo-nav.png" alt="Logo">
                            </div>
                            <div class="text-header" style="font-family: 'K2D', sans-serif;">
                                <div class="text-thai">
                                    สวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์
                                </div>
                                <div class="text-eng">
                                    Suankularb Wittayalai (Jiraprawat) Nakhon Sawan
                                </div>
                            </div>
                        </div>

                    </div>


                </h3>
                <!-- <img data-src="<?=base_url()?>/assets/img/logo.png" alt="Logo"> -->
            </a>
        </div>
        <div class="col-lg-6 col-md-7 d-none d-lg-block">
            <div class="row header-content">
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

<style>
.dropdown-menu .dropdown-item {
    margin-bottom: 10px;
}

.dropdown-menu .dropdown-item:hover {
    background-color: #008489;
    color: #fff;
}

.dropdown-mega .dropdown-menu {
    width: 100%;
}

.dropdown-mega h5 {
    padding-bottom: 12px;
    border-bottom: 1px solid rgba(0, 0, 0, .125);
    margin: 0;
}

.list-group-item {
    font-size: 16px;
    color: #3F3B51;
    border: 0;
    border-bottom: 1px solid rgba(0, 0, 0, .125);
    padding: 12px 0;
}

.list-group-item:hover {
    color: #008489;
}



/* Responsive */
@media(max-width: 991.5px) {
    .navbar-brand {
        font-size: 1rem; /* Adjusted font size for mobile */
        padding-top: 0.2rem; /* Adjust padding to move it up */
        padding-bottom: 0.2rem;
        white-space: nowrap; /* Prevent text wrapping */
        overflow: hidden;
        text-overflow: ellipsis;
        flex-shrink: 1;
        display: flex; /* Use flexbox for alignment */
        align-items: center; /* Vertically align items */
    }
    .navbar-brand img {
        height: 1.5rem; /* Adjust logo size */
        margin-right: 0.5rem; /* Space between logo and text */
        vertical-align: middle;
    }

    .navbar-nav .nav-item {
        margin: 5px 10px;
    }

    form {
        margin: 30px 0;
    }
}
</style>
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-2 wow fadeIn" data-wow-delay="0.1s"
    style="font-size: 14px;border-top: 5px solid #38B8F5;">
    <div class="container-fluid px-3 px-lg-5">
        <a href="<?=base_url('/');?>" class="navbar-brand d-lg-none"><img src="<?=base_url()?>/assets/img/logo/Logo-nav.png" alt="Logo">สวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
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
                        <a href="<?=base_url('Personnal/'.urlencode("สายบริหาร/ผู้บริหารสถานศึกษา"))?>"
                            class="dropdown-item"><i class="fa-sharp fa-solid fa-caret-right"></i> ผู้บริหารสถานศึกษา</a>
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

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        aria-expanded="false">
                        <i class="fa-solid fa-layer-group"></i> กลุ่มบริหาร
                    </a>
                    <ul class="dropdown-menu shadow">
                        <li><a class="dropdown-item" href="https://academic.skj.ac.th/"><i
                                    class="fa-sharp fa-solid fa-caret-right"></i> วิชาการ</a></li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-item" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-sharp fa-solid fa-caret-right"></i> งานทั่วไป
                            </a>
                            <ul class="dropdown-menu shadow">
                                <li><a class="dropdown-item" href="https://general.skj.ac.th/Booking">
                                        <i class="fa-solid fa-house"></i> จองอาคารสถานที่</a></li>
                                <li><a class="dropdown-item" href="https://general.skj.ac.th/CarBooking">
                                        <i class="fa-solid fa-car-side"></i> จองยานพาหนะ</a></li>
                                <li><a class="dropdown-item" href="https://general.skj.ac.th/Repair">
                                        <i class="fa-solid fa-screwdriver-wrench"></i>
                                        แจ้งซ่อม</a></li>

                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="https://personnel.skj.ac.th/"><i class="fa-sharp fa-solid fa-caret-right"></i> งานบุคคล</a>
                        </li>
                        <li><a class="dropdown-item" href="https://budgetplan.skj.ac.th/"><i class="fa-sharp fa-solid fa-caret-right"></i>
                                งบประมาณและแผน</a></li>
                    </ul>
                </li>


                <!-- <a href="<?=base_url('Contact')?>" class="nav-item nav-link"><i class="fa-solid fa-address-book"></i>
                    ติดต่อ</a> -->
                <a href="<?=base_url('Course')?>" class="nav-item nav-link"><i class="fa-solid fa-address-book"></i>
                    หลักสูตรความเป็นเลิศ</a>
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

                        <a href="<?=base_url('Email')?>" class="dropdown-item">
                            <i class="fa-solid fa-envelope"></i> Email
                            โรงเรียน
                        </a>
                        <a href="https://learnsuan.skj.ac.th/" class="dropdown-item">
                            <i class="fa-solid fa-passport"></i>
                            สวนกุหลาบศึกษา
                        </a>
                        <a href="<?=base_url('guidance')?>" class="dropdown-item">
                            <i class="fa-solid fa-passport"></i>
                            ทุนการศึกษา
                        </a>
                        <a href="<?=base_url('Yearbook')?>" class="dropdown-item">
                            <i class="fa-solid fa-passport"></i>
                            หนังสือรุ่น ส.ก.จ.
                        </a>
                        <a href="https://general.skj.ac.th/Repair" class="dropdown-item">
                            <i class="fa-solid fa-hammer"></i>
                            แจ้งซ่อมออนไลน์
                        </a>
                        <a href="https://general.skj.ac.th/Procurements" class="dropdown-item">
                            <i class="fa-solid fa-hammer"></i>
                            การจัดซื้อจัดจ้าง
                        </a>
                    </div>
                </div>

            </div>

            <div class="nav-item dropdown ">
                <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light border-2 py-2 px-4"
                    data-bs-toggle="dropdown" style="font-size: 16px;"><i class="fa-solid fa-right-to-bracket"></i>
                    เข้าสู่ระบบ</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="https://student.skj.ac.th/" class="dropdown-item">นักเรียน</a>
                    <a href="https://teacher.skj.ac.th/" class="dropdown-item">ครูผู้สอน</a>
                </div>
            </div>

        </div>
    </div>
</nav>
<!-- Navbar End -->