<?php

class Category extends CI_Controller {

 public function __construct(){
		parent::__construct();
			
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		$this->load->model('Get_category_model');
		$this->load->model('Insert_category_model');
		$this->load->model('Update_category_model');
		$this->load->model('Delete_category_model');
		$this->load->model('Insert_category_model');
                $this->load->model('Get_model');
		//$this->load->model('Get_model');
		
        $this->load->model('Insert_model');
                
                

 //***************************************************end code********************************************************************//          
		
	
		} 
	
	
	public function index()
	{
	
	         $data['prod'] = $this->Insert_model->count_prod_not();
             $data['user'] = $this->Insert_model->count_user_not();
             $data['admin_profile'] = $this->Get_model->get_admin_profile();
             $this->load->view('admin/add_category',$data); 
	
	}
	
	
	public function Add(){
		
		 if (!empty($_FILES)) {
        $tempFile = $_FILES['selectedfile']['tmp_name'];
        $fileName = $_FILES['selectedfile']['name'];
        $targetPath = getcwd() . '/uploads/';
        $targetFile = $targetPath . $fileName ;
        move_uploaded_file($tempFile, $targetFile);
        ///echo $fileName; die;
        
				$data = array(
				'category_name' => $this->input->post('name'),
				'category_description' => $this->input->post('description'),
				'category_image' => $fileName,
				'status' => 1
               );
               //print_r($data);die;
			$this->Insert_category_model->insert_category($data);
			$msg['message'] = "Category Added Successfully";
                         $data['prod'] = $this->Insert_model->count_prod_not();
                        $data['user'] = $this->Insert_model->count_user_not();
                        $data['admin_profile'] = $this->Get_model->get_admin_profile();
			
		    //$data['category'] = $this->Get_category_model->fetch_category();

		    $this->load->view('admin/add_category',$msg,$data);

	   }

   }
	
	
	public function manage_category(){
		
		$data['category'] = $this->Get_category_model->fetch_category();
                $data['prod'] = $this->Insert_model->count_prod_not();
                $data['user'] = $this->Insert_model->count_user_not();
                $data['admin_profile'] = $this->Get_model->get_admin_profile();
		$this->load->view("admin/manage_category",$data);
	}
	
	
	public function edit_category(){
		
		 $id = $this->uri->segment(3);
		$data['category']= $this->Get_category_model->edit_category($id);
                $data['prod'] = $this->Insert_model->count_prod_not();
                $data['user'] = $this->Insert_model->count_user_not();
                $data['admin_profile'] = $this->Get_model->get_admin_profile();
		$this->load->view("admin/edit_category",$data);
		
	}
	
	public function update_category(){
		
		$id = $this->input->post('id');
		$data = array(
		'category_name' => $this->input->post('category_name'),
		'category_description' => $this->input->post('description'),
		//'category_image' => $fileName,
		//$data['selectedfile'] = $this->Get_category_model->fetch_category()
		//'date' => date("Y-m-d ")
);
		$this->Update_category_model->update_category($id,$data);
		$this->session->set_flashdata('message','category Updated Successfully');
		redirect('category/manage_category');

	}
	
	
	public function delete_category(){
		
		 $id = $this->uri->segment(3);
		 $this->Delete_category_model->delete_category($id);
		 $this->session->set_flashdata('message','category Deleted Successfully');
		redirect('category/manage_category');
	}
	
	///echo $this->last_query();die('kailash');
	
  ///********************************************end************************************************///	
  
