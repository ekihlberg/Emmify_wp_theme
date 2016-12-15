<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700" rel="stylesheet">

  <?php wp_head(); ?>
  <title><?php bloginfo('description'); ?></title>
</head>
<body <?php body_class(); ?>>
<div id="load_screen"><div id="loading"></div></div>
<header class="top-image">
  <!-- <div class="top-menu"> -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php bloginfo('stylesheet_directory'); ?>/img/logo-sym-black.png" alt="Logotype"></a>
    <div class="navTrigger">
      <i></i>
      <i></i>
      <i></i>
    </div>
    <nav class="main-menu">
        <?php
        wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => 'nav',
        'container_class' => 'top-menu-slide',
        'fallback_cb'=> true,
        ));
         ?>
    </nav>
  <!-- </div> -->


</header>
