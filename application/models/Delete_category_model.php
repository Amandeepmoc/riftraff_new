<?php

class Delete_category_model extends CI_Model{
function __construct() {
parent::__construct();

}


function delete_category($id){
	
	$this->db->where('id',$id);
	$this->db->delete('Product_Category');
	//echo $this->db->last_query();die;
}



///echo $this->last_query();die('kailash');


function delete_sub_category($id){
	
	$this->db->where('id',$id);
	$this->db->delete('Product_sub_category');
	//echo $this->db->last_query();die;
}




///*********************************end******************////

}
