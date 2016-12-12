<?php

class Update_admin_model extends CI_Model{
function __construct() {
parent::__construct();

}

function update_colors($id,$data){
	
	$this->db->where('id',$id);
	$this->db->update('colour',$data);
}

function update_brands($id,$data){
	
	$this->db->where('id',$id);
	$this->db->update('Product_brands',$data);
		//echo $this->db->last_query();die;

	
}

function update_review($id,$data){
	if(empty($data['image'])){
		
		unset($data['image']);
	}
	$this->db->where('id',$id);
	$this->db->update('reviews',$data);
		//echo $this->db->last_query();die;

	
}


///*********************************end******************////

}
