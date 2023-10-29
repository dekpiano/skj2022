<style>
body {
    /* background-color: #EEE; */
}





.hero-video .info-hero .container,
.hero-video .info-hero .row {
    height: 100%;
}



@media (min-width : 320px) and (max-width: 768px) {
    .hero-video {
        position: relative;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 0;
        overflow: hidden;
    }

    .hero-video .info-hero {
        z-index: 999;
        position: absolute;
        left: 0;
        width: 100%;
        height: 100%;
        top: 0;
    }

    .hero-video .info-hero h1 {
        color: #FB7E9C;
        text-shadow: 0.075em 0.08em 0.1em rgba(0, 0, 0, 1);
        text-transform: uppercase;
        font-weight: 700;
        font-size: 4rem;
        line-height: 1.2;
        position: relative;
        font-family: 'Pattaya';
    }

    .hero-video .info-hero h1 span {
        color: #249ffd;
        text-shadow: 0.075em 0.08em 0.1em rgba(0, 0, 0, 1);
        font-size: 2rem;
    }

    .hero-video .info-hero h2 {
        color: #fff;
        text-shadow: 0.075em 0.08em 0.1em rgba(0, 0, 0, 1);
        text-transform: uppercase;
        font-weight: 700;
        font-size: 1.2rem;
        line-height: 1.2;
        position: relative;
    }

    .why-us {
        /* margin-top: -80px; */
        padding: 0 0 30px 0;
        position: relative;
        z-index: 3;
    }

    .why-us .content {
        padding: 10px;
        text-align:center;
        background: #249ffd;
        border-radius: 4px;
        color: #fff;
    }

    .why-us .content h3 {
        font-weight: 700;
        font-size: 25px;
       /* margin-bottom: 30px; */
    }

    .why-us .icon-box {
        border-radius: 10px;
        background: #fff;
        padding: 5px 5px;
        display: flex;
        align-items: center;
    }

    .why-us .icon-box .icon i {
        color: #249ffd;
        font-size: 22px;
    }

    .why-us .icon-box .icon {
        float: left;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border: 2px solid #249ffd66;
        border-radius: 50px;
        transition: 0.5s;
        background: #fff;
        margin-right: 10px;
    }
}

@media only screen and (min-width: 800px) {
    .hero-video {
        position: relative;
        /* height: 80vh; */
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 0;
        overflow: hidden;
    }

    .hero-video .info-hero h1 {
        color: #FB7E9C;
        text-shadow: 0.075em 0.08em 0.1em rgba(0, 0, 0, 1);
        text-transform: uppercase;
        font-weight: 700;
        font-size: 5.5rem;
        line-height: 1.2;
        position: relative;
        font-family: 'Pattaya';
    }

    .hero-video .info-hero h1 span {
        color: #249ffd;
        text-shadow: 0.075em 0.08em 0.1em rgba(0, 0, 0, 1);
        font-size: 4rem;
    }

    .hero-video .info-hero h2 {
        color: #fff;
        text-shadow: 0.075em 0.08em 0.1em rgba(0, 0, 0, 1);
        text-transform: uppercase;
        font-weight: 700;
        font-size: 2.1rem;
        line-height: 1.2;
        position: relative;
    }

    .why-us {
        margin-top: -80px;
        padding: 0 0 30px 0;
        position: relative;
        z-index: 3;
    }

    .why-us .content {
        padding: 30px;
        background: #249ffd;
        border-radius: 4px;
        color: #fff;
    }

    .why-us .content h3 {
        font-weight: 700;
        font-size: 34px;
        margin-bottom: 30px;
    }

    .why-us .icon-box {
        border-radius: 10px;
        background: #fff;
        padding: 5px 15px;
        display: flow-root;
    }

    .why-us .icon-box .title{
        font-size: 22px;
    }

    .why-us .icon-box .icon i {
        color: #249ffd;
        font-size: 32px;
    }

    .why-us .icon-box .icon {
        float: left;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        border: 2px solid #249ffd66;
        border-radius: 50px;
        transition: 0.5s;
        background: #fff;
        margin-right: 10px;
    }
}


/* Media Queries */
@media screen and (max-width: 690px) {}

@media screen and (max-width: 518px) {}

@media screen and (max-width: 453px) {}

@media screen and (min-width: 800px) {}
</style>
<div class="hero-video">
    <video style="width: 100%;" autoplay muted playsinline loop
        poster="<?=base_url('uploads/video/bg.png')?>">
        <source src="<?=base_url('uploads/video/video-skj2.mp4')?>" type="video/mp4">
        <!-- <source src="https://nakhonsawangames38.com//videos/home-header-video-bg.mp4" type="video/mp4"> -->
    </video>
    <!-- <div class="info-hero">
        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col">
                    <h1>
                        สวนฯ 9 <span>ยินดีต้อนรับ </span>
                    </h1>
                    <h2>
                        สวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์
                    </h2>
                </div>
            </div>
        </div>
    </div> -->