 public function sub_category(){
		
	
        $data['category'] = $this->Get_category_model->fetch_category();
				 
			$msg['message'] = "";
			//print_r($data);
		    //$data['category'] = $this->Get_category_model->sub_category();
                        $data['prod'] = $this->Insert_model->count_prod_not();
                        $data['user'] = $this->Insert_model->count_user_not();
                        $data['admin_profile'] = $this->Get_model->get_admin_profile();
		    $this->load->view('admin/sub_category',$data);

	   

   }
   public function add_sub_category(){
	   
	   $data = array(
				'main_category_id' => $this->input->post('category_name'),
				'sub_category_name' => $this->input->post('sub_category'),
			    'sub_category_description' => $this->input->post('sub_category_description'),
			    'sub_category_image' => $this->input->post('sub_category_image'),
				'status' => 1
                );
               //print_r($data);die;
			$this->Insert_category_model->insert_sub_category($data);
			//print_r($data);
		$this->session->set_flashdata('message','subcategory added Successfully');

			  $data['category'] = $this->Get_category_model->fetch_category();
                          $data['prod'] = $this->Insert_model->count_prod_not();
                          $data['user'] = $this->Insert_model->count_user_not();
                          $data['admin_profile'] = $this->Get_model->get_admin_profile();
			$this->load->view('admin/sub_category',$data);
			}
			
			
			
	public function manage_sub_category(){
		
		$data['subcategory'] = $this->Get_category_model->manage_sub_category();
                $data['prod'] = $this->Insert_model->count_prod_not();
                $data['user'] = $this->Insert_model->count_user_not();
                $data['admin_profile'] = $this->Get_model->get_admin_profile();
		$this->load->view("admin/manage_sub_category",$data);
	}		
	
	
	
	
	
	
	public function edit_sub_category(){
		
		 $id = $this->uri->segment(3);
		$data['subcategory']= $this->Get_category_model->edit_sub_category($id);
                $data['prod'] = $this->Insert_model->count_prod_not();
                $data['user'] = $this->Insert_model->count_user_not();
                $data['admin_profile'] = $this->Get_model->get_admin_profile();
		$this->load->view("admin/edit_sub_category",$data);
		
	}
	
	public function update_sub_category(){
		
		$id = $this->input->post('id');
		$data = array(
		'sub_category_name' => $this->input->post('sub_category_name'),
		'sub_category_description' => $this->input->post('sub_category_description'),
		'sub_category_image' => $this->input->post('selectedfile')
		//'category_image' => $fileName,
		//$data['selectedfile'] = $this->Get_category_model->fetch_category()
		//'date' => date("Y-m-d ")
);
///print_r($data);die;
		$this->Update_category_model->update_sub_category($id,$data);
		$this->session->set_flashdata('message','category Updated Successfully');
		redirect('category/manage_sub_category');

	}
	
	
	public function delete_sub_category(){
		
		 $id = $this->uri->segment(3);
		 $this->Delete_category_model->delete_sub_category($id);
		 $this->session->set_flashdata('message','category Deleted Successfully');
		redirect('category/manage_sub_category');
	}
///**********************************************Manage products**************************************************///

   public function view_product(){
		if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
           $id = $this->uri->segment(3);
	       $data['allproductID'] = $this->Get_category_model->fetch_product($id);
	       $data['prod'] = $this->Insert_model->count_prod_not();
           $data['user'] = $this->Insert_model->count_user_not();
           $data['admin_profile'] = $this->Get_model->get_admin_profile();
	      // print_r($data);
		   $this->load->view("admin/view_product",$data);
	}
	
}



public function edit_product(){
		
		$id = $this->uri->segment(3);
		$data['productid']= $this->Get_category_model->edit_product($id);
        $data['prod'] = $this->Insert_model->count_prod_not();
        $data['user'] = $this->Insert_model->count_user_not();
        $data['admin_profile'] = $this->Get_model->get_admin_profile();
		$this->load->view("admin/edit_product",$data);
		
	}



public function update_product(){
		
		$id = $this->input->post('id');
		$data = array(
		'added_by_id' => $this->input->post('added_by_id'),
		'product_name' => $this->input->post('product_name'),
		//'category_image' => $fileName,
		//$data['selectedfile'] = $this->Get_category_model->fetch_category()
		//'date' => date("Y-m-d ")
);
		$this->Update_category_model->update_product($id,$data);
		$this->session->set_flashdata('message','Product Updated Successfully');
		redirect('admin/manage_products');

	}

///**********************************************manage dealers**************************************************///


