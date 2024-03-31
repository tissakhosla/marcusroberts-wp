<?php get_header();
  if( have_posts() ) :
    while( have_posts() ) :
      the_post(); ?>
      <div class="Page">
        <h1><?php echo get_the_title() ?></h1>
        <?php  the_content(); ?>
      </div>
    <?php
    endwhile;
  endif;
get_footer(); ?>
