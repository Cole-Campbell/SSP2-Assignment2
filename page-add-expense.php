<?php 
#Controls the display of the front page
#Checks to see if the user is logged in. If they aren't then the user in question is redirected.
check_user_logged_in();
/**
 * Template Name: Add Expense Page
 *
 * @package WordPress
 * @subpackage Cole
 * @since Cole 1.0
 */

#Adds in the header file within the WP Theme using the WP function.
get_header();

#Checks to see if there is content within the dashboard, and if so then it will display the content accordingly.
  if (have_posts()) : while (have_posts()) : the_post(); ?>
  <h1> <?php the_title(); ?> </h1>
  <?php the_content();?>
  <?php endwhile; endif; ?>

<!-- Form which allows for employees to add expenses for approval. Standard form which allows them to submit expenses in a numeric value and the type of expense. -->
<form role="search" method="post">  

  <div class="form-group">
  <label>Amount (in euros)</label>
  <label class="sr-only">Amount (in euros)</label>
    <div class="input-group">
      <div class="input-group-addon">€</div>
      <input type="text" class="form-control" placeholder="Amount" name="expense">
    </div>
  </div>

  <div class="form-group">
	 <label>Select Expense Type:</label>
	  <select name="type" class="form-control">
	    <option>Food</option>
	    <option>Accommodation</option>
	    <option>Petrol</option>
	    <option>Other</option>
	  </select>
  </div>
  <br/>
  <button type="submit" class="btn btn-default" name="addExpense">Submit</button>
</form>
<?php
  get_footer();
?>