public function edit_user(){
		
		 $id = $this->uri->segment(3);
		$data['dealers']= $this->Get_category_model->fetch_dealer($id);
               // $data['prod'] = $this->Insert_model->count_prod_not();
                //$data['user'] = $this->Insert_model->count_user_not();
		$this->load->view("admin/edit_dealers",$data);
		
	}
	
	public function update_dealers(){
		
		$id = $this->input->post('id');
		$data = array(
		'dealerrID' => $this->input->post('dealerrID'),
		'firstname' => $this->input->post('firstname'),
		'lastname' => $this->input->post('lastname'),
		'email' => $this->input->post('email'),
		'store' => $this->input->post('store'),
		//'category_image' => $fileName,
		//$data['selectedfile'] = $this->Get_category_model->fetch_category()
		//'date' => date("Y-m-d ")
);
///print_r($data);die;
		$this->Update_category_model->update_dealer($id,$data);
		$this->session->set_flashdata('message','category Updated Successfully');
		redirect('admin/manage_dealers');

	}
	
	
	
	 public function view_user(){
		if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
            $id = $this->uri->segment(3);
	       $data['allprofileviewID'] = $this->Get_category_model->fetch_profile($id);
               $data['dealers']= $this->Get_category_model->fetch_dealer($id);
	      // print_r($data);
                   $data['prod'] = $this->Insert_model->count_prod_not();
                   $data['user'] = $this->Insert_model->count_user_not();
                   $data['admin_profile'] = $this->Get_model->get_admin_profile();
		   $this->load->view("admin/profile_view",$data);
	}
        
        
	
}
public function view_user_delete()
        {
            if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
            $id = $this->uri->segment(3);
	       $data['allprofileviewID'] = $this->Get_category_model->fetch_profile($id);
               $data['dealers']= $this->Get_category_model->fetch_dealer($id);
	      // print_r($data);
                   $data['prod'] = $this->Insert_model->count_prod_not();
                   $data['user'] = $this->Insert_model->count_user_not();
                   $data['admin_profile'] = $this->Get_model->get_admin_profile();
		   $this->load->view("admin/profile_view",$data);
	}
    }
	
	
	
	
	

///**********************************************manage sellers**************************************************///


public function edit_seller(){
		
		 $id = $this->uri->segment(3);
		$data['sellers']= $this->Get_category_model->fetch_seller($id);
               // $data['prod'] = $this->Insert_model->count_prod_not();
                //$data['user'] = $this->Insert_model->count_user_not();
		$this->load->view("admin/edit_sellers",$data);
		
	}
	
	
	
	
	public function profile_user(){
		if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
            $id = $this->uri->segment(3);
	       $data['seller'] = $this->Get_category_model->fetch_seller_profile($id);
           $data['dealers']= $this->Get_category_model->fetch_dealer($id);
	         // print_r($data);
                   $data['prod'] = $this->Insert_model->count_prod_not();
                   $data['user'] = $this->Insert_model->count_user_not();
                   $data['admin_profile'] = $this->Get_model->get_admin_profile();
		   $this->load->view("admin/seller_profile",$data);
	}      
	
}
	

	
	public function update_seller(){
		
		$id = $this->input->post('id');
		$data = array(
		'firstname' => $this->input->post('firstname'),
		'lastname' => $this->input->post('lastname'),
		'email' => $this->input->post('email'),
		//'category_image' => $fileName,
		//$data['selectedfile'] = $this->Get_category_model->fetch_category()
		//'date' => date("Y-m-d ")
);
///print_r($data);die;
		$this->Update_category_model->update_dealer($id,$data);
		$this->session->set_flashdata('message','sellers Updated Successfully');
		redirect('admin/manage_sellers');

	}
	
	
	
	    
	    
	    public function user_profile(){
		if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
            $id = $this->uri->segment(3);
	       $data['sellers'] = $this->Get_category_model->fetch_view_profile($id);
           $data['sellerss']= $this->Get_category_model->fetch_seller($id);
	      // print_r($data);
                   $data['prod'] = $this->Insert_model->count_prod_not();
                   $data['user'] = $this->Insert_model->count_user_not();
                   $data['admin_profile'] = $this->Get_model->get_admin_profile();
		   $this->load->view("admin/user_profile",$data);
	} 
	
	
  }

