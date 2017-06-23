<html>
  <?php get_template_part('partials/head'); ?>
  <body <?php body_class(); ?>>
  <?php get_template_part('partials/header'); ?>

  <div class="container">
  <?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'sage'); ?>
    </div>
    <?php get_search_form(); ?>
  <?php endif; ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="content">
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        </div>

      </div>
    </div>
  <?php endwhile; ?>
  </div>

  <?php the_posts_navigation(); ?>

  <?php get_template_part('partials/footer'); ?>

  </body>
</html>