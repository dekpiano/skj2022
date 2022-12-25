<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)),url(uploads/background/bg-news.jpg), center no-repeat; background-size: cover;background-position: bottom;" >
    <div class="container text-center py-5">
        <h1 class="display-4 text-white  slideInDown mb-3">สกจ. ประชาสัมพันธ์</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">สกจ. ประชาสัมพันธ์</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <!-- <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h6 class="section-title bg-white text-center text-primary px-3">SKJ News</h6>
            <h1 class="display-6 mb-4">สกจ. ประชาสัมพันธ์</h1>
        </div> -->
        <div class="row g-4">
            <?php if($NewsAll):?>
            <?php foreach ($NewsAll as $key => $v_news) : ?>
            <div class="col-lg-3 col-md-4 col-6 grid-item wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="blog-item">
                    <img class="img-fluid" src="<?=base_url('uploads/news/'.$v_news->news_img)?>" alt="">
                    <div class="blog-text">
                        <div class="breadcrumb">
                            <a class="breadcrumb-item small" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                            <a class="breadcrumb-item small" href="#"><i class="fa fa-calendar-alt me-2"></i>
                                <?=$dateThai->thai_date_fullmonth(strtotime($v_news->news_date))?>
                            </a>
                            <a class="breadcrumb-item small" href="#"><i class="fa fa-eye me-2"></i><?=$v_news->news_view?></a>
                        </div>
                        <a class="h4 mb-0 CountReadNews" data_view="<?=$v_news->news_view?>" news_id="<?=$v_news->news_id?>"
                            href="<?=base_url('News/Detail/'.$v_news->news_id);?>"><?=$v_news->news_topic?></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <div id="main" class="row g-4"></div>
            <div id="loader" class="row g-4" style="display:none;">
            <?= $this->include('layout/PageLoadingData')?>
            </div>
            
        </div>
    </div>
</div>