//*********************************user category**************manage dealers viewproduct approved and unapproved function*****************************************//

public function approve_user()
                {
                    if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
                                                    $id = $this->uri->segment(3);
                                                    $this->Get_category_model->approve_user($id);
                                                    $type = $this->uri->segment(4);
                                                    $get_email = $this->Insert_category_model->usremaill($id);
                                                        $this->load->library('email');
                                                        date_default_timezone_set("Asia/Kolkata");
                                                        $this->email->from('Riftraff admin');
                                                        $this->email->to($get_email[0]->email);
                                                        $this->email->subject('Email approved');

                                                        $this->email->message("Hi ".$get_email[0]->email .", You have been approved for login with riftraff site. " );
                                                        $this->email->send();
                 
                                                    if($type == 'dealer')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_dealers();
                                                        redirect('admin/manage_dealers',$data);
                                                    }
                                                    else if($type == 'seller')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_sellers();
                                                        redirect('admin/manage_sellers',$data);
                                                    }
                                                    else {
                                                        $data['users'] = $this->Get_category_model->fetch_users();
                                                        redirect('admin/manage_user',$data);
                                                    }
                                                      
                                                }
                                           }     
                                                
                                                
                public function unapprove_user()
                {
                    if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
                                                    $id = $this->uri->segment(3);
                                                    $this->Get_category_model->unapprove_user($id);
                                                    $type = $this->uri->segment(4);
                                                        $get_email = $this->Insert_category_model->usremaill($id);
                                                        $this->load->library('email');
                                                        date_default_timezone_set("Asia/Kolkata");
                                                        $this->email->from('Riftraff admin');
                                                        $this->email->to($get_email[0]->email);
                                                        $this->email->subject('Email Unapproved');

                                                        $this->email->message("Hi ".$get_email[0]->email .", You have been unapproved for login with riftraff site. " );
                                                        $this->email->send();
                                                    if($type == 'dealer')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_dealers();
                                                        redirect('admin/manage_dealers',$data);
                                                    }
                                                    else if($type == 'seller')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_sellers();
                                                        redirect('admin/manage_sellers',$data);
                                                    }
                                                    else {
                                                        $data['users'] = $this->Get_category_model->fetch_users();
                                                        redirect('admin/manage_user',$data);
                                                    }
                                                      
                                                }
                }                                                
                
//*********************user category*****************manage seller page viewproduct approved and unapproved function*********************************//

       public function approve_users()
                {
                    if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
                                                    $id = $this->uri->segment(3);
                                                    $this->Get_category_model->approve_users($id);
                                                    $type = $this->uri->segment(4);
                                                    $get_email = $this->Insert_category_model->usremaill($id);
                                                        $this->load->library('email');
                                                        date_default_timezone_set("Asia/Kolkata");
                                                        $this->email->from('Riftraff admin');
                                                        $this->email->to($get_email[0]->email);
                                                        $this->email->subject('Email approved');

                                                        $this->email->message("Hi ".$get_email[0]->email .", You have been approved for login with riftraff site. " );
                                                        $this->email->send();
                 
                                                    if($type == 'dealer')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_seller_profile();
                                                        redirect('admin/manage_dealers',$data);
                                                    }
                                                    else if($type == 'seller')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_sellerss();
                                                        redirect('admin/manage_user',$data);
                                                    }
                                                    else {
                                                        $data['users'] = $this->Get_category_model->fetch_userss();
                                                        redirect('admin/manage_sellers',$data);
                                                    }
                                                      
                                                }
                                           }     
                                                
                                                
                public function unapprove_users()
                {
                    if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
                                                    $id = $this->uri->segment(3);
                                                    $this->Get_category_model->unapprove_users($id);
                                                    $type = $this->uri->segment(4);
                                                        $get_email = $this->Insert_category_model->usremaill($id);
                                                        $this->load->library('email');
                                                        date_default_timezone_set("Asia/Kolkata");
                                                        $this->email->from('Riftraff admin');
                                                        $this->email->to($get_email[0]->email);
                                                        $this->email->subject('Email Unapproved');

                                                        $this->email->message("Hi ".$get_email[0]->email .", You have been unapproved for login with riftraff site. " );
                                                        $this->email->send();
                                                    if($type == 'dealer')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_seller_profile();
                                                        redirect('admin/manage_dealers',$data);
                                                    }
                                                    else if($type == 'seller')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_sellerss();
                                                        redirect('admin/manage_user',$data);
                                                    }
                                                    else {
                                                        $data['users'] = $this->Get_category_model->fetch_userss();
                                                        redirect('admin/manage_sellers',$data);
                                                    }
                                                      
                                                }
                }
               
