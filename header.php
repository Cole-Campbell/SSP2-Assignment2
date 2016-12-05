<?php

#check_user_logged_in();

# <head> section plus the top HTML for pages.
echo "<html style='margin-top:0px !important;'><head>
<title>Zee Website</title>
<meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"../../favicon.ico\">"?>

<?php 
wp_head();

echo "</head>
<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>

<script src=\"https://use.fontawesome.com/d016f5b83b.js\"></script>

<body>
<nav class='navbar navbar-static-top navbar-inverse' role='navigation'>
	<div class='container-fluid' id='navfluid'>
		<div class='navbar-header'>
			<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#navigationbar'>
				<span class='sr-only'>Toggle Navigation</span>
				<i class='fa fa-bars fa-lg' style='color:white;'></i>
			</button>
			<a class='navbar-brand' href='./index.php'>Hyperion Corp.</a>
		</div>
		<div class='collapse navbar-collapse' id='navigationbar'>
			<ul class='nav navbar-nav'>
				<li class='active'><a href='./index.php'>Home</a></li>
			</ul>";

#Checks to see if the user is logged in or not. If they are logged in then it will display a logout button, if not logged in then a login form will be provided.
if(!is_user_logged_in()){
  echo "<form class=\"navbar-form navbar-right\">
            <div class=\"form-group\">
              <input type=\"text\" placeholder=\"Email\" class=\"form-control\">
            </div>
            <div class=\"form-group\">
              <input type=\"password\" placeholder=\"Password\" class=\"form-control\">
            </div>
            <button type=\"submit\" class=\"btn btn-success\">Sign in</button>
        </form>";
} else {
    ?>
    <form class="navbar-right navbar-form">
    <a class="btn btn-danger" role="button" href="<?php echo wp_logout_url('index.php'); ?>">Logout</a>
    </form>

<?php
}
echo "
			
		</div>
	</div>
</nav>";
?>
<?php #wp_nav_menu( array( 'theme_location' => 'HeaderMenu', 'Menu' => 'Header Menu') ); ?>  

<!--<nav class=\"navbar navbar-inverse navbar-fixed-top\">
      <div class=\"container\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"#\">Project name</a>
        </div>
        <div id=\"navbar\" class=\"navbar-collapse collapse\">
          <form class=\"navbar-form navbar-right\">
            <div class=\"form-group\">
              <input type=\"text\" placeholder=\"Email\" class=\"form-control\">
            </div>
            <div class=\"form-group\">
              <input type=\"password\" placeholder=\"Password\" class=\"form-control\">
            </div>
            <button type=\"submit\" class=\"btn btn-success\">Sign in</button>
          </form>
        </div>
      </div>
    </nav>-->
