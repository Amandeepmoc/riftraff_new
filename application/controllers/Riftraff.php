<?php

class Riftraff extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Get_model');
        $this->load->model('Insert_model');
        $this->load->model('Get_category_model');
        $this->load->model('Delete_model');
    }

    public function index() {

        $data['adds'] = $this->Get_model->get_all_Adds();
        $data['all_content'] = $this->Get_model->get_main_product_clearance();
        $data['price'] = $this->Get_model->get_product_price_clearance();
        $data['desc'] = $this->Get_model->get_product_desc_clearance();
        $data['images'] = $this->Get_model->get_product_images_clearance();
        $data['dealer'] = $this->Get_model->get_product_dealer_clearance();
        $data['seller'] = $this->Get_model->get_product_seller_clearance();
        $data['p_type'] = 'buy';
        if (count($data['all_content']) > 0) {


            foreach ($data['all_content'] as $key) {
                // echo $key;
                $status = $this->Get_model->check_quant($key->id);
                //echo $status;
                if ($status == 1) {
                    $data['all'][$key->id]['name'] = $key->product_name;
                    $data['all'][$key->id]['original_price'] = $key->original_price;
                    $data['all'][$key->id]['sale_price'] = $key->sale_price;
                    $data['all'][$key->id]['id'] = $key->id;
                }
            }
            foreach ($data['price'] as $key) {
                $check = $this->Get_model->check_clearance($key->product_id);
                if ($check == 1) {
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['price'] = $key->attribute_value;
                    }
                }
            }
            foreach ($data['desc'] as $key) {
                $check = $this->Get_model->check_clearance($key->product_id);
                if ($check == 1) {
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['desc'] = $key->attribute_value;
                    }
                }
            }
            foreach ($data['dealer'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $data['all'][$key->pid]['type'] = 'dealer';
                    $data['all'][$key->pid]['company_logo'] = $key->company_logo;
                    $data['all'][$key->pid]['address'] = $key->address;
                    $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            foreach ($data['seller'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $data['all'][$key->pid]['type'] = 'seller';
                    $data['all'][$key->pid]['email'] = $key->email_address;
                    $data['all'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
                    $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            // echo "<pre>";
            //print_r($data['images']);
            foreach ($data['images'] as $key) {
                //print_r($key);
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    $data['all'][$key->product_id]['img'][] = $key->image_path;
                }
            }
        } else {
            $data['all'] = 0;
        }
        $this->load->view('index', $data);
    }

    public function search() {
        $this->load->view('search');
    }

    public function seller() {
        if (!isset($this->session->userdata['logged_in'])) {
            $this->load->view('seller');

            //$this->load->view('admin/index');
        } else {
            $session['session'] = $this->session->userdata['logged_in'];
            $this->load->view('seller', $session);
        }
    }

    public function contact_us() {
        $this->load->view('contact_us');
    }

    public function signup() {


        $maxid = $this->Insert_model->getmax();
        //die();
        $val = $maxid[0]->idd + 1;

        if ($this->input->post('user_type') == 'dealer') {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'type' => $this->input->post('user_type'),
                'store' => $this->input->post('store_name'),
                'password' => md5($this->input->post('password')),
                'status' => 1,
                'approve_status' => 0,
                'noti_status' => 1,
                'dealerrID' => "D" . $val
            );
        } else {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'type' => $this->input->post('user_type'),
                'password' => md5($this->input->post('password')),
                'status' => 1,
                'approve_status' => 0,
                'noti_status' => 1
            );
        }
        $email = $this->input->post('email');
        $result = $this->Get_model->get_email($email);

        if (!empty($result)) {
            $this->session->set_flashdata('message', 'Email already Exist');
            redirect("riftraff/index");
        } else {
            $idd = $this->Insert_model->signup_form($data);
            if ($this->input->post('user_type') == 'buyer') {
                $data = array(
                    'user_id' => $idd,
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'country' => $this->input->post('country'));
                $this->Insert_model->sign_up_two($data);
            }

            $this->load->library('email');
            date_default_timezone_set("Asia/Kolkata");
            $this->email->from('Riftraff admin');
            $this->email->to($email);
            $this->email->subject('Registration');

            $this->email->message("Thank you for login with riftraff.");
            if ($this->email->send()) {
                $this->session->set_flashdata('message', 'You are Registered Successfully');
            }
            $this->email->from($email);
            $this->email->to('amandeep.moc@gmail.com');
            $this->email->subject('New User registration');
            $this->email->message("New user with type " . $this->input->post('user_type') . "is registered with site!!");
            if ($this->email->send()) {
                $this->session->set_flashdata('message', 'You are Registered Successfully');
            }
            redirect(base_url());
        }
    }

    public function login() {

        $email = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $result = $this->Get_model->fetch_user($email, $password);
        //  print_r($result);die;

        if ($result == false) {

            $this->session->set_flashdata('message', 'Invalid Email or Password');
            redirect("riftraff/seller");
        } else {

            $data = array(
                "user_id" => $result[0]->id,
                "status" => '1'
            );
            $sid = $this->Get_model->sign_time($data);

//            echo $sid;
//            die();

            if ($result[0]->type == 'buyer') {
                $loginuser_array = array(
                    "email" => $result[0]->email,
                    "user_id" => $result[0]->id,
                    "first_name" => $result[0]->firstname,
                    "type" => $result[0]->type,
                    "last_name" => $result[0]->lastname,
                    "complete_profile" => $result[0]->profile_complete,
                    "city" => $result[0]->city,
                    "sid" => $sid
                );
            } else {
                $loginuser_array = array(
                    "email" => $result[0]->email,
                    "user_id" => $result[0]->id,
                    "first_name" => $result[0]->firstname,
                    "type" => $result[0]->type,
                    "last_name" => $result[0]->lastname,
                    "complete_profile" => $result[0]->profile_complete,
                    "sid" => $sid
                );
            }

            //write the code cookies kailash

            $this->session->set_userdata('logged_in', $loginuser_array);
            //$this->session->set_userdata('logged_in',$email);
            // $this->session->userdata['logged_in'];

            $this->session->set_flashdata('message', 'Successfully Login');
            $type = $result[0]->type;
            if ($type == 'dealer') {
                if ($result[0]->profile_complete == 1) {
                    redirect("riftraff/dealer_profile");
                } else {
                    redirect("riftraff/dealer_account");
                }
            } else if ($type == 'seller') {

                if ($result[0]->profile_complete == 1) {
                    redirect("riftraff/seller_profile");
                } else {
                    redirect("riftraff/seller_account");
                }
            } else {
                redirect("riftraff/buy");
            }



            //   $this->load->view('get_start',$session);
        }
    }

    public function add_favourite() {
        if (!isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('message', 'Please login First');
            redirect("riftraff/seller");
        } else {
            $pid = $this->uri->segment(3);
            $userid = $this->session->userdata['logged_in']['user_id'];
            $check = $this->Get_model->check_favourites($pid, $userid);
            if ($check == 0) {
                $data = array(
                    "product_id" => $pid,
                    "user_id" => $userid,
                    "status" => 1
                );
                $this->Get_model->add_favourites($data);
                $this->session->set_flashdata('message', 'Successfully added');
            } else {
                $this->session->set_flashdata('message', 'You have already add this product');
            }
            redirect("riftraff/buy");
        }
    }

    public function cancel_item() {
        if (!isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('message', 'Please login First');
            redirect("riftraff/seller");
        } else {
            $this->load->view('paypal', $data);
        }
    }

    public function earnDealer() {
        if (!isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('message', 'Please login First');
            redirect("riftraff/seller");
        } else {
            $data['con'] = $this->Get_model->fetchorderDone($this->session->userdata['logged_in']['user_id']);

            //$data['con'] = $this->Get_model->fetchorderRequested($this->session->userdata['logged_in']['user_id']);

            $this->load->view('earndealer', $data);
        }
    }

    public function earnDealerDone() {
        if (!isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('message', 'Please login First');
            redirect("riftraff/seller");
        } else {
            $data['con'] = $this->Get_model->fetchorderDone($this->session->userdata['logged_in']['user_id']);

            $this->load->view('earndealer', $data);
        }
    }

    public function success_item() {
        if (!isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('message', 'Please login First');
            redirect("riftraff/seller");
        } else {
//Store transaction information from PayPal

            $item_number = $this->input->get('item_number');
            $txn_id = $this->input->get('tx');
            $payment_gross = $this->input->get('amt');
            $currency_code = $this->input->get('cc');
            $payment_status = $this->input->get('st');
            $idd = $this->Get_model->UpdateCheckoutProceedPaypal($item_number);
            //  print_r($idd);
            $this->Get_model->UpdateCheckoutProceed($idd[0]->id);

////////////////////////////////////// SHIPPING NUMBER //////////////////////////////////////////////////////////////////////////////////////
            // Copyright 2009, FedEx Corporation. All rights reserved.
// Version 5.0.0

            require_once('create_ship/php/library/fedex-common.php');

//The WSDL is not included with the sample code.
//Please include and reference in $path_to_wsdl variable.
            $path_to_wsdl = "/var/www/clients/client6/web129/web/application/views/create_ship/php/wsdl/PickupService_v13.wsdl";

            ini_set("soap.wsdl_cache_enabled", "0");

            $client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

            $request['WebAuthenticationDetail'] = array(
                'ParentCredential' => array(
                    'Key' => getProperty('parentkey'),
                    'Password' => getProperty('parentpassword')
                ),
                'UserCredential' => array(
                    'Key' => getProperty('key'),
                    'Password' => getProperty('password')
                )
            );
            $request['ClientDetail'] = array(
                'AccountNumber' => getProperty('shipaccount'),
                'MeterNumber' => getProperty('meter')
            );
            $request['TransactionDetail'] = array('CustomerTransactionId' => '*** Create Freight Pickup Request using PHP ***');
            $request['Version'] = array(
                'ServiceId' => 'disp',
                'Major' => 13,
                'Intermediate' => 0,
                'Minor' => 0
            );
            $request['AssociatedAccountNumber'] = array('Type' => 'FEDEX_FREIGHT',
                'AccountNumber' => getProperty('freightacount'));
            $request['OriginDetail'] = array(
                'PickupLocation' => array(
                    'Contact' => array(
                        'PersonName' => 'Contact Name',
                        'CompanyName' => 'Company Name',
                        'PhoneNumber' => '1234567890'
                    ),
                    'Address' => array(
                        'StreetLines' => array('1202 Chalet Ln', 'Do Not Delete - Test Account'),
                        'City' => 'Harrison',
                        'StateOrProvinceCode' => 'AR',
                        'PostalCode' => '72601',
                        'CountryCode' => 'US')
                ),
                'PackageLocation' => 'FRONT', // valid values NONE, FRONT, REAR and SIDE
                'BuildingPartCode' => 'BUILDING', // valid values APARTMENT, BUILDING, DEPARTMENT, SUITE, FLOOR and ROOM
                'BuildingPartDescription' => 'Front Desk',
                'ReadyTimestamp' => getProperty('pickuptimestamp'), // Replace with your ready date time
                'CompanyCloseTime' => '20:00:00'
            );
//echo "<pre>";
//print_r($request['OriginDetail']);
//die();
            $request['FreightPickupDetail'] = array(
                'Payment' => 'SENDER',
                'Role' => 'SHIPPER',
                'LineItems' => array(
                    'Service' => 'FEDEX_FREIGHT_PRIORITY',
                    'Destination' => array(
                        'Streetlines' => array('123 Do Not Ship Lane'),
                        'City' => 'Collierville',
                        'StateOrProvinceCode' => 'TN',
                        'PostalCode' => '38017',
                        'CountryCode' => 'US',
                        'Residential' => false),
                    'Packaging' => 'PALLET',
                    'Pieces' => '1',
                    'Weight' => array('Units' => 'LB', 'Value' => '200'),
                    'TotalHandlingUnits' => '1',
                    'PurchaseOrderNumber' => 'PO1234',
                    'Description' => 'Freight Line Item')
            );
            $request['PackageCount'] = '1';
            $request['TotalWeight'] = array(
                'Units' => 'LB', // valid values LB and KG
                'Value' => '200'
            );
            $request['CarrierCode'] = 'FXFR'; // valid values FDXE-Express, FDXG-Ground, FDXC-Cargo, FXCC-Custom Critical and FXFR-Freight
//$request['OversizePackageCount'] = '1';
            $request['CourierRemarks'] = 'This is a test.  Do not pickup';



            try {
                if (setEndpoint('changeEndpoint')) {
                    $newLocation = $client->__setLocation(setEndpoint('endpoint'));
                }

                $response = $client->createPickup($request);

                if ($response->HighestSeverity != 'FAILURE' && $response->HighestSeverity != 'ERROR') {
                    if (isset($response->PickupConfirmationNumber)) {
                        //echo 'Pickup confirmation number is: '.$response -> PickupConfirmationNumber .Newline;
                        $shipping_num = $response->PickupConfirmationNumber;
                        //die();
                    }
                    if (isset($response->Location)) {
                        echo 'Location: ' . $response->Location . Newline;
                    }
                    //  printSuccess($client, $response);
                } else {
                    //   printError($client, $response);
                }

                writeToLog($client);    // Write to log file   
            } catch (SoapFault $exception) {
                // printFault($exception, $client);
                //printSuccess($client, $response);              
            }







            //////////////////////////////////// end /////////////////////////////////////////////////////////////////////////////////////////
//Get product price
            $productResult = $this->Get_model->getPriceProduct($item_number);
            //print_r($productResult);
            $productPrice = $idd[0]->sub_total;

            if (!empty($txn_id) && $payment_gross == $productPrice) {
                //Check if payment data exists with the same TXN ID.
                $prevPaymentResult = $this->Get_model->checkPaymentStatus($txn_id);
                if (count($prevPaymentResult) > 0) {
                    $last_insert_id = $prevPaymentResult[0]->id;
                } else {
                    //Insert tansaction data into the database
                    $insert_data = array(
                        'buyer_id' => $this->session->userdata['logged_in']['user_id'],
                        'order_id' => $productResult[0]->id,
                        'order_num' => $item_number,
                        'txn_id' => $txn_id,
                        'payment_gross' => $payment_gross,
                        'currency_code' => $currency_code,
                        'shipping_number' => $shipping_num,
                        'status' => 1
                    );
                    $id = $this->Get_model->addPayment($insert_data);
                    $last_insert_id = $id;
                }
                $data['id'] = $last_insert_id;
                $this->load->view('paypal', $data);
            }
        }
    }

    public function favorites() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_category_model->fetch_category();
            $data['all_content'] = $this->Get_model->get_main_product_fav($this->session->userdata['logged_in']['user_id']);
            $data['price'] = $this->Get_model->get_product_price_fav($this->session->userdata['logged_in']['user_id']);
            $data['desc'] = $this->Get_model->get_product_desc_fav($this->session->userdata['logged_in']['user_id']);
            $data['images'] = $this->Get_model->get_product_images_fav($this->session->userdata['logged_in']['user_id']);
            $data['dealer'] = $this->Get_model->get_product_dealer_fav($this->session->userdata['logged_in']['user_id']);
            $data['seller'] = $this->Get_model->get_product_seller_fav($this->session->userdata['logged_in']['user_id']);
            $data['p_type'] = 'favourites';
            if (count($data['all_content']) > 0) {


                foreach ($data['all_content'] as $key) {
                    // echo $key;
                    $status = $this->Get_model->check_quant($key->id);
                    //echo $status;
                    if ($status == 1) {
                        $data['all'][$key->id]['name'] = $key->product_name;
                        $data['all'][$key->id]['id'] = $key->id;
                        $data['all'][$key->id]['original_price'] = $key->original_price;
                        $data['all'][$key->id]['sale_price'] = $key->sale_price;
                    }
                }
                foreach ($data['price'] as $key) {
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['price'] = $key->attribute_value;
                    }
                }
                foreach ($data['desc'] as $key) {
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['desc'] = $key->attribute_value;
                    }
                }
                foreach ($data['dealer'] as $key) {
                    $status = $this->Get_model->check_quant($key->pid);
                    if ($status == 1) {
                        $data['all'][$key->pid]['type'] = 'dealer';
                        $data['all'][$key->pid]['company_logo'] = $key->company_logo;
                        $data['all'][$key->pid]['address'] = $key->address;
                        $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                    }
                }
                foreach ($data['seller'] as $key) {
                    $status = $this->Get_model->check_quant($key->pid);
                    if ($status == 1) {
                        $data['all'][$key->pid]['type'] = 'seller';
                        $data['all'][$key->pid]['email'] = $key->email_address;
                        $data['all'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
                        $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                    }
                }
                // echo "<pre>";
                //print_r($data['images']);
                foreach ($data['images'] as $key) {
                    //print_r($key);
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['img'][] = $key->image_path;
                    }
                }
            } else {
                $data['all'] = 0;
            }
            $this->load->view('buy', $data);
        }
    }

    public function clearance() {
        $data['brands'] = $this->Get_model->fetch_brands();
        $data['colours'] = $this->Get_model->fetch_product_colour();
        $data['category'] = $this->Get_category_model->fetch_category();
        $data['all_content'] = $this->Get_model->get_main_product_clearance();
        $data['price'] = $this->Get_model->get_product_price_clearance();
        $data['desc'] = $this->Get_model->get_product_desc_clearance();
        $data['images'] = $this->Get_model->get_product_images_clearance();
        $data['dealer'] = $this->Get_model->get_product_dealer_clearance();
        $data['seller'] = $this->Get_model->get_product_seller_clearance();
        $data['p_type'] = 'buy';
        if (count($data['all_content']) > 0) {


            foreach ($data['all_content'] as $key) {
                // echo $key;
                $status = $this->Get_model->check_quant($key->id);
                //echo $status;
                if ($status == 1) {
                    $data['all'][$key->id]['name'] = $key->product_name;
                    $data['all'][$key->id]['id'] = $key->id;
                    $data['all'][$key->id]['original_price'] = $key->original_price;
                    $data['all'][$key->id]['sale_price'] = $key->sale_price;
                }
            }
            foreach ($data['price'] as $key) {
                $check = $this->Get_model->check_clearance($key->product_id);
                if ($check == 1) {
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['price'] = $key->attribute_value;
                    }
                }
            }
            foreach ($data['desc'] as $key) {
                $check = $this->Get_model->check_clearance($key->product_id);
                if ($check == 1) {
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['desc'] = $key->attribute_value;
                    }
                }
            }
            foreach ($data['dealer'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $data['all'][$key->pid]['type'] = 'dealer';
                    $data['all'][$key->pid]['company_logo'] = $key->company_logo;
                    $data['all'][$key->pid]['address'] = $key->address;
                    $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            foreach ($data['seller'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $data['all'][$key->pid]['type'] = 'seller';
                    $data['all'][$key->pid]['email'] = $key->email_address;
                    $data['all'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
                    $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            // echo "<pre>";
            //print_r($data['images']);
            foreach ($data['images'] as $key) {
                //print_r($key);
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    $data['all'][$key->product_id]['img'][] = $key->image_path;
                }
            }
        } else {
            $data['all'] = 0;
        }
        //print_r($data['all']);

        $this->load->view('buy', $data);
    }

    public function edit_dealer_profile() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['user_data'] = $this->Insert_model->get_dealer_id($this->session->userdata['logged_in']['user_id']);
            $this->load->view('edit_dealer_profile', $data);
        }
    }

    public function import() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['user_data'] = $this->Insert_model->get_dealer_id($this->session->userdata['logged_in']['user_id']);
            $data['cats'] = $this->Get_model->all_cats();
            $this->load->view('import', $data);
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
                                "added_by_id" => $this->session->userdata['logged_in']['user_id'],
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
                                "added_by_id" => $this->session->userdata['logged_in']['user_id'],
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
                                "added_by_id" => $this->session->userdata['logged_in']['user_id'],
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
                                "added_by_id" => $this->session->userdata['logged_in']['user_id'],
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
            redirect("riftraff/product_list");
        }
        redirect("riftraff/import");
    }

    public function edit_seller_profile() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['user_data'] = $this->Insert_model->get_seller_id($this->session->userdata['logged_in']['user_id']);
            $this->load->view('edit_seller_profile', $data);
        }
    }

    public function dealer_account() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $this->session->userdata['logged_in'];
            $this->load->view('dealer_account');
        }
    }

    public function search_by_city() {
        $city = $this->uri->segment(3);
        $city = str_replace("%20", " ", $city);

        if (!empty($city)) {
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_category_model->fetch_category();
            $data['all_content'] = $this->Get_model->get_main_product_search($city);
            $data['price'] = $this->Get_model->get_product_price_search($city);
            $data['desc'] = $this->Get_model->get_product_desc_search($city);
            $data['images'] = $this->Get_model->get_product_images_search($city);
            $data['dealer'] = $this->Get_model->get_product_dealer_search($city);
            $data['seller'] = $this->Get_model->get_product_seller_search($city);
            $data['p_type'] = 'search';
            $data['tcount'] = $this->Get_model->get_tcount($city);
            //echo $data['tcount'];die();

            if (count($data['all_content']) > 0) {


                foreach ($data['all_content'] as $key) {
                    // echo $key;
                    $status = $this->Get_model->check_quant($key->id);
                    //echo $status;
                    if ($status == 1) {
                        $data['all'][$key->id]['name'] = $key->product_name;
                        $data['all'][$key->id]['id'] = $key->id;
                        $data['all'][$key->id]['original_price'] = $key->original_price;
                        $data['all'][$key->id]['sale_price'] = $key->sale_price;
                    }
                }
                foreach ($data['price'] as $key) {
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['price'] = $key->attribute_value;
                    }
                }
                foreach ($data['desc'] as $key) {
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['desc'] = $key->attribute_value;
                    }
                }
                foreach ($data['dealer'] as $key) {
                    $status = $this->Get_model->check_quant($key->pid);
                    if ($status == 1) {
                        $data['all'][$key->pid]['type'] = 'dealer';
                        $data['all'][$key->pid]['company_logo'] = $key->company_logo;
                        $data['all'][$key->pid]['address'] = $key->address;
                        $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                    }
                }
                foreach ($data['seller'] as $key) {
                    $status = $this->Get_model->check_quant($key->pid);
                    if ($status == 1) {
                        $data['all'][$key->pid]['type'] = 'seller';
                        $data['all'][$key->pid]['email'] = $key->email_address;
                        $data['all'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
                        $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                    }
                }
                // echo "<pre>";
                //print_r($data['images']);
                foreach ($data['images'] as $key) {
                    //print_r($key);
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['img'][] = $key->image_path;
                    }
                }
            } else {
                $data['all'] = 0;
            }
        } else {
            $data['all'] = 1;
        }
        $this->load->view('buy', $data);
    }

    public function buy() {

        if (isset($this->session->userdata['logged_in']['city'])) {
            $city = $this->session->userdata['logged_in']['city'];

            //  if (!empty($city)) {
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_category_model->fetch_category();
            $data['all_content'] = $this->Get_model->get_main_product_search($city);
            $data['price'] = $this->Get_model->get_product_price_search($city);
            $data['desc'] = $this->Get_model->get_product_desc_search($city);
            $data['images'] = $this->Get_model->get_product_images_search($city);
            $data['dealer'] = $this->Get_model->get_product_dealer_search($city);
            $data['seller'] = $this->Get_model->get_product_seller_search($city);
            $data['p_type'] = 'buy';
            //$data['tcount'] = $this->Get_model->get_tcount($city);
        }
        // } else {
        //$this->session->userdata['logged_in'];
        $data['brands'] = $this->Get_model->fetch_brands();
        $data['colours'] = $this->Get_model->fetch_product_colour();
        $data['category'] = $this->Get_category_model->fetch_category();
        $data['all_content'] = $this->Get_model->get_main_product();
//            echo "<pre>";
//            print_r($data['all_content']);
//            die();

        $data['price'] = $this->Get_model->get_product_price();
//            echo "<pre>";
//            print_r($data['price']);
//            die();
        $data['desc'] = $this->Get_model->get_product_desc();
        $data['images'] = $this->Get_model->get_product_images();
        $data['dealer'] = $this->Get_model->get_product_dealer();
        $data['seller'] = $this->Get_model->get_product_seller();
        $data['p_type'] = 'buy';
        // print_r($data['images']);
        // }
        //echo count($data['all_content']);

        if (count($data['all_content']) > 0) {


            foreach ($data['all_content'] as $key) {
                // echo $key;
                $status = $this->Get_model->check_quant($key->id);
                // echo $status;
                if ($status == 1) {
                    $data['all'][$key->id]['name'] = $key->product_name;
                    $data['all'][$key->id]['id'] = $key->id;
                    $data['all'][$key->id]['original_price'] = $key->original_price;
                    $data['all'][$key->id]['sale_price'] = $key->sale_price;
                }
            }
            foreach ($data['price'] as $key) {
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    $data['all'][$key->product_id]['price'] = $key->attribute_value;
                }
            }
            foreach ($data['desc'] as $key) {
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    $data['all'][$key->product_id]['desc'] = $key->attribute_value;
                }
            }
            foreach ($data['dealer'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $data['all'][$key->pid]['type'] = 'dealer';
                    $data['all'][$key->pid]['company_logo'] = $key->company_logo;
                    $data['all'][$key->pid]['address'] = $key->address;
                    $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            foreach ($data['seller'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $data['all'][$key->pid]['type'] = 'seller';
                    $data['all'][$key->pid]['email'] = $key->email_address;
                    $data['all'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
                    $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            // echo "<pre>";
            //print_r($data['images']);
            foreach ($data['images'] as $key) {
                //print_r($key);
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    $data['all'][$key->product_id]['img'][] = $key->image_path;
                }
            }
        } else {
            $data['all'] = 0;
        }
        //echo "<pre>";
        //print_r($data['all']);
        //die();

        $this->load->view('buy', $data);
    }

    public function news() {
        $this->load->view('news');
    }

    public function search_by_cat() {
        $v_data = $this->uri->segment(3);
        if (!empty($v_data)) {
            $data['search_data'] = $this->Get_model->fetch_search_category($v_data);
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_category_model->fetch_category();
            $data['all_content'] = $this->Get_model->get_main_product_search_cat($v_data);
            $data['price'] = $this->Get_model->get_product_price_search_cat($v_data);
            $data['desc'] = $this->Get_model->get_product_desc_search_cat($v_data);
            $data['images'] = $this->Get_model->get_product_images_search_cat($v_data);
            $data['dealer'] = $this->Get_model->get_product_dealer_search_cat($v_data);
            $data['seller'] = $this->Get_model->get_product_seller_search_cat($v_data);
            $data['p_type'] = 'search_by_cat';
            // $data['tcountt'] = $this->Get_model->get_tcount_cat($v_data);
        }
        if (count($data['all_content']) > 0) {


            foreach ($data['all_content'] as $key) {
                //print_r ($key);
                $status = $this->Get_model->check_quant($key->id);
                if ($status == 1) {
                    $data['all'][$key->id]['name'] = $key->product_name;
                    $data['all'][$key->id]['id'] = $key->id;
                    $data['all'][$key->id]['original_price'] = $key->original_price;
                    $data['all'][$key->id]['sale_price'] = $key->sale_price;
                }
            }
            foreach ($data['price'] as $key) {
                //print_r ($key);
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    $data['all'][$key->product_id]['price'] = $key->attribute_value;
                }
            }
            foreach ($data['desc'] as $key) {
                //print_r($key);
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    $data['all'][$key->product_id]['desc'] = $key->attribute_value;
                }
            }
            foreach ($data['dealer'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $data['all'][$key->pid]['type'] = 'dealer';
                    $data['all'][$key->pid]['company_logo'] = $key->company_logo;
                    $data['all'][$key->pid]['address'] = $key->address;
                    $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            foreach ($data['seller'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $data['all'][$key->pid]['type'] = 'seller';
                    $data['all'][$key->pid]['email'] = $key->email_address;
                    $data['all'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
                    $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            // echo "<pre>";
            //print_r($data['images']);
            foreach ($data['images'] as $key) {
                //echo $key->product_id;
                // print_r($key);
                $status = $this->Get_model->check_quant($key->product_id);
                //echo $status;
                if ($status == 1) {
                    // print_r($key);
                    $data['all'][$key->product_id]['img'][] = $key->image_path;
                }
            }
        } else {
            $data['all'] = 0;
        }
        $this->load->view('buy', $data);
    }

    public function checkout() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['checkout'] = $this->Get_model->fetchCheckoutPickup($this->session->userdata['logged_in']['user_id']);

            $this->load->view('checkout', $data);
        }
    }

    public function pickupCheckout() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['checkout'] = $this->Get_model->fetchCheckoutPickup($this->session->userdata['logged_in']['user_id']);
            $this->load->view('pickupcheckout', $data);
        }
    }

    public function product_view() {

        //$this->session->userdata['logged_in'];

        $id = $this->uri->segment(3);
        $data['images'] = $this->Get_model->p_images($id);
        $data['main'] = $this->Get_model->p_main($id);
        $last = $data['main'][0]->category_id;
        $data['content'] = $this->Get_model->get_products_inner($id, $last);
        $data['shipping'] = $this->Get_model->get_products_shipping($id);
        // print_r($data['images']);
        //die();

        $this->load->view('product_view', $data);
    }

    public function del_cart() {
        $id = $this->uri->segment(3);
        $get_all = $this->Get_model->all_cart($id);
        $old_qty = $this->Get_model->old_qty($get_all[0]->product_id);
        $qty = $old_qty[0]->attribute_value + $get_all[0]->quantity;
        $this->Get_model->undo_cart($get_all[0]->product_id, $qty);
        $this->Insert_model->del_cart($id);
        redirect('riftraff/add_to_cart');
    }

    public function dealer_account_info() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            if (!empty($_FILES)) {
                $tempFile = $_FILES['img']['tmp_name'];
                $fileName = time() . $_FILES['img']['name'];
                $targetPath = getcwd() . '/dealer_uploads/';
                $targetFile = $targetPath . $fileName;
                $ff = '/dealer_uploads/' . $fileName;
                move_uploaded_file($tempFile, $targetFile);
            }


            $data = array(
                'user_id' => $this->session->userdata['logged_in']['user_id'],
                'email_address' => $this->input->post('email'),
                'facebook_id' => $this->input->post('facebook_id'),
                'business_name' => $this->input->post('business_name'),
                'company_logo' => $ff,
                'address' => $this->input->post('address'),
                'description' => $this->input->post('company_desc'),
                'phone_num' => $this->input->post('phone_num'),
                'keywords' => $this->input->post('keywords'),
                'street' => $this->input->post('street'),
                'unit' => $this->input->post('unit'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'payment_Detail' => $this->input->post('payment'),
            );

            $this->Insert_model->add_dealer_info($data);
            $this->Insert_model->complete_profile($this->session->userdata['logged_in']['user_id']);
            redirect('riftraff/dealer_services');
        }
    }

    public function update_dealer_account_info() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            if (!empty($_FILES['img']['name'])) {
                $tempFile = $_FILES['img']['tmp_name'];
                $fileName = time() . $_FILES['img']['name'];
                $targetPath = getcwd() . '/dealer_uploads/';
                $targetFile = $targetPath . $fileName;
                $ff = '/dealer_uploads/' . $fileName;
                move_uploaded_file($tempFile, $targetFile);
            } else {
                $ff = $this->input->post('old_fileeee');
            }
            if (!empty($_FILES['dealer_img']['name'])) {
                $tempFile = $_FILES['dealer_img']['tmp_name'];
                $fileName = $_FILES['dealer_img']['name'];
                $targetPath = getcwd() . '/dealer_uploads/';
                $targetFile = $targetPath . $fileName;
                $dealer_img = '/dealer_uploads/' . $fileName;
                move_uploaded_file($tempFile, $targetFile);
            } else {
                $dealer_img = $this->input->post('old_file_dealerr');
            }
