<?php 
#Displays the single page content
get_header();
//get_sidebar();
if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1> <?php the_title(); ?> </h1>
<?php the_content();?>
<?php echo get_option('site_url');?>
<?php endwhile; endif; ?>