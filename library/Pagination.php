<?php
include_once('Database.php');
class Pagination extends Database{
	
	
	protected $page = NULL;
	protected $rows_per_page = NULL;
	protected $per_row = NULL;
	//
	protected $total_rows = NULL;
	protected $total_pages = NULL;
	protected $list_pages = NULL;
	
	protected $page_prev = NULL;
	protected $page_next = NULL;
	
	function __construct(){
		$this->connect();	
	}
	
	public function set_page($page){
		$this->page = $page;
	}
	public function get_page(){
		return $this->page;	
	}
	//
	public function set_rows_per_page($rows_per_page){
		$this->rows_per_page = $rows_per_page;
	}
	public function get_rows_per_page(){
		return $this->rows_per_page;	
	}
	////////////////////////////////////////////////////////////////////////////
	public function set_per_row(){
		$this->per_row = $this->page*$this->rows_per_page - $this->rows_per_page;
	}
	public function get_per_row(){
		return $this->per_row;	
	}
	//
	public function set_total_rows($table){
		$sql = "SELECT * FROM $table";
		$this->query($sql);
		$this->total_rows = $this->num_rows();
	}
	public function get_total_rows(){
		return $this->total_rows;	
	}
	//
	public function set_total_pages(){
		$this->total_pages = ceil($this->total_rows/$this->rows_per_page);
	}
	public function get_total_pages(){
		return $this->total_pages;	
	}
	//
	public function set_list_pages($file_name){

		$this->page_prev = $this->page - 1;
		if($this->page_prev < 1){
			$this->page_prev = 1;
		} 
		$this->list_pages .= '<li>
			<a aria-label="Previous" href="'.$file_name.'.php?controllers=user&page_layout=admin&page='.$this->page_prev.'">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>';
		
		for($i=1; $i<=$this->total_pages; $i++){
			if($i==$this->page){
				$this->list_pages .= '<li class="active"><a href="'.$file_name.'.php?controllers=user&page_layout=admin&page='.$i.'">'.$i.'</a></li>';
			}
			else{
				$this->list_pages .= '<li><a href="'.$file_name.'.php?controllers=user&page_layout=admin&page='.$i.'">'.$i.'</a></li>';
			}
			
		}
		
		$this->page_next = $this->page + 1;
		if($this->page_next > $this->total_pages){
			$this->page_next = $this->total_pages;
		}
		$this->list_pages .= '<li>
			<a href="'.$file_name.'.php?controllers=user&page_layout=admin&page='.$this->page_next.'" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>';
	}
	public function get_list_pages(){
		return $this->list_pages;	
	}
	//	
}

?>