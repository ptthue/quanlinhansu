<?php 
	$user_id = $_GET['userid'];
	$User->set_user_id($user_id);
	$User->del();
	$_SESSION['report'] = '<div class="alert alert-success">Deleted user success!</div>';
	header('location:index.php?controllers=user&page_layout=admin');
	
 ?>