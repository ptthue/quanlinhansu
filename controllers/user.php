<?php 
	if ($_GET['page_layout']) {
		if(isset($_SESSION['user_name']) && isset($_SESSION['user_pass'])){
			$sql = "SELECT * FROM users 
					WHERE user_name ='".$_SESSION['user_name']."' 
					AND user_pass ='".$_SESSION['user_pass']."' ";
			$User->query($sql);
			if($User->num_rows()>0){
				require_once('controllers/admin.php');
			}
			else {
				require_once('controllers/login.php');
			}
		}
		else {
			require_once('controllers/login.php');
		}
	}
	

 ?>