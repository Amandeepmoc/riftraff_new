<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->library('form_validation');

        $this->load->library('session');

        $this->load->model('Get_model');
        $this->load->model('Insert_admin_model');
        $this->load->model('Insert_model');
        $this->load->model('Update_admin_model');
        $this->load->model('Delete_admin_model');
        $this->load->model('Get_attribute_model');
    }

    public function index() {
        error_reporting(0);
        // $data['result'] = 	$this->Get_model->get_login();
        //$this->load->view('admin/login',$data);
        $data['prod'] = $this->Insert_model->count_prod_not();
        $data['user'] = $this->Insert_model->count_user_not();
        $data['admin_profile'] = $this->Get_model->get_admin_profile();
        $this->load->view('admin/login', $data);
    }

    public function addattr() {
        error_reporting(0);
        // $data['result'] = 	$this->Get_model->get_login();
        //$this->load->view('admin/login',$data);
        $this->load->view('admin/addattr');
    }

    public function loginform() {
        if (isset($this->session->userdata['logged_in_admin'])) {
            //echo $this->session->userdata['logged_in_admin'];
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view('admin/index', $data);
        } else {
            $username = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->Get_model->get_login($username, $password);
            //print_r($result);
            if ($result == TRUE) {
                $this->session->set_userdata('logged_in_admin', $username, $password);
                $data['prod'] = $this->Insert_model->count_prod_not();
                $data['user'] = $this->Insert_model->count_user_not();
                $data['admin_profile'] = $this->Get_model->get_admin_profile();

                // $this->session->userdata('logged_in_prod');
                //die();

                $this->load->view('admin/index', $data);
            } elseif ($username == "") {
                $this->session->set_flashdata('message', 'Please Login First');
                $this->load->view('admin/login');
            } else {
                $this->session->set_flashdata('message', 'Invalid Username or Password');
                $this->load->view('admin/login');
            }
        }
    }

    public function logout() {
//		$sess_array = array(
//		
//				'username' => ' '
//				);
//				$this->session->unset_userdata('logged_in_admin', $sess_array);
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', 'Successfully Logout');

        redirect('admin/loginform');
    }

    public function add_brands() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/add_brands", $data);
        }
    }

    public function add_attributes() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['attrubuteSets'] = $this->Get_attribute_model->get_atts();

            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/add_attributes", $data);
        }
    }
    
    public function manage_payment()
    {
         if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
           $data['payment'] = $this->Get_model->getCheckoutData();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_payment", $data);
        }
    }
    
      public function manage_payment_with_dealer()
    {
         if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['payment'] = $this->Get_model->fetchorderDoneAdmin();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_payment_done", $data);
        }
    }

    public function edit_attribute() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $d = $this->uri->segment(3);
            $data['ii'] = $this->Get_attribute_model->get_att_v($d);
            $data['attrubuteSets'] = $this->Get_attribute_model->get_atts();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/edit_attribute", $data);
        }
    }

    public function edit_attributess() {
        //print_r($_POST);
        //die();
        $l = $this->input->post('last');
        $ss = implode(',', $this->input->post('mytext'));
        $id = $this->input->post('a_id');
        $old_set = $this->input->post('old_Set');
        $new_set = $this->input->post('att_sort');
        $attribute_set_id = $this->input->post('att_set');
        $data = array(
            'attribute_code' => $this->input->post('att_code'),
            'attribute_label' => $this->input->post('att_label'),
            'attribute_set_id' => $this->input->post('att_set'),
            'attribute_type' => $this->input->post('att_type'),
            'dropdown_value' => $ss,
            'visibility_on_front' => $this->input->post('visibility'),
            'required' => $this->input->post('req'),
            'sort' => $this->input->post('att_sort'),
            'status' => 1
        );

        $this->Get_attribute_model->update_attss($attribute_set_id, $old_set, $new_set);
        $this->Get_attribute_model->update_atts($id, $data);

        redirect("admin/$l");
    }

    public function delete_attribute() {
        $id = $this->uri->segment(3);
        $l = $this->uri->segment(4);
        $this->Get_attribute_model->delete_attibute($id);
        redirect("admin/$l");
    }

    public function view_format() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['cats'] = $this->Get_model->all_cats();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/view_format", $data);
        }
    }

    public function view_method() {
        $idd = $this->input->post('cat');
        $all = $this->Get_model->fetch_csv($idd);
        foreach ($all as $d) {
            $dataa[] = $d->attribute_code;
        }
        //echo "<pre>";
        //print_r($dataa);
        // die();
        if ($idd == 38) {
            $filename = "guitars.csv";
            header("Content-Type: application/octet-stream");
            header('Location: /Sample/guitars.csv');
        } else if ($idd == 39) {
            header("Content-Type: application/octet-stream");
            header('Location: /Sample/amps.csv');
        } else if ($idd == 42) {

            header("Content-Type: application/octet-stream");
            header('Location: /Sample/pedals.csv');
        } else {
            header("Content-Type: application/octet-stream");
            header('Location: /Sample/ukuleles.csv');
        }
    }

    public function importt() {
        echo $filename = $_FILES["file"]["tmp_name"];


        if ($_FILES["file"]["size"] > 0) {
            $file = fopen($filename, "r");
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                $emapDataa[] = $emapData;
            }
            for ($i = 0; $i < count($emapDataa); $i++) {
                if ($i > 10) {
                    $cat = $this->Get_model->catid($emapDataa[$i][7]);
                    $catt = $cat[0]->id;
                    if ($catt != '') {
                        if ($emapDataa[$i][7] == 'Guitar') {
                            if ($emapDataa[$i][8] != '') {
                                $subcat = $this->Get_model->subcatid($emapDataa[$i][8]);
                                $subcatt = $subcat[0]->id;
                            } else {
                                $subcatt = '';
                            }
                            $data = array(
                                "added_by_id" => '1',
                                "product_name" => '',
                                "category_id" => $catt,
                                "sub_category_id" => $subcatt,
                                "status" => 1,
                                "approve_status" => 0,
                                "noti_status" => 1
                            );
                            $idd = $this->Insert_model->add_product($data);
                            $alldata = $this->Get_model->getatts($catt);
                            $aa = count($alldata);
                            $d = 2;
                            for ($k = 0; $k < $aa; $k++) {

                                if ($d == 7) {
                                    $d = 9;
                                }
//                                echo "<br>";
//                                echo $alldata[$k]->attribute_code ."====" .$emapDataa[$i][$d];
//                                echo "<br>";
                                $cc = array_key_exists("$d", $emapDataa[$i]);
                                if ($cc == 1) {
                                    $data = array(
                                        'product_id' => $idd,
                                        'attribute_id' => $alldata[$k]->attribute_code,
                                        'attribute_value' => $emapDataa[$i][$d]
                                    );
                                } else {
                                    $data = array(
                                        'product_id' => $idd,
                                        'attribute_id' => $alldata[$i]->attribute_code,
                                        'attribute_value' => ''
                                    );
                                }
                                $this->Insert_model->insert_product_attributes($data);
                                $d++;
                            }
                        } elseif ($emapDataa[$i][7] == 'Amps & Cabinets') {
                            if ($emapDataa[$i][8] != '') {
                                $subcat = $this->Get_model->subcatid($emapDataa[$i][8]);
                                $subcatt = $subcat[0]->id;
                            } else {
                                $subcatt = '';
                            }
                            $data = array(
                                "added_by_id" => '1',
                                "product_name" => '',
                                "category_id" => $catt,
                                "sub_category_id" => $subcatt,
                                "status" => 1,
                                "approve_status" => 0,
                                "noti_status" => 1
                            );
                            $idd = $this->Insert_model->add_product($data);
                            $alldata = $this->Get_model->getatts($catt);
                            $aa = count($alldata);
                            $d = 2;
                            for ($k = 0; $k < $aa; $k++) {

                                if ($d == 7) {
                                    $d = 9;
                                }
//                                echo "<br>";
//                                echo $alldata[$k]->attribute_code ."====" .$emapDataa[$i][$d];
//                                echo "<br>";
                                $cc = array_key_exists("$d", $emapDataa[$i]);
                                if ($cc == 1) {
                                    $data = array(
                                        'product_id' => $idd,
                                        'attribute_id' => $alldata[$k]->attribute_code,
                                        'attribute_value' => $emapDataa[$i][$d]
                                    );
                                } else {
                                    $data = array(
                                        'product_id' => $idd,
                                        'attribute_id' => $alldata[$i]->attribute_code,
                                        'attribute_value' => ''
                                    );
                                }
                                $this->Insert_model->insert_product_attributes($data);
                                $d++;
                            }
                        } elseif ($emapDataa[$i][7] == 'Pedals') {
                            if ($emapDataa[$i][8] != '') {
                                $subcat = $this->Get_model->subcatid($emapDataa[$i][8]);
                                $subcatt = $subcat[0]->id;
                            } else {
                                $subcatt = '';
                            }
                            $data = array(
                                "added_by_id" => '1',
                                "product_name" => '',
                                "category_id" => $catt,
                                "sub_category_id" => $subcatt,
                                "status" => 1,
                                "approve_status" => 0,
                                "noti_status" => 1
                            );
                            $idd = $this->Insert_model->add_product($data);
                            $alldata = $this->Get_model->getatts($catt);
                            $aa = count($alldata);
                            $d = 2;
                            for ($k = 0; $k < $aa; $k++) {

                                if ($d == 7) {
                                    $d = 9;
                                }
//                                echo "<br>";
//                                echo $alldata[$k]->attribute_code ."====" .$emapDataa[$i][$d];
//                                echo "<br>";
                                $cc = array_key_exists("$d", $emapDataa[$i]);
                                if ($cc == 1) {
                                    $data = array(
                                        'product_id' => $idd,
                                        'attribute_id' => $alldata[$k]->attribute_code,
                                        'attribute_value' => $emapDataa[$i][$d]
                                    );
                                } else {
                                    $data = array(
                                        'product_id' => $idd,
                                        'attribute_id' => $alldata[$i]->attribute_code,
                                        'attribute_value' => ''
                                    );
                                }
                                $this->Insert_model->insert_product_attributes($data);
                                $d++;
                            }
                        } else {
                            if ($emapDataa[$i][8] != '') {
                                $subcat = $this->Get_model->subcatid($emapDataa[$i][8]);
                                $subcatt = $subcat[0]->id;
                            } else {
                                $subcatt = '';
                            }
                            $data = array(
                                "added_by_id" => '1',
                                "product_name" => '',
                                "category_id" => $catt,
                                "sub_category_id" => $subcatt,
                                "status" => 1,
                                "approve_status" => 0,
                                "noti_status" => 1
                            );
                            $idd = $this->Insert_model->add_product($data);
                            $alldata = $this->Get_model->getatts($catt);
                            $aa = count($alldata);
                            $d = 2;
                            for ($k = 0; $k < $aa; $k++) {

                                if ($d == 7) {
                                    $d = 9;
                                }
//                                echo "<br>";
//                                echo $alldata[$k]->attribute_code ."====" .$emapDataa[$i][$d];
//                                echo "<br>";
                                $cc = array_key_exists("$d", $emapDataa[$i]);
                                if ($cc == 1) {
                                    $data = array(
                                        'product_id' => $idd,
                                        'attribute_id' => $alldata[$k]->attribute_code,
                                        'attribute_value' => $emapDataa[$i][$d]
                                    );
                                } else {
                                    $data = array(
                                        'product_id' => $idd,
                                        'attribute_id' => $alldata[$i]->attribute_code,
                                        'attribute_value' => ''
                                    );
                                }
                                $this->Insert_model->insert_product_attributes($data);
                                $d++;
                            }
                        }
                    }
                }
            }
            redirect("admin/manage_products");
        }
        redirect("admin/import");
    }

       


    public function import() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['attributes'] = $this->Get_attribute_model->fetch_attributes1();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $data['attributeSet'] = $this->Get_model->fetch_attributess(38);
            $this->load->view("admin/import", $data);
        }
    }

    public function manage_cat1() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['attributes'] = $this->Get_attribute_model->fetch_attributes1();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $data['attributeSet'] = $this->Get_model->fetch_attributess(38);
            $this->load->view("admin/manage_attribute", $data);
        }
    }

    public function manage_cat2() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['attributes'] = $this->Get_attribute_model->fetch_attributes2();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $data['attributeSet'] = $this->Get_model->fetch_attributess(39);
            $this->load->view("admin/manage_attribute", $data);
        }
    }

    public function manage_cat3() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['attributes'] = $this->Get_attribute_model->fetch_attributes3();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $data['attributeSet'] = $this->Get_model->fetch_attributess(42);
            $this->load->view("admin/manage_attribute", $data);
        }
    }

    public function admin_profile() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/admin_profile", $data);
        }
    }

    public function edit_admin() {
        //print_r($_POST);
        //die();
        //print_r($_FILES);
        $dd = 1;
        $get_status = $this->Get_model->admin_action($dd);
        if ($get_status == 0) {
            if (!empty($_FILES)) {

                $tempFile = $_FILES['img']['tmp_name'];
                $fileName = time() . $_FILES['img']['name'];
                $targetPath = getcwd() . '/admin_uploads/';
                $targetFile = $targetPath . $fileName;
                $ff = '/admin_uploads/' . $fileName;
                move_uploaded_file($tempFile, $targetFile);
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'user_image' => $ff,
                    'address' => $this->input->post('address'),
                    'website' => $this->input->post('website'),
                    'designation' => $this->input->post('desig'),
                    'gender' => $this->input->post('gender'),
                    'admin_id' => 1,
                    'status' => 1
                );
                $this->Get_model->insert_admin_image($data);
                redirect("admin/admin_profile");
            }
        } else {
            if (!empty($_FILES['img']['name'])) {
                //die('enter');
                $tempFile = $_FILES['img']['tmp_name'];
                $fileName = time() . $_FILES['img']['name'];
                $targetPath = getcwd() . '/admin_uploads/';
                $targetFile = $targetPath . $fileName;
                $ff = '/admin_uploads/' . $fileName;
                move_uploaded_file($tempFile, $targetFile);
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'user_image' => $ff,
                    'address' => $this->input->post('address'),
                    'designation' => $this->input->post('desig'),
                    'website' => $this->input->post('website'),
                    'gender' => $this->input->post('gender'),
                    'admin_id' => 1,
                    'status' => 1
                );
            } else {
                //die('not');
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'address' => $this->input->post('address'),
                    'website' => $this->input->post('website'),
                    'designation' => $this->input->post('desig'),
                    'gender' => $this->input->post('gender'),
                    'admin_id' => 1,
                    'status' => 1
                );
            }
            //die();

            $this->Get_model->update_admin_image($data, $dd);
            redirect("admin/admin_profile");
        }
    }

    public function manage_cat4() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['attributes'] = $this->Get_attribute_model->fetch_attributes4();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $data['attributeSet'] = $this->Get_model->fetch_attributess(43);
            $this->load->view("admin/manage_attribute", $data);
        }
    }

    public function add_attribute_options() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['option_id'] = $this->Get_attribute_model->get_option_id();
