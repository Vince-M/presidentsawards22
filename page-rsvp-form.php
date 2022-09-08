<?php
/*
  Template Name: RSVP Form Template
  */
?>

<?php get_header(); ?>

    <div class="wrapper">
      <div class="content-form">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <?php endwhile; else: ?>

          <p>Sorry, no pages found</p>

        <?php endif; ?>

      </div> <!-- content -->
    </div> <!-- wrapper -->

    <?php get_footer(); ?>
