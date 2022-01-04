<hr id="section-calendrier__regates-annuelles"><br />
<section class="section">
  <h2 class="area--header">
    Régates
  </h2>
  <div class="area--main area__regate">
    <?php
      // on loope pour pecho l events
      $events_loop = new WP_Query(
      array(
          'post_type' => 'regates',
      )
      );
      while ( $events_loop->have_posts() ) : $events_loop->the_post();
      // On importe nos variables
      $events_name = get_post_meta( get_the_ID(), 'events-name', true );
      $events_description = get_post_meta( get_the_ID(), 'events-description', true );
      $events_linkInfo = get_post_meta( get_the_ID(), 'events-linkInfo', true );
      $events_linkInsc = get_post_meta( get_the_ID(), 'events-linkInsc', true );
      $events_date_full = get_post_meta( get_the_ID(), 'events-date-full', true );
    ?>

    <article class="card">
        <?php 
          if ( has_post_thumbnail()) {
            the_post_thumbnail();
          }          
          else {
            echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
                . '/assets/images/thumbnail-regate-default.jpg" />  ';
          };  
        ?>        
      <div>
        <h3><?php echo $events_name; ?></h3> 
        <p><?php echo $events_date_full ?> </p> 
        <p><?php echo $events_descritpion ?> </p> 
        <a class="btn btn--coconut" href="<?php echo $events_linkInfo; ?>" target="_blank">Information</a>
        <a class="btn btn--coconut" href="<?php echo $events_linkInsc; ?>" target="_blank">Inscription</a>
      </div>
    </article>
    <?php endwhile; wp_reset_query();?>
  </div>           
  <aside class="area--aside">
    <?php if ( is_active_sidebar( 'area-widget-regate' ) ) : ?>
        <?php dynamic_sidebar( 'area-widget-regate' ); ?>
    <?php endif; ?>
  </aside>
</section>
