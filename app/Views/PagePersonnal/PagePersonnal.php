<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn; background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)),url(../../uploads/background/bg-personnal.jpg), center no-repeat; background-size: cover;background-position: center;">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white  slideInDown mb-3">บุคลากร</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="<?=base_url('/')?>">หน้าแรก</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">บุคลากร</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h6 class="section-title bg-white text-center text-primary px-3">กลุ่มสาระการเรียนรู้</h6>
            <h1 class="display-6 mb-4"><?=str_replace("-", " ", urldecode($uri->getSegment(3)));?></h1>
        </div>
        <div class="row g-4">
            <?php if(urldecode($uri->getSegment(3)) === "ผู้บริหารสถานศึกษา"):?>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item rounded text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4"
                            src="<?=base_url('uploads/director/PO1.png')?>" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>นางสาวอร่าม วัฒนะ</h5>
                                <span style="font-size: 0.7em;">
                                    ผู้อำนวยการกองการศึกษา ศาสนาและวัฒนธรรม รักษาการในตำแหน่ง <br>
                                    ผู้อำนวยการสถานศึกษา โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์

                                </span>

                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php foreach ($Pers as $key => $v_Pers) :?>
            <?php if($v_Pers->pers_groupleade == 'หัวหน้ากลุ่มสาระ') : ?>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item rounded text-center p-4">
                        <?php if($v_Pers->pers_img == ""):?>
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4"
                            src="<?=base_url('uploads/presonnal/man.png')?>" alt="">
                        <?php else: ?>
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4"
                            src="https://general.skj.ac.th/uploads/admin/Personnal/<?=$v_Pers->pers_img;?>" alt="">
                        <?php endif; ?>
                        <div class="team-text">
                            <div class="team-title">
                                <h5><?=$v_Pers->pers_prefix.$v_Pers->pers_firstname.' '.$v_Pers->pers_lastname?></h5>
                                <span><?=$v_Pers->posi_name.' '.$v_Pers->pers_academic?></span>
                                <p><?=$v_Pers->pers_groupleade == 'หัวหน้ากลุ่มสาระ' ?"($v_Pers->pers_groupleade)":""?>
                                </p>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php else :?>
            <?php if($v_Pers->pers_status == "กำลังใช้งาน"): ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="team-item rounded text-center p-4">
                <?php if($v_Pers->pers_img == ""):?>
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4"
                            src="<?=base_url('uploads/presonnal/man.png')?>" alt="">
                        <?php else: ?>
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4"
                            src="https://general.skj.ac.th/uploads/admin/Personnal/<?=$v_Pers->pers_img;?>" alt="">
                        <?php endif; ?>
                    <div class="team-text">
                        <div class="team-title">
                            <h5><?=$v_Pers->pers_prefix.$v_Pers->pers_firstname.' '.$v_Pers->pers_lastname?></h5>
                            <span><?=$v_Pers->posi_name.' '.$v_Pers->pers_academic?></span>
                            <p><?=$v_Pers->pers_groupleade == 'หัวหน้ากลุ่มสาระ' ?"($v_Pers->pers_groupleade)":""?></p>
                        </div>
                        <div class="team-social">
                            <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php endif; ?>
            <?php endforeach; ?>

        </div>
    </div>
</div>