//           echo $ff;
//           echo $dealer_img;
//           die();
            $id = $this->session->userdata['logged_in']['user_id'];
            $data = array(
                'email_address' => $this->input->post('email'),
                'facebook_id' => $this->input->post('facebook_id'),
                'business_name' => $this->input->post('business_name'),
                'company_logo' => $ff,
                'dealer_pic' => $dealer_img,
                'tagline' => $this->input->post('tagline'),
                'fday' => $this->input->post('fday'),
                'tday' => $this->input->post('tday'),
                'ftime' => $this->input->post('ftime'),
                'ttime' => $this->input->post('ttime'),
                'languages_spoken' => $this->input->post('lspoken'),
                'address' => $this->input->post('address'),
                'description' => $this->input->post('company_desc'),
                'phone_num' => $this->input->post('phone_num'),
                'keywords' => $this->input->post('keywords'),
                'street' => $this->input->post('street'),
                'unit' => $this->input->post('unit'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode')
            );

            $this->Insert_model->update_dealer_info($data, $id);
            //$this->Insert_model->complete_profile($this->session->userdata['logged_in']['user_id']);
            redirect('riftraff/dealer_profile');
        }
    }

    public function seller_account_info() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {


            $data = array(
                'user_id' => $this->session->userdata['logged_in']['user_id'],
                'email_address' => $this->input->post('email'),
                'facebook_id' => $this->input->post('facebook_id'),
                'phone_num' => $this->input->post('phone_num'),
                'description' => $this->input->post('company_desc'),
                'keywords' => $this->input->post('keywords'),
                'street' => $this->input->post('street'),
                'unit' => $this->input->post('unit'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'payment_Detail' => $this->input->post('payment'),
            );

            $this->Insert_model->add_seller_info($data);
            $this->Insert_model->complete_profile($this->session->userdata['logged_in']['user_id']);
            redirect('riftraff/add_product');
        }
    }

    public function add_to_cart() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['cart'] = $this->Get_model->fetch_cart($this->session->userdata['logged_in']['user_id']);
            $data['tcount'] = $this->Get_model->fetch_cart_count($this->session->userdata['logged_in']['user_id']);
            $this->load->view('add_to_cart', $data);
        }
    }

    public function update_seller_account_info() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {

            $id = $this->session->userdata['logged_in']['user_id'];
            $data = array(
                'email_address' => $this->input->post('email'),
                'facebook_id' => $this->input->post('facebook_id'),
                'phone_num' => $this->input->post('phone_num'),
                'description' => $this->input->post('company_desc'),
                'keywords' => $this->input->post('keywords'),
                'street' => $this->input->post('street'),
                'unit' => $this->input->post('unit'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
            );

            $this->Insert_model->update_seller_info($data, $id);
            //$this->Insert_model->complete_profile($this->session->userdata['logged_in']['user_id']);
            redirect('riftraff/add_product');
        }
    }

    public function dealer_services() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $this->session->userdata['logged_in'];
            $this->load->view('dealer_services');
        }
    }

    public function add_services_provided() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data = array(
                'type' => $this->input->post('service_type'),
                'service_id' => $this->input->post('service_id'),
                'dealer_id' => $this->session->userdata['logged_in']['user_id'],
                'shop_name' => $this->input->post('shop_name'),
                'address' => $this->input->post('address'),
                'hours' => $this->input->post('hours'),
                'phone_num' => $this->input->post('phone_num'),
                'email' => $this->input->post('email'),
                'street' => $this->input->post('street'),
                'unit' => $this->input->post('unit'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'status' => 1
            );
            $this->Insert_model->save_dealer_services($data);
            redirect("riftraff/dealer_profile");
        }
    }

    public function dealer_locater() {
        $this->load->view('dealer_locater');
    }

    public function lessons() {
        $data['lessons'] = $this->Get_model->get_all_lessons();
        $this->load->view('lessons', $data);
    }

    public function repairs() {
        $data['repairs'] = $this->Get_model->get_all_repairs();
        $this->load->view('repairs', $data);
    }

    public function rehersal() {
        $data['rehersals'] = $this->Get_model->get_all_rehersals();
        $this->load->view('rehersal', $data);
    }

    public function rentals() {
        $data['rentals'] = $this->Get_model->get_all_rentals();
        $this->load->view('rentals', $data);
    }

    public function dealer_profile() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $id = $this->session->userdata['logged_in']['user_id'];
            $data['dealer_info'] = $this->Insert_model->get_profile($id);
            $data['dealer_services'] = $this->Insert_model->get_services_dealer($id);
            $data['catt'] = $this->Get_model->get_product_cat_byid($id);
            //print_r($data['catt'][0]);
            foreach ($data['catt'] as $t) {
                $data['cattt'][$t->category_id]['name'] = $t->category_name;
            }

            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_category_model->fetch_category();
            $data['all_content'] = $this->Get_model->get_main_product_byid($id);
