<?php 
	require_once('views/admin.php');
	if(isset($_GET['action'])){
		switch ($_GET['action']) {
			case 'add':
				require_once('controllers/add.php');
				break;
			case 'edit':
				require_once('controllers/edit.php');
				break;
			case 'del':
				require_once('controllers/delete.php');
				break;
			case 'logout':
				require_once('controllers/logout.php');
				break;
		}
	}
	else {
		require_once('controllers/list.php');
	}
 ?>