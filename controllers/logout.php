<?php 
	if(isset($_SESSION['user_name']) && isset($_SESSION['user_pass'])){
		session_destroy();
		header('location:index.php?controllers=user&page_layout=login');
		
	}

 ?>