//            echo "<pre>";
//            print_r($data['all_content']);
//            die();

            $data['price'] = $this->Get_model->get_product_price_byid($id);
//            echo "<pre>";
//            print_r($data['price']);
//            die();
            $data['desc'] = $this->Get_model->get_product_desc_byid($id);
            $data['images'] = $this->Get_model->get_product_images_byid($id);
            $data['dealer'] = $this->Get_model->get_product_dealer_byid($id);
            // $data['seller'] = $this->Get_model->get_product_seller_byid($id);
            if (count($data['all_content']) > 0) {


                foreach ($data['all_content'] as $key) {
                    // echo $key;
                    $status = $this->Get_model->check_quant($key->id);
                    //echo $status;
                    if ($status == 1) {
                        $data['all'][$key->id]['name'] = $key->product_name;
                        $data['all'][$key->id]['id'] = $key->id;
                        $data['all'][$key->id]['original_price'] = $key->original_price;
                        $data['all'][$key->id]['sale_price'] = $key->sale_price;
                    }
                }
                foreach ($data['price'] as $key) {
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['price'] = $key->attribute_value;
                    }
                }
                foreach ($data['desc'] as $key) {
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['desc'] = $key->attribute_value;
                    }
                }
                foreach ($data['dealer'] as $key) {
                    $status = $this->Get_model->check_quant($key->pid);
                    if ($status == 1) {
                        $data['all'][$key->pid]['type'] = 'dealer';
                        $data['all'][$key->pid]['company_logo'] = $key->company_logo;
                        $data['all'][$key->pid]['address'] = $key->address;
                        $data['all'][$key->pid]['phone_num'] = $key->phone_num;
                    }
                }
