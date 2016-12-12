<?php

class Get_category_model extends CI_Model{
function __construct() {
parent::__construct();


}

function get_login($username,$password){
	
	$this->db->where('username',$username);
	$this->db->where('password',$password);
	$query = $this->db->get('admin_login'); 
		

return $query->result();
}


function fetch_category(){
	
	//$this->db->order_by('id','ASC');
	$query = $this->db->get('Product_Category'); 
    return $query->result();
	
}


function edit_category($id){
	
	$this->db->where('id',$id);
	$query = $this->db->get('Product_Category');
	
return $query->result();
}


///echo $this->last_query();die('kailash');

///***********************************************end*********************************************///


function sub_category($data){
	
	//$this->db->where('id',$id);
	$query = $this->db->get('Product_Category',$data);
    return $query->result();
	
}


function manage_sub_category(){
	
	//$this->db->where('id',$id);
	$query = $this->db->get('Product_sub_category');
    return $query->result();
	
}


function edit_sub_category($id){
	
	$this->db->where('id',$id);
	$query = $this->db->get('Product_sub_category');
	
return $query->result();
}

///***********************************************Manage product*********************************************///

function fetch_product($id)
{
	$this->db->where('id',$id);
    $query = $this->db->get("product_detail"); 
    return $query->result(); 
}



function edit_product($id){
	
	$this->db->where('id',$id);
	$query = $this->db->get('product_detail');
	
return $query->result();
}

///***********************************************Manage dealers*********************************************///


function fetch_dealer($id)
{
	$this->db->where('id',$id);
    $query = $this->db->get("user_registration"); 
    return $query->result(); 
}

function edit_dealer($id){
	
	$this->db->where('id',$id);
	$query = $this->db->get('user_registration');
	
return $query->result();
}


function fetch_profile($id){
	
	$this->db->where('id',$id);
	$query = $this->db->get('user_registration');
	
return $query->result();
}



///***********************************************Manage sellers*********************************************///

function fetch_seller($id)
{
	$this->db->where('id',$id);
    $query = $this->db->get("user_registration"); 
    return $query->result(); 
}

function edit_seller($id){
	
	$this->db->where('id',$id);
	$query = $this->db->get('user_registration');
	
return $query->result();
}

function fetch_view_profile($id){
	
	$this->db->where('id',$id);
	$query = $this->db->get('user_registration');
	
return $query->result();
}


///******************************************Mange dealers viewproduct approved and unapproved function*********************************************///

       function approve_user($id) {
        $this->db->where('id', $id);
        $this->db->set('approve_status', 1);
        $this->db->set('noti_status', 0);
        $query = $this->db->update('user_registration');
        return true;
    }

    function unapprove_user($id) {
        $this->db->where('id', $id);
        $this->db->set('approve_status', 0);
        $query = $this->db->update('user_registration');
        return true;
    }





    function fetch_dealers() {

        $this->db->where('type', 'dealer');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }
    
    
    
     function fetch_sellers() {

        $this->db->where('type', 'seller');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }
    
    
  
   function fetch_users() {

        $this->db->where('type', 'buyer');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }  
    
//*****************************************************Mange sellers viewproduct approved and unapproved function********************//


   function approve_users($id) {
        $this->db->where('id', $id);
        $this->db->set('approve_status', 1);
        $this->db->set('noti_status', 0);
        $query = $this->db->update('user_registration');
        return true;
    }

    function unapprove_users($id) {
        $this->db->where('id', $id);
        $this->db->set('approve_status', 0);
        $query = $this->db->update('user_registration');
        return true;
    }





    function fetch_seller_profile() {

        $this->db->where('type', 'dealer');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }
    
    
    
     function fetch_sellerss() {

        $this->db->where('type', 'seller');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }
    
    
  
   function fetch_userss() {

        $this->db->where('type', 'buyer');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }      
    
 
//***************************manage_dealer_inventory page viewproduct approved and unapproved function*********************************//

    function approve_dealer($id) {
        $this->db->where('id', $id);
        $this->db->set('approve_status', 1);
        $this->db->set('noti_status', 0);
        $query = $this->db->update('user_registration');
        return true;
    }

    function unapprove_dealer($id) {
        $this->db->where('id', $id);
        $this->db->set('approve_status', 0);
        $query = $this->db->update('user_registration');
        return true;
    }





    function fetch_dealer_profile() {

        $this->db->where('type', 'dealer');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }
    
    
    
     function fetch_dealer_inventory() {

        $this->db->where('type', 'seller');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }
    
    
  
   function fetch_dealers_inventory() {

        $this->db->where('type', 'buyer');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }      
    
//*************************************************************seller manage approved and unapproved ********************************//
      function unapprove_prod($id) {
        $this->db->where('id', $id);
        $this->db->set('approve_status', '0');
        $query = $this->db->update('product_detail');
        return true;
    }
    
    
     function approve_prod($id) {
        $this->db->where('id', $id);
        $this->db->set('approve_status', '1');
        $this->db->set('noti_status', 0);
        $query = $this->db->update('product_detail');
        return true;
    }


      function fetch_products() {
        $this->db->where('status', '1');
        $query = $this->db->get('product_detail');
        return $query->result();
    }
    
     function fetch_product_colour() {

        $query = $this->db->get('colour');
        return $query->result();
    }
    
    
    
//******************************************************manage excel sheet ***********************************************************//

  function manage_excelsheet() {
        //$this->db->where('status', 1);
        $query = $this->db->get('user_registration');
        return $query->result();
    }
    
    

   public function find_users(){
	   
       // $this->load->helper('excel_helper');
        $str = "SELECT * FROM user_registration";

        $query = $this->db->query($str);
        $result = $query->result();

        $users = array();
        foreach ($result as $r){

            $user = array(
                'id'  => $r->id,
                'dealerrID'   => $r->dealerrID,
                'firstname'      => $r->firstname,
                'lastname'      => $r->lastname,
                'email'      => $r->email,
                'store'      => $r->store
                    );

                $users[] = $user;
          }

        

        return $users;

    } 
  
//*********************************************************andrew profile view**********************************************************//
    
    function fetch_profile_andrew($id){
	
	$this->db->where('id',$id);
	$query = $this->db->get('profile');
	
    return $query->result();
   }
   
///**********************************************************end***********************************************************///
}
?>
