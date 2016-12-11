<?php 
#Controls the display of the front page
#Gets the header.php file using the WP function
get_header();

#Below is HTML which creates most of the frontpage using the Bootstrap framework.
?>
</div>
<div class='jumbotron' id="mainDisplay">
		<img src="wp-content/themes/cole/img/hyperion.jpg" class="img-responsive"
		style="background-position: cover; margin:0px; padding-top:0;">
</div>
<div class='container'>

<?php
#If content can be found associated to the frontpage backend, then it will add in the content.
if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1> <?php the_title(); ?> </h1>
<?php the_content();?>
<?php endwhile; endif; ?>

<?php
#Registration form. This section will display a message depending on if the user's content is successfully added into the database or not
echo "<h2>Register</h2>
	<p style='color:red;'>".$fail."</p>
	<p style='color:green;'>".$pass."</p>";

#Registration Form. This form allows the user to input their username/password and submit it into the database unless the username is taken.
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