//            foreach ($data['seller'] as $key) {
//                $status = $this->Get_model->check_quant($key->pid);
//                if ($status == 1) {
//                    $data['all'][$key->pid]['type'] = 'seller';
//                    $data['all'][$key->pid]['email'] = $key->email_address;
//                    $data['all'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
//                    $data['all'][$key->pid]['phone_num'] = $key->phone_num;
//                }
//            }
                // echo "<pre>";
                //print_r($data['images']);
                foreach ($data['images'] as $key) {
                    //print_r($key);
                    $status = $this->Get_model->check_quant($key->product_id);
                    if ($status == 1) {
                        $data['all'][$key->product_id]['img'][] = $key->image_path;
                    }
                }
            } else {
                $data['all'] = 0;
            }

//        echo "<pre>";
//        print_r($data);
//        die();

            $this->load->view('new_dealerr', $data);
        }
    }

    public function seller_profile() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $this->load->view('seller_profile');
        }
    }

    public function seller_account() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $this->session->userdata['logged_in'];
            $this->load->view('seller_account');
        }
    }

    public function logout() {
        $this->Get_model->update_sign($this->session->userdata['logged_in']['sid']);
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', 'Successfully Logout');


        redirect(base_url());
    }

    public function add_product() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_model->all_cats();
            $data['att_Set'] = $this->Get_model->fetch_attribute_Set();

            $data['attribute_Set'] = $this->Get_model->fetch_attributes(38);
            $this->session->userdata['logged_in'];
            $this->load->view('new_add_product', $data);
        }
    }

    public function add_productt() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $last = $this->uri->segment(3);
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_model->all_cats();
            $data['sub_category'] = $this->Get_model->fetch_sub_category($last);
            $data['att_Set'] = $this->Get_model->fetch_attribute_Set();

            $data['attribute_Set'] = $this->Get_model->fetch_attributes($last);
            $this->session->userdata['logged_in'];
            $this->load->view('new_Add_productt', $data);
        }
    }

    public function add_product_second() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_category_model->fetch_category();
            $data['attribute_Set'] = $this->Get_model->fetch_attributes($this->uri->segment(4));
//            echo "<pre>";
//            print_r($data['attribute_Set']);
//            echo "</pre>";
//            die();
            $this->session->userdata['logged_in'];
            $this->load->view('add_product_second', $data);
        }
    }

    public function add_product_final() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_category_model->fetch_category();
            //$data['attribute_Set'] = $this->Get_model->fetch_attributes($this->uri->segment(4));
//            echo "<pre>";
//            print_r($data['attribute_Set']);
//            echo "</pre>";
//            die();
            $this->session->userdata['logged_in'];
            $this->load->view('add_product_final', $data);
        }
    }

    public function insert_product_phase_final() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {

            if (!empty($_FILES)) {
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = $_FILES['file']['name'];
                $targetPath = getcwd() . '/product_uploads/';
                $targetFile = $targetPath . $fileName;
                $ff = '/product_uploads/' . $fileName;
                move_uploaded_file($tempFile, $targetFile);


                $data = array(
                    'product_id' => 0,
                    'image_path' => $ff,
                    'status' => 0,
                );
                //print_r($data);die;
                $this->Insert_model->insert_product_images($data);
                $this->session->set_flashdata('message', 'Image Added Successfully');
            }
        }
    }

    public function insert_product_phase_finall() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {

            if (!empty($_FILES)) {
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = $_FILES['file']['name'];
                $targetPath = getcwd() . '/product_uploads/';
                $targetFile = $targetPath . $fileName;
                $ff = '/product_uploads/' . $fileName;
                move_uploaded_file($tempFile, $targetFile);


                $data = array(
                    'product_id' => $this->input->post('pro_id'),
                    'image_path' => $ff,
                    'status' => 1,
                );
                //print_r($data);die;
                $this->Insert_model->insert_product_images($data);
                $this->session->set_flashdata('message', 'Image Added Successfully');
            }
        }
    }

    public function insert_product_phase_two() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            // print_r($_POST);
//   // echo $this->uri->segment(3);
            // die();
            $new_array[] = $_POST;
            $pid = $this->input->post('product_id');
            foreach ($new_array[0] as $key => $value) {


                $data = array(
                    'product_id' => $this->input->post('product_id'),
                    'attribute_id' => $key,
                    'attribute_value' => $value
                );

                if (($key == "product_id") || ($key == "image_select") || ($key == 'from_country') || ($key == 'from_city') || ($key == 'from_state') || ($key == 'policy') || ($key == 'shipping') || ($key == 'pickup_address') || ($key == 'mytext')) {
                    
                } else {
                    $this->Insert_model->insert_product_attributes($data);
                    //print_r($data);
                    // die();
                }
            }
            //print_r($data);
            //die();
            $arr[] = $this->input->post('image_select');

            if (count($arr[0]) > 0) {
                foreach ($arr[0] as $key => $value) {

                    $ff = '/uploads/' . $value;
                    $data = array(
                        'product_id' => $this->input->post('product_id'),
                        'image_path' => $ff,
                        'status' => 1,
                    );
                    //print_r($data);die;
                    $this->Insert_model->insert_product_images($data);
                }
            }
            $shp[] = $this->input->post('mytext');
