<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn; background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(../../uploads/news/<?=$news->news_img?>) center center no-repeat;">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white  slideInDown mb-3"><?php echo $news->news_topic; ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="<?=base_url('/')?>">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="<?=base_url('News')?>">ประชาสัมพันธ์</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">สกจ. ประชาสัมพันธ์</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row g-5">

        <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div id="detail-carousel" class="carousel slide mb-5 pointer-event" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img class="w-100" src="../../uploads/news/<?=$news->news_img?>" alt="Image">
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#detail-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#detail-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="breadcrumb blog-meta">
                <a class="breadcrumb-item" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                <a class="breadcrumb-item" href="#"><i class="fa fa-calendar-alt me-2"></i>
                    <?=$dateThai->thai_date_fullmonth(strtotime($news->news_date))?>
                </a>
                <a class="breadcrumb-item small" href="#"><i class="fa fa-eye me-2"></i><?=$news->news_view?></a>
            </div>
            <style>
            p img{
                width:100%;
            }
            </style>
            <p class="mb-3">
                <?=$news->news_content;?>
            </p>

        </div>


        <div class="col-lg-4">

            <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="input-group">
                    <input type="text" class="form-control p-3" placeholder="Keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>

            <div class="blog-tab bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h3 class="mb-4">ข่าวอื่น ๆ</h3>
                <ul class="nav nav-pills d-flex justify-content-between border-bottom mb-3">
                    <li class="nav-item">
                        <a class="d-flex align-items-center active" data-bs-toggle="pill" href="#tab-1">
                            <h5>ล่าสุด</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center" data-bs-toggle="pill" href="#tab-2">
                            <h5>อ่านมากสุด</h5>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-3">
                            <?php foreach ($NewsLatest as $key => $v_NewsLatest):?>
                            <div class="col-12 d-flex">
                                <img class="img-fluid rounded flex-shrink-0" src="../../uploads/news/<?=$v_NewsLatest->news_img?>" alt="">
                                <div class="ps-3">
                                    <a href="<?=base_url('News/Detail/'.$v_NewsLatest->news_id);?>" class="d-block h5 CountReadNews" data_view="<?=$v_NewsLatest->news_view?>" news_id="<?=$v_NewsLatest->news_id?>">
                                    <?=$v_NewsLatest->news_topic;?></a>
                                    <div class="breadcrumb blog-meta mb-0">
                                        <small class="breadcrumb-item">
                                            <a href="#"> <?=$dateThai->thai_date_fullmonth(strtotime($v_NewsLatest->news_date))?>
                                            </a>
                                        </small>
                                        <small class="breadcrumb-item"><a href="#">ดู <?=$v_NewsLatest->news_view?> ครั้ง</a></small>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-3">
                            <div class="col-12 d-flex">
                                <img class="img-fluid rounded flex-shrink-0" src="img/blog-sm-1.jpg" alt="">
                                <div class="ps-3">
                                    <a href="" class="d-block h5">Lorem ipsum dolor sit amet consec elit</a>
                                    <div class="breadcrumb blog-meta mb-0">
                                        <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                        <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex">
                                <img class="img-fluid rounded flex-shrink-0" src="img/blog-sm-2.jpg" alt="">
                                <div class="ps-3">
                                    <a href="" class="d-block h5">Lorem ipsum dolor sit amet consec elit</a>
                                    <div class="breadcrumb blog-meta mb-0">
                                        <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                        <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex">
                                <img class="img-fluid rounded flex-shrink-0" src="img/blog-sm-3.jpg" alt="">
                                <div class="ps-3">
                                    <a href="" class="d-block h5">Lorem ipsum dolor sit amet consec elit</a>
                                    <div class="breadcrumb blog-meta mb-0">
                                        <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                        <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <a href="">
                    <img class="img-fluid rounded" src="img/blog-3.jpg" alt="">
                </a>
            </div>


            <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h3 class="mb-4">Tags Cloud</h3>
                <div class="d-flex flex-wrap m-n1">
                    <a href="" class="btn btn-white m-1">Design</a>
                    <a href="" class="btn btn-white m-1">Development</a>
                    <a href="" class="btn btn-white m-1">Marketing</a>
                    <a href="" class="btn btn-white m-1">SEO</a>
                    <a href="" class="btn btn-white m-1">Writing</a>
                    <a href="" class="btn btn-white m-1">Consulting</a>
                    <a href="" class="btn btn-white m-1">Design</a>
                    <a href="" class="btn btn-white m-1">Development</a>
                    <a href="" class="btn btn-white m-1">Marketing</a>
                    <a href="" class="btn btn-white m-1">SEO</a>
                    <a href="" class="btn btn-white m-1">Writing</a>
                    <a href="" class="btn btn-white m-1">Consulting</a>
                </div>
            </div>

        </div>

    </div>
</div>