//         print_r($data['option_id']);
//         die();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/add_attribute_options", $data);
        }
    }

    public function add_attribute_sets() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['attrubuteSets'] = $this->Get_attribute_model->get_sets();
//         print_r($data['attrubuteSets']);
//         die();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/add_attribute_sets", $data);
        }
    }

    public function upload() {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName;
            move_uploaded_file($tempFile, $targetFile);
            // if you want to save in db,where here
            // with out model just for example
            // $this->load->database(); // load database
            // $this->db->insert('file_table',array('file_name' => $fileName));
        }
    }

    public function add_image() {


        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('brand_colour', 'Brand Colour', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', 'plesae select Brand name and Colour');
            redirect('admin/add_brands');
        } else {

            if (!empty($_FILES)) {
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = time() . $_FILES['file']['name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $fileName;
                move_uploaded_file($tempFile, $targetFile);


                $data = array(
                    'brand_id' => $this->input->post('brand_name'),
                    'colour_id' => $this->input->post('brand_colour'),
                    'image_path' => $fileName,
                    'status' => 1,
                    'date' => date("Y-m-d ")
                );
                //print_r($data);die;
                $this->Insert_admin_model->insert_brand_image($data);
                $this->session->set_flashdata('message', 'Image Added Successfully');
//redirect('admin/add_brands');
            }
        }
    }

    public function insert_brand() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
            $this->form_validation->set_rules('brand_colour', 'Brand Colour', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', 'plesae select Brand name and Colour');


                redirect('admin/add_brands');
            } else {

                $data = array(
                    'brand_name' => $this->input->post('brand_name'),
                    'status' => 1,
                    'date' => date("Y-m-d ")
                );
                //print_r($data);die;
                $this->Insert_admin_model->insert_brand($data);
                $this->session->set_flashdata('message', 'Brand Added Sucessfully');
                redirect('admin/add_brands');
            }
        }
    }

    public function insert_attribute_sets() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $this->form_validation->set_rules('set_name', 'Set name', 'required');
            $this->form_validation->set_rules('set_cat', 'category name', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', 'plesae select Brand name and Colour');


                redirect('admin/add_brands');
            } else {

                $data = array(
                    'attribute_set_name' => $this->input->post('set_name'),
                    'category_id' => $this->input->post('set_cat'),
                    'status' => 1
                );
                //print_r($data);die;
                $this->Insert_admin_model->insert_attribute_set($data);
                $this->session->set_flashdata('message', 'Attribute set Added Sucessfully');
                redirect('admin/add_attribute_sets');
            }
        }
    }

    public function insert_attribute() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $this->form_validation->set_rules('att_code', 'Attribute code', 'required');
            $this->form_validation->set_rules('att_label', 'Attribute label', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', 'plesae select Brand name and Colour');


                redirect('admin/add_brands');
            } else {
//                echo "<pre>";
//                print_r($_POST);
                // die();
                $ss = implode(',', $this->input->post('mytext'));
//                echo $ss;
//                die();
                $data = array(
                    'attribute_code' => $this->input->post('att_code'),
                    'attribute_label' => $this->input->post('att_label'),
                    'attribute_set_id' => $this->input->post('att_set'),
                    'attribute_type' => $this->input->post('att_type'),
                    'dropdown_value' => $ss,
                    'visibility_on_front' => $this->input->post('visibility'),
                    'required' => $this->input->post('req'),
                    'sort' => $this->input->post('att_sort'),
                    'status' => 1
                );
                //print_r($data);die;
                $insert_id = $this->Insert_admin_model->insert_attribute($data);
                $this->session->set_flashdata('message', 'Attribute Added Sucessfully');
                if (($this->input->post('att_set')) != '1') {
                    $data = array(
                        'attribute_set_id' => $this->input->post('att_set'),
                        'attribute_id' => $insert_id,
                        'status' => '1'
                    );
                    $this->Get_attribute_model->addatt($data);
                }


                redirect('admin/add_attributes');
            }
        }
    }

    public function insert_attribute_options() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $this->form_validation->set_rules('op_label', 'Option Label', 'required');
            $this->form_validation->set_rules('op_value', 'Option value', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', 'plesae select option label and option value');
                redirect('admin/add_attribute_options');
            } else {

                $data = array(
                    'attribute_id' => $this->input->post('attribute_id'),
                    'option_value' => $this->input->post('op_value'),
                    'option_label' => $this->input->post('op_label'),
                    'sort' => $this->input->post('sort_value'),
                    'status' => 1
                );
                //print_r($data);die;
                $this->Insert_admin_model->insert_attribute_options($data);
                $this->session->set_flashdata('message', 'Attribute option Added Sucessfully');
                redirect('admin/add_attribute_options');
            }
        }
    }

    public function insert_brand_name() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data = array(
                'brand_name' => $this->input->post('name'),
                'status' => 1,
                'date' => date("Y-m-d ")
            );
            $this->Insert_admin_model->insert_brand($data);
            $this->session->set_flashdata('message', 'Brand  Name Added Successfully');

            redirect('admin/add_brands');
        }
    }

    public function insert_brand_colour() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data = array(
                'product_colour' => $this->input->post('colour'),
                'status' => 1,
                'date' => date("Y-m-d ")
            );
            $this->Insert_admin_model->insert_colour($data);
            $this->session->set_flashdata('message', 'colour Added Successfully');

            redirect('admin/add_brands');
        }
    }

    public function manage_brands() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_brands", $data);
        }
    }

    public function manage_products() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['allproducts'] = $this->Get_model->fetch_products();
            $data['alll'] = $this->Get_model->get_product_on_dealerr();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_products", $data);
        }
    }

    public function pending_products() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['allproducts'] = $this->Get_model->fetch_products();
            $data['alll'] = $this->Get_model->fetch_products_pending();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_products", $data);
        }
    }

    public function manage_dealer_inventory() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $type = "dealer";
            $data['allproducts'] = $this->Get_model->fetch_products();
            $data['alll'] = $this->Get_model->get_product_on_dealer($type);
