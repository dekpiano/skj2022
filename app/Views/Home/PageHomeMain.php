<style>
@media screen and (max-width: 453px) {
    .AdmissionFooter a {
        font-size: 1rem;
    padding: 10px;
    margin-top: -21px;
    margin-bottom: 20px;
    }
}
@media screen and (min-width: 768px) {
    .AdmissionFooter a {
        font-size: 2rem;
    padding: 10px;
    margin-top: -30px;
    margin-bottom: 30px;
    }
}

.overlay-bottom::after {
    bottom: 0;
    background: url(uploads/background/overlay-bottom.png) bottom center no-repeat;
    background-size: contain;
}
.overlay-bottom::after, .overlay-top::before {
    position: absolute;
    content: "";
    width: 100%;
    height: 85px;
    left: 0;
    z-index: 1;
}

</style>

<!-- <img class="img-fluid" src="<?=base_url('uploads/banner/backtoschool.png')?>" alt="" srcset=""> -->

<!-- Carousel Start -->
<?= $this->include('Home/PageHomeCarousel') ?>
<!-- Carousel End -->
 <!-- Facts Start -->
<?= $this->include('Home/PageHomeCounter')?>
<!-- Facts End -->
 
<!-- Facts Start -->
<?= $this->include('Home/PageHomeRecommend')?>
<!-- Facts End -->



<!-- NewsReward Start -->
<?= $this->include('Home/PageHomeNewsReward') ?>
<!-- NewsReward End -->





<!-- PageHomeDirector Start -->
<?= $this->include('Home/PageHomeRobot') ?>
<!-- PageHomeDirector End -->


<!-- PageHomeDirector Start -->
<!-- $this->include('Home/PageHomeDirector')  -->
<!-- PageHomeDirector End -->



<!-- News Start -->
<?= $this->include('Home/PageHomeNews') ?>
<!-- News End -->

<!-- Slogan Start -->
<?= $this->include('Home/PageHomeSlogan') ?>
<!-- Slogan End -->


<!-- Excellence Start -->
<!-- $this->include('Home/PageHomeExcellence') -->
<!-- Excellence End -->


<!-- SKJstdio Start -->
<?= $this->include('Home/PageHomeSKJstdio') ?>
<!-- SKJstdio End -->