<?php

class Get_attribute_model extends CI_Model{
function __construct() {
parent::__construct();

}
function get_sets(){	
         $this->db->where('status','1');
	 $query = $this->db->get('attribute_sets'); 
         return $query->result();
}
function get_atts(){	
         $this->db->where('status','1');
	 $query = $this->db->get('Product_Category'); 
         return $query->result();
}
function get_att_v($d)
{
         $this->db->where('id',$d);
	 $query = $this->db->get('product_attributes'); 
         return $query->result();
}
function get_option_id(){
    $query = $this->db->query("select max(id) as idd from product_attributes");
    return $query->result();
    
}
function fetch_attributes1(){
    $query = $this->db->query("select *  from product_attributes where status = 1 and attribute_set_id = 38 order by id desc");
    return $query->result();
    
}
function update_atts($id, $data)
{
    $this->db->where('id',$id);
    $this->db->update('product_attributes',$data);
    
    return true;
}
function delete_attibute($id){
    $this->db->where('id',$id);
    $this->db->set('status',0);
    $this->db->update('product_attributes');
    return true;
}
function fetch_attributes2(){
    $query = $this->db->query("select *  from product_attributes where status = 1 and attribute_set_id = 39 order by id desc");
    return $query->result();
    
}
function fetch_attributes3(){
    $query = $this->db->query("select *  from product_attributes where status = 1 and attribute_set_id = 42 order by id desc");
    return $query->result();
    
}
function fetch_attributes4(){
    $query = $this->db->query("select *  from product_attributes where status = 1 and attribute_set_id = 43 order by id desc");
    return $query->result();
    
}

function fetch_attributes_sets(){
    $query = $this->db->query("select *  from attribute_set");
    return $query->result();
    
}
function fetch_attributess($id)
{
    $query = $this->db->query("select * from product_attributes inner join product_attributes_for_sets on product_attributes.id = product_attributes_for_sets.attribute_id where product_attributes_for_sets.attribute_set_id = " .$id ); 
    return $query->result(); 
}
function fetch_attributess_all($id,$idd)
{
   
    $query = $this->db->query("select * from product_attributes where id not in (select attribute_id from product_attributes_for_sets where attribute_set_id = " . $id .") and status = 1 and attribute_set_id = ". $idd); 
    return $query->result(); 
    //echo $this->db->last_query();die;
}
function fetch_attributess_alll()
{
    $this->db->where('status',1);
    $this->db->where('attribute_set_id', 1);
    $query = $this->db->get('product_attributes');
    return $query->result();
    
}
function update_attss($id,$old_set,$new_set)

{
	$query = $this->db->query("update product_attributes set sort = '$old_set' where attribute_set_id = $id and sort = '$new_set'");
	return true;
}

function deleteatt($id)
{
    $this->db->where('id',$id);
    $this->db->set('status', '0');
    $query = $this->db->update('product_attributes'); 
    return true; 
}
function addatt($data)
{
    $this->db->insert('product_attributes_for_sets', $data);
    return true;
}
function fetch_id_data($id)
{
    $this->db->where('id',$id);
    $query = $this->db->get('product_attributes');
    return $query->result();
    
}















////**************end***********///
}
?>