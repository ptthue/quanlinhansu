<?php 
	
		$user_id = $_GET['userid'];
		$sql = "SELECT * FROM users WHERE user_id=$user_id";
		$User->query($sql);
		$row = $User->fetch_row();
		if(isset($_POST['submit'])){
			$User->set_user_id($user_id);
			$User->set_user_full($_POST['full']);
			$User->set_user_name($_POST['user']);
			$User->set_user_pass($_POST['pass']);
			$User->set_user_mail($_POST['mail']);
			$User->set_user_level($_POST['level']);
			if($User->edit()=='user exist'){
				$_SESSION[err] = '<div class="alert alert-danger">User exist!</div>';
			}
			else {
				header('location:index.php?controllers=user&page_layout=admin');
			}
		}
	
	require_once('views/edit.php');

 ?>