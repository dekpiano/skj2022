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
        text-align: center;
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

    .why-us .icon-box .title {
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



/* สำหรับโทรศัพท์มือถือ */
@media (max-width: 480px) {
    .posi-img1{
        width: 150px;
        position: absolute;
        margin: -90px 25px;
    }

    .posi-img{
        width: 150px;
        position: absolute;
        margin: 213px 25px;
    }
}

/* สำหรับแท็บเล็ต */
@media (min-width: 481px) and (max-width: 1024px) {
    .posi-img1{
        width: 193px;
        position: absolute;
        margin: 131px 25px;
    }

    .posi-img{
        width: 193px;
        position: absolute;
        margin: 160px 25px;
    }
}

/* สำหรับแลปท็อป */
@media (min-width: 1025px) and (max-width: 1440px) {
  
}

/* สำหรับจอคอมพิวเตอร์ */
@media (min-width: 1441px) {
  
}

</style>
<div class="hero-video">
    <video style="width: 100%;" autoplay muted playsinline loop poster="<?=base_url('uploads/video/bg.png')?>">
        <source src="<?=base_url('uploads/video/video-skj2.mp4')?>" type="video/mp4">

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




<style>
    /*--------------------------------------------------------------
# Features Section
--------------------------------------------------------------*/
.features .nav-tabs {
  border: 0;
  background-color: color-mix(in srgb, var(--default-color), transparent 96%);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border-radius: 50px;
  padding: 6px;
  width: auto;
}

.features .nav-item {
  margin: 0;
  padding: 0 5px 0 0;
}

.features .nav-item:last-child {
  padding-right: 0;
}

.features .nav-link {
  background-color: none;
  color: var(--heading-color);
  padding: 10px 30px;
  transition: 0.3s;
  border-radius: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  height: 100%;
  border: 0;
  margin: 0;
}

@media (max-width: 468px) {
  .features .nav-link {
    padding: 8px 20px;
  }
}

.features .nav-link i {
  padding-right: 15px;
  font-size: 48px;
}

.features .nav-link h4 {
  font-size: 14px;
  font-weight: 500;
  margin: 0;
}

.features .nav-link:hover {
  border-color: color-mix(in srgb, var(--default-color), transparent 80%);
}

.features .nav-link:hover h4 {
  color: var(--accent-color);
}

.features .nav-link.active {
  background-color: var(--accent-color);
  border-color: var(--accent-color);
}

.features .nav-link.active h4 {
  color: var(--contrast-color);
}

.features .tab-content {
  margin-top: 30px;
}

.features .tab-pane h3 {
  color: var(--heading-color);
  font-weight: 700;
  font-size: 32px;
  position: relative;
  margin-bottom: 20px;
  padding-bottom: 20px;
}

.features .tab-pane h3:after {
  content: "";
  position: absolute;
  display: block;
  width: 60px;
  height: 3px;
  background: var(--accent-color);
  left: 0;
  bottom: 0;
}

.features .tab-pane ul {
  list-style: none;
  padding: 0;
}

.features .tab-pane ul li {
  padding-top: 10px;
}

.features .tab-pane ul i {
  font-size: 20px;
  padding-right: 4px;
  color: var(--accent-color);
}

.features .tab-pane p:last-child {
  margin-bottom: 0;
}
</style>
<section id="features" class="features section">

      <div class="container">
      <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <h6 class="section-title bg-white text-center text-primary px-3">SKJ Excellence</h6>
        <h1 class="display-6 mb-4">หลักสูตรพัฒนาผู้เรียนสู่ความเป็นเลิศ 5 หลักสูตร</h1>
    </div>
        <div class="d-flex justify-content-center">

          <ul class="nav nav-tabs aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" role="tablist">

            <li class="nav-item" role="presentation">
              <a class="nav-link show active" data-bs-toggle="tab" data-bs-target="#features-tab-1" aria-selected="true" role="tab">
                <h4>ด้านวิชาการ SMT</h4>
              </a>
            </li><!-- End tab nav item -->

            <li class="nav-item" role="presentation">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2" aria-selected="false" role="tab" tabindex="-1">
                <h4>ด้านกีฬา (SP)</h4>
              </a><!-- End tab nav item -->

            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3" aria-selected="false" role="tab" tabindex="-1">
                <h4>ด้านศิลปะ ดนตรี การแสดง (PAP)</h4>
              </a>
            </li><!-- End tab nav item -->
            <li class="nav-item" role="presentation">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4" aria-selected="false" role="tab" tabindex="-1">
                <h4>ด้านวิชาชีพ (CP)</h4>
              </a>
            </li><!-- End tab nav item -->
            <li class="nav-item" role="presentation">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-5" aria-selected="false" role="tab" tabindex="-1">
                <h4>ด้านภาษา (CEP)</h4>
              </a>
            </li><!-- End tab nav item -->

          </ul>

        </div>

        <div class="tab-content aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-sm-2 order-1 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>หลักสูตรความเป็นเลิศ ด้านวิชาการ SMT(S) , SMT(T)</h3>
                <p class="fst-italic">
                หลักสูตรหรือแผนการจัดการเรียนการสอน ที่มุ่งเน้นการพัฒนา เพื่อส่งเสริมศักยภาพของนักเรียนที่มีความสามารถพิเศษทางด้านคณิตศาสตร์ วิทยาศาสตร์และเทคโนโลยี
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>แผนการเรียนวิทย์ - คณิต</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>แผนการเรียนวิทย์เทคโนโลยี</span></li>
                  
                </ul>
              </div>
              <div class="col-lg-6 order-sm-1 order-2 order-lg-2 text-center">
                <img src="<?=base_url()?>/uploads/Excellent/science.svg" alt="" class="img-fluid posi-img1">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane fade" id="features-tab-2" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>หลักสูตรความเป็นเลิศ ด้านกีฬา (SP)</h3>
                <p class="fst-italic">
                หลักสูตรหรือแผนการจัดการเรียนการสอน ที่มุ่งเน้นการพัฒนาทักษะ ความสามารถด้านกีฬา ส่งเสริมสุขภาพพลานามัยของตนเองและผู้อื่น การป้องกันและปฏิบัติต่อสิ่งต่าง ๆ ที่มีผลต่อสุขภาพอย่างถูกวิธี
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>แผนการเรียน ฟุตบอล</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>แผนการเรียน ฟุตซอล</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>แผนการเรียน วอลเลย์บอล</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>แผนการเรียน บาสเกตบอล</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>แผนการเรียน ตะกร้อ</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="<?=base_url()?>/uploads/Excellent/sport.svg" alt="" class="img-fluid posi-img">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane fade" id="features-tab-3" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>หลักสูตรความเป็นเลิศ ด้านศิลปะ ดนตรี การแสดง (PAP)</h3>
                <p class="fst-italic">
                หลักสูตรหรือแผนการจัดการเรียนการสอน ที่มุ่งเน้นการพัฒนารูปแบบ/แบบแผนของการแสดง เช่น ดนตรีไทย ดนตรีสากล การขับร้อง ศิลปะการแสดง ทัศนศิลป์ วิจิตรศิลป์ ประติมากรรม ฯลฯ
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>สาขาดนตรี</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>สาขานาฏศิลป์</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>สาขาศิลปะ</span></li>
                </ul>
               
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="<?=base_url()?>/uploads/Excellent/music.svg" alt="" class="img-fluid posi-img">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane fade" id="features-tab-4" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>หลักสูตรความเป็นเลิศ ด้านวิชาชีพ (CP)</h3>
                <p class="fst-italic">
                หลักสูตรหรือแผนการจัดการเรียนการสอน ที่มุ่งเน้นการพัฒนาทักษะในการประกอบอาชีพ ได้แก่   
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>การโรงแรม</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>การอาหารคหกรรม</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>โรงงานต่าง ๆ ฯลฯ</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>ธุรกิจและการประกอบการ</span></li> 
                </ul>
               
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="<?=base_url()?>/uploads/Excellent/career.svg" alt="" class="img-fluid posi-img">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane fade" id="features-tab-5" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>หลักสูตรความเป็นเลิศ ด้านภาษา (CEP)</h3>
                <p class="fst-italic">
                หลักสูตรหรือแผนการจัดการเรียนการสอน ที่มุ่งเน้นการพัฒนา เพื่อส่งเสริมศักยภาพของนักเรียนที่มีความสามารถพิเศษทางด้าน ภาษาต่างประเทศ เช่น  
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>ภาษาอังกฤษ</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>ภาษาจีน</span></li>
                </ul>
                
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="<?=base_url()?>/uploads/Excellent/language.svg" alt="" class="img-fluid posi-img">
              </div>
            </div>
          </div><!-- End tab content item -->

        </div>

      </div>

    </section>
    