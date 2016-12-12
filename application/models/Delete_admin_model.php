<?php

class Delete_admin_model extends CI_Model{
function __construct() {
parent::__construct();

}

function delete_color($id){
	
	$this->db->where('id',$id);
	$this->db->delete('colour');
}

function delete_brands($id){
	
	$this->db->where('id',$id);
	$this->db->delete('Product_brands');
}

function delete_service($id){
	$this->db->where('id',$id);
	$this->db->delete('services');
}

function del_review($id){
	$this->db->where('id',$id);
	$this->db->delete('reviews');
}



///*********************************end******************////

}