</div>

<section id="why-us" class="why-us">
    <div class="container">

        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 aos-init aos-animate" data-aos="fade-up">
                <div class="content">
                    <h3 class="text-white">หลักสูตรที่เปิดสอน</h3>
                    <p>
                        หลักสูตรพัฒนาผู้เรียนสู่ความเป็นเลิศ 5 หลักสูตร
                    </p>
                </div>
                <div class="text-center d-none d-sm-block">
                    <div class="" style="padding: 0px 41px 0px">
                        <img class="flex-shrink-0 img-fluid" src="<?=base_url('uploads/director/PO.png')?>" alt="">
                    </div>
                    <div class="mt-1">
                        <h4><?=$Director->pers_prefix.$Director->pers_firstname.' '.$Director->pers_lastname?></h4>
                        <small>ผู้อำนวยการสถานศึกษา</small>
                    </div>
                </div>
            </div>

            <div class="shadow-lg icon-box col-md-6 col-xl-8 col-lg-6 d-flex flex-column  py-3">
                <div class="">
                    <h4 data-aos="fade-up" class="aos-init aos-animate">เกี่ยวกับ</h4>
                    <p data-aos="fade-up" class="aos-init aos-animate">

                    </p>

                    <div class="icon-box aos-init aos-animate" data-aos="fade-up">
                        <div class="icon">
                            <i class="fa-solid fa-atom"></i>
                        </div>
                        <h6 class="title"><a href="<?=base_url('Course')?>">หลักสูตรความเป็นเลิศ ด้านวิชาการ SMT(S) ,
                                SMT(T)
                            </a></h6>
                        <p class="description d-none d-sm-block d-md-none d-lg-block">
                            หลักสูตรหรือแผนการจัดการเรียนการสอน ที่มุ่งเน้นการพัฒนา
                            เพื่อส่งเสริมศักยภาพของนักเรียนที่มีความสามารถพิเศษทางด้านคณิตศาสตร์ วิทยาศาสตร์และเทคโนโลยี
                        </p>
                    </div>

                    <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon">
                            <i class="fa-solid fa-trophy"></i>
                        </div>
                        <h6 class="title"><a href="<?=base_url('Course')?>">หลักสูตรความเป็นเลิศ ด้านกีฬา (SP)</a></h6>
                        <p class="description d-none d-sm-block d-md-none d-lg-block">หลักสูตรหรือแผนการจัดการเรียนการสอน
                            ที่มุ่งเน้นการพัฒนาทักษะ
                            ความสามารถด้านกีฬา เช่น ฟุตบอล วอลเลย์บอล บาสเกตบอล ฯลฯ</p>
                    </div>

                    <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="fa-solid fa-palette"></i></div>
                        <h6 class="title"><a href="<?=base_url('Course')?>">หลักสูตรความเป็นเลิศ ด้านศิลปะ ดนตรี การแสดง
                                (PAP)</a></h6>
                        <p class="description d-none d-sm-block d-md-none d-lg-block">หลักสูตรหรือแผนการจัดการเรียนการสอน
                            ที่มุ่งเน้นการพัฒนารูปแบบ/แบบแผนของการแสดง เช่น ดนตรีไทย ดนตรีสากล การขับร้อง ศิลปะการแสดง
                            ทัศนศิลป์ วิจิตรศิลป์ ประติมากรรม ฯลฯ</p>
                    </div>
                    <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="fa-solid fa-gears"></i></div>
                        <h6 class="title"><a href="<?=base_url('Course')?>">หลักสูตรความเป็นเลิศ ด้านวิชาชีพ (CP)</a>
                        </h6>
                        <p class="description d-none d-sm-block d-md-none d-lg-block">หลักสูตรหรือแผนการจัดการเรียนการสอน
                            ที่มุ่งเน้นการพัฒนาทักษะในการประกอบอาชีพ ได้แก่ การโรงแรม การอาหารคหกรรม
                            ธุรกิจและการประกอบการ โรงงานต่าง ๆ ฯลฯ</p>
                    </div>
                    <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="fa-solid fa-language"></i></div>
                        <h6 class="title"><a href="<?=base_url('Course')?>">หลักสูตรความเป็นเลิศ ด้านภาษา (CEP)</a></h6>
                        <p class="description d-none d-sm-block d-md-none d-lg-block">หลักสูตรหรือแผนการจัดการเรียนการสอน ที่มุ่งเน้นการพัฒนา
                            เพื่อส่งเสริมศักยภาพของนักเรียนที่มีความสามารถพิเศษทางด้าน ภาษาต่างประเทศ เช่น ภาษาอังกฤษ
                            ภาษาจีน</p>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>