<?php

  #Declaring Wordpress DB as a global variable.
  global $wpdb;

  # <head> section plus the top HTML for pages including the styles, js, and navbar.
  echo "<html><head>
  <title>Hyperion Corp.</title>
  <meta charset=\"utf-8\">
      <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name=\"description\" content=\"\">
      <meta name=\"author\" content=\"\">
      <link rel=\"icon\" href=\"../../favicon.ico\">";
  wp_head();

  echo "</head>
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
  <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>

  <script src=\"https://use.fontawesome.com/d016f5b83b.js\"></script>

  <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">

  <link rel=\"stylesheet\" href=\"wp-content/themes/cole/style.css\">

  <body>

  <nav class='navbar navbar-static-top navbar-inverse' role='navigation'>
  <div class='container'>
  	<div class='container-fluid' id='navfluid'>
  		<div class='navbar-header'>
  			<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#navigationbar'>
  				<span class='sr-only'>Toggle Navigation</span>
  				<i class='fa fa-bars fa-lg' style='color:white;'></i>
  			</button>
  			<a class='navbar-brand' href='./index.php'>Hyperion Corp.</a>
  		</div>
      <div class='collapse navbar-collapse' id='navigationbar'>";

      wp_nav_menu( array('Menu' => 'Primary', 'menu_class' => 'nav navbar-nav' ));
      #Line above creates the websites navigation using the menu created within the WP Dashboard

  #Checks to see if the user is logged in or not. If they are logged in then it will display a logout button, if not logged in then a login form will be provided.
  if(!is_user_logged_in()){
?>
    <form class="navbar-right navbar-form">
      <a class="btn btn-success" role="button" href="<?php echo wp_login_url('expenses'); ?>">Log In</a>
    </form>
<?php
    } else {
      $userID = get_current_user_id();
      $data = get_user_meta($userID);

      $level = $data['wp_user_level'][0];

    ?>
    
    <form class="navbar-right navbar-form">
    <?php
    #If the user's level is 10 then an Dashboard button will be created, allowing them to access the administrative backend of the website. If not, then 
      if($level==10){
        ?>
        <a class="btn btn-info" role="button" href="<?php echo admin_url();?>">Dashboard</a>";
        <?php
      } ?>
    
      <a class="btn btn-danger" role="button" href="<?php echo wp_logout_url('index.php'); ?>">Log Out</a>
    </form>
    <?php
    }
echo "
    </div>
	</div>
  </div>
</nav>
<div class='container'>";
?>