//************************************************view_dealer_inventory****************************************************************//


        public function view_dealer_inventory(){
		if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
            $id = $this->uri->segment(3);
	       $data['allprofileviewID'] = $this->Get_category_model->fetch_profile($id);
           $data['dealers']= $this->Get_category_model->fetch_dealer($id);
	      // print_r($data);
                   $data['prod'] = $this->Insert_model->count_prod_not();
                   $data['user'] = $this->Insert_model->count_user_not();
                   $data['admin_profile'] = $this->Get_model->get_admin_profile();
		   $this->load->view("admin/view_dealer_inventory",$data);
	}
        
        
	
}

                       
//***************************manage_dealer_inventory page viewproduct approved and unapproved function*********************************// 


        
          public function approve_dealer()
                {
                    if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
                                                    $id = $this->uri->segment(3);
                                                    $this->Get_category_model->approve_dealer($id);
                                                    $type = $this->uri->segment(4);
                                                    $get_email = $this->Insert_category_model->usremaill($id);
                                                        $this->load->library('email');
                                                        date_default_timezone_set("Asia/Kolkata");
                                                        $this->email->from('Riftraff admin');
                                                        $this->email->to($get_email[0]->email);
                                                        $this->email->subject('Email approved');

                                                        $this->email->message("Hi ".$get_email[0]->email .", You have been approved for login with riftraff site. " );
                                                        $this->email->send();
                 
                                                    if($type == 'dealer')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_dealer_profile();
                                                        redirect('admin/manage_dealer_inventory',$data);
                                                    }
                                                    else if($type == 'seller')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_dealer_inventory();
                                                        redirect('admin/manage_user',$data);
                                                    }
                                                    else {
                                                        $data['users'] = $this->Get_category_model->fetch_dealers_inventory();
                                                        redirect('admin/manage_sellers',$data);
                                                    }
                                                      
                                                }
                                           }     
                                                
                                                
                public function unapprove_dealer()
                {
                    if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
                                                    $id = $this->uri->segment(3);
                                                    $this->Get_category_model->unapprove_dealer($id);
                                                    $type = $this->uri->segment(4);
                                                        $get_email = $this->Insert_category_model->usremaill($id);
                                                        $this->load->library('email');
                                                        date_default_timezone_set("Asia/Kolkata");
                                                        $this->email->from('Riftraff admin');
                                                        $this->email->to($get_email[0]->email);
                                                        $this->email->subject('Email Unapproved');

                                                        $this->email->message("Hi ".$get_email[0]->email .", You have been unapproved for login with riftraff site. " );
                                                        $this->email->send();
                                                        
                                                        
                                                   if($type == 'dealer')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_dealer_profile();
                                                        redirect('admin/manage_dealer_inventory',$data);
                                                    }
                                                    else if($type == 'seller')
                                                    {
                                                        $data['users'] = $this->Get_category_model->fetch_dealer_inventory();
                                                        redirect('admin/manage_user',$data);
                                                    }
                                                    else {
                                                        $data['users'] = $this->Get_category_model->fetch_dealers_inventory();
                                                        redirect('admin/manage_sellers',$data);
                                                    }
                                                      
                                                }
                                           }     

//***********************************************************manage seller inventory *************************************************//

        public function view_seller_inventory(){
		if(!isset($this->session->userdata['logged_in_admin'])){
							redirect('admin/loginform');
							
						}else{
           $id = $this->uri->segment(3);
	       $data['allproductID'] = $this->Get_category_model->fetch_product($id);
	       $data['prod'] = $this->Insert_model->count_prod_not();
           $data['user'] = $this->Insert_model->count_user_not();
           $data['admin_profile'] = $this->Get_model->get_admin_profile();
	      // print_r($data);
		   $this->load->view("admin/view_seller_inventory",$data);
	}	
}                                                               
                       
