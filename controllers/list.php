<?php
	$paginate = new Pagination();
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} 
	else $page = 1;
	$paginate->set_page($page);
	$paginate->set_rows_per_page(3);
	$paginate->set_per_row();
	$row_per_page = $paginate->get_rows_per_page();
	$per_row = $paginate->get_per_row();

	$sql = "SELECT * FROM users LIMIT $per_row,$row_per_page";
	$User->query($sql);
	$paginate->set_total_rows('users');
	$paginate->set_total_pages();
	$paginate->set_list_pages('index');
	require_once('views/list.php');
	

 ?>