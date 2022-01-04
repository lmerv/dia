<?php get_template_part( 'view/layout/header' ); ?>

<main class="main"> 
  <?php get_template_part( 'view/pages/section/section-media_blog-new' ); ?>
  <?php get_template_part( 'view/pages/section/section-regate' ); ?>    
</main>

<aside class="aside">
  <?php get_template_part( 'view/pages/widget/widget-frontpage__aside' ); ?>  
  <?php get_template_part( 'view/pages/section/section-calendrier__regate' ); ?>
</aside>

<?php get_template_part( 'view/layout/section-pub__cust' ); ?>
<?php get_template_part( 'view/layout/footer' ); ?>