//        echo count($shp);
//        print_r($shp);
            if (count($shp[0]) > 0) {
                foreach ($shp[0] as $key => $value) {
//                echo $value;
//                die();
                    $data = array(
                        'product_id' => $pid,
                        'location' => $value,
                        'status' => 1
                    );
                    $this->Insert_model->insert_product_shipping_locations($data);
                }
            }
            $val[] = $this->input->post('shipping');
            $ss = implode('-', $val[0]);
            $data = array(
                'product_id' => $pid,
                'from_country' => $this->input->post('from_country'),
                'from_city' => $this->input->post('from_city'),
                'from_state' => $this->input->post('from_state'),
                'shipping_policy' => $this->input->post('policy'),
                'shipping_method' => $ss,
                'local_pickup' => $this->input->post('pickup_address'),
                'status' => 1
            );
            $this->Insert_model->insert_product_shipping_details($data);
            //die();

            $this->session->set_flashdata('message', 'Product added Suceessfully');
            redirect("riftraff/add_product");
        }
        //die();
    }

    function edit_product_phase_two() {
//        $new_array[] = $_POST;
//        print_r($new_array);
//        die();
        $id = $this->input->post('pro_id');
        if (isset($_POST['hh'])) {
            $data = array(
                "product_name" => $this->input->post("name"),
                "sub_category_id" => $this->input->post("sub_category"),
                "sale_price" => $this->input->post("sale_price"),
                "original_price" => $this->input->post("original_price")
            );
        } else {
            $data = array(
                "product_name" => $this->input->post("name"),
                "sub_category_id" => $this->input->post("sub_category")
            );
        }
        $this->Insert_model->update_product_phase_one($id, $data);
        $new_array[] = $_POST;
        foreach ($new_array[0] as $key => $value) {


            $data = array(
                'attribute_value' => $value
            );
            $idd = $key;
            if (($key == "product_id") || ($key == "image_select") || ($key == 'from_country') || ($key == 'from_city') || ($key == 'from_state') || ($key == 'policy') || ($key == 'shipping') || ($key == 'pickup_address') || ($key == 'mytext') || ($key == 'name') || ($key == 'category') || ($key == 'sub_category') || ($key == 'hh') || ($key == 'sale_price') || ($key == 'original_price')) {
                
            } else {
                $this->Insert_model->update_product_phase_two($id, $idd, $data);
                //print_r($data);
            }
        }
        $shp[] = $this->input->post('mytext');
//        echo count($shp);
//        print_r($shp);
        if (count($shp[0]) > 0) {
            foreach ($shp[0] as $key => $value) {
//                echo $value;
//                die();
                $data = array(
                    'product_id' => $id,
                    'location' => $value,
                    'status' => 1
                );
                $this->Insert_model->insert_product_shipping_locations($data);
            }
        }
        $val[] = $this->input->post('shipping');
        $ss = implode('-', $val[0]);
        $data = array(
            'from_country' => $this->input->post('from_country'),
            'from_city' => $this->input->post('from_city'),
            'from_state' => $this->input->post('from_state'),
            'shipping_policy' => $this->input->post('policy'),
            'shipping_method' => $ss,
            'local_pickup' => $this->input->post('pickup_address')
        );
        $this->Insert_model->update_product_shipping_details($id, $data);

        redirect("riftraff/product_list");
    }

    public function insert_product() {

        $added_by_id = $this->session->userdata['logged_in']['user_id'];

        $example = $this->input->post("example[]");
        // print_r($example);
        $exam = implode(",", $example);
        $data = array(
            "category_id" => $this->input->post("category"),
            "colour_id" => $this->input->post("colour"),
            "product_name" => $this->input->post("name"),
            "description" => $this->input->post("description"),
            "price" => $this->input->post("price"),
            "special_price" => $this->input->post("special_price"),
            "special_price_from" => $this->input->post("special_price_form"),
            "brand_name" => $this->input->post("brand"),
            "model_num" => $this->input->post("model"),
            "style" => $this->input->post("style"),
            "conditions" => $this->input->post("condition"),
            "stock_value" => $this->input->post("stock"),
            "stock_availability" => $this->input->post("stock_availability"),
            "tax" => $this->input->post("tax"),
            "weight" => $this->input->post("weight"),
            "image" => $exam,
            "added_by_id" => $added_by_id
        );
        // print_r($data);die;
        $this->Insert_model->add_product($data);


        $this->session->set_flashdata('message', 'Product added Suceessfully');
        redirect("riftraff/add_product");
    }

    public function insert_product_phase_one() {

        $added_by_id = $this->session->userdata['logged_in']['user_id'];
//        print_r($_POST);
//        die();
        if (isset($_POST['hh'])) {
            $data = array(
                "added_by_id" => $added_by_id,
                "product_name" => $this->input->post("name"),
                "category_id" => $this->input->post("category"),
                "sub_category_id" => $this->input->post("sub_category"),
                "sale_price" => $this->input->post("sale_price"),
                "original_price" => $this->input->post("original_price"),
                "status" => 1,
                "approve_status" => 0,
                "noti_status" => 1
            );
        } else {
            //$example = $this->input->post("example[]");
            // print_r($example);
            // $exam = implode(",",$example);
            $data = array(
                "added_by_id" => $added_by_id,
                "product_name" => $this->input->post("name"),
                "category_id" => $this->input->post("category"),
                "sub_category_id" => $this->input->post("sub_category"),
                "status" => 1,
                "approve_status" => 0,
                "noti_status" => 1
            );
        }
        // print_r($data);die;
        $idd = $this->Insert_model->add_product($data);

        $new_array[] = $_POST;

        foreach ($new_array[0] as $key => $value) {


            $data = array(
                'product_id' => $idd,
                'attribute_id' => $key,
                'attribute_value' => $value
            );

            if (($key == "product_id") || ($key == "image_select") || ($key == 'from_country') || ($key == 'from_city') || ($key == 'from_state') || ($key == 'policy') || ($key == 'shipping') || ($key == 'pickup_address') || ($key == 'mytext') || ($key == 'name') || ($key == 'category') || ($key == 'sub_category') || ($key == 'hh') || ($key == 'sale_price') || ($key == 'original_price')) {
                
            } else {
                $this->Insert_model->insert_product_attributes($data);
                //print_r($data);
                // die();
            }
        }
        //print_r($data);
        //die();
        $arr[] = $this->input->post('image_select');

        if (count($arr[0]) > 0) {
            foreach ($arr[0] as $key => $value) {

                $ff = '/uploads/' . $value;
                $data = array(
                    'product_id' => $idd,
                    'image_path' => $ff,
                    'status' => 1,
                );
                //print_r($data);die;
                $this->Insert_model->insert_product_images($data);
            }
        }
        $shp[] = $this->input->post('mytext');
//        echo count($shp);
//        print_r($shp);
        if (count($shp[0]) > 0) {
            foreach ($shp[0] as $key => $value) {
//                echo $value;
//                die();
                $data = array(
                    'product_id' => $idd,
                    'location' => $value,
                    'status' => 1
                );
                $this->Insert_model->insert_product_shipping_locations($data);
            }
        }
        $val[] = $this->input->post('shipping');
        $ss = implode('-', $val[0]);
        $dataa = array(
            'product_id' => $idd,
            'from_country' => $this->input->post('from_country'),
            'from_city' => $this->input->post('from_city'),
            'from_state' => $this->input->post('from_state'),
            'shipping_policy' => $this->input->post('policy'),
            'shipping_method' => $ss,
            'local_pickup' => $this->input->post('pickup_address'),
            'status' => 1
        );


        $this->Insert_model->insert_product_shipping_details($dataa);
        $this->Get_model->update_img_info($idd);

        $this->load->library('email');
        date_default_timezone_set("Asia/Kolkata");
        $this->email->from($this->session->userdata['logged_in']['email']);
        $this->email->to('amandeep.moc@gmail.com');
        $this->email->subject('New Product added');

        $this->email->message("New product with name" . $this->input->post('name') . " added.");
        $this->email->send();
        $this->session->set_flashdata('message', 'Product added Suceessfully');
        redirect("riftraff/product_list");
    }

    public function edit_product_phase_one() {
        $id = $this->input->post('product_id');
        $data = array(
            "product_name" => $this->input->post("name"),
            "category_id" => $this->input->post("category"),
            "sub_category_id" => $this->input->post("sub_category"),
        );
        $this->Insert_model->update_product_phase_one($id, $data);
        redirect("riftraff/edit_product_second/" . $id . "/" . $this->input->post("att_set"));
    }

    public function edit_product_second() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $id = $this->uri->segment(3);
            $data['content'] = $this->Get_model->get_products_inner($id);
            $data['shipping_d'] = $this->Get_model->get_product_shipping($id);
            $data['loc'] = $this->Get_model->get_product_loc($id);
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['product_images'] = $this->Get_model->get_images_byy($id);
            //$data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_category_model->fetch_category();
            $data['att_Set'] = $this->Get_model->fetch_attribute_Set();
            //$data['attribute_Set'] = $this->Get_model->fetch_attributes($this->uri->segment(4));
//            echo "<pre>";
//            print_r($data['attribute_Set']);
//            echo "</pre>";
//            die();
            $this->session->userdata['logged_in'];
            $this->load->view('edit_product_second', $data);
        }
    }

    public function deleteimg() {
        $id = $this->uri->segment(3);
        $this->Delete_model->deleteimg($id);
        redirect('riftraff/edit_product_second/' . $this->uri->segment(4));
    }

    public function delete_product() {
        $id = $this->uri->segment(3);
        $this->Delete_model->delete_product($id);
        redirect('riftraff/product_list');
    }

    public function product_list() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $data['products'] = $this->Get_model->get_products_byy($this->session->userdata['logged_in']['user_id']);
            $data['product_images'] = $this->Get_model->get_images_by($this->session->userdata['logged_in']['user_id']);
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_category_model->fetch_category();
            //$data['attribute_Set'] = $this->Get_model->fetch_attributes($this->uri->segment(4));
//            echo "<pre>";
//            print_r($data['attribute_Set']);
//            echo "</pre>";
//            die();
            $this->session->userdata['logged_in'];
            $this->load->view('product_list', $data);
        }
    }

    public function edit_product() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect("riftraff/seller");
        } else {
            $id = $this->uri->segment(3);
            $data['edit_product_phase'] = $this->Get_model->get_productss($id);
            $data['edit_product_phasse'] = $this->Get_model->get_productsss($id);
//            print_r($data['edit_product_phase']);
//            die();
            $catid = $data['edit_product_phasse'][0]->category_id;

            //$data['product_images'] = $this->Get_model->get_images_by($this->session->userdata['logged_in']['user_id']);
            $data['product_images'] = $this->Get_model->get_images_byy($id);
            $data['colours'] = $this->Get_model->fetch_product_colour();
            $data['category'] = $this->Get_category_model->fetch_category();
            $data['att_Set'] = $this->Get_model->fetch_attribute_Set();
            $data['brands'] = $this->Get_model->fetch_brands();
            $data['sub_category'] = $this->Get_model->fetch_sub_category($catid);
            $data['content'] = $this->Get_model->get_products_inner($id, $catid);
            $data['shipping_d'] = $this->Get_model->get_product_shipping($id);
            $data['loc'] = $this->Get_model->get_product_loc($id);
            //$data['attribute_Set'] = $this->Get_model->fetch_attributes($this->uri->segment(4));
//            echo "<pre>";
//            print_r($data['attribute_Set']);
//            echo "</pre>";
//            die();
            $this->session->userdata['logged_in'];
            $this->load->view('edit_new_prod', $data);
        }
    }

