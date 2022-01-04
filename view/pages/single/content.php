<section class="section">
  
<?php if(have_posts()); ?>
<?php while (have_posts()) : the_post(); ?>

  <h1 class="area--header" style="max-height: 200px;">
    <?php the_title(); ?>    
  </h1>

  <article class="area--main single">
      <?php the_content(); ?>
  </article>
  
  <?php endwhile; wp_reset_query();?>
  
  <aside class="section__aside">

    <?php the_breadcrumb(); ?>

    <?php if ( is_active_sidebar( 'blog-widget-area' ) ) : ?>
    <?php dynamic_sidebar( 'blog-widget-area' ); ?>
    <?php endif; ?>

  </aside>
</section>


