<!doctype html>
<html lang="fr">
  <head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
      <?php if( is_front_page() ) { ?>
      <?php bloginfo('name'); ?>
      <?php } else { ?>
      <?php the_title(); ?> | <?php bloginfo('name'); ?>
      <?php  }  ?>
    </title>

    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="<?php bloginfo('name'); ?>">

    <meta property="og:site_name"          content="<?php bloginfo('name'); ?>" />
    <meta property="og:locale"             content="fr_FR" />
    <?php if( is_front_page() ) { ?>
    <meta property="og:title"              content="<?php bloginfo('name'); ?>" />
    <?php } else { ?>
    <meta property="og:title"              content="<?php the_title(); ?>" />
    <?php  }  ?>
    <meta property="og:type"               content="article" />
    <?php if( is_front_page() ) { ?>
    <meta property="og:url"                content="<?php bloginfo('url'); ?>" />
    <?php } else { ?>
    <meta property="og:url"                content="<?php the_permalink(); ?>" />
    <?php  }  ?>
    <?php if ( ! has_excerpt() ) { ?>
    <meta property="og:description"        content="<?php bloginfo('description'); ?>" />
    <?php } else if ( is_front_page() ){ ?>
    <meta property="og:description"        content="<?php bloginfo('description'); ?>" />
    <?php } else { ?>
    <meta property="og:description"        content="<?php the_excerpt(); ?>" />
    <?php } ?>
    <?php if ( ! has_post_thumbnail() ) {?>
    <meta property="og:image"              content="<?php bloginfo('template_url'); ?>/img/logo_512x512.png" />
    <?php } else { ?>
    <meta property="og:image"              content=" <?php the_post_thumbnail_url(); ?> " />
    <?php } ?>

    <link rel="manifest" href="manifest.json">

    <meta name="theme-color" content="#f2f2f2">

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>  >
  <?php get_template_part( 'view/layout/banner-nav' ); ?>

