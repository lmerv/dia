<section class="section">
  <h2 class="area--header" style="max-height: 200px;">
    Derniers Articles
  </h2>
  <div class="area--main">
    <ul class="media-list">
    <?php
        // on fait un loop pour la catégorie donnée
        $blog_loop = new WP_Query(
          array(
            // On limite au 3 post pubié
            'posts_per_page' => '3',
          )
        );

        while ( $blog_loop->have_posts() ) : $blog_loop->the_post();
        ?>

      <li class="media">

        <div class="media__body">
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_title('<h3 class="media__body--title">', '</h3>'); ?>
          </a>
          <?php the_content(); ?>
        </div>
        <div class="media__footer">
        <ul>
          <li>
            <svg class="icon " viewBox="0 0 15 15">
              <use xlink:href="#ic--calendar"></use>
            </svg>  
            <?php the_time('j/m/y',''); ?>
          </li>
          <li>
            <svg class="icon " viewBox="0 0 576 512">
              <use xlink:href="#ic--folder"></use>
            </svg>
            <?php the_category( ', ' ); ?>
          </li>
          <li>
            <svg class="icon " viewBox="0 0 15 15">
              <use xlink:href="#ic--tag"></use>
            </svg>
            <?php the_tags(' '); ?>
          </li>
        </ul>

        </div>
      </li>
      <?php endwhile; wp_reset_query(); ?>
    </ul>  
  </div>
  
  <aside class="section__aside">
  <?php if ( is_active_sidebar( 'blog-widget-area' ) ) : ?>
      <?php dynamic_sidebar( 'blog-widget-area' ); ?>
  <?php endif; ?>
 


  </aside>
</section>