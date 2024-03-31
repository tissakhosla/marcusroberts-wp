<?php /* Template Name: Contact Form */ ?>
<?php get_header();
  if( have_posts() ) :
    while( have_posts() ) :
      the_post(); ?>
      <div class="Page">
        <h1><?php echo get_the_title() ?></h1>
        <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
            <input type="hidden" name="action" value="submit_contact_form">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="message">Message:</label>
            <textarea name="message" id="message" required></textarea>
            <input type="submit" value="Submit">
        </form>
      </div>
    <?php
    endwhile;
  endif;
get_footer(); ?>