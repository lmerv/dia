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
          
          <?php         
            if ( has_post_format('image') ) {?>

            <div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-top" style="grid-template-columns:33% auto">
              <figure class="wp-block-media-text__media">
                <?php
                  if ( get_the_post_thumbnail($post_id) != '' ) {
                  the_post_thumbnail('medium');
                  } else if ( catch_that_image()) {
                  echo '<img src="';
                  echo catch_that_image();
                  echo '" alt="" />';
                  }
                ?>
              </figure>

              <div class="wp-block-media-text__content">
                  <p>
                    <?php
                      echo wp_trim_words( get_the_content(), 80, ' ' );
                    ?>                  
                  </p>

                  <a href="<?php the_permalink(); ?>" class="more-link">lire la suite</a>
              </div>
            </div>

            <?php } else { ?>
            
              <?php the_content(); ?>

            <?php } ?>

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