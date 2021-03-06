<?php
/**
* Template Name: Ресторан
*/
?>
<?
$restId = get_field('the-id');
$gallery = get_field('rest-gallery');
$isVideo = get_field('is-video');
$intBg = get_field('int-background-image');

function getPicRand($name){
    echo getPath()."/dist/images/photos/".$name."/rooms/".rand(1,3)."-full.jpg";
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

function galleryBuild($resName, $items){
    $galleryItems = explode(" ", $items);
    foreach ($galleryItems as &$value) {
        ?><a href="<?=get_template_directory_uri()?>/dist/images/photos/<?=$resName?>/<?=$value?>-full.jpg" class="thumb col-xs-6 col-sm-4 col-md-3 col-lg-3">
        <img src="<?=get_template_directory_uri()?>/dist/images/photos/<?=$resName?>/<?=$value?>-xsmall.jpg"></a><?
    }
}

?>
<section class="cd-hero rest-header" id="page-slider">
    <ul class="cd-hero-slider">
        <li class="cd-bg-video autoplay first-slide selected">
            <div class="overlay"></div>
            <div class="slider-content slider-content-full">
                <div class="caption caption-left">
                    <div class="svg-logo logo-<?theId();?>">
                        <? includeSVG(get_field('the-id').".svg"); ?>
                    </div>
                    <div class="about-icons">
                        <div class="about-item">
                            <i class="icon-clock"></i><span><? the_field('work-time'); ?></span>
                            <div class="subscribe"><? the_field('work-days'); ?></div>
                        </div>
                        <div class="about-item">
                            <i class="ln-icon-call-in"></i><span><? the_field('phone-number'); ?></span>
                            <div class="subscribe">заказ столов</div>
                        </div>
                    </div>
                    <div class="btn-go" style="margin:70px auto">
                        <a href="#intro-content"><span class="down-arrow floating-arrow fa fa-angle-down"></span></a>
                    </div>
                </div>
            </div>


            <div class="overlay"></div>

            <?
            $topBg = get_field('top-image');
            if( empty($topBg) ){
                ?><div class="cd-bg-video-wrapper" data-video="/wp-content/themes/m-restorator/dist/video/<? the_field('the-id'); ?>"><?
            } else { ?>
                <img src="<? thePath(); ?>dist/images/photos/<?echo $restId; ?>/<? the_field('top-image'); ?>-full.jpg" class="background-image img-parallax" 
                data-parallax='{ "y" : 100, "scale": 1.4,  "from-scroll": 90, "distance": 0}' data-parallax='{ "from-scroll": 10, "x": -400, "y" : 50, "rotateY": 55, "scale": 1.57}' />
            <? } ?>
            </div>
        </li>
    </ul>
</section>

<section class="section-padding section-gray section-content" style="padding: 100px 0" id="section-content">
    <div class="container">
        <h2><? the_title(); ?></h2>
        <p><? the_field('the-about'); ?></p>
    </div>
</section>

<? if ( !empty($gallery) ){ ?>

    <section class="section-background section-padding background-parallax" id="menu-list-header">
        <div class="container">
            <div class="col-md-6 text-center">
                <h2><? the_field('int-title'); ?></h2>
                <p><? the_field('int-description'); ?>
                </div>
                <div class="col-md-6 text-center">
                    <div class="logo-placeholder svg-drawing floating-logo logo-background">
                        <? includeSVG("line/camera.svg"); ?>
                        <div class="down-arrow floating-arrow"><a href="#recent"><span class="fa fa-angle-down"></span></a></div>
                    </div>
                </div>
            </div>
        <? if ( !empty($intBg) ) { ?>
        <div class="overlay"></div>
        <img src="<? thePath(); ?>dist/images/photos/<?=$restId?>/<?=$intBg?>-full.jpg" class="background-image img-parallax" 
        data-parallax='{ "y" : -200, "smoothness":40 }' data-parallax2='{ "scale": 1.1, from-scroll": 150,  "x":150 }'  />
        <? } ?>
    </section>

    <section class="section-pictures">
        <div class="row" id="gallery">
            <? galleryBuild($restId, $gallery); ?>
        </div>
    </section>

<? } // gallery end ?>

<?  // menu section start

    $args = array( 'category_name' => $restId, 'post_type' => 'menu_db', 'posts_per_page' => 10 );
    $loop = new WP_Query( $args );
    $i = 0;

    if( !empty($loop) ) {
?>
<section id="menu-list" class="blog section-menu text-center section-light">
    <div class="container container-menu target-box">
        <div class="row section-header">
            <div class="col-md-12">
                <div class="sign"><i class="svg-box svg-ico icon-title"><? includeSVG("line/menu.svg"); ?></i></div>
                <h3><? the_field('menu-title'); ?></h3>
                <p><? the_field('menu-description'); ?></p>
            </div>
        </div>
        <?php
        while ( $loop->have_posts() ) : $loop->the_post();

        if ( $i == 3 ) { $i = 0; echo "</div>"; }
        if ( $i == 0 ) echo "<div class='row'>";

        $menuImage = get_field('menu-image');
        $menuPrice = get_field('menu-price');
        $menuWeight = get_field('menu-weight');

        if ( !empty( $menuImage ) ){
            $menuClass = "with-image";
        } else $menuClass = "without-image";

        ?>
        <div class="col-md-4">
            <article class="menu-post">
                <figure>
                    <figcaption>
                    <div class="menu-link <?=$menuClass?>">
                        <div class="img-wrap">
                            <img src="<?=$menuImage?>" />
                        </div>
                        <div class="caption">
                            <? if( !empty($menuPrice) ) { ?>
                            <span class="price"><?=$menuPrice?> р.</span>
                            <? } ?>
                            <? if( !empty($menuWeight) ) { ?>
                            <span class="weight"><?=$menuWeight?> г.</span>
                            <? } ?>
                            <b class="name"><? the_title(); ?></b>
                            <i class="about"><? the_field('menu-description'); ?></i>
                        </div>
                    </div>
                    </figcaption>
                </figure>
            </article>
        </div>
        <?
        $i++;
        endwhile;
        ?>
    </div>
<!--
    <div class="container-footer container text-center">
        <button id="btn-more-menu" class="btn btn-ghost btn-accent btn-small btn-more"><span class="ln-icon-refresh"></span> Загрузить ещё</button>
    </div> -->
</section>

<?  } // menu section end ?>

<section class="section-background section-padding section-about background-parallax" id="box-about">
    <div class="container">
        <div class="col-md-6 text-center">
            <h2>Как нас найти?</h2>
            <div class="about-icons">
                <div class="about-item">
                    <i class="icon-clock"></i><span>с 11:00 до 2:00</span>
                    <div class="subscribe">ежедневно</div>
                </div>
                <div class="about-item">
                    <i class="ln-icon-call-in"></i><span>40-92-42</span>
                    <div class="subscribe">заказ столов</div>
                </div>
            </div>
            <p><?echo the_field('where-text'); ?></p>
        </div>
        <div class="col-md-6 text-center">
            <div class="logo-placeholder-big floating-logo logo-background">
                <svg id="icon-fishwine" class="icon-fish" viewBox="0 0 400 400">
                    <use xlink:href="#svg-fishwine" />
                </svg>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
    <img src="<? thePath(); ?>/dist/images/photos/<?=$restId?>/outside/1-full.jpg" class="background-image img-parallax" data-parallax='{ "y" : -300,  "smoothness": 30 }' />
 </section>

<section class="section-padding section-map background-map">
    <div class="about-map">
        <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=zEbUx5lnALmDbwCGjJv9n68_L6q3c9X3&width=100%&height=100%&lang=ru_RU&sourceType=constructor"></script>
    </div>
</section>

<section class="section-padding-bottom section-light sign-up section-form shadow-top">
    <div class="container">
        <div class="row section-header">
            <div class="col-md-12">
                <div class="sign"><i  data-wow-duration="0.6s" data-wow-delay="0.2s" class="wow bounceInUp svg-box svg-ico icon-title"><? includeSVG("line/mail.svg"); ?></i></div>
                <h3>Помогите улучшить наш сервис</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12 leftcol description">
                <h5>Что вы хотели бы изменить?</h5>
                <p>У каждого из посетителей нашей сети есть свои любимые блюда и свои причины, по которым они ходят к нам, поэтому важно, чтобы в каждом из ресторанов и кафе сети, подаваемые блюда были одинакового, отличного качества.</p>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12 rightcol">
                <form class="form-horizontal form-query">
                    <div class="form-group">
                        <label for="inputName" class="col-lg-2 control-label"><span class="icon-user"></span></label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="name" placeholder="Как к вам обращаться?">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><span class="icon-envelope-letter"></span></label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Как связаться с вами?">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label"><span class="icon-speech"></span></label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="textArea"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Очистить</button>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>