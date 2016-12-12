<?php 


class Insert_model extends CI_Model{
function __construct() {
parent::__construct();

}


function signup_form($data){
    
    $this->db->insert('user_registration',$data);
    $insert_id = $this->db->insert_id();
    return $insert_id;

   // echo $this->db->last_query();
}

function sign_up_two($data)
{
    $this->db->insert('buyer_info',$data);
}


function add_product($data){
    
    
    $this->db->insert('product_detail',$data);
    $insert_id = $this->db->insert_id();
    return $insert_id;

}
function insert_product_images($data)
{
    $this->db->insert('Product_images',$data);
    return true;
    
}
function insert_product_shipping_locations($data)
{
     $this->db->insert('product_locations',$data);
    return true;
}
function insert_product_shipping_details($data)
{
    $this->db->insert('product_shipping_details',$data);
    return true;
}
function add_dealer_info($data)
{
    $this->db->insert('dealer_info',$data);
    return true;
}
function add_seller_info($data)
{
    $this->db->insert('seller_info',$data);
    return true;
}
function get_services_dealer($id)
{
    $query = $this->db->query("SELECT services.service_name, dealer_services . * 
FROM dealer_services
INNER JOIN services ON services.id = dealer_services.service_id
WHERE dealer_services.dealer_id = $id");
    return $query->result();
}



function getmax()
{
    $query = $this->db->query('select MAX(id) as idd from user_registration');
    
    if(count($query->result()) > 0){
       
       return $query->result();
   }     else{
       return 0;
   }
}
/*** delete cart *****/
function del_cart($id)
{
    $this->db->where('id',$id);
    $this->db->set('status',0);
    $this->db->update('product_cart');
    return true;
    
}

/**** end ************/
function add_in_cart($data)
{
    $this->db->insert('product_cart',$data);
    return true;
}

function update_in_cart($uid,$pid,$data)
{
    $this->db->where('buyer_id',$uid);
    $this->db->where('product_id',$pid);
    $this->db->update('product_cart',$data);
    
    
    return true;
}
function update_quantity($pid,$qty){
    
    $query = $this->db->query("update product_attribute_value set attribute_value = $qty where product_id = $pid and attribute_id = 'stock_value'");
    return true;
}
                
function save_dealer_services($data)
{
   $this->db->insert('dealer_services',$data);
   return true;
}
function complete_profile($id)
{
    $this->db->where('id',$id);
    $this->db->set('profile_complete','1');
    $this->db->update('user_registration');
    return true;
}
function  insert_product_attributes($data)
{
    $this->db->insert('product_attribute_value',$data);
    return true;
}
function get_profile($id)
{
    $query = $this->db->query("SELECT user_registration.store, dealer_info.*  FROM dealer_info  inner join user_registration on user_registration.id = dealer_info.user_id where dealer_info.user_id = $id");
    return $query->result();
    
}
function count_prod_not()
{
    $query = $this->db->query("Select count(id) as counter from product_detail where status = 1 and approve_status = 0");
    
    return $query->result();
}
function count_prod_data()
{
    $query = $this->db->query("Select * from product_detail where approve_status = 0");
    return $query->result();
}
function count_user_not()
{
    $query = $this->db->query("Select count(id) as counter from user_registration where status = 1 and approve_status = 0");
    return $query->result();
}
function count_user_data()
{
    $query = $this->db->query("Select * from user_registration where noti_status = 1 and approve_status = 0");
    return $query->result();
}
function usremail($id)
{
    $query = $this->db->query("select user_registration.email from user_registration inner join product_detail on user_registration.id = product_detail.added_by_id where product_detail.id = $id");
    return $query->result();
}
function usremaill($id)
{
    $query = $this->db->query("select email from user_registration where id = $id");
    return $query->result();
}
function get_dealer_id($id)
{
    $query = $this->db->query("select * from dealer_info where user_id = $id");
    return $query->result();
}
function update_dealer_info($data,$id)
{
 
	$this->db->where('user_id',$id);
	$this->db->update('dealer_info',$data);
}
function get_seller_id($id)
{
    $query = $this->db->query("select * from seller_info where user_id = $id");
    return $query->result();
}
function update_seller_info($data,$id)
{
        $this->db->where('user_id',$id);
	$this->db->update('seller_info',$data);
}
/**** update functions *******************/

function update_product_phase_one($id,$data)
{
        $this->db->where('id',$id);
	$this->db->update('product_detail',$data);
}
function update_product_phase_two($id,$idd,$data)
{
        $this->db->where('product_id',$id);
        $this->db->where('attribute_id',$idd);
	$this->db->update('product_attribute_value',$data);
}
function update_product_shipping_details($id,$data)
{
        $this->db->where('product_id',$id);
	$this->db->update('product_shipping_details',$data);
}

/***** end ********************************/

/****** ajax function ********************/

function get_services($id){

$this->db->where("type","$id");
$query = $this->db->get("services");
//echo $this->db->last_query();die;

   if(count($query->result())>0){
       
       return $query->result();
   }     else{
       return 0;
   }
        
        
}

function addressall()
{
    
    $query = $this->db->query('SELECT user_registration.store, user_registration.firstname, user_registration.lastname , dealer_info.*  FROM dealer_info  inner join user_registration on user_registration.id = dealer_info.user_id');
     if(count($query->result())>0){
       
       return $query->result();
   }     else{
       return 0;
   }
    
}
function fetch_dataa($idd)
{
    
    $query = $this->db->query("SELECT user_registration.store, user_registration.firstname, user_registration.lastname , dealer_info.*  FROM dealer_info  inner join user_registration on user_registration.id = dealer_info.user_id inner join dealer_services on dealer_info.user_id = dealer_services.dealer_id where dealer_services.type= '$idd'");
     if(count($query->result())>0){
       
       return $query->result();
   }     else{
       return 0;
   }
    
}

function fetch_dataa_zipcode($idd)
{
    
    $query = $this->db->query("SELECT user_registration.store, user_registration.firstname, user_registration.lastname , dealer_info.*  FROM dealer_info  inner join user_registration on user_registration.id = dealer_info.user_id inner join dealer_services on dealer_info.user_id = dealer_services.dealer_id where dealer_info.zipcode= '$idd'");
     if(count($query->result())>0){
       
       return $query->result();
   }     else{
       return 0;
   }
    
}

function fetch_dataaa($idd)
{
    
    $query = $this->db->query("SELECT user_registration.store, user_registration.firstname, user_registration.lastname , dealer_services.address FROM dealer_services  inner join user_registration on user_registration.id = dealer_services.dealer_id  where dealer_services.service_id= $idd");
     if(count($query->result())>0){
       
       return $query->result();
   }     else{
       return 0;
   }
    
}





//********************end*******************//


}

?>