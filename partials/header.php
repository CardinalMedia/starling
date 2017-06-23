<header class="banner">
  <nav class="">

    <div class="container">

    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav', 'container'=> false, 'walker' => new bs4navwalker()]);
      endif;
    ?>
      
    </div>

  </nav>

</header>