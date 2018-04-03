<?php
function __autoload($filename){
	switch ($filename) {
		case 'User':
			# code...
			include_once('models/User.php');
			break;
		
		default:
			# code...
			include_once('library/Pagination.php');
			break;
	}
	
}
?>