//            echo "<pre>";
//            print_r($all);
//            die();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_dealer_inventory", $data);
        }
    }

    public function manage_seller_inventory() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $type = 'seller';
            $data['allproducts'] = $this->Get_model->fetch_products();
            $data['alll'] = $this->Get_model->get_product_on_dealer($type);
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_seller_inventory", $data);
        }
    }

    public function manage_clearance_adds() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {


            $data['clearance'] = $this->Get_model->fetch_clearance_adds();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_clearance", $data);
        }
    }

    public function approve_products() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Get_model->approve_prod($id);
            $data['allproducts'] = $this->Get_model->fetch_products();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $get_email = $this->Insert_model->usremail($id);
            $this->load->library('email');
            date_default_timezone_set("Asia/Kolkata");
            $this->email->from('Riftraff admin');
            $this->email->to($get_email[0]->email);
            $this->email->subject('Product approved');

            $this->email->message("Hi " . $get_email[0]->email . ", Your product has been approved. ");
            if ($this->email->send()) {
                redirect('admin/manage_products', $data);
            }
        }
    }

    public function unapprove_products() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Get_model->unapprove_prod($id);
            $data['allproducts'] = $this->Get_model->fetch_products();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $get_email = $this->Insert_model->usremail($id);
            $this->load->library('email');
            date_default_timezone_set("Asia/Kolkata");
            $this->email->from('Riftraff admin');
            $this->email->to($get_email[0]->email);
            $this->email->subject('Product Unapproved');

            $this->email->message("Hi " . $get_email[0]->email . ", Your product has been unapproved. ");
            if ($this->email->send()) {
                redirect('admin/manage_products', $data);
            }
        }
    }

    public function delete_product() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Get_model->delete_product($id);
            $data['allproducts'] = $this->Get_model->fetch_products();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            redirect('admin/manage_products', $data);
        }
    }

    public function delete_user() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Get_model->delete_user($id);
            $type = $this->uri->segment(4);
            if ($type == 'dealer') {
                $data['users'] = $this->Get_model->fetch_dealers();
                $data['prod'] = $this->Insert_model->count_prod_not();
                $data['user'] = $this->Insert_model->count_user_not();
                $data['admin_profile'] = $this->Get_model->get_admin_profile();
                redirect('admin/manage_dealers', $data);
            } else if ($type == 'seller') {
                $data['users'] = $this->Get_model->fetch_sellers();
                $data['prod'] = $this->Insert_model->count_prod_not();
                $data['user'] = $this->Insert_model->count_user_not();
                $data['admin_profile'] = $this->Get_model->get_admin_profile();
                redirect('admin/manage_sellers', $data);
            } else {
                $data['users'] = $this->Get_model->fetch_users();
                $data['prod'] = $this->Insert_model->count_prod_not();
                $data['user'] = $this->Insert_model->count_user_not();
                $data['admin_profile'] = $this->Get_model->get_admin_profile();
                redirect('admin/manage_user', $data);
            }
        }
    }

    public function manage_attribute() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['attributes'] = $this->Get_attribute_model->fetch_attributes();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_attribute", $data);
        }
    }

    public function manage_attribute_sets() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['attributeSetss'] = $this->Get_attribute_model->fetch_attributes_sets();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_attribute_sets", $data);
        }
    }

    public function view_attributes() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $idd = $this->uri->segment(4);
            $data['allattributesbyID'] = $this->Get_attribute_model->fetch_attributess($id);
            $data['allattributes'] = $this->Get_attribute_model->fetch_attributess_all($id, $idd);
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/view_attributes", $data);
        }
    }

    public function default_attributes() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
