<?php
global $wpdb;

$wpdb->insert('grades',
	array(
		'name' => 'Me',
		'subject' => 'Math',
		'grade' => 80
	),
	array(
		'%s',
		'%s',
		'%d'
	)
);

?>