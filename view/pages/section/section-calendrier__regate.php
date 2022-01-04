<?php
// Section pour afficher sur la page d'accueil le calendrier des régates annuelles
?>

<section class="section-calendrier__regate">
  <?php
  // on fait un loop pour la catégorie donnée
  $calendrier_regates_loop = new WP_Query(
    array(
      'category_name' => 'ananke-frontpage-calendrier__regates',
      // dernier post de la catégorie
      'posts_per_page' => '1',
      'order' => 'ASC',
    )
  );

  while ( $calendrier_regates_loop->have_posts() ) : $calendrier_regates_loop->the_post();
  ?>
  <article role="article">
    <header>
      <h1>
        <?php the_title(); ?>
      </h1>
    </header>

    <div class="article-body">
      <?php the_content(); ?>
    </div>

  </article>

  <?php
    endwhile;
    // on reset la query au cas oû on relance un loop
    wp_reset_query();
  ?>
</section>

