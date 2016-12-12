<?php 


class Delete_model extends CI_Model{
function __construct() {
parent::__construct();

}


function deleteimg($id){
    $this->db->where('id',$id);
    $this->db->delete('Product_images');
    
}

function delete_product($id)
{
    $this->db->where('id',$id);
    $this->db->delete('product_detail');
    $this->db->where('product_id',$id);
    $this->db->delete('product_attribute_value');
    $this->db->where('product_id',$id);
    $this->db->delete('Product_images');
    //echo $this->db->last_query();
    //die();
}



//********************end*******************//


}

?>
