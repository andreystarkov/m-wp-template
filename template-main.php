<?php
/**
* Template Name: Портал (Главная)
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

    $img = get_template_directory_uri()+"/dist/images/photos/";

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
                            <a href="#"><span class="pulse-eye ln-icon-arrow-right"></span><i>Подробнее</i></a>
                        </div>
                    </div>
                </div>
                <img src="<? thePath(); ?>/dist/images/photos/<? the_field("background-image"); ?>-large.jpg" alt="<? the_title(); ?>" class="background-image">
            </li>
            <?
            $sliderNav .= "<li id='nav-".get_field('the-id')."'><a href='#0'><div class='svg-container' id='icon-".get_field('the-id')."'><svg><use xlink:href='#svg-".get_field('the-id')."'></use></svg></div></a></li>";
            $slideClass = "";
            endwhile;
            wp_reset_query();
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
        <img src="<? thePath(); ?>dist/images/photos/<? the_field('banner-image'); ?>-xlarge.jpg" class="background-image img-parallax"
         data-parallax='{<? the_field("banner-image-parallax"); ?>}' />
    </section>

    <section id="news-feed" class="blog text-center section-padding section-light">
        <div class="container-fluid container-news" id="news-trigger">
            <div class="row section-header">
                <div class="col-md-12">
                    <div class="sign"><i data-wow-duration="0.6s" data-wow-delay="0.2s" class="wow bounceInUp svg-box svg-ico icon-title"><? includeSVG("line/news.svg"); ?></i></div>
                    <h3>Новости и события компании</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <article class="blog-post">
                        <figure>
                            <a href="img/blog-img-01.jpg" class="single_image">
                                <div class="blog-img-wrap">
                                    <div class="overlay">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    <img src="/wp-content/themes/m-restorator/dist/images/photos/grill/etc/1-xsmall.jpg" class="single_image" />
                                </div>
                            </a>
                            <figcaption>
                            <h2><a href="#" class="blog-category" data-toggle="tooltip" data-placement="top" data-original-title="See more posts">Виды прожарки и другие истории</a></h2>
                            <p><a href="#" class="blog-post-title">Сегодня, у многих успешно развивающихся компаний при проведении презентаций. А приехать готовить еду чужим людям сложнее вдвойне. <i class="fa fa-angle-right"></i></a></p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <figure>
                            <a href="img/blog-img-02.jpg" class="single_image">
                                <div class="blog-img-wrap">
                                    <div class="overlay">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    <img src="/wp-content/themes/m-restorator/dist/images/photos/grill/etc/2-xsmall.jpg" class="single_image" />
                                </div>
                            </a>
                            <figcaption>
                            <h2><a href="#" class="blog-category" data-toggle="tooltip" data-placement="top" data-original-title="See more posts">"Истории одного ресторана или двух"</a></h2>
                            <p><a href="#" class="blog-post-title">Горячие пшеничные булочки в плетеной корзиночке, которые можно
                            обмакнуть в пикантный соус из оливкового масла и бальзамического уксуса, Переехать в другую страну сложно.
                            <i class="fa fa-angle-right"></i></a></p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <figure>
                            <a href="img/blog-img-03.jpg" class="single_image">
                                <div class="blog-img-wrap">
                                    <div class="overlay">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    <img src="/wp-content/themes/m-restorator/dist/images/photos/grill/etc/3-xsmall.jpg" class="single_image" />
                                </div>
                            </a>
                            <figcaption>
                            <h2><a href="#" class="blog-category" data-toggle="tooltip" data-placement="top" data-original-title="See more posts">Итальянская пицца</a></h2>
                            <p><a href="#" class="blog-post-title">В «М-Рестораторе» вы можете заказать настоящую итальянскую пиццу которые можно
                            обмакнуть в пикантный соус из оливкового масла и бальзамического уксуса<i class="fa fa-angle-right"></i></a></p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <article class="blog-post">
                        <figure>
                            <a href="img/blog-img-01.jpg" class="single_image">
                                <div class="blog-img-wrap">
                                    <div class="overlay">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    <img src="/wp-content/themes/m-restorator/dist/images/photos/fish/food/1-xsmall.jpg" class="single_image" />
                                </div>
                            </a>
                            <figcaption>
                            <h2><a href="#" class="blog-category" data-toggle="tooltip" data-placement="top" data-original-title="See more posts">Виды прожарки и другие истории</a></h2>
                            <p><a href="#" class="blog-post-title">Сегодня, у многих успешно развивающихся компаний при проведении презентаций. А приехать готовить еду чужим людям сложнее вдвойне. <i class="fa fa-angle-right"></i></a></p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <figure>
                            <a href="img/blog-img-02.jpg" class="single_image">
                                <div class="blog-img-wrap">
                                    <div class="overlay">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    <img src="/wp-content/themes/m-restorator/dist/images/photos/grill/details/3-xsmall.jpg" class="single_image" />
                                </div>
                            </a>
                            <figcaption>
                            <h2><a href="#" class="blog-category" data-toggle="tooltip" data-placement="top" data-original-title="See more posts">"Истории одного ресторана или двух"</a></h2>
                            <p><a href="#" class="blog-post-title">Горячие пшеничные булочки в плетеной корзиночке, которые можно
                            обмакнуть в пикантный соус из оливкового масла и бальзамического уксуса, Переехать в другую страну сложно.
                            <i class="fa fa-angle-right"></i></a></p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <figure>
                            <a href="img/blog-img-03.jpg" class="single_image">
                                <div class="blog-img-wrap">
                                    <div class="overlay">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    <img src="/wp-content/themes/m-restorator/dist/images/photos/grill/etc/4-xsmall.jpg" class="single_image" />
                                </div>
                            </a>
                            <figcaption>
                            <h2><a href="#" class="blog-category" data-toggle="tooltip" data-placement="top" data-original-title="See more posts">Итальянская пицца</a></h2>
                            <p><a href="#" class="blog-post-title">В «М-Рестораторе» вы можете заказать настоящую итальянскую пиццу которые можно
                            обмакнуть в пикантный соус из оливкового масла и бальзамического уксуса<i class="fa fa-angle-right"></i></a></p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <button class="btn btn-ghost btn-accent btn-small btn-more disabled"><span class="icon-clock"></span> Архив</button>
                </div>
                <div class="col-md-4 text-center">
                <button id="btn-more-news" class="btn btn-ghost btn-accent btn-small btn-more"><span class="ln-icon-plus"></span> Загрузить ещё</button>
                </div>
                <div class="col-md-4">
                <button class="btn btn-ghost btn-accent btn-small btn-more disabled"><span class="icon-newspaper"></span> Журнал</button>
                </div>
            </div>
       </div>
    </section>


    <section class="section-background section-info-light section-padding section-info" id="instagram-header">
        <div class="container">
            <div class="col-md-6 text-center">
                <h2>Мы в социальных сетях</h2>
                <p>Будте в курсе новостей ресторана в режиме онлайн. Ниже наша инстаграмм-лента, самые свежие события из первых рук.</p>
                <div class="text-center">
                    <a href="#" class="social-button">
                        <span class="fa fa-facebook tip" title="Группа в фейсбуке"></span>
                    </a>
                    <a href="#" class="social-button">
                        <span class="fa fa-vk tip" title="Сообщество вконтакте"></span>
                    </a>
                    <a href="#" class="social-button">
                        <span class="fa fa-instagram tip" title="Инстаграм"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="logo-placeholder svg-drawing floating-logo logo-background">
                    <? includeSVG("line/camera.svg"); ?>
                 <div class="down-arrow floating-arrow"><a href="#recent"><span class="fa fa-angle-down"></span></a></div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </section>

    <section class="section-padding instagram-feed section-gray" id="instagram-recent" style="padding-bottom:120px">
        <div class="row" style="text-align:center">
          <div class="col-xs-12">
            <div id="recent" class="well well-sm"></div>
          </div>
        </div>
    </section>


    <section class="section-padding-bottom section-light sign-up section-form">
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

   <section class="testimonial-slider section-padding text-center" id="slider-partners">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <div class="avatar"><img src="/wp-content/themes/m-restorator/dist/images/partners/fro.jpg"></div>
                                <h2>Федерация Рестораторов и Отельеров (ФРиО)</h2>
                                <p class="author">Барменская Ассоциация Екатеринбурга (БАЕ) была организована в 2002г. БАЕ является официальным представителем Российской Ассоциации Барменов (БАР) и единственной в
                                городе организацией, объединяющей барменов и официантов, зарегистрированной на международном уровне.</p>
                            </li>
                            <li>
                                <div class="avatar"><img src="/wp-content/themes/m-restorator/dist/images/partners/dae.jpg"></div>
                                <h2>Барменская Ассоциация Екатеринбурга</h2>
                                <p class="author">Шеф-повар гастрономического кафе «Четверг» мог бы легко обыграть любую итальянку в познаниях рецептур</p>
                            </li>
                            <li>
                                <div class="avatar"><img src="/wp-content/themes/m-restorator/dist/images/partners/1.jpg"></div>
                                <h2>Центр коммуникативных технологий Дегтярева</h2>
                                <p class="author">«Центр коммуникативных технологий Дегтярева» основан в 2000 году. Основные тренинги и мастер-классы: Навыки эффективных бизнес-коммуникаций. Искусство убеждения. Технологии эффективных переговоров. Техника профессиональных продаж</p>
                            </li>
                            <li>
                                <div class="avatar"><img src="/wp-content/themes/m-restorator/dist/images/partners/metro.jpg"></div>
                                <h2>МЕТРО Кэш энд Керри</h2>
                                <p class="author">«Центр коммуникативных технологий Дегтярева» основан в 2000 году. Основные тренинги и мастер-классы: Навыки эффективных бизнес-коммуникаций. Искусство убеждения. Технологии эффективных переговоров. Техника профессиональных продаж</p>
                            </li>
                            <li>
                                <div class="avatar"><img src="/wp-content/themes/m-restorator/dist/images/partners/2.jpg"></div>
                                <h2>Группа компаний «Бирюзовый чай»</h2>
                                <p class="author">разработка концепций, решений и полное чайное обеспечение ресторанного бизнеса; организация чаепитий и дегустаций; создание гастрономических композиций на основе чая; создание коллекций чая и чайной посуды; обучение персонала.
                                Интернет-магазин: www.teaexpress.ru</p>
                            </li>
                            <li>
                                <div class="avatar"><img src="/wp-content/themes/m-restorator/dist/images/partners/1.jpg"></div>
                                <h2>«Центр коммуникативных технологий Дегтярева»</h2>
                                <p class="author">«Центр коммуникативных технологий Дегтярева» основан в 2000 году. Основные тренинги и мастер-классы: Навыки эффективных бизнес-коммуникаций. Искусство убеждения. Технологии эффективных переговоров. Техника профессиональных продаж</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>