//***************************manage_seller_inventory page viewproduct approved and unapproved function*********************************//

 public function approve_seller() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Get_category_model->approve_prod($id);
            $data['allproducts'] = $this->Get_category_model->fetch_products();
            $data['colours'] = $this->Get_category_model->fetch_product_colour();
            $data['prod'] = $this->Insert_category_model->count_prod_not();
            $data['user'] = $this->Insert_category_model->count_user_not();
            $get_email = $this->Insert_category_model->usremail($id);
            $this->load->library('email');
            date_default_timezone_set("Asia/Kolkata");
            $this->email->from('Riftraff admin');
            $this->email->to($get_email[0]->email);
            $this->email->subject('Product approved');

            $this->email->message("Hi " . $get_email[0]->email . ", Your product has been approved. ");
            if ($this->email->send()) {
                redirect('admin/manage_seller_inventory', $data);
            }
        }
    }

    public function unapprove_seller() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Get_category_model->unapprove_prod($id);
            $data['allproducts'] = $this->Get_category_model->fetch_products();
            $data['colours'] = $this->Get_category_model->fetch_product_colour();
            $data['prod'] = $this->Insert_category_model->count_prod_not();
            $data['user'] = $this->Insert_category_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $get_email = $this->Insert_category_model->usremail($id);
            $this->load->library('email');
            date_default_timezone_set("Asia/Kolkata");
            $this->email->from('Riftraff admin');
            $this->email->to($get_email[0]->email);
            $this->email->subject('Product Unapproved');

            $this->email->message("Hi " . $get_email[0]->email . ", Your product has been unapproved. ");
            if ($this->email->send()) {
                redirect('admin/manage_seller_inventory', $data);
            }
        }
    }

//*********************************************************excelsheet download code*************************************************//

        public function manage_excelsheet() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {


            $data['usersss'] = $this->Get_category_model->manage_excelsheet();
           // $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_excelsheet", $data); 
        }
    }       
    
    
      
      
      public function excelsheet_download()
    {
        $this->load->helper('excel_helper');
        //$export = create_excel_export();
        $data = $this->Get_category_model->find_users();

        $filename = $export['filename'];
        $headers = $export['headers'];
        $data = $export['data'];
        header("Content-disposition: attachment; filename=".$filename." ".date("Y-m-d").".xls");
        header("Content-Type: application/vnd.ms-excel");

        print "$headers\n$data";

} 
 

//********************************************andrew user profile**********************************************************************//

         //public function add_profile_an(){
		//if(!isset($this->session->userdata['logged_in_admin'])){
							//redirect('admin/loginform');
							
						//}else{
           //$id = $this->uri->segment(3);
	       //$data['profile'] = $this->Get_category_model->fetch_profile_andrew($id);
	       //$data['prod'] = $this->Insert_model->count_prod_not();
           //$data['user'] = $this->Insert_model->count_user_not();
	      //// print_r($data);
		   //$this->load->view("admin/add_profile_an",$data);
	//}
	
//}


   public function add_profile_an(){
		
        
				$data = array(
				
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'contact' => $this->input->post('contact'),
				'birthday' => $this->input->post('birthday'),
				'address' => $this->input->post('address'),
				'note' => $this->input->post('note'),
				//'email' => $fileName,
				//'status' => 1
               );
               //print_r($data);die;
			$this->Insert_category_model->insert_profile_ann($data);
			$msg['message'] = "profile Added Successfully";
                        $data['prod'] = $this->Insert_model->count_prod_not();
                        $data['user'] = $this->Insert_model->count_user_not();
                        $data['admin_profile'] = $this->Get_model->get_admin_profile();
			
		    //$data['category'] = $this->Get_category_model->fetch_category();

		    $this->load->view('admin/add_profile_an',$msg,$data);

	   }

  
                                        

///**********************************************end**************************************************///

}
