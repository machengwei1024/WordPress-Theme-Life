<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/atom-one-dark.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/nprogress.min.css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.2.4.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.pjax.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/nprogress.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/tether.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/highlight.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/highlightjs-line-numbers.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.qrcode.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/Life.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="container">
	    <div class="row blog-box-shadow">
	        <!--博客主栏开始-->
	        <div class="col-xl-9 col-lg-12 blog-main" id="pjax-box">
	            <header class="blog-header">
	                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="blog-header-mobile-title"><?php bloginfo( 'name' ); ?></a>
	                <a href="javascript:;" class="blog-header-navbar-btn"><i class="fa fa-bars"></i></a>
	                <nav class="blog-header-navbar blog-header-fixed">
	                    <ul class="blog-navbar-links">
	                        <?php get_template_part( 'navigation' ); ?>
	                        <div class="blog-navbar-right">
	                            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	                                <div class="input-group">
	                                    <input type="text" name="s" value="<?php echo get_search_query(); ?>" class="blog-header-search" placeholder="search...">
	                                    <buttn type="submit" class="blog-header-search-btn"><i class="fa fa-search"></i></buttn>
	                                </div>
	                            </form>
	                        </div>
	                    </ul>
	                </nav>
	            </header>
