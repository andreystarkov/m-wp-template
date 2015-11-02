<nav class="cd-3d-nav-container">
    <ul class="cd-3d-nav">
        <li class="cd-selected"><a href="#1"></a</li>
        <li><a href="#2"></a></li>
        <li><a href="#3"></a></li>
        <li><a href="#4"></a></li>
        <li><a href="#5"></a></li>
    </ul>
    <span class="cd-marker color-1"></span>
</nav>
<section class="navigation top-navigation" id="top-navigation">
    <header>
        <div class="header-content">
            <div class="logo"><a href="#">
                <img src="<?=get_template_directory_uri();?>/dist/images/logo-small.png" />
            </a></div>
            <div class="btn-topnav-toggle navicon" id="btn-topnav">
                <a href="#0" class="cd-3d-nav-trigger">Menu<span></span></a>
            </div>
            <div class="header-nav">
                <nav>
                  <?php
                    wp_nav_menu(['menu' => 'primary_navigation', 'menu_class' => 'primary-nav']);
                  ?>
                </nav>
            </div>
            <div class="navicon">
                <a class="nav-toggle" href="#"><span></span></a>
            </div>
        </div>
    </header>
</section>
