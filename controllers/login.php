<?php 
	if(isset($_POST['submit'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		if($user && $pass){
			$User->set_user_name($user);
			$User->set_user_pass($pass);
			if($User->login() == "login fail"){
				$_SESSION['err'] = '<div class="alert alert-danger">Account not valid!</div>';
			}
			else {
				header('location:index.php?controllers=user&page_layout=admin');
			}
		}
	}
	require_once('views/login.php');

 ?>