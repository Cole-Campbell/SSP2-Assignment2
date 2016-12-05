<?php 
#Controls the display of the front page
get_header();
//get_sidebar();

?>
<p>Text goes right here, says the imp!</p>
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1> <?php the_title(); ?> </h1>
<?php the_content();?>
<?php endwhile; endif; ?>

<?php

#Register

echo 
		'<form method="post" action="./register/">
			<input type="text" name="login_name"/>
			<input type="password" name="pass_word"/>
			<button type="submit" name="register">Register</button>
		</form>';




?>
<p>End of the pages, IMPS!</p>