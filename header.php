<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <div class="bg-wrap">
            <span class="bg-icon icon-home_abstract_1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span></span>
            <span class="bg-icon icon-home_abstract_2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span></span>
            <span class="bg-icon icon-home_abstract_3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span></span>
            <span class="bg-icon icon-home_abstract_4"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span></span>
            <span class="bg-icon icon-home_abstract_5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span></span>
            <div class="double-bg"></div>
        </div>

        <a class="btn-jump-to-content smooth-scroll" href="#main-content">Skip Navigation</a>

        <?php
            if ( has_custom_logo() ) {
                $custom_logo = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full' );
                $logo_url = $custom_logo[0];
            } else {
                $logo_url = get_bloginfo('template_url') . '/img/logo@2x.png';
            }
        ?>

        <header id="header-main" class="header">
            <div class="container">
                <div class="top-box">
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>" title="<?= esc_attr(strip_tags(get_bloginfo('name'))); ?>">
                            <img src="<?php echo $logo_url; ?>" alt="<?= esc_attr(get_bloginfo('name')); ?>">
                        </a>
                    </div>
                    <div class="right-box">
                        <form action="" class="subscribe-form">
                            <ul class="form-list">
                                <li>
                                    <input type="email" class="input-style" placeholder="Join our mailing list">
                                </li>
                                <li>
                                    <input type="submit" class="btn" value="Join">
                                </li>
                            </ul>
                        </form>
                        <div class="social-box">
                            <ul class="social-list">
                                <li>
                                    <a href="https://twitter.com/preventconnect" target="_blank" rel="nofollow" title="Twitter"><span class="icon icon-twitter"></span></a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/PreventConnect" target="_blank" rel="nofollow" title="Facebook"><span class="icon icon-facebook"></span></a>
                                </li>
                            </ul>
                        </div>
                        <form role="search" method="get" class="search-form" action="">
                            <label>
                                <span class="screen-reader-text">Search</span>
                                <input type="search" class="search-field" placeholder="Search" value="" name="s">
                            </label>
                            <input type="submit" class="search-submit" value="Search">
                        </form>
                    </div>
                </div>
                <div class="bottom-box">
                    <nav class="main-nav desktop">
                        <ul>
                            <li class="current-menu-item"><a href="#">About us</a></li>
                            <li><a href="#">Web Conferences</a></li>
                            <li><a href="#">Podcasts</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Resources</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="#">Wiki</a></li>
                                    <li class="menu-item"><a href="#">Newsletters</a></li>
                                    <li class="menu-item"><a href="#">eLearning</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <?php /* wp_nav_menu(array(
                        'theme_location'  => 'main-menu',
                        'menu'            => 'Main Navigation',
                        'container'       => 'nav',
                        'container_class' => 'main-nav desktop',
                        'container_id'    => false,
                        'items_wrap'      => '<ul>%3$s</ul>',
                        'depth'           => 2
                    )); */ ?>
                </div>

                <div class="mobile-menu-toggle">
                    <span></span>
                </div>
                <div class="mobile-menu-wrap">
                    <div class="mobile-menu-box">
                        <ul class="mobile-menu">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Web Conferences</a></li>
                            <li><a href="#">Podcasts</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Resources</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="#">Wiki</a></li>
                                    <li class="menu-item"><a href="#">Newsletters</a></li>
                                    <li class="menu-item"><a href="#">eLearning</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="mobile-menu-overlay"></div>
                </div>
            </div>
        </header>

        <header id="header-scrolling" class="header">
            <div class="container">
                <div class="top-box">
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>" title="<?= esc_attr(strip_tags(get_bloginfo('name'))); ?>">
                            <img src="<?php echo $logo_url; ?>" alt="<?= esc_attr(get_bloginfo('name')); ?>">
                        </a>
                    </div>
                    <div class="right-box">
                        <form action="" class="subscribe-form">
                            <ul class="form-list">
                                <li>
                                    <input type="email" class="input-style" placeholder="Join our mailing list">
                                </li>
                                <li>
                                    <input type="submit" class="btn" value="Join">
                                </li>
                            </ul>
                        </form>
                        <div class="social-box">
                            <ul class="social-list">
                                <li>
                                    <a href="https://twitter.com/preventconnect" target="_blank" rel="nofollow" title="Twitter"><span class="icon icon-twitter"></span></a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/PreventConnect" target="_blank" rel="nofollow" title="Facebook"><span class="icon icon-facebook"></span></a>
                                </li>
                            </ul>
                        </div>
                        <form role="search" method="get" class="search-form" action="">
                            <label>
                                <span class="screen-reader-text">Search</span>
                                <input type="search" class="search-field" placeholder="Search" value="" name="s">
                            </label>
                            <input type="submit" class="search-submit" value="Search">
                        </form>
                    </div>
                </div>
                <div class="bottom-box">
                    <nav class="main-nav desktop">
                        <ul>
                            <li class="current-menu-item"><a href="#">About us</a></li>
                            <li><a href="#">Web Conferences</a></li>
                            <li><a href="#">Podcasts</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Resources</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="#">Wiki</a></li>
                                    <li class="menu-item"><a href="#">Newsletters</a></li>
                                    <li class="menu-item"><a href="#">eLearning</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="mobile-menu-toggle">
                    <span></span>
                </div>
                <div class="mobile-menu-wrap">
                    <div class="mobile-menu-box">
                        <ul class="mobile-menu">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Web Conferences</a></li>
                            <li><a href="#">Podcasts</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Resources</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="#">Wiki</a></li>
                                    <li class="menu-item"><a href="#">Newsletters</a></li>
                                    <li class="menu-item"><a href="#">eLearning</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="mobile-menu-overlay"></div>
                </div>
            </div>
        </header>

        <main id="main-content">