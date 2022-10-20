<!-- Carousel Start -->
<?= $this->include('Home/PageHomeCarousel') ?>
<!-- Carousel End -->

<!-- PageHomeDirector Start -->
<?= $this->include('Home/PageHomeDirector') ?>
<!-- PageHomeDirector End -->

<!-- Facts Start -->
<?= $this->include('Home/PageHomeCounter')?>
<!-- Facts End -->


<!-- News Start -->
<?= $this->include('Home/PageHomeNews') ?>
<!-- News End -->

<!-- Slogan Start -->
<?= $this->include('Home/PageHomeSlogan') ?>
<!-- Slogan End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
            <h1 class="display-6 mb-4">We Focuse On Making The Best In All Sectors</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="">
                    <img class="img-fluid rounded mb-4" src="<?=base_url()?>/assets/img/service-1.jpg" alt="">
                    <h4 class="mb-0">Web Design</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="">
                    <img class="img-fluid rounded mb-4" src="<?=base_url()?>/assets/img/service-2.jpg" alt="">
                    <h4 class="mb-0">App Development</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="">
                    <img class="img-fluid rounded mb-4" src="<?=base_url()?>/assets/img/service-3.jpg" alt="">
                    <h4 class="mb-0">SEO Optimization</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="">
                    <img class="img-fluid rounded mb-4" src="<?=base_url()?>/assets/img/service-4.jpg" alt="">
                    <h4 class="mb-0">Social Marketing</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="">
                    <img class="img-fluid rounded mb-4" src="<?=base_url()?>/assets/img/service-5.jpg" alt="">
                    <h4 class="mb-0">Email Marketing</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="">
                    <img class="img-fluid rounded mb-4" src="<?=base_url()?>/assets/img/service-6.jpg" alt="">
                    <h4 class="mb-0">PPC Advertising</h4>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Feature Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="h-100">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Why Choose Us</h6>
                    <h1 class="display-6 mb-4">Why People Trust Us? Learn About Us!</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Digital Marketing</p>
                                    <p class="mb-2">85%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">SEO & Backlinks</p>
                                    <p class="mb-2">90%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Design & Development</p>
                                    <p class="mb-2">95%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="img-border">
                    <img class="img-fluid" src="<?=base_url()?>/assets/img/feature.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

<!-- SKJstdio Start -->
<?= $this->include('Home/PageHomeSKJstdio') ?>
<!-- SKJstdio End -->

<!-- Project Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Our Projects</h6>
            <h1 class="display-6 mb-4">Learn More About Our Complete Projects</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="project-item border rounded h-100 p-4" data-dot="01">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="<?=base_url()?>/assets/img/project-1.jpg" alt="">
                    <a href="<?=base_url()?>/assets/img/project-1.jpg" data-lightbox="project"><i
                            class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="02">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="<?=base_url()?>/assets/img/project-2.jpg" alt="">
                    <a href="<?=base_url()?>/assets/img/project-2.jpg" data-lightbox="project"><i
                            class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="03">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="<?=base_url()?>/assets/img/project-3.jpg" alt="">
                    <a href="<?=base_url()?>/assets/img/project-2.jpg" data-lightbox="project"><i
                            class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="04">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="<?=base_url()?>/assets/img/project-4.jpg" alt="">
                    <a href="<?=base_url()?>/assets/img/project-4.jpg" data-lightbox="project"><i
                            class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="05">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="<?=base_url()?>/assets/img/project-5.jpg" alt="">
                    <a href="<?=base_url()?>/assets/img/project-5.jpg" data-lightbox="project"><i
                            class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="06">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="<?=base_url()?>/assets/img/project-6.jpg" alt="">
                    <a href="<?=base_url()?>/assets/img/project-6.jpg" data-lightbox="project"><i
                            class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="07">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="<?=base_url()?>/assets/img/project-7.jpg" alt="">
                    <a href="<?=base_url()?>/assets/img/project-7.jpg" data-lightbox="project"><i
                            class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="08">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="<?=base_url()?>/assets/img/project-8.jpg" alt="">
                    <a href="<?=base_url()?>/assets/img/project-8.jpg" data-lightbox="project"><i
                            class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="09">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="<?=base_url()?>/assets/img/project-9.jpg" alt="">
                    <a href="<?=base_url()?>/assets/img/project-9.jpg" data-lightbox="project"><i
                            class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="10">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="<?=base_url()?>/assets/img/project-10.jpg" alt="">
                    <a href="<?=base_url()?>/assets/img/project-10.jpg" data-lightbox="project"><i
                            class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
        </div>
    </div>
</div>
<!-- Project End -->

