<?php
/**
* Template Name: Главная
*/
?>
<?
    $restId = get_field('the-id');
    function getPicRand($name){
        echo getPath()."/assets/images/photos/".$name."/rooms/".rand(1,3)."-xlarge.jpg";
    }
    function theId(){
        echo get_field('the-id');
    }

    function buildGallery($resName,$typeFolder){
        $all = implode(scandir(get_template_directory()."/dist/images/photos/".$resName."/".$typeFolder,1));
        $count = substr_count($all, 'tiny');
        for($a=1;$a <= $count;$a++){
            ?><a href="<?=get_template_directory_uri()?>/dist/images/photos/<?=$resName?>/<?=$typeFolder?>/<?=$a?>-full.jpg" class="thumb col-xs-6 col-sm-4 col-md-3 col-lg-3">
            <img src="<?=get_template_directory_uri()?>/dist/images/photos/<?=$resName?>/<?=$typeFolder?>/<?=$a?>-xsmall.jpg"></a>
            <?
        }
    }

?>
   <section class="cd-hero" id="top-slider">
        <ul class="cd-hero-slider">
            <?php
            $args = array( 'category_name' => $restId, 'post_type' => 'main_slider', 'posts_per_page' => 10 );
            $first = "yes";
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
            if($first == "yes"){ $slideClass = " first-slide selected"; $first = "no"; }
            ?>
            <li class="cd-bg-video<?=$slideClass?>">
                <div class="overlay"></div>
                <div class="slider-content slider-content-full">
                    <div class="caption caption-left">
                        <div class="svg-logo logo-grill">
                        <? includeSVG(get_field('svg-logo')); ?>
                            <div class="description">
                                <p><? the_field('the-about'); ?></p>
                            </div>
                        </div>
                        <div class="about-icons">
                            <div class="about-item">
                                <i class="icon-clock"></i><span><? the_field('work-time'); ?></span>
                                <div class="subscribe"><? the_field('work-days'); ?></div>
                            </div>
                            <div class="about-item">
                                <i class="icon-call-in"></i><span><? the_field('phone-number'); ?></span>
                                <div class="subscribe">заказ столов</div>
                            </div>
                        </div>
                        <div class="btn-go">
                            <a href="#"><span class="pulse-eye icon-arrow-right"></span><i>Подробнее</i></a>
                        </div>
                    </div>
                </div>
                <img src="<? thePath(); ?>/dist/images/photos/<? the_field("background-image"); ?>-large.jpg" alt="<? the_title(); ?>" class="background-image">
            </li>
            <?
            $sliderNav .= "<li id='nav-".get_field('the-id')."'><a href='#0'><div class='svg-container' id='icon-".get_field('the-id')."'><svg><use xlink:href='#svg-".get_field('the-id')."'></use></svg></div></a></li>";
            $slideClass = "";
            endwhile;
            ?>
        </ul>
        <div class="cd-slider-nav">
            <nav>
                <span class="cd-marker item-1"></span>
                <ul class="sub-list">
                    <? echo $sliderNav; ?>
                </ul>
            </nav>
        </div>
    </section>

    <section class="intro section-padding section-gray" id="get-started">
        <div class="container">
            <div class="row">
                <div data-wow-duration="0.7s" data-wow-delay="0.4s" class="wow slideInLeft col-md-4 intro-feature">
                    <div class="intro-icon">
                        <span class="svg-box"><? includeSVG(get_field('feature-1-icon')); ?></span>
                    </div>
                    <div class="intro-content">
                        <h5><? the_field('feature-1-header'); ?></h5>
                        <p><? the_field('feature-1'); ?></p>
                    </div>
                </div>
                <div data-wow-duration="0.7s" data-wow-delay="0.4s" class="wow slideInLeft col-md-4 intro-feature">
                    <div class="intro-icon">
                        <span class="svg-box"><? includeSVG(get_field('feature-2-icon')); ?></span>
                    </div>
                    <div class="intro-content">
                        <h5><? the_field('feature-2-header'); ?></h5>
                        <p><? the_field('feature-2'); ?></p>
                    </div>
                </div>
                <div data-wow-duration="0.7s" data-wow-delay="0.4s" class="wow slideInLeft col-md-4 intro-feature">
                    <div class="intro-icon">
                        <span class="svg-box"><? includeSVG(get_field('feature-3-icon')); ?></span>
                    </div>
                    <div class="intro-content">
                        <h5><? the_field('feature-3-header'); ?></h5>
                        <p><? the_field('feature-3'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-background section-padding background-parallax">
        <div class="container">
            <div class="col-md-6 text-center">
                <h2><? the_field('banner-header'); ?></h2>
                <p><? the_field('banner-text'); ?></p>
            </div>
            <div class="col-md-6 text-center">
                <div class="logo-placeholder-big floating-logo logo-background">
                    <? the_field('banner-icon'); ?>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
        <img src="<? thePath(); ?>/dist/images/photos/<? the_field('banner-image'); ?>-large.jpg" class="background-image img-parallax"
         data-parallax='{<? the_field("banner-image-parallax"); ?>}' />
    </section>