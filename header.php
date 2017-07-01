<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
    <meta http-equiv="EXPIRES" content="0" />
    <title><?php wp_title( '-', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <style>
        :root {
            --primary-red: rgba(218,31,38);
            --secondary-gray: rgb(224,222,221);
        }
    </style>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="header__strip railed">
            <div class="header__strip-social">
                <div class="header__social-icon">
                    <a href="" class="fa fa-linkedin" aria-hidden="true"></a>
                </div>
                <div class="header__social-icon">
                    <a href="" class="fa fa-facebook" aria-hidden="true"></a>
                </div>
                <div class="header__social-icon">
                    <a href="" class="fa fa-twitter" aria-hidden="true"></a>
                </div>
            </div>
        </div>
        <div class="header__content railed">
            <a href="<?php echo get_home_url(); ?>" class="header__logo">VINALI STAFFING</a>
            <div class="header__menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <?php wp_nav_menu( array( 'menu' => 'nav-desktop', 'menu_class' => 'header__desktop-menu' ) ); ?>
        </div>
        <div class="header__drawer">
            <?php wp_nav_menu( array( 'menu' => 'navigation', 'menu_class' => 'header__drawer-menu' ) ); ?>
        </div>
    </header>