<?php 
if(isset($_POST['submit'])){
	$User->set_user_full($_POST['full']);
	$User->set_user_name($_POST['user']);
	$User->set_user_pass($_POST['pass']);
	$User->set_user_mail($_POST['mail']);
	$User->set_user_level($_POST['level']);
	if($User->add()=='user exist'){
		$_SESSION[err] = '<div class="alert alert-danger">User exist!</div>';
	}
	else {
		header('location:index.php?controllers=user&page_layout=admin');
	}
}
require_once('views/add.php');
?>