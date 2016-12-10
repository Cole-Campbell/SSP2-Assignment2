<?php 
#Controls the display of the front page

/**
 * Template Name: Width Page
 *
 * @package WordPress
 * @subpackage Cole
 * @since Cole 1.0
 */

#Expenses Content
get_header();

$id = get_current_user_id();

the_content();

#$user_data = $wpdb->get_var (
#$user_data = $wpdb->get_row (

$data = get_user_meta($id);

$level = $data['wp_user_level'][0];

?>
<table class="table table-striped">
			<thead>
				<tr>
					<th>ID #</th>
					<th><a href="?orderBy=name">Name</a></th>
					<th><a href="?orderBy=amount">Amount</a></th>
					<th><a href="?orderBy=type">Type</a></th>
					<th><a href="?orderBy=date">Date</a></th>
					<th><a href="?orderBy=status">Status</a></th>
				</tr>
			</thead>
			<tbody>

<?php


if($level != 10){

$order = $_GET["orderBy"];
	if(isset($order)){
			$query = "SELECT * FROM expenses WHERE user_id = {$id} ORDER BY {$order} ASC";
		} else{
			$query = "SELECT * FROM expenses WHERE user_id = {$id}";
		}

	$user_data = $wpdb->get_results (
	#"SELECT COUNT(*) FROM $WPDB->users"
		#"SELECT * FROM wp_users WHERE ID = 1"
		$query
	);

	#Breaks down the query and displays them individually
		foreach($user_data as $udata){
			?>
			<tr>
			<?php
			echo "<td>".$udata->id."</td>
					<td>".$udata->name."</td>
					<td>€".$udata->amount."</td>
					<td>".$udata->type."</td>
					<td>".$udata->date."</td>
					<td>".$udata->status."</td>";

					if($udata->status == "Pending"){
					echo "<td><form method=\"post\">
                    	<input type=\"hidden\" name=\"expenseID\" value=\"".$udata->id."\">
                    	<input type=\"submit\" class=\"btn btn-danger\" name=\"delete\" value=\"Delete\">
                	</form>";
                }
            }
        }

else{
	$order = $_GET["orderBy"];
	if(isset($order)){
			$query = "SELECT * FROM expenses ORDER BY {$order} ASC";
		} else{
			$query = "SELECT * FROM expenses";
		}
	$user_data = $wpdb->get_results (
#"SELECT COUNT(*) FROM $WPDB->users"
	#"SELECT * FROM wp_users WHERE ID = 1"
		$query
);

?>
<?php
#Breaks down the query and displays them individually
	foreach($user_data as $udata){
		?>
		
				<tr>
				<?php
					echo "<td>".$udata->id."</td>
					<td>".$udata->name."</td>
					<td>€".$udata->amount."</td>
					<td>".$udata->type."</td>
					<td>".$udata->date."</td>
					<td>"; if($udata->status == "Pending"){
								echo "<form method=\"post\">
			                    	<input type=\"hidden\" name=\"expenseID\" value=\"".$udata->id."\">
			                    	<input type=\"submit\" name=\"approved\" value=\"Approve\">
			                    	<input type=\"submit\" name=\"reject\" value=\"Reject\">
			                	</form>";
			                }
			                else{
					echo $udata->status."</td>";
					

				}
				?>
				
		<?php

	}
}
	?>
	</tr>
			</tbody>
		</table>
