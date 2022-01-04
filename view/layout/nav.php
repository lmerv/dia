<nav  class="menu" data-toggle="false" data-menu__height="large">
  <div class="navbar">
    <h1><?php bloginfo('name'); ?></h1>
    <button id="btnMenu"></button>
  </div>
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
