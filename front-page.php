<?php 
#Controls the display of the front page
get_header();
//get_sidebar();

?>
</div>
<div class='jumbotron' id="mainDisplay">
		<img src="wp-content/themes/cole/img/hyperion.jpg" class="img-responsive"
		style="background-position: cover; margin:0px; padding-top:0;">
</div>
<div class='container'>

<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1> <?php the_title(); ?> </h1>
<?php the_content();?>
<?php endwhile; endif; ?>

<?php
echo "<h2>Register</h2>
	<p style='color:red;'>".$fail."</p>
	<p style='color:green;'>".$pass."</p>";

#Register
echo 
		'<form method="post" class="form-group">
			<label>Username</label>
			<div class="form-group">
				<input class="form-control" type="text" name="login_name"/>
			</div>
			<label>Password</label>
			<div class="form-group">
				<input class="form-control" type="password" name="pass_word"/>
			</div>
			<button class="btn btn-default" type="submit" name="register">Register</button>
		</form>';

get_footer();
?>