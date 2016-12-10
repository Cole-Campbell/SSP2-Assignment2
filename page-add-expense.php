<?php 
#Controls the display of the front page

/**
 * Template Name: Add Expense Page
 *
 * @package WordPress
 * @subpackage Cole
 * @since Cole 1.0
 */

#Expenses Content
get_header();

?>

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