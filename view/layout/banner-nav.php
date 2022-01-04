<?php
/**
 * The banner frontpage for our theme.
 * @package Ananke
 */
?>
<?php if( is_front_page() ) { ?>
<?php
      $header_loop = new WP_Query(
      array(
          'category_name'   => 'ananke-banner__frontpage',
          'posts_per_page'  => '1',

      )
      );
      while ( $header_loop->have_posts() ) : $header_loop->the_post();
  ?>
  <header>
      <?php the_content(); ?>
  </header>
<?php endwhile; wp_reset_query(); ?>
<?php } else { ?>
  <?php
      $header_loop = new WP_Query(
      array(
          'category_name'   => 'ananke-banner__default',
          'posts_per_page'  => '1',

      )
      );
      while ( $header_loop->have_posts() ) : $header_loop->the_post();
  ?>
  <header>
      <?php the_content(); ?>
  </header>
<?php endwhile; wp_reset_query(); ?>
<?php } ?>

<!-- Hero -->
<div class="hero" data-theme="dark">
      <nav class="container-fluid">
        <ul>
          <li><a href="./" class="contrast" onclick="event.preventDefault()"><strong><?php bloginfo('name') ?></strong></a></li>
        </ul>
        <?php
          wp_nav_menu( array(
            'theme_location' => 'menu-default',
            'menu_id'        => 'main-nav',
            'menu_class'     => 'menu',
            'container'      => 'ul',
            'depth'          => 0,
            'walker'         => new Ananke_Walker(),
          ) );
        ?>
      </nav>
      <header class="container">
        <hgroup>
          <h1>Company</h1>
          <h2>A classic company or blog layout with a sidebar</h2>
        </hgroup>
        <p><a href="#" role="button" onclick="event.preventDefault()">Call to action</a></p>
      </header>
    </div><!-- ./ Hero -->