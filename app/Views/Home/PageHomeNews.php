
<div class="container py-5">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
        style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <h6 class="section-title bg-white text-center text-primary px-3">SKJ News</h6>
        <h1 class="display-6 mb-4">สกจ. ประชาสัมพันธ์</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider" class="owl-carousel">
                <?php foreach ($news as $key => $v_news) : ?>
                <div class="post-slide">
                    <div class="post-img">
                        <img src="<?=base_url('uploads/news/'.$v_news->news_img)?>"
                            alt="">
                        <a href="<?=base_url('News/Detail/'.$v_news->news_id);?>" data_view="<?=$v_news->news_view?>"
                            news_id="<?=$v_news->news_id?>" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title"></h3>
                            <a href="#" data_view="<?=$v_news->news_view?>"
                            news_id="<?=$v_news->news_id?>"><?=$v_news->news_topic?></a>
                        </h3>                     
                        <span class="post-date"><i class="fa fa-clock-o"></i> <?php print_r($dateThai->thai_date_fullmonth(strtotime($v_news->news_date)));?></span>
                        <a href="<?=base_url('News/Detail/'.$v_news->news_id);?>" data_view="<?=$v_news->news_view?>"
                            news_id="<?=$v_news->news_id?>" class="read-more">อ่านต่อ</a>
                    </div>
                </div>
                <?php endforeach; ?>                
            </div>

            <div class="text-center">
                <a class="btn btn-primary rounded-pill py-2 px-5 w-auto" href="<?=base_url('News')?>">ดูทั้งหมด</a>
            </div>
            
        </div>
    </div>
</div>