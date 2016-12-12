<?php

class Update_category_model extends CI_Model{
function __construct() {
parent::__construct();

}


function update_category($id,$data){
	
	$this->db->where('id',$id);
	$this->db->update('Product_Category',$data);
		//echo $this->db->last_query();die;

	
}


///echo $this->last_query();die('kailash');


function update_sub_category($id,$data){
	
	$this->db->where('id',$id);
	$this->db->update('Product_sub_category',$data);
		///echo $this->db->last_query();die;

	
}

///*********************************Manage product****************************////

function update_product($id,$data){
	
	$this->db->where('id',$id);
	$this->db->update('product_detail',$data);
		//echo $this->db->last_query();die;
	}
		
///*********************************managed dealers****************************////

function update_dealer($id,$data){
	
	$this->db->where('id',$id);
	$this->db->update('user_registration',$data);
		//echo $this->db->last_query();die;

}

///*********************************managed sellers****************************////
function update_seller($id,$data){
	
	$this->db->where('id',$id);
	$this->db->update('user_registration',$data);
		//echo $this->db->last_query();die;

}

///*********************************end***************************************////

}
