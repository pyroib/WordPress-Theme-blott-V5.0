<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
    <head>

        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="keywords" content="metaKeywords" />
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <link href="http://www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery.DEPreLoad.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery-ui.js"></script>


        <?php wp_head(); ?>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/style.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/smoke.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/circles.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/preloader.css" />


        <script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>

    </head>

    <body  <?php body_class(); ?>>

    <header id="page-header">
        <h1><a class="text-white" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
    </header>