//*******************************ajax functions********************////////////////
    public function fetch_images_ajax() {

        $result = $this->Get_model->get_images($this->input->post("brand"), $this->input->post("color"));
        if ($result == 0) {
            echo 0;
        } else {
            echo json_encode($result);
        }
    }

    ///**************************end****************/////////////////
    // $data['user'] = $this->Get_model->fetch_user();


    public function fetch_sub_categories() {

        $result = $this->Get_model->get_sub_categories($this->input->post("dd"));
        if ($result == 0) {
            echo 0;
        } else {
            echo json_encode($result);
        }
    }

    public function fetch_sub_categoriess() {
        $dd = $this->input->post('dd');
        redirect("riftraff/add_product/$dd");
    }

    public function fetch_services() {

        $id = $this->input->post('dd');
        $result = $this->Insert_model->get_services($id);
        if ($result == 0) {
            echo 0;
        } else {
            echo json_encode($result);
        }
    }

    public function addressall() {


        $result = $this->Insert_model->addressall();
        if ($result == 0) {
            echo 0;
        } else {
            echo json_encode($result);
        }
    }

    public function fetch_dataa() {
        $idd = $this->input->post('dd');
        $result = $this->Insert_model->fetch_dataa($idd);
        if ($result == 0) {
            echo 0;
        } else {
            echo json_encode($result);
        }
    }

    public function fetch_dataa_zipcode() {
        $idd = $this->input->post('dd');
        $result = $this->Insert_model->fetch_dataa_zipcode($idd);
        if ($result == 0) {
            echo 0;
        } else {
            echo json_encode($result);
        }
    }

    public function fetch_dataaa() {
        $idd = $this->input->post('dd');
        $result = $this->Insert_model->fetch_dataaa($idd);
        if ($result == 0) {
            echo 0;
        } else {
            echo json_encode($result);
        }
    }

    public function delete_pimg() {
        $id = $this->input->post('id');
        $this->Get_model->delete_img($id);
        echo "0";
    }

    public function fetch_pdata() {
        $brand = $this->input->post('brand');
        $color = $this->input->post('color');
        $cat = $this->input->post('cat');
        $con = $this->input->post('con');
        $sell = $this->input->post('sell');
        $dtype = $this->input->post('dtype');
        $price = $this->input->post('price');

        if (($brand != 0) && ($color != 0) && ($cat != 0) && ($con != 0)) {
            
        }
        $result['all_content'] = $this->Get_model->fetch_pdata_main($brand, $color, $cat, $con, $dtype, $price);
//        echo "<pre>";
//        print_r($result);
//        echo "</pre>";
//        
//       die()
        if ($result['all_content'] == 0) {
            echo 0;
        } else {
            $result['price'] = $this->Get_model->fetch_pdata_price($brand, $color, $cat, $con, $dtype, $price);
//            print_r($result['price']);
//            die();
            $result['desc'] = $this->Get_model->fetch_pdata_desc($brand, $color, $cat, $con, $dtype, $price);
            $result['images'] = $this->Get_model->fetch_pdata_img($brand, $color, $cat, $con, $dtype, $price);
            $result['dealer'] = $this->Get_model->fetch_pdata_dealer($brand, $color, $cat, $con, $dtype, $price);
            $result['seller'] = $this->Get_model->fetch_pdata_seller($brand, $color, $cat, $con, $dtype, $price);

//            print_r($result['dealer']);

            foreach ($result['all_content'] as $key) {
                //echo $key;
                $status = $this->Get_model->check_quant($key->id);
                if ($status == 1) {
                    $dd['all'][$key->id]['name'] = $key->product_name;
                    $dd['all_grid'][$key->id]['name'] = $key->product_name;
                    $dd['all'][$key->id]['id'] = $key->id;
                    $dd['all_grid'][$key->id]['id'] = $key->id;
                    $data['all'][$key->id]['original_price'] = $key->original_price;
                    $data['all'][$key->id]['sale_price'] = $key->sale_price;
                }
            }
            foreach ($result['price'] as $key) {
                //echo $key->attribute_value;
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    if ($key->attribute_id == 'cost_price') {
                        $dd['all'][$key->product_id]['price'] = $key->attribute_value;
                        $dd['all_grid'][$key->product_id]['price'] = $key->attribute_value;
                    }
                }
            }
            foreach ($result['desc'] as $key) {
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    if ($key->attribute_id == 'product_desc') {
                        $dd['all'][$key->product_id]['desc'] = $key->attribute_value;
                        $dd['all_grid'][$key->product_id]['desc'] = $key->attribute_value;
                    }
                }
            }
            foreach ($result['dealer'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $dd['all'][$key->pid]['type'] = 'dealer';
                    $dd['all'][$key->pid]['company_logo'] = $key->company_logo;
                    $dd['all'][$key->pid]['address'] = $key->address;
                    $dd['all'][$key->pid]['phone_num'] = $key->phone_num;
                    $dd['all_grid'][$key->pid]['type'] = 'dealer';
                    $dd['all_grid'][$key->pid]['company_logo'] = $key->company_logo;
                    $dd['all_grid'][$key->pid]['address'] = $key->address;
                    $dd['all_grid'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            foreach ($result['seller'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $dd['all'][$key->pid]['type'] = 'seller';
                    $dd['all'][$key->pid]['email'] = $key->email_address;
                    $dd['all'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
                    $dd['all'][$key->pid]['phone_num'] = $key->phone_num;
                    $dd['all_grid'][$key->pid]['type'] = 'seller';
                    $dd['all_grid'][$key->pid]['email'] = $key->email_address;
                    $dd['all_grid'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
                    $dd['all_grid'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            foreach ($result['images'] as $key) {
                //print_r($key);
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    $dd['all'][$key->product_id]['img'][] = $key->image_path;
                    $dd['all_grid'][$key->product_id]['img'][] = $key->image_path;
                }
            }
//            echo "<pre>";
//            print_r($dd['all']);
//            die();
//echo count($dd['all']);
            //  print_r($dd['all_grid']);
            echo count($dd['all']);


            foreach ($dd['all'] as $n) {
                echo " <div class='row'>
                            <span class='h4 pull-left'>" . $n['name'] . "</span>
                            <span class='h4 pull-right text-warning'>
                                <a href='#' class='text-warning'><i class='fa fa-thumbs-up' aria-hidden='true'></i>  Favourites</a> |
                                <a href='#' class='text-warning'>Compare</a>
                                <a href='#' class='' style='font-size:20px;color:#ccc;vertical-align:middle;'>&times;</a>
                            </span>
                            <br><br>
                            <hr>
                            <div class='col-md-5 col-sm-5 col-xs-12'>
                                <div class='col-md-8 col-sm-12 col-xs-12 padding'>";
                if (!empty($n['img'])) {
                    $img = base_url() . $n['img'][0];
                } else {
                    $img = '/images/no-image-icon-6.png';
                }
                echo "<a href='/index.php/riftraff/product_view/" . $n['id'] . "'><img class='img-responsive img4' src='" . $img . "' style='width:100%;'/></a>
                                    
                                </div>";



                echo"<div class='col-md-4 col-sm-4 col-xs-12 padding'>";
                if (!empty($n['img'])) {
                    $i = 0;
                    foreach ($n['img'] as $dd) {
                        if ($i < 2) {
                            echo " <img class='img-responsive img5' src='" . base_url() . $dd . "' width='100%' style='margin-bottom:10px;'/>";
                        }$i++;
                    }
                } else {
                    echo " <img class='img-responsive img5' src='/images/no-image-icon-6.png' width='100%' style='margin-bottom:10px;'/>";
                }

                echo " </div>
                            </div>
                            <div class='col-md-4' style='border-right:2px solid #ccc;'>
                                <h3>$" . $n['price'] . "</h3>
                                <p>" . substr($n['desc'], 0, 101) . "</p>
                            </div>
                            <div class='col-md-3'>
                                <p></p>";
                if ($n['type'] == 'dealer') {
                    echo " <img src=" . base_url() . $n['company_logo'] . " class='img-responsive'/ style='width:100%;'>
                                    <p>" . $n['address'] . "<br>" .
                    $n['phone_num'] .
                    "</p>";
                } else {

                    echo "<p>" . $n['email'] . " <br>" .
                    $n['address'] . "<br>"
                    . $n['phone_num'] .
                    "</p>";
                }
                echo "</div>
                        </div>";
            }
//            print_r($dd['all_grid']);
//            $i = 0;
//                        $nn = count($dd['all_grid']);
//            foreach ($dd['all_grid'] as $dd) {
//               echo " <div class='grid_view' style='display: none;'>
//                    <div class='row'>";
//                       //print_r($dd['all']);
//                       
//                        
//                            
//
//
//                           echo " <div class='col-md-4'>
//
//                                <div class='card card1'>
//                                 
//                                    <a href='/index.php/riftraff/product_view/".$n['id']."'><img class='card-img-top img-responsive' src=".base_url() . $n['img'][0]." alt='Card image cap'></a>
//                                    <div class='card-block'>
//                                        <h4 class='card-title'>Name </h4>
//                                        <input id='input-21e' value='0' type='number' class='rating' min=0 max=5 step=0.5 data-size='xs' >
//                                        <div class='text-danger rate'><strong><sup>$</sup>".$n['price']."<sup>".$n['price']."</sup></strong></div>
//                                    </div>
//                                </div>
//
//                            </div>";
//                            
//                            $i++;
//                            $nn--;
//                            if (($i > 2) && ($nn > 0)) {
//                                $i = 0;
//                                
//                           echo " </div>
//                            <div class = 'row'>";
//
//
//                               
//                            } else {
//                                
//                            }
//                        }
//                        
//                    echo "</div>
//                </div>";
        }
    }

    public function fetch_pdata_grid() {
        $brand = $this->input->post('brand');
        $color = $this->input->post('color');
        $cat = $this->input->post('cat');
        $con = $this->input->post('con');
        $sell = $this->input->post('sell');
        $dtype = $this->input->post('dtype');
        $price = $this->input->post('price');

        if (($brand != 0) && ($color != 0) && ($cat != 0) && ($con != 0)) {
            
        }
        $result['all_content'] = $this->Get_model->fetch_pdata_main($brand, $color, $cat, $con, $dtype, $price);
//        echo "<pre>";
//        print_r($result);
//        echo "</pre>";
//        
//       die();
        if ($result['all_content'] == 0) {
            echo 0;
        } else {
            $result['price'] = $this->Get_model->fetch_pdata_price($brand, $color, $cat, $con, $dtype, $price);
//            print_r($result['price']);
//            die();
            $result['desc'] = $this->Get_model->fetch_pdata_desc($brand, $color, $cat, $con, $dtype, $price);
            $result['images'] = $this->Get_model->fetch_pdata_img($brand, $color, $cat, $con, $dtype, $price);
            $result['dealer'] = $this->Get_model->fetch_pdata_dealer($brand, $color, $cat, $con, $dtype, $price);
            $result['seller'] = $this->Get_model->fetch_pdata_seller($brand, $color, $cat, $con, $dtype, $price);

//            print_r($result['dealer']);

            foreach ($result['all_content'] as $key) {
                //echo $key;
                $status = $this->Get_model->check_quant($key->id);
                if ($status == 1) {
                    $dd['all'][$key->id]['name'] = $key->product_name;
                    $dd['all_grid'][$key->id]['name'] = $key->product_name;
                    $dd['all'][$key->id]['id'] = $key->id;
                    $dd['all_grid'][$key->id]['id'] = $key->id;
                    $data['all'][$key->id]['original_price'] = $key->original_price;
                    $data['all'][$key->id]['sale_price'] = $key->sale_price;
                }
            }
            foreach ($result['price'] as $key) {
                //echo $key->attribute_value;
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    if ($key->attribute_id == 'cost_price') {
                        $dd['all'][$key->product_id]['price'] = $key->attribute_value;
                        $dd['all_grid'][$key->product_id]['price'] = $key->attribute_value;
                    }
                }
            }
            foreach ($result['desc'] as $key) {
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    if ($key->attribute_id == 'product_desc') {
                        $dd['all'][$key->product_id]['desc'] = $key->attribute_value;
                        $dd['all_grid'][$key->product_id]['desc'] = $key->attribute_value;
                    }
                }
            }
            foreach ($result['dealer'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $dd['all'][$key->pid]['type'] = 'dealer';
                    $dd['all'][$key->pid]['company_logo'] = $key->company_logo;
                    $dd['all'][$key->pid]['address'] = $key->address;
                    $dd['all'][$key->pid]['phone_num'] = $key->phone_num;
                    $dd['all_grid'][$key->pid]['type'] = 'dealer';
                    $dd['all_grid'][$key->pid]['company_logo'] = $key->company_logo;
                    $dd['all_grid'][$key->pid]['address'] = $key->address;
                    $dd['all_grid'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            foreach ($result['seller'] as $key) {
                $status = $this->Get_model->check_quant($key->pid);
                if ($status == 1) {
                    $dd['all'][$key->pid]['type'] = 'seller';
                    $dd['all'][$key->pid]['email'] = $key->email_address;
                    $dd['all'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
                    $dd['all'][$key->pid]['phone_num'] = $key->phone_num;
                    $dd['all_grid'][$key->pid]['type'] = 'seller';
                    $dd['all_grid'][$key->pid]['email'] = $key->email_address;
                    $dd['all_grid'][$key->pid]['address'] = $key->street . "," . $key->unit . "," . $key->city . "," . $key->state . "," . $key->zipcode;
                    $dd['all_grid'][$key->pid]['phone_num'] = $key->phone_num;
                }
            }
            foreach ($result['images'] as $key) {
                //print_r($key);
                $status = $this->Get_model->check_quant($key->product_id);
                if ($status == 1) {
                    $dd['all'][$key->product_id]['img'][] = $key->image_path;
                    $dd['all_grid'][$key->product_id]['img'][] = $key->image_path;
                }
            }
//            echo "<pre>";
//            print_r($dd['all']);
//            die();
//echo count($dd['all']);
            //  print_r($dd['all_grid']);
            echo count($dd['all']);

            echo "<div class='row'>";

            $i = 0;

            $nn = count($dd['all']);
            $k = 0;

            foreach ($dd['all'] as $n) {
                echo "<div class='col-md-4'>
                               <div class='card card1'>   
                              <a href='/index.php/riftraff/product_view/" . $n['id'] . "'>";
                if (!empty($n['img'])) {
                    $img = base_url() . $n['img'][0];
                } else {
                    $img = '/images/no-image-icon-6.png';
                }
                echo "<img class='card-img-top img-responsive' src='" . $img . "' alt='Card image cap' style='width:100%;'></a>
                            
                                        <div class='card-block'>
                                            <h4 class='card-title'>" . $n['name'] . "</h4>
                                             <div class='rating'>
                                                    <input type='radio' id=" . $n['id'] . 'star5' . " name=" . $n['id'] . 'rating' . " value='5' /><label for=" . $n['id'] . 'star5' . " title='Rocks!'>5 stars</label>
                                                    <input type='radio' id=" . $n['id'] . 'star4' . " name=" . $n['id'] . 'rating' . " value='4' /><label for=" . $n['id'] . 'star4' . " title='Rocks!'>4 stars</label>
                                                    <input type='radio' id=" . $n['id'] . 'star3' . " name=" . $n['id'] . 'rating' . " value='3' checked /><label for=" . $n['id'] . 'star3' . " title='Rocks!'>3 stars</label>
                                                    <input type='radio' id=" . $n['id'] . 'star2' . " name=" . $n['id'] . 'rating' . " value='2' /><label for=" . $n['id'] . 'star2' . " title='Rocks!'>2 stars</label>
                                                    <input type='radio' id=" . $n['id'] . 'star1' . " name=" . $n['id'] . 'rating' . " value='1' /><label for=" . $n['id'] . 'star1' . " title='Rocks!'>1 star</label>
                                                </div>
                                            <div class='text-danger rate'><strong><sup>$</sup>" . $n['price'] . "<sup>" . $n['price'] . "</sup></strong></div>
                                        </div>
                                    </div>

                                </div>";


                $i++;
                $nn--;
                if (($i > 2) && ($nn > 0)) {
                    $i = 0;

                    echo "</div>
                                <div class = 'row'>";
                } else {
                    
                }
            }

            echo "</div>";
        }
    }

    public function fetch_quantity() {
        $qty = $this->input->post('qty');
        $pid = $this->input->post('pid');

        $postal = $this->Get_model->getPostalCode($pid);

        $postall = $postal[0]->zipcode;
        //$qty = 5;
        // $pid = 24;
        ////// sales tax api /////////////////////////////////////////

        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_URL, 'http://mee.la/api.php?url=' . 
        //   urlencode($_POST['address']));
        curl_setopt($ch, CURLOPT_URL, 'https://taxrates.api.avalara.com/postal?country=usa&postal=' . $postall . '&apikey=UG9h2kDk8fkHOWkID7OORHgNsxhhXMjz9D4THvsPMbm5xUXbamL2UWcxdMPDBFskq73zf3GFrHpzS8Y9kZ4O%2Fw%3D%3D');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $dataa = curl_exec($ch);
        $pp = json_decode($dataa, true);
        // print_r($pp);
        // echo $pp['totalRate'];
        // die();
        /////// end ////////////////////////////////////////////////
        $get_status = $this->Get_model->fetch_quantity($qty, $pid);
//         print_r($get_status);
//        echo $get_status[0]->attribute_value;
//      die();
        if ($get_status[0]->attribute_value < $qty) {
            echo 0;
        } else {

            $get_exist = $this->Get_model->check_exist($this->session->userdata['logged_in']['user_id'], $pid);

            if ($get_exist > 0) {
                //echo "yesss";
                $get_exist_data = $this->Get_model->check_exist_data($this->session->userdata['logged_in']['user_id'], $pid);
                //print_r($get_exist_data);
                //die();
                $new_qty = $get_exist_data[0]->quantity;
                $qty = $qty + $new_qty;
                //die();
                $sub = $qty * $this->input->post('unit_price');
                $comm = (3.5 / 100 * $sub);
                // $sub = $sub + $comm;
///////////////////////////////////////////////////////////////// CALCULATE SHIPPING COST CODE //////////////////////////////////////////////////////////////////////////////////////////
// Copyright 2009, FedEx Corporation. All rights reserved.
// Version 12.0.0

                require_once('php1/library/fedex-common.php');
//The WSDL is not included with the sample code.
//Please include and reference in $path_to_wsdl variable.
                $path_to_wsdl = "/var/www/clients/client6/web129/web/application/views/php1/wsdl/RateService_v20.wsdl";
                ini_set("soap.wsdl_cache_enabled", "0");
                $client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information
                $request['WebAuthenticationDetail'] = array(
                    'ParentCredential' => array(
                        'Key' => getProperty('parentkey'),
                        'Password' => getProperty('parentpassword')
                    ),
                    'UserCredential' => array(
                        'Key' => getProperty('key'),
                        'Password' => getProperty('password')
                    )
                );
                $request['ClientDetail'] = array(
                    'AccountNumber' => getProperty('shipaccount'),
                    'MeterNumber' => getProperty('meter')
                );
                $request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Rate Available Services Request using PHP ***');
                $request['Version'] = array(
                    'ServiceId' => 'crs',
                    'Major' => '20',
                    'Intermediate' => '0',
                    'Minor' => '0'
                );
                $request['ReturnTransitAndCommit'] = true;
                $request['RequestedShipment']['DropoffType'] = 'REGULAR_PICKUP'; // valid values REGULAR_PICKUP, REQUEST_COURIER, ...
                $request['RequestedShipment']['ShipTimestamp'] = date('c');
// Service Type and Packaging Type are not passed in the request
                $request['RequestedShipment']['Shipper'] = array(
                    'Address' => getProperty('address1')
                );
                $request['RequestedShipment']['Recipient'] = array(
                    'Address' => getProperty('address2')
                );
                $request['RequestedShipment']['ShippingChargesPayment'] = array(
                    'PaymentType' => 'SENDER',
                    'Payor' => array(
                        'ResponsibleParty' => array(
                            'AccountNumber' => getProperty('billaccount'),
                            'Contact' => null,
                            'Address' => array(
                                'CountryCode' => 'US'
                            )
                        )
                    )
                );
                $request['RequestedShipment']['PackageCount'] = $qty;
                for ($n = 0; $n < $qty; $n++) {
                    $b[] = array(
                        'SequenceNumber' => 1,
                        'GroupPackageCount' => 1,
                        'Weight' => array(
                            'Value' => 2.0,
                            'Units' => 'LB'
                        ),
                        'Dimensions' => array(
                            'Length' => 10,
                            'Width' => 10,
                            'Height' => 3,
                            'Units' => 'IN'
                        )
                    );
                }

                $request['RequestedShipment']['RequestedPackageLineItems'] = $b;
                try {
                    if (setEndpoint('changeEndpoint')) {
                        $newLocation = $client->__setLocation(setEndpoint('endpoint'));
                    }

                    $response = $client->getRates($request);

                    if ($response->HighestSeverity != 'FAILURE' && $response->HighestSeverity != 'ERROR') {
                        //echo 'Rates for following service type(s) were returned.'. Newline. Newline;
                        // echo '<table border="1">';
                        //echo '<tr><td>Service Type</td><td>Amount</td><td>Delivery Date</td>';
                        if (is_array($response->RateReplyDetails)) {
                            foreach ($response->RateReplyDetails as $rateReply) {
                                if ($rateReply->ServiceType == 'FEDEX_GROUND') {
                                    $serviceType = $rateReply->ServiceType;
                                } else {
                                    $serviceType = '';
                                }
                                if ($rateReply->RatedShipmentDetails && is_array($rateReply->RatedShipmentDetails) && $rateReply->ServiceType == 'FEDEX_GROUND') {
                                    $amount = number_format($rateReply->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount, 2, ".", ",");
                                } elseif ($rateReply->RatedShipmentDetails && !is_array($rateReply->RatedShipmentDetails) && $rateReply->ServiceType == 'FEDEX_GROUND') {
                                    $amount = number_format($rateReply->RatedShipmentDetails->ShipmentRateDetail->TotalNetCharge->Amount, 2, ".", ",");
                                } else {
                                    $amount = '';
                                }
                                if (array_key_exists('DeliveryTimestamp', $rateReply) && $rateReply->ServiceType == 'FEDEX_GROUND') {
                                    $deliveryDate = $rateReply->DeliveryTimestamp;
                                } else if ($rateReply->ServiceType == 'FEDEX_GROUND') {
                                    $deliveryDate = $rateReply->TransitTime;
                                } else {
                                    $deliveryDate = '';
                                }
                                $shipping_charges = $amount;
                                $service_type = $serviceType;
                                $delievery_time = $deliveryDate;
                            }
                        } else {
                            printRateReplyDetails($response->RateReplyDetails);
                        }
                        //echo '</table>'. Newline;
                        printSuccess($client, $response);
                    } else {
                        printError($client, $response);
                    }

                    writeToLog($client);    // Write to log file   
                } catch (SoapFault $exception) {
                    printFault($exception, $client);
                }

                /*                 * **************************************************  calulate shipping cost code end ******************************************* */



                $data = array(
                    'quantity' => $qty,
                    'shipping_charges' => $shipping_charges,
                    'service_type' => $service_type,
                    'delievery_time' => $delievery_time,
                    'commission' => $comm,
                    'sales_tax' => $pp['totalRate'],
                    'sub_total' => $sub
                );
                $this->Insert_model->update_in_cart($this->session->userdata['logged_in']['user_id'], $pid, $data);
            } else {

                $sub = $qty * $this->input->post('unit_price');
                $comm = (3.5 / 100 * $sub);
                //$sub = $sub + $comm;
                $ord = rand(100000, 1000000);
                ///////////////////////////////////////////////////////////////// CALCULATE SHIPPING COST CODE //////////////////////////////////////////////////////////////////////////////////////////
// Copyright 2009, FedEx Corporation. All rights reserved.
// Version 12.0.0

                require_once('php1/library/fedex-common.php');
//The WSDL is not included with the sample code.
//Please include and reference in $path_to_wsdl variable.
                $path_to_wsdl = "/var/www/clients/client6/web129/web/application/views/php1/wsdl/RateService_v20.wsdl";
                ini_set("soap.wsdl_cache_enabled", "0");
                $client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information
                $request['WebAuthenticationDetail'] = array(
                    'ParentCredential' => array(
                        'Key' => getProperty('parentkey'),
                        'Password' => getProperty('parentpassword')
                    ),
                    'UserCredential' => array(
                        'Key' => getProperty('key'),
                        'Password' => getProperty('password')
                    )
                );
                $request['ClientDetail'] = array(
                    'AccountNumber' => getProperty('shipaccount'),
                    'MeterNumber' => getProperty('meter')
                );
                $request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Rate Available Services Request using PHP ***');
                $request['Version'] = array(
                    'ServiceId' => 'crs',
                    'Major' => '20',
                    'Intermediate' => '0',
                    'Minor' => '0'
                );
                $request['ReturnTransitAndCommit'] = true;
                $request['RequestedShipment']['DropoffType'] = 'REGULAR_PICKUP'; // valid values REGULAR_PICKUP, REQUEST_COURIER, ...
                $request['RequestedShipment']['ShipTimestamp'] = date('c');
// Service Type and Packaging Type are not passed in the request
                $request['RequestedShipment']['Shipper'] = array(
                    'Address' => getProperty('address1')
                );
                $request['RequestedShipment']['Recipient'] = array(
                    'Address' => getProperty('address2')
                );
                $request['RequestedShipment']['ShippingChargesPayment'] = array(
                    'PaymentType' => 'SENDER',
                    'Payor' => array(
                        'ResponsibleParty' => array(
                            'AccountNumber' => getProperty('billaccount'),
                            'Contact' => null,
                            'Address' => array(
                                'CountryCode' => 'US'
                            )
                        )
                    )
                );
                $request['RequestedShipment']['PackageCount'] = $qty;
                for ($n = 0; $n < $qty; $n++) {
                    $b[] = array(
                        'SequenceNumber' => 1,
                        'GroupPackageCount' => 1,
                        'Weight' => array(
                            'Value' => 2.0,
                            'Units' => 'LB'
                        ),
                        'Dimensions' => array(
                            'Length' => 10,
                            'Width' => 10,
                            'Height' => 3,
                            'Units' => 'IN'
                        )
                    );
                }
                $request['RequestedShipment']['RequestedPackageLineItems'] = $b;
                try {
                    if (setEndpoint('changeEndpoint')) {
                        $newLocation = $client->__setLocation(setEndpoint('endpoint'));
                    }

                    $response = $client->getRates($request);

                    if ($response->HighestSeverity != 'FAILURE' && $response->HighestSeverity != 'ERROR') {
                        //echo 'Rates for following service type(s) were returned.'. Newline. Newline;
                        // echo '<table border="1">';
                        //echo '<tr><td>Service Type</td><td>Amount</td><td>Delivery Date</td>';
                        if (is_array($response->RateReplyDetails)) {
                            foreach ($response->RateReplyDetails as $rateReply) {
                                if ($rateReply->ServiceType == 'FEDEX_GROUND') {
                                    $serviceType = $rateReply->ServiceType;
                                } else {
                                    $serviceType = '';
                                }
                                if ($rateReply->RatedShipmentDetails && is_array($rateReply->RatedShipmentDetails) && $rateReply->ServiceType == 'FEDEX_GROUND') {
                                    $amount = number_format($rateReply->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount, 2, ".", ",");
                                } elseif ($rateReply->RatedShipmentDetails && !is_array($rateReply->RatedShipmentDetails) && $rateReply->ServiceType == 'FEDEX_GROUND') {
                                    $amount = number_format($rateReply->RatedShipmentDetails->ShipmentRateDetail->TotalNetCharge->Amount, 2, ".", ",");
                                } else {
                                    $amount = '';
                                }
                                if (array_key_exists('DeliveryTimestamp', $rateReply) && $rateReply->ServiceType == 'FEDEX_GROUND') {
                                    $deliveryDate = $rateReply->DeliveryTimestamp;
                                } else if ($rateReply->ServiceType == 'FEDEX_GROUND') {
                                    $deliveryDate = $rateReply->TransitTime;
                                } else {
                                    $deliveryDate = '';
                                }
                                $shipping_charges = $amount;
                                $service_type = $serviceType;
                                $delievery_time = $deliveryDate;
                            }
                        } else {
                            printRateReplyDetails($response->RateReplyDetails);
                        }
                        //echo '</table>'. Newline;
                        printSuccess($client, $response);
                    } else {
                        printError($client, $response);
                    }

                    writeToLog($client);    // Write to log file   
                } catch (SoapFault $exception) {
                    printFault($exception, $client);
                }

                /*                 * *********************************************  calulate shipping cost code end ******************************************* */

                $data = array(
                    'buyer_id' => $this->session->userdata['logged_in']['user_id'],
                    'product_id' => $this->input->post('pid'),
                    'product_name' => $this->input->post('product_name'),
                    'product_img' => $this->input->post('product_img'),
                    'unit_price' => $this->input->post('unit_price'),
                    'shipping_method' => $this->input->post('shipping_method'),
                    'quantity' => $this->input->post('qty'),
                    'sub_total' => $sub,
                    'order_num' => $ord,
                    'shipping_charges' => $shipping_charges,
                    'service_type' => $service_type,
                    'delievery_time' => $delievery_time,
                    'commission' => $comm,
                    'sales_tax' => $pp['totalRate'],
                    'status' => 1
                );
                $this->Insert_model->add_in_cart($data);
            }


            $tt = $get_status[0]->attribute_value - $qty;

            $this->Insert_model->update_quantity($pid, $tt);
            echo "sucess";
        }
    }

    public function add_checkoutt() {
        $shipping = $this->input->post('shipping');

        $check_status = $this->Get_model->checkCartStatus($this->session->userdata['logged_in']['user_id']);
        if ($check_status > 0) {
            if ($shipping == 'localPickup') {
                $ord = rand(1000, 10000);
                $data['all_sum'] = $this->Get_model->get_all_sum($this->session->userdata['logged_in']['user_id']);
                $summ = $data['all_sum'][0]->total + $data['all_sum'][0]->t_comm;
                $sales = ($summ * $data['all_sum'][0]->sales_tax / 100);
                $save_data = array(
                    'sub_total' => $data['all_sum'][0]->total + $data['all_sum'][0]->t_comm + $sales ,
                    'quantity' => $data['all_sum'][0]->tquantity,
                    'shipping_type' => $shipping
                );
            } else {
                $data['all_sum'] = $this->Get_model->get_all_sum_shipping($this->session->userdata['logged_in']['user_id']);
//            print_r($data['all_sum']);
//            die();
                 $summ = $data['all_sum'][0]->total + $data['all_sum'][0]->t_comm + $data['all_sum'][0]->charges;
                 $sales = ($summ * $data['all_sum'][0]->sales_tax / 100);
                $save_data = array(
                    'sub_total' => $data['all_sum'][0]->total + $data['all_sum'][0]->t_comm + $data['all_sum'][0]->charges + $sales,
                    'quantity' => $data['all_sum'][0]->tquantity,
                    'shipping_type' => $shipping,
                    'shipping_date' => $data['all_sum'][0]->delievery_time,
                    'service_type' => $data['all_sum'][0]->service_type
                );
            }
            $this->Get_model->checkoutUpdate($save_data, $this->session->userdata['logged_in']['user_id']);
        } else {
            if ($shipping == 'localPickup') {
                $ord = rand(1000, 10000);
                $data['all_sum'] = $this->Get_model->get_all_sum($this->session->userdata['logged_in']['user_id']);
                $summ = $data['all_sum'][0]->total + $data['all_sum'][0]->t_comm;
                $sales = ($summ * $data['all_sum'][0]->sales_tax / 100);
                $save_data = array(
                    'buyer_id' => $this->session->userdata['logged_in']['user_id'],
                    'sub_total' => $data['all_sum'][0]->total + $data['all_sum'][0]->t_comm + $sales,
                    'quantity' => $data['all_sum'][0]->tquantity,
                    'shipping_type' => $shipping,
                    'order_num' => $ord,
                    'status' => 1
                );

                // print_r($data['all_sum']);
                // die();
            } else {
                
                $data['all_sum'] = $this->Get_model->get_all_sum_shipping($this->session->userdata['logged_in']['user_id']);
                //print_r($data['all_sum']);
                //die();
                $summ = $data['all_sum'][0]->total + $data['all_sum'][0]->t_comm + $data['all_sum'][0]->charges;
                $sales = ($summ * $data['all_sum'][0]->sales_tax / 100);
                $ord = rand(1000, 10000);
                $save_data = array(
                    'buyer_id' => $this->session->userdata['logged_in']['user_id'],
                    'sub_total' => $data['all_sum'][0]->total + $data['all_sum'][0]->t_comm + $data['all_sum']->charges + $sales,
                    'quantity' => $data['all_sum'][0]->tquantity,
                    'shipping_type' => $shipping,
                    'shipping_date' => $data['all_sum'][0]->delievery_time,
                    'service_type' => $data['all_sum'][0]->service_type,
                    'order_num' => $ord,
                    'status' => 1
                );
            }
            $id = $this->Get_model->checkoutInsert($save_data);
            $this->Get_model->updateShipping($shipping, $id, $this->session->userdata['logged_in']['user_id']);
        }
        echo 'sucess';
    }

    public function procedCheckout() {
        $cid = $this->input->post('cid');
        $email = $this->input->post('email');
        $this->Get_model->UpdateCheckoutProceed($cid);
        echo 'sucess';
    }

///**************************end****************/////////////////
    // $data['user'] = $this->Get_model->fetch_user();
}
