<?php 
#Display for single blog posts.
#get_sidebar();
get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_time();?><br/>
<?php the_date();?>
<h1><?php the_title(); ?> </h1>
<h5 style="margin-top:-20px;">Written By: <?php the_author();?></h5>
<?php the_content();?>
<!--<a href="<?php the_permalink();?>">Read More</a>-->
<?php endwhile; endif; ?>