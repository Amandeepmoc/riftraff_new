<?php

class Insert_admin_model extends CI_Model{
function __construct() {
parent::__construct();

}
function insert_brand($data){
	
	 $this->db->insert('Product_brands',$data);
}

function insert_colour($data){
	
	 $this->db->insert('colour',$data);
}

function insert_brand_image($data){
	
	 $this->db->insert('brand_images',$data);
//echo $this->db->last_query();die;	
}

function insert_attribute($data){
	
	 $this->db->insert('product_attributes',$data);
         $insert_id = $this->db->insert_id();
         return $insert_id;
//echo $this->db->last_query();die;	
}

function insert_attribute_set($data){
	
	 $this->db->insert('attribute_set',$data);
         
//echo $this->db->last_query();die;	
}
function insert_attribute_options($data){
	
	 $this->db->insert('product_attribute_options',$data);
//echo $this->db->last_query();die;	
}

function insert_service($data){
	
	 $this->db->insert(' services',$data);
//echo $this->db->last_query();die;	
}

function insert_review($data){
	
	 $this->db->insert('reviews',$data);
//echo $this->db->last_query();die;	
}













////**************end***********///
}
?>