<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)),url(../uploads/background/bg-about.jpg), center no-repeat; background-size: cover;background-position: bottom;">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white  slideInDown mb-3"><?=$AboutDetail->about_menu?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="<?=base_url('/')?>">หน้าแรก</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page"><?=$AboutDetail->about_menu?></li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">

            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
              
                <h1 class="mb-3"><?=$AboutDetail->about_menu?></h1>
                <p>
                <?=$AboutDetail->about_detail?>
                </p>
       
           
            </div>


            <div class="col-lg-4">
                <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h3 class="mb-4">เกี่ยวกับ สกจ</h3>
                    <div class="category-list d-flex flex-column">
                        <?php foreach ($AboutSchool as $key => $value) : ?>
                        <a class="bg-white text-body" href="<?=base_url('About/'.$value->about_menu)?>"><?=$value->about_menu?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>