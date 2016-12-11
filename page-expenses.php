<?php 
	#Main functionality for the expenses page. Displays all expenses either assigned to the account, or all expenses if the user is logged in as an admin.

	/**
	 * Template Name: Expenses Page
	 *
	 * @package WordPress
	 * @subpackage Cole
	 * @since Cole 1.0
	 */

	#Checks to see if the user is logged in. If they are not, then they are redirected to the login page.
	check_user_logged_in();
	#Includes the header content which is displayed on the page. WP Function.
	get_header();
?>
<?php
	#Assigning the current user id to obtain the appropriate content for them based on user lvevl and their id.
	$id = get_current_user_id();
	the_content();
	#Getting the user's meta data by their id. Brings back all information associated with the ID.
	$data = get_user_meta($id);

	#Assigning the wp_user_level from the variable $data to the variable $level. This information will be used to check which content the user is allowed to see.
	$level = $data['wp_user_level'][0];

?>
	<h1> <?php the_title(); ?> </h1>

<!-- Back to HTML. Creating table to display the content pulled from teh database at a later time. Using Bootstrap classes to strip the table rows. -->
<table class="table table-striped">
	<thead>
		<tr>
		 <!-- Links change the query to allow for the user to sort the data. Only by ASC, not DESC -->
			<th>ID #</th>
			<th><a href="?orderBy=name">Name</a></th>
			<th><a href="?orderBy=amount">Amount</a></th>
			<th><a href="?orderBy=type">Type</a></th>
			<th><a href="?orderBy=date">Date</a></th>
			<th><a href="?orderBy=status">Status</a></th>
		</tr>
	</thead>
	<tbody>
<!-- END OF HTML TABLE -->
<?php

	#Creating variable $order. This will be filled if the user clicks a link of the table header. If the variable is set then it will alter the query and order it by that title by ascending order.
	$order = $_GET["orderBy"];

	#Checks to see if the user's level is 10. if the level is not equal to 10, then the user runs through the statements within the first if statement. This if statement ensures the user can only view expenses associated with their accounts.
	if($level != 10){
		if(isset($order)){
			$query = "SELECT * FROM expenses WHERE user_id = {$id} ORDER BY {$order} ASC";
		} else{
			$query = "SELECT * FROM expenses WHERE user_id = {$id}";
		}
	} #END OF $LEVEL != 10 STATEMENT
	# Optimized code just now and compressed the query into one. Instead of two statements, this else statement now runs if the variable $level is equal to 10 and the query is altered to show all information from expenses.
	else{
		if(isset($order)){
			$query = "SELECT * FROM expenses ORDER BY {$order} ASC";
		} else{
			$query = "SELECT * FROM expenses";
		}
	}

	#Based on the above query, the variable $query is then sent as a request to the wordpress database and will retrieve the results associated with the query passed in.
	$user_data = $wpdb->get_results (
		$query
	);

	#COnverts the variable passed, $user_data to the variable $udata. This information allows for information to be accessed from the variable individually instead of through an array.
		foreach($user_data as $udata){
			?>
			<tr>
			<?php
			#Displays HTML table tags and runs through every single query pulled from the database. The infromation pulled is then put into the tags and then repeats this process until every entry returned by the query is printed
			echo "<td>".$udata->id."</td>
					<td>".$udata->name."</td>
					<td>€".$udata->amount."</td>
					<td>".$udata->type."</td>
					<td>".$udata->date."</td>
					<td>"; 
					# Optimized code here and put the two statements into one. Checks to see what the user's level is set to. If the level is set to anything but 10 then the user is shown the option to delete a pending expense as the information may have been inputted incorrectly.

					#If the variable $level is set to 10, then the user (admin) is given the option to approve or reject the expense as long as the expense is pending.
					if($level != 10){
						echo $udata->status."</td>";

								if($udata->status == "Pending"){
									echo "<td><form method=\"post\">
			                    		<input type=\"hidden\" name=\"expenseID\" value=\"".$udata->id."\">
			                    		<input type=\"submit\" class=\"btn btn-danger\" name=\"delete\" value=\"Delete\">
			                		</form></td>";
	               		 		} #END OF DELETE BUTTON STATEMENT
							} else{
								if($udata->status == "Pending"){
									echo "<form method=\"post\">
			                    		<input type=\"hidden\" name=\"expenseID\" value=\"".$udata->id."\">
			                    		<input type=\"submit\" name=\"approved\" value=\"Approve\">
			                    		<input type=\"submit\" name=\"reject\" value=\"Reject\">
			                		</form></td>";
			                	} else{
								echo $udata->status."</td>";
								} #END OF PENDING STATUS BUTTONS

            			} #END OF $LEVEL CHECK
        	} #END OF FOREACH

    # End of statements. Moving to HTML and displaying the closing tags of the table.
	
	echo "</tr>
	</tbody>
</table>";

get_footer();