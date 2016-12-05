<?php 
#Blog post listings
get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1 <?php the_title(); ?> </h1>
<?php the_content();?>
<a href="<?php the_permalink();?>">Read More</a>

<?php endwhile; endif; ?>