//            $id = $this->uri->segment(3);
//	    $data['allattributesbyID'] = $this->Get_attribute_model->fetch_attributess($id);
            $data['allattributes'] = $this->Get_attribute_model->fetch_attributess_alll();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/default_attributes", $data);
        }
    }

    public function edit_color() {

        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $data['color'] = $this->Get_model->Fetch_single_colour($id);
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/edit_brands", $data);
            //print_r($data);
        }
    }

    public function deleteatt() {

        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Get_attribute_model->deleteatt($id);
            redirect('admin/default_attributes');
            //print_r($data);
        }
    }

    public function addatt() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $idd = $this->uri->segment(4);
            $iddd = $this->uri->segment(5);
//                 $all = $this->Get_attribute_model->fetch_id_data($id);
            $data = array(
                'attribute_set_id' => $idd,
                'attribute_id' => $id,
                'status' => 1
            );
            $this->Get_attribute_model->addatt($data);
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            redirect('admin/view_attributes/' . $idd . '/' . $iddd, $data);
            //print_r($data);
        }
    }

    public function update_color() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $id = $this->input->post('id');
            $data = array(
                'product_colour' => $this->input->post('name'),
                'date' => date("Y-m-d ")
            );
            $this->Update_admin_model->update_colors($id, $data);
            $this->session->set_flashdata('message', 'colour Updated Successfully');

            redirect('admin/manage_brands');
        }
    }

    public function delete_colour() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $id = $this->uri->segment(3);
            $this->Delete_admin_model->delete_color($id);
            $this->session->set_flashdata('message', 'colour Deleted Successfully');
            redirect('admin/manage_brands');
        }
    }

    public function edit_brand() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $id = $this->uri->segment(3);
            $data['brand'] = $this->Get_model->edit_brands($id);
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/edit_brands", $data);
        }
    }

    public function edit_clearance() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $id = $this->uri->segment(3);
            $data['clearr'] = $this->Get_model->edit_clearance($id);
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/edit_clearance", $data);
        }
    }

    public function update_clearance() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            if (!empty($_FILES['fimg']['name'])) {
                $tempFile = $_FILES['fimg']['tmp_name'];
                $fileName = time() . $_FILES['fimg']['name'];
                $targetPath = getcwd() . '/images/index/';
                $targetFile = $targetPath . $fileName;
                move_uploaded_file($tempFile, $targetFile);
                $path = '/images/index/' . $fileName;
            } else {
                $path = $this->input->post('old_image');
            }
//            echo $path;
//            die();
            $id = $this->input->post('id');
            $data = array(
                'product_name' => $this->input->post('pname'),
                'dealer_link' => $this->input->post('dealer_link'),
                'price' => $this->input->post('price'),
                'image_path' => $path
            );
            $this->Get_model->update_clearance($id, $data);
            $this->session->set_flashdata('message', 'Data Updated Successfully');
            redirect('admin/manage_clearance_adds');
        }
    }

    public function update_brand() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->input->post('id');
            $data = array(
                'brand_name' => $this->input->post('brand_name'),
                'date' => date("Y-m-d ")
            );
            $this->Update_admin_model->update_brands($id, $data);
            $this->session->set_flashdata('message', 'Brand Updated Successfully');
            redirect('admin/manage_brands');
        }
    }

    public function delete_brand() {

        $id = $this->uri->segment(3);
        $this->Delete_admin_model->delete_brands($id);
        $this->session->set_flashdata('message', 'Brand Deleted Successfully');
        redirect('admin/manage_brands');
    }

    public function brand_images() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);

            $data['brand_images'] = $this->Get_model->fetch_brand_images($id);
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/brand_images", $data);
        }
    }

    public function manage_user() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['users'] = $this->Get_model->fetch_users();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            //print_r($data);die;
            $this->load->view("admin/manage_user", $data);
        }
    }

    public function pending_users() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['users'] = $this->Get_model->fetch_users_pending();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            //print_r($data);die;
            $this->load->view("admin/manage_user", $data);
        }
    }

    public function manage_dealers() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['users'] = $this->Get_model->fetch_dealers();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            // print_r($data);die();
            $this->load->view("admin/manage_dealers", $data);
        }
    }

    public function manage_dealers_trash() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['users'] = $this->Get_model->fetch_dealers_trash();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            //print_r($data);die;
            $this->load->view("admin/manage_dealers_trash", $data);
        }
    }

    public function manage_sellers() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['users'] = $this->Get_model->fetch_sellers();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            //print_r($data);die;


            $this->load->view("admin/manage_sellers", $data);
        }
    }

    public function approve_user() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Get_model->approve_user($id);
            $type = $this->uri->segment(4);
            $get_email = $this->Insert_model->usremaill($id);
            $this->load->library('email');
            date_default_timezone_set("Asia/Kolkata");
            $this->email->from('Riftraff admin');
            $this->email->to($get_email[0]->email);
            $this->email->subject('Email approved');

            $this->email->message("Hi " . $get_email[0]->email . ", You have been approved for login with riftraff site. ");
            $this->email->send();

            if ($type == 'dealer') {
                $data['users'] = $this->Get_model->fetch_dealers();
                redirect('admin/manage_dealers', $data);
            } else if ($type == 'seller') {
                $data['users'] = $this->Get_model->fetch_sellers();
                redirect('admin/manage_sellers', $data);
            } else {
                $data['users'] = $this->Get_model->fetch_users();
                redirect('admin/manage_user', $data);
            }
        }
    }

    public function recover_user() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Get_model->recover_user($id);
            $type = $this->uri->segment(4);
            $get_email = $this->Insert_model->usremaill($id);
//                                                        $this->load->library('email');
//                                                        date_default_timezone_set("Asia/Kolkata");
//                                                        $this->email->from('Riftraff admin');
//                                                        $this->email->to($get_email[0]->email);
//                                                        $this->email->subject('Email approved');
//
//                                                        $this->email->message("Hi ".$get_email[0]->email .", You have been approved for login with riftraff site. " );
//                                                        $this->email->send();



            redirect('admin/manage_dealers_trash', $data);
        }
    }

    public function unapprove_user() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Get_model->unapprove_user($id);
            $type = $this->uri->segment(4);
            $get_email = $this->Insert_model->usremaill($id);
            $this->load->library('email');
            date_default_timezone_set("Asia/Kolkata");
            $this->email->from('Riftraff admin');
            $this->email->to($get_email[0]->email);
            $this->email->subject('Email Unapproved');

            $this->email->message("Hi " . $get_email[0]->email . ", You have been unapproved for login with riftraff site. ");
            $this->email->send();
            if ($type == 'dealer') {
                $data['users'] = $this->Get_model->fetch_dealers();
                redirect('admin/manage_dealers', $data);
            } else if ($type == 'seller') {
                $data['users'] = $this->Get_model->fetch_sellers();
                redirect('admin/manage_sellers', $data);
            } else {
                $data['users'] = $this->Get_model->fetch_users();
                redirect('admin/manage_user', $data);
            }
        }
    }

    public function manage_lessons() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['lessons'] = $this->Get_model->fetch_lessons();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();

            $this->load->view("admin/manage_lessons", $data);
        }
    }

    public function add_lesson() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/add_service", $data);
        }
    }

    public function add_repair() {

        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/add_service", $data);
        }
    }

    public function add_Rentals() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/add_service", $data);
        }
    }

    public function add_Reharsal() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/add_service", $data);
        }
    }

    public function delete_lesson() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $id = $this->uri->segment(3);
            $this->Delete_admin_model->delete_service($id);
            $this->session->set_flashdata('message', 'lesson Deleted Successfully');
            redirect('admin/manage_lessons');
        }
    }

    public function insert_services() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $type = $this->input->post('type');
            $data = array(
                "type" => $this->input->post('type'),
                "service_name" => $this->input->post('name'),
                'date' => date("Y-m-d "),
                "status" => 1
            );
            //print_r($data);
            $this->Insert_admin_model->insert_service($data);
            if ($type == "Lessons") {
                $this->session->set_flashdata('message', 'Lessons Added Successfully');
                redirect('admin/manage_lessons');
            } elseif ($type == "Rentals") {

                $this->session->set_flashdata('message', 'Rentals Added Successfully');
                redirect('admin/manage_rentals');
            } elseif ($type == "Reharsal") {

                $this->session->set_flashdata('message', 'Reharsal Added Successfully');
                redirect('admin/manage_reharsal');
            } else {
                $this->session->set_flashdata('message', 'Repairs Added Successfully');
                redirect('admin/manage_repairs');
            }
        }
    }

    public function manage_repairs() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['repairs'] = $this->Get_model->fetch_repairs();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_repairs", $data);
        }
    }

    public function delete_repair() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Delete_admin_model->delete_service($id);
            $this->session->set_flashdata('message', 'Repair Deleted Successfully');
            redirect('admin/manage_repairs');
        }
    }

    public function manage_rentals() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['rentals'] = $this->Get_model->fetch_rentals();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_rentals", $data);
        }
    }

    public function delete_rental() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Delete_admin_model->delete_service($id);
            $this->session->set_flashdata('message', 'Rental Deleted Successfully');
            redirect('admin/manage_rentals');
        }
    }

    public function manage_reharsal() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['reharsals'] = $this->Get_model->fetch_reharsal();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_reharsal", $data);
        }
    }

    public function delete_reharsal() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $this->Delete_admin_model->delete_service($id);
            $this->session->set_flashdata('message', 'Reharsal Deleted Successfully');
            redirect('admin/manage_reharsal');
        }
    }

    public function manage_reviews() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $data['reviews'] = $this->Get_model->fetch_reviews();
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/manage_reviews", $data);
        }
    }

    public function add_reviews() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view("admin/add_reviews", $data);
        }
    }

    public function insert_reviews() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            if (!empty($_FILES)) {
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = time() . $_FILES['file']['name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $fileName;
                move_uploaded_file($tempFile, $targetFile);
                $path = '/uploads/' . $fileName;

                $data = array(
                    "title" => $this->input->post('title'),
                    "image" => $path,
                    "description" => $this->input->post('description'),
                    'date' => date("Y-m-d "),
                    "status" => 1
                );
                //print_r($data);
                $this->Insert_admin_model->insert_review($data);
                $this->session->set_flashdata('message', 'Reviews Added Successfully');
                redirect('admin/manage_reviews');
            }
        }
    }

    public function delete_review() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $id = $this->uri->segment(3);
            $this->Delete_admin_model->del_review($id);
            $this->session->set_flashdata('message', 'Reviews Deleted Successfully');
            redirect('admin/manage_reviews');
        }
    }

    public function edit_review() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $id = $this->uri->segment(3);
            $data['review'] = $this->Get_model->get_reviews($id);
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $this->load->view('admin/edit_reviews', $data);
        }
    }

    public function update_reviews() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {

            $id = $this->input->post('id');
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName;
            move_uploaded_file($tempFile, $targetFile);
            if (!empty($fileName)) {
                $path = '/uploads/' . $fileName;
            } else {
                $path = "";
            }

            $data = array(
                "title" => $this->input->post('title'),
                "image" => $path,
                "description" => $this->input->post('description')
            );

            $this->Update_admin_model->update_review($id, $data);
            $this->session->set_flashdata('message', 'Reviews Updated Successfully');
            redirect('admin/manage_reviews');
        }
    }

    public function view_products() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $id = $this->uri->segment(3);
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $data['single_product'] = $this->Get_model->fetch_single_product($id);
            $data['price'] = $this->Get_model->fetch_price($id);
            $data['brand'] = $this->Get_model->get_brand($id);
            $data['decription'] = $this->Get_model->get_desc($id);
            $data['color'] = $this->Get_model->fetch_color($id);
            $data['image'] = $this->Get_model->fetch_images($id);
            $this->load->view('admin/view_products', $data);
        }
    }

    public function manage_services() {
        if (!isset($this->session->userdata['logged_in_admin'])) {
            redirect('admin/loginform');
        } else {
            $data['prod'] = $this->Insert_model->count_prod_not();
            $data['user'] = $this->Insert_model->count_user_not();
            $data['admin_profile'] = $this->Get_model->get_admin_profile();
            $data['dealer_service'] = $this->Get_model->dealer_services();
            $this->load->view("admin/manage_services", $data);
        }
    }

//****************end********************//
}
