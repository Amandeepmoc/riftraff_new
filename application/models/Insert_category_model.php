<?php

class Insert_category_model extends CI_Model{
function __construct() {
parent::__construct();

}
function insert_category($data){
	 //$this->db->set('name');
	 $this->db->insert('Product_Category',$data);
	
}

function manage_category($data){
	 //$this->db->set('name');
	 $this->db->insert('Product_Category',$data);
	
}

function insert_sub_category($data){
	 //$this->db->set('name');
	 $this->db->insert('Product_sub_category',$data);
	
}



///echo $this->last_query();die('kailash');

//****************************************seller manage ***********************************************//

function usremaill($id)
{
    $query = $this->db->query("select email from user_registration where id = $id");
    return $query->result();
}



function count_prod_not()
{
    $query = $this->db->query("Select count(id) as counter from product_detail where status = 1 and approve_status = 0");
    
    return $query->result();
}


function count_user_not()
{
    $query = $this->db->query("Select count(id) as counter from user_registration where status = 1 and approve_status = 0");
    return $query->result();
}


function usremail($id)
{
    $query = $this->db->query("select user_registration.email from user_registration inner join product_detail on user_registration.id = product_detail.added_by_id where product_detail.id = $id");
    return $query->result();
}

//**************************************************************profile andrew*********************************************************//

   function insert_profile_ann($data){
	 //$this->db->set('name');
    $this->db->insert('profile',$data);
	
}

////***********************************end*************************************///

}
?>
