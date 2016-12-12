<?php

class Get_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_login($username, $password) {

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin_login');


        return $query->result();
    }

    function fetch_brands() {

        //$this->db->order_by('id','ASC');
        $query = $this->db->get('Product_brands');
        return $query->result();
    }

    function fetch_records() {

        //$this->db->order_by('id','ASC');
        $query = $this->db->get('Product_brands');
        return $query->result();
    }

    /*     * * add favourites code ***** */

    function add_favourites($data) {
        $query = $this->db->insert('product_favourites', $data);
        return true;
    }

    function check_favourites($pid, $userid) {
        $this->db->where('user_id', $userid);
        $this->db->where('product_id', $pid);
        $query = $this->db->get('product_favourites');
        $val = count($query->result());
        return $val;
    }

//    function fetch_cart_by_total($id)
//    {
//        $query = $this->db->query("select sum(sub_total) as stotal , sum(quantity) as quan where buyer_id = $id and shipping_method = 'local_pickup and status " );
//    }

    function add_checkout($data) {
        $this->db->insert('product_checkout', $data);
        return true;
    }

    /*     * **** checkout process *************************** */
    
    function getPostalCode($pid)
    {
        $query = $this->db->query("select dealer_info.zipcode from dealer_info inner join product_detail on product_detail.added_by_id = dealer_info.user_id where product_detail.id = $pid");
        return $query->result();
    }
    
    function getPriceProduct($order)
    {
        $this->db->where('order_num',$order);
        $this->db->where('status',1);
        $query = $this->db->get('product_checkout');
        return $query->result();
    }
    function checkPaymentStatus($txn_id)
    {
        $this->db->where('txn_id',$txn_id);
        $query = $this->db->get('product_payment');
        return $query->result();
        
    }
    function addPayment($insert_data)
    {
        $this->db->insert('product_payment',$insert_data);
        return $this->db->insert_id();
    }
    
    function UpdateCheckoutProceedPaypal($itm)
    {
         //$this->db->query("update product_checkout set status = 0 where order_num = $tm");
         $query = $this->db->query("select * from product_checkout where order_num = $itm and status = 1");
         return $query->result();
        
    }
    
    function getCheckoutData()
    {
        
        $this->db->where('status', 0);
        $query = $this->db->get('product_checkout');
        return $query->result();
    }
    
    function updateShipping($shipping, $id, $uid) {
        $this->db->where('buyer_id', $uid);
        $this->db->set('order_num', $id);
        $this->db->set('shipping_method', $shipping);

        $this->db->update('product_cart');
        return true;
    }

    function checkoutUpdate($data, $id) {
        $this->db->where('buyer_id', $id);
        $this->db->update('product_checkout', $data);
        return true;
    }

    function addCheckout() {
        
    }
    function fetchCheckoutPickup($id)
    {
        $query = $this->db->query("select product_checkout.*, dealer_info.* from product_checkout inner join product_cart on product_checkout.id = product_cart.order_num inner join product_detail on product_cart.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where product_cart.buyer_id = $id and product_cart.status = 1 limit 1");
        if(count($query->result()) > 0)
        {
            return $query->result();
        }
        else
        {
            $query = $this->db->query("select product_checkout.*, seller_info.* from product_checkout inner join product_cart on product_checkout.id = product_cart.order_num inner join product_detail on product_cart.product_id = product_detail.id inner join seller_info on product_detail.added_by_id = seller_info.user_id where product_cart.buyer_id = $id and product_cart.status = 1 limit 1");
            return $query->result();
        }
    }
    
    function UpdateCheckoutProceed($id)
    {
        $this->db->query("update product_checkout  set status = 0 where id = $id");
        $this->db->query("update product_cart set status = 0 where order_num = $id");
    }

    function get_all_sum($id) {
        $query = $this->db->query("select sum(quantity) as tquantity, sum(sub_total) as total, sum(commission) as t_comm , sales_tax from product_cart where buyer_id = $id and status = 1");
        return $query->result();
    }

    function get_all_sum_shipping($id) {
        $query = $this->db->query("select sum(quantity) as tquantity, sum(sub_total) as total, sum(commission) as t_comm, sum(shipping_charges) as charges, delievery_time, service_type, sales_tax from product_cart where buyer_id = $id and status = 1");
        return $query->result();
    }

    function checkCartStatus($id) {
        $this->db->where('buyer_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('product_checkout');
        return count($query->result());
    }

    function checkoutInsert($data) {
        $this->db->insert('product_checkout', $data);
        return $this->db->insert_id();
    }

    /*     * **** end **************************************** */
    //////// dealer earn ////////////////////////
    
//    function fetchorderRequested($id)
//    {
//        $query = $this->db->query("select product_cart.* from product_cart inner join product_detail on product_cart.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where dealer_info.user_id = $id and product_cart.status = 1");
//        return $query->result();
//    }
//    function fetchorderDone($id)
//    {
//        $query = $this->db->query("select product_cart.* from product_cart inner join product_detail on product_cart.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where dealer_info.user_id = $id and product_cart.status = 0");
//        return $query->result();
//    }
     function fetchorderDone($id)
    {
        $query = $this->db->query("select product_cart.* from product_cart inner join product_detail on product_cart.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where dealer_info.user_id = $id ");
        return $query->result();
    }
    
    function fetchorderDoneAdmin()
    {
         $query = $this->db->query("select product_cart.*, dealer_info.email_address from product_cart inner join product_detail on product_cart.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id ");
         return $query->result();
    }
    
    /////end///////////////////////////////////
    function get_main_product_fav($id) {

        $query = $this->db->query("select product_detail.* from product_detail inner join  product_favourites on product_detail.id = product_favourites.product_id where product_detail.status = 1 and product_detail.approve_status = 1 and product_favourites.user_id = $id");
        return $query->result();
    }

    function get_product_desc_fav($id) {

        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id inner join product_favourites on product_detail.id = product_favourites.product_id  where product_attribute_value.attribute_id = 'product_desc' and product_detail.approve_status = 1 and product_detail.status = 1 and product_favourites.user_id = $id");
        return $query->result();
    }

    function get_product_dealer_fav($id) {
        $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id inner join product_favourites on product_detail.id = product_favourites.product_id where product_detail.status = 1 and product_detail.approve_status = 1 and product_favourites.user_id = $id");
        return $query->result();
    }

    function get_product_seller_fav($id) {
        $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id inner join product_favourites on product_detail.id = product_favourites.product_id  where product_detail.status = 1 and product_detail.approve_status = 1 and product_favourites.user_id = $id");
        return $query->result();
    }

    function get_product_price_fav($id) {

        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id inner join product_favourites on product_detail.id = product_favourites.product_id  where product_attribute_value.attribute_id = 'cost_price' and product_detail.approve_status = 1 and product_detail.status = 1 and product_favourites.user_id = $id");
        return $query->result();
    }

    function get_product_images_fav($id) {

        $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id  inner join product_favourites on product_detail.id = product_favourites.product_id where  product_detail.approve_status = 1 and product_detail.status = 1 and product_favourites.user_id = $id");
        return $query->result();
    }

    function get_tcount_fav($id) {
        $query = $this->db->query("select product_detail.* from product_detail  inner join product_favourites on product_detail.id = product_favourites.product_id inner join product_attribute_value on product_attribute_value.product_id = product_detail.id where product_detail.status = 1 and product_attribute_value.attribute_id = 'stock_value' and product_attribute_value.attribute_value > 0 and product_detail.approve_status = 1 and product_favourites.user_id = $id");
        $val = count($query->result());
        return $val;
    }

    /*     * * end ******************** */

    /*     * ** clearance data ******** */

    function get_main_product_clearance() {

        $query = $this->db->query("select product_detail.* from product_detail inner join   product_attribute_value on product_attribute_value.product_id = product_detail.id where product_detail.status = 1 and product_detail.approve_status = 1 and product_attribute_value.attribute_id = 'condition' and product_attribute_value.attribute_value = 'clearance'");
        return $query->result();
    }

    function get_product_desc_clearance() {

        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id   where product_attribute_value.attribute_id = 'product_desc' and product_detail.approve_status = 1 and product_detail.status = 1 ");
        return $query->result();
    }

    function get_product_dealer_clearance() {
        $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id inner join product_attribute_value on product_attribute_value.product_id = product_detail.id  where product_detail.status = 1 and product_detail.approve_status = 1 and product_attribute_value.attribute_id = 'condition' and product_attribute_value.attribute_value = 'clearance'");
        return $query->result();
    }

    function get_product_seller_clearance() {
        $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id   inner join product_attribute_value on product_attribute_value.product_id = product_detail.id where product_detail.status = 1 and product_detail.approve_status = 1 and product_attribute_value.attribute_id = 'condition' and product_attribute_value.attribute_value = 'clearance' ");
        return $query->result();
    }

    function get_product_price_clearance() {

        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id   where product_attribute_value.attribute_id = 'cost_price' and product_detail.approve_status = 1 and product_detail.status = 1 ");
//        echo $this->db->last_query();
//        die();
        return $query->result();
    }

    function get_product_images_clearance() {

        $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id inner join product_attribute_value on product_attribute_value.product_id = product_detail.id  where  product_detail.approve_status = 1 and product_detail.status = 1 and product_attribute_value.attribute_id = 'condition' and product_attribute_value.attribute_value = 'clearance'");
        return $query->result();
    }

    function check_clearance($id) {
        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id where product_detail.id = $id and product_attribute_value.attribute_id = 'condition' and product_attribute_value.attribute_value = 'clearance'");
        $val = count($query->result());
        return $val;
    }

    function get_tcount_clearance() {
        $query = $this->db->query("select product_detail.* from product_detail inner join product_attribute_value on product_attribute_value.product_id = product_detail.id  inner join product_attribute_value on product_attribute_value.product_id = product_detail.id where product_detail.status = 1 product_attribute_value.attribute_id = 'stock_value' and product_attribute_value.attribute_value > 0 and product_detail.approve_status = 1 and product_attribute_value.attribute_id = 'condition' and product_attribute_value.attribute_value = 'clearance'");
        $val = count($query->result());
        return $val;
    }

    /*     * ** end ***************** */

    function fetch_product_colour() {

        $query = $this->db->get('colour');
        return $query->result();
    }

    function fetch_products() {
        $this->db->where('status', '1');
        $query = $this->db->get('product_detail');
        return $query->result();
    }

    function Fetch_single_colour($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('colour');
        return $query->result();
    }

    function edit_brands($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('Product_brands');

        return $query->result();
    }

    function approve_prod($id) {
        $this->db->where('id', $id);
        $this->db->set('approve_status', '1');
        $this->db->set('noti_status', 0);
        $query = $this->db->update('product_detail');
        return true;
    }

    function get_all_lessons() {
        $query = $this->db->query("select * from services where type='Lessons'");
        return $query->result();
    }

    function get_all_rentals() {
        $query = $this->db->query("select * from services where type='Rentals'");
        return $query->result();
    }

    function get_all_repairs() {
        $query = $this->db->query("select * from services where type='Repairs'");
        return $query->result();
    }

    function get_all_rehersals() {
        $query = $this->db->query("select * from services where type='Rehearsal'");
        return $query->result();
    }

    function unapprove_prod($id) {
        $this->db->where('id', $id);
        $this->db->set('approve_status', '0');
        $query = $this->db->update('product_detail');
        return true;
    }

    function delete_product($id) {
        $this->db->where('id', $id);
        $this->db->set('status', '0');
        $query = $this->db->update('product_detail');
        return true;
    }

    function delete_user($id) {
        $this->db->where('id', $id);
        $this->db->set('status', '0');
        $query = $this->db->update('user_registration');
        return true;
    }

    /*     * ** admin profile **** */

    function insert_admin_image($data) {
        $this->db->insert('admin_profile', $data);
        return true;
    }

    function admin_action($dd) {
        $this->db->where('id', $dd);
        $query = $this->db->get('admin_profile');
        return count($query->result());
    }

    function update_admin_image($data, $dd) {
        $this->db->where('id', $dd);
        $query = $this->db->update('admin_profile', $data);
        return true;
    }

    function get_admin_profile() {
        $this->db->where('id', 1);
        $query = $this->db->get('admin_profile');
        return $query->result();
    }

    function fetch_products_pending() {
//        $this->db->where('approve_status',0);
//        $this->db->where('status',1);
        $query = $this->db->query("select product_detail.* ,user_registration.dealerrID, user_registration.firstname,user_registration.lastname, (select category_name from Product_Category  where Product_Category.id = product_detail.category_id) as category, (select sub_category_name from Product_sub_category  where Product_sub_category.id = product_detail.sub_category_id) as subcategory from product_detail inner join user_registration on product_detail.added_by_id = user_registration.id   where product_detail.approve_status = 0 and product_detail.status = 1 ");
        return $query->result();
    }

    function fetch_users_pending() {
        $this->db->where('approve_status', 0);
        $this->db->where('status', 1);
        $query = $this->db->get('user_registration');
        return $query->result();
    }

    /*     * * end ************** */

    function fetch_category() {

        //$this->db->order_by('id','ASC');
        $query = $this->db->get('Product_Category');
        return $query->result();
    }

    function edit_category($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('Product_Category');

        return $query->result();
    }

///echo $this->last_query();die('kailash');

    function fetch_brand_images($id) {

        $this->db->where('brand_id', $id);
        $query = $this->db->get('brand_images');

        return $query->result();
    }

    function fetch_user($email, $password) {

        $query = $this->db->query("select user_registration.* , buyer_info.city as city from user_registration inner join buyer_info on user_registration.id = buyer_info.user_id where user_registration.username = '$email' and user_registration.password = '$password' and user_registration.status = 1 and user_registration.approve_status = 1");
        if (count($query->result()) > 0) {
            return $query->result();
        } else {
            $this->db->where('username', $email);
            $this->db->where('password', $password);
            $this->db->where('status', 1);
            $this->db->where('approve_status', 1);
            $query = $this->db->get('user_registration');
            //echo $this->db->last_query();die('heena');

            return $query->result();
        }
    }

    function get_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('user_registration');
        return $query->result();
    }

    function fetch_users() {

//        $this->db->where('type', 'buyer');
//        $this->db->where('type', 'seller');
//        $this->db->where('status', '1');
        $query = $this->db->query("select * from user_registration where type = 'seller' or type = 'buyer' and status = 1");

        return $query->result();
    }

    function fetch_clearance_adds() {
        $this->db->where('status', 1);
        $query = $this->db->get('clearance_adds');
        return $query->result();
    }

    function edit_clearance($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('clearance_adds');
        return $query->result();
    }

    function update_clearance($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('clearance_adds', $data);
        return true;
    }

    function get_all_Adds() {
        $this->db->where('status', 1);
        $query = $this->db->get('clearance_adds');
        return $query->result();
    }

    function fetch_dealers() {

        $this->db->where('type', 'dealer');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }

    function fetch_dealers_trash() {

        $this->db->where('type', 'dealer');
        $this->db->where('status', '0');
        $query = $this->db->get('user_registration');
        return $query->result();
    }

    function recover_user($id) {
        $this->db->where('type', 'dealer');
        $this->db->where('id', $id);
        $this->db->set('status', '1');
        $query = $this->db->update('user_registration');
        return true;
    }

    function fetch_sellers() {

        $this->db->where('type', 'seller');
        $this->db->where('status', '1');
        $query = $this->db->get('user_registration');
        return $query->result();
    }

    function fetch_attribute_Set() {
        $query = $this->db->get('attribute_set');
        return $query->result();
    }

    function fetch_attributes($id) {
        // if ($id == 1) {

        $this->db->where('attribute_set_id', $id);
        $this->db->where('status', 1);
        $this->db->order_by('sort', 'ASC');
        $query = $this->db->get('product_attributes');


        //$query = $this->db->query('select * from product_attributes inner join product_attributes_for_sets on product_attributes.id = product_attributes_for_sets.attribute_id where product_attributes_for_sets.attribute_set_id =' . $id . 'order by product_attributes.sort ASC');

        return $query->result();
    }

    function fetch_attributess($id) {
        // if ($id == 1) {

        $this->db->where('attribute_set_id', $id);
        $this->db->order_by('sort', 'ASC');
        $query = $this->db->get('product_attributes');

        return $query->result();
    }

    function fetch_sub_category($last) {
        $this->db->where('main_category_id', $last);
        $query = $this->db->get('Product_sub_category');
        return $query->result();
    }

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

    /*     * *** product_profile_view ******* */

    function p_images($id) {
        $this->db->where('product_id', $id);
        $query = $this->db->get('Product_images');
        return $query->result();
    }

    function catid($id) {
        $this->db->where('category_name', "$id");
        $query = $this->db->get('Product_Category');
        return $query->result();
    }

    function subcatid($id) {
        $this->db->where('sub_category_name', "$id");
        $query = $this->db->get('Product_sub_category');
        return $query->result();
    }

    function getatts($catt) {
        $this->db->where('attribute_set_id', $catt);
        $this->db->where('status', 1);
        $this->db->order_by('sort', 'ASC');
        $query = $this->db->get('product_attributes');
        return $query->result();
    }

    function p_main($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('product_detail');
        return $query->result();
    }

    /*     * * fetch all cats **** */

    function all_cats() {
        $this->db->where('status', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('Product_Category');
        return $query->result();
    }

    /** end * */
    /*     * ** csv format data ******* */

    function fetch_csv($idd) {
        $this->db->where('status', 1);
        $this->db->where('attribute_set_id', $idd);
        $query = $this->db->get('product_attributes');
        return $query->result();
    }

    /*     * ** end ****************** */

    /*     * **** end ********************** */
    /*     * *** buy product page code ****** */

    /*     * ***** buy search page **** */

    function get_main_product_search($city) {

        $query = $this->db->query("select product_detail.* from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where product_detail.status = 1 and product_detail.approve_status = 1 and dealer_info.city = '$city'");
        return $query->result();
    }

    function get_product_desc_search($city) {

        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where product_attribute_value.attribute_id = 'product_desc' and product_detail.approve_status = 1 and product_detail.status = 1 and dealer_info.city = '$city'");
        return $query->result();
    }

    function get_product_dealer_search($city) {
        $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where product_detail.status = 1 and product_detail.approve_status = 1 and dealer_info.city = '$city'");
        return $query->result();
    }

    function get_product_seller_search($city) {
        $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where product_detail.status = 1 and product_detail.approve_status = 1 and seller_info.city = '$city'");
        return $query->result();
    }

    function get_product_price_search($city) {

        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where product_attribute_value.attribute_id = 'cost_price' and product_detail.approve_status = 1 and product_detail.status = 1 and dealer_info.city = '$city'");
        return $query->result();
    }

    function get_product_images_search($city) {

        $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where  product_detail.approve_status = 1 and product_detail.status = 1 and dealer_info.city = '$city'");
        return $query->result();
    }

    function get_tcount($city) {
        $query = $this->db->query("select product_detail.* from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id inner join product_attribute_value on  product_attribute_value.product_id = product_detail.id  where product_detail.status = 1 and product_detail.approve_status = 1 and product_attribute_value.attribute_id = 'stock_value' and product_attribute_value.attribute_value > 0 and dealer_info.city = '$city'");
        //echo $this->db->last_query();
       // die();
        $val = count($query->result());
        return $val;
    }

    /*     * *** end ****** */

    /*     * ** by id products ****** */

    function get_main_product_byid($city) {

        $query = $this->db->query("select product_detail.* from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where product_detail.status = 1 and product_detail.approve_status = 1 and product_detail.added_by_id = '$city'");
        return $query->result();
    }

    function get_product_desc_byid($city) {

        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where product_attribute_value.attribute_id = 'product_desc' and product_detail.approve_status = 1 and product_detail.status = 1  and product_detail.added_by_id = '$city'");
        return $query->result();
    }

    function get_product_cat_byid($city) {

        $query = $this->db->query("select * from Product_Category inner join product_detail on Product_Category.id = product_detail.category_id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where   product_detail.approve_status = 1 and product_detail.status = 1  and product_detail.added_by_id = '$city'");
        return $query->result();
    }

    function get_product_dealer_byid($city) {
        $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where product_detail.status = 1 and product_detail.approve_status = 1 and  product_detail.added_by_id= '$city'");
        return $query->result();
    }

    function get_product_seller_byid($city) {
        $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where product_detail.status = 1 and product_detail.approve_status = 1 and  product_detail.added_by_id = '$city'");
        return $query->result();
    }

    function get_product_price_byid($city) {

        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where product_attribute_value.attribute_id = 'cost_price' and product_detail.approve_status = 1 and product_detail.status = 1 and  product_detail.added_by_id = '$city'");
        return $query->result();
    }

    function get_product_images_byid($city) {

        $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id inner join dealer_info on product_detail.added_by_id = dealer_info.user_id where  product_detail.approve_status = 1 and product_detail.status = 1 and  product_detail.added_by_id = '$city'");
        return $query->result();
    }

    function get_tcount_byid($city) {
        $query = $this->db->query("select product_detail.* from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id inner join product_attribute_value on product_attribute_value.product_id = product_detail.id where product_detail.status = 1 and product_attribute_value.atttibute_id = 'stock_value' and product_attribute_value.attribute_value > 0 and product_detail.approve_status = 1 and  product_detail.added_by_id = '$city'");
        $val = count($query->result());
        return $val;
    }

    /*     * ** end **************** */

    /*     * ** cat search buy page ***** */

    function get_main_product_search_cat($city) {

        $query = $this->db->query("select product_detail.* from product_detail where product_detail.status = 1 and product_detail.approve_status = 1 and  product_detail.category_id = '$city'");
        return $query->result();
    }

    function get_product_desc_search_cat($city) {

        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id  where product_attribute_value.attribute_id = 'product_desc' and product_detail.approve_status = 1 and product_detail.status = 1 and product_detail.category_id = '$city'");
        //echo $this->db->last_query();
        return $query->result();
    }

    function get_product_dealer_search_cat($city) {
        $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where product_detail.status = 1 and product_detail.approve_status = 1 and product_detail.category_id = '$city'");
        return $query->result();
    }

    function get_product_seller_search_cat($city) {
        $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where product_detail.status = 1 and product_detail.approve_status = 1 and product_detail.category_id = '$city'");
        return $query->result();
    }

    function get_product_price_search_cat($city) {

        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id  where product_attribute_value.attribute_id = 'cost_price' and product_detail.approve_status = 1 and product_detail.status = 1 and product_detail.category_id = '$city'");
        return $query->result();
    }

    function get_product_images_search_cat($city) {

        $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id  where  product_detail.approve_status = 1 and product_detail.status = 1 and product_detail.category_id = '$city'");
        // echo $this->db->last_query();
        return $query->result();
    }

    function get_tcount_cat($city) {
        $query = $this->db->query("select product_detail.* from product_detail  inner join product_attribute_value on product_attribute_value.product_id = product_detail.id  where product_detail.status = 1 and product_attribute_value.attribute_id = 'stock_value' and product_attribute_value.attribute.value > 0 and product_detail.approve_status = 1 and product_detail.category_id = '$city'");

        $val = count($query->result());
        return $val;
    }

    function fetch_search_category($v_data) {
        $this->db->where('id', $v_data);
        $query = $this->db->get('Product_Category');
        return $query->result();
    }

    /*     * ** end ****** */

    function get_main_product() {
        $this->db->where('approve_status', 1);
        $this->db->where('status', 1);
        $query = $this->db->get('product_detail');
        return $query->result();
    }

    function check_quant($id) {
        $query = $this->db->query("select product_detail.* from product_detail inner join product_attribute_value on product_detail.id = product_attribute_value.product_id where product_attribute_value.attribute_id = 'stock_value' and product_attribute_value.attribute_value > 0 and product_attribute_value.product_id = '$id'");
       // echo $this->db->last_query();
        // echo count($query->result());
        if (count($query->result()) > 0) {

            return 1;
        } else {
            return 0;
        }
    }

    /*     * *** cart page ***** */

    function all_cart($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('product_cart');
        return $query->result();
    }

    function old_qty($pid) {
        $this->db->where('attribute_id', 28);
        $this->db->where('product_id', $pid);
        $query = $this->db->get('product_attribute_value');
        return $query->result();
    }

    function undo_cart($pid, $qty) {

        $query = $this->db->query("update product_attribute_value set attribute_value = '$qty' where attribute_id = 28 and product_id = $pid");
        return true;
    }

    function get_product_dealer() {
        $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where product_detail.status = 1 and product_detail.approve_status = 1");
        return $query->result();
    }

    function get_product_seller() {
        $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where product_detail.status = 1 and product_detail.approve_status = 1");
        return $query->result();
    }

    function get_product_desc() {
        //$this->db->where('attribute_id',7);
        //$query = $this->db->get('product_attribute_value');
        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id where product_attribute_value.attribute_id = 'product_desc' and product_detail.approve_status = 1 and product_detail.status = 1");
        return $query->result();
    }

    function get_product_price() {
        //$this->db->where('attribute_id',16);
        //$query = $this->db->get('product_attribute_value');
        $query = $this->db->query("select * from product_attribute_value inner join product_detail on product_attribute_value.product_id = product_detail.id where product_attribute_value.attribute_id = 'cost_price' and product_detail.approve_status = 1 and product_detail.status = 1");
        return $query->result();
    }

    function get_product_images() {
        //$this->db->where('attribute_id',16);
        $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where  product_detail.approve_status = 1 and product_detail.status = 1");
        //$query = $this->db->get('Product_images');
        return $query->result();
    }

//// ajax //////
    function fetch_pdata_main($brand, $color, $cat, $con, $dtype, $price) {

        if ($dtype == 'cat') {

            //$query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
            $query = $this->db->query("SELECT * FROM `product_detail`  where   product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  ) and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  ) and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color,con') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'brand_name'  and product_attribute_value.attribute_value = '$brand' )   and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat,color') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = '$color_name' )  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con,cat') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where  product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,cat') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand   ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,cat') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color   ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con,cat') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }



//        else if ($brand == 0 && $color != 0 && $cat != 0 && $con == 0) {
//            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' or product_attribute_value.attribute_id = 'brand_name'  and product_attribute_value.attribute_value = $brand  )  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
//        }
//        else if ($brand == 0 && $color == 0 && $cat != 0 && $con != 0) {
//            echo "yes";
//            die();
//            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' or product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  or product_attribute_value.attribute_id = 'brand_name'  and product_attribute_value.attribute_value = $brand  )  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
//        }
//        elseif ($brand != 0 && $color != 0 && $cat != 0 && $con = 0) {
//            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  or product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
//        }
//        else if ($brand == 0 && $color != 0 && $cat != 0 && $con != 0) {
//            $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where   product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' or product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand)  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
//        }
//        else{
//        $query = $this->db->query("SELECT * FROM `product_detail`  where  product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  or product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
//        }
        //echo $this->db->last_query();
        //  die();
        if (count($query->result()) > 0) {

            return $query->result();
        } else {
            return 0;
        }
    }

    function delete_img($id) {

        $query = $this->db->query("delete from Product_images where image_path = '$id'");
//        echo $this->db->last_query();
//        die();

        return true;
    }

    function fetch_pdata_dealer($brand, $color, $cat, $con, $dtype, $price) {
        if ($dtype == 'cat') {

            // $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where    product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  ) and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  ) and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color,con') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'brand_name'  and product_attribute_value.attribute_value = '$brand' )   and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat,color') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = '$color_name' )  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con,cat') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where  product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,cat') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand   ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,cat') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color   ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con,cat') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }

        //$query = $this->db->query("select dealer_info.* , product_detail.id as pid from product_detail inner join dealer_info on  product_detail.added_by_id = dealer_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  or product_detail.category_id = $cat and  product_detail.status = 1 and product_detail.approve_status = 1");
        return $query->result();
    }

    function fetch_pdata_seller($brand, $color, $cat, $con, $dtype, $price) {
        if ($dtype == 'cat') {

            //$query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where    product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  ) and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  ) and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color,con') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'brand_name'  and product_attribute_value.attribute_value = '$brand' )   and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat,color') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = '$color_name' )  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con,cat') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where  product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,cat') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand   ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,cat') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color   ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con,cat') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        //$query = $this->db->query("select seller_info.* , product_detail.id as pid from product_detail inner join seller_info on  product_detail.added_by_id = seller_info.user_id where   product_detail.id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  or product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1");
        return $query->result();
    }

    function fetch_pdata_desc($brand, $color, $cat, $con, $dtype, $price) {
        if ($dtype == 'cat') {

            //   $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
//WHERE product_attribute_value.product_id
//IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.category_id = $cat AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_detail.category_id = $cat AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  )  AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  ) AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  ) AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color )  AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color,con') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'brand_name'  and product_attribute_value.attribute_value = '$brand' )  AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat,color') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = '$color_name' )  and product_detail.category_id = $cat and AND product_attribute_value.attribute_id = 'product_desc' product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where  product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' ) and product_detail.category_id = $cat  AND product_attribute_value.attribute_id = 'product_desc' and  product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand   ) and product_detail.category_id = $cat  AND product_attribute_value.attribute_id = 'product_desc' and  product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color   ) and product_detail.category_id = $cat  AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat AND product_attribute_value.attribute_id = 'product_desc' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
//        $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
//WHERE product_attribute_value.product_id
//IN (
//SELECT product_id
//FROM product_attribute_value
//WHERE product_attribute_value.attribute_id = 'brand_name'
//AND product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con') or product_detail.category_id = $cat
//AND product_attribute_value.attribute_id = 'product_desc'
//AND product_detail.approve_status =1
//AND product_detail.status =1 ");
        if (count($query->result()) > 0) {

            return $query->result();
        } else {
            return 0;
        }
    }

    function fetch_pdata_price($brand, $color, $cat, $con, $dtype, $price) {
        if ($dtype == 'cat') {

            // $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
//WHERE product_attribute_value.product_id
//IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.category_id = $cat AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE  product_detail.category_id = $cat AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  )  AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  ) AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  ) AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color )  AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color,con') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'brand_name'  and product_attribute_value.attribute_value = '$brand' )  AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat,color') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = '$color_name' )  and product_detail.category_id = $cat and AND product_attribute_value.attribute_id = 'cost_price' product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where  product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' ) and product_detail.category_id = $cat  AND product_attribute_value.attribute_id = 'cost_price' and  product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand   ) and product_detail.category_id = $cat  AND product_attribute_value.attribute_id = 'cost_price' and  product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN  (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color   ) and product_detail.category_id = $cat  AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("SELECT * FROM product_attribute_value INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
WHERE product_attribute_value.product_id
IN (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat AND product_attribute_value.attribute_id = 'cost_price' and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }

//        $query = $this->db->query("SELECT * 
//FROM product_attribute_value
//INNER JOIN product_detail ON product_attribute_value.product_id = product_detail.id
//WHERE product_attribute_value.product_id
//IN (
//SELECT product_id
//FROM product_attribute_value
//WHERE product_attribute_value.attribute_id = 'brand_name'
//AND product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con')
// or product_detail.category_id = $cat
//AND product_attribute_value.attribute_id = 'cost_price'
//AND product_detail.approve_status = 1
//AND product_detail.status = 1");
        //echo $this->db->last_query();
//        die();
        if (count($query->result()) > 0) {

            return $query->result();
        } else {
            return 0;
        }
    }

    function fetch_pdata_img($brand, $color, $cat, $con, $dtype, $price) {

        if ($dtype == 'cat') {

            //$query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where  product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  ) and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  ) and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,color,con') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'condition' and  product_attribute_value.attribute_value = '$con'  and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'brand_name'  and product_attribute_value.attribute_value = '$brand' )   and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat,color') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' and product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = '$color_name' )  and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'con,cat') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where  product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand  and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con' )  and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,cat') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand   ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,cat') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color   ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'color,con,cat') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'color_name' and  product_attribute_value.attribute_value = $color and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
        if ($dtype == 'brand,con,cat') {

            $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (select product_id from product_attribute_value where product_attribute_value.attribute_id = 'brand_name' and  product_attribute_value.attribute_value = $brand and product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con'  ) and product_detail.category_id = $cat and product_detail.status = 1 and product_detail.approve_status = 1 ");
        }
//        $query = $this->db->query("select * from Product_images inner join product_detail on Product_images.product_id = product_detail.id where Product_images.product_id in (SELECT product_id
//FROM product_attribute_value
//WHERE product_attribute_value.attribute_id = 'brand_name'
//AND product_attribute_value.attribute_value = $brand  or product_attribute_value.attribute_id = 'color_name'  and product_attribute_value.attribute_value = $color or product_attribute_value.attribute_id = 'condition'  and product_attribute_value.attribute_value = '$con')
// or product_detail.category_id = $cat and  product_detail.approve_status = 1 and product_detail.status = 1");
        if (count($query->result()) > 0) {

            return $query->result();
        } else {
            return 0;
        }
    }

/// end ///////



    /*     * *** end ******************* */

    function fetch_cart($id) {

        $query = $this->db->query("select * from product_cart where status = 1 or status = 2 and buyer_id = $id");
        return $query->result();
    }

    function fetch_cart_count($id) {

        $query = $this->db->query("select * from product_cart where status = 1 or status = 2 and buyer_id = $id");
        if (count($query->result()) > 0) {

            return count($query->result());
        } else {
            return 0;
        }
    }

    function update_img_info($idd) {
        $this->db->where('status', 0);
        $this->db->set('product_id', $idd);
        $this->db->set('status', 1);
        $this->db->update('Product_images');
        return true;
    }

    function session_data($session) {

        $this->db->where('email', $session);
        $query = $this->db->get('user_registration');
        return $query->result();
    }

    function get_products_byy($id) {
        $query = $this->db->query("select * from product_detail where product_detail.added_by_id = $id");
        return $query->result();
    }

    function get_product_shipping($id) {
        $query = $this->db->query("select * from product_shipping_details  where product_shipping_details.product_id = $id  ");
        return $query->result();
    }

    function get_product_on_dealer($type) {
        if ($type == 'seller') {
            $query = $this->db->query("select product_detail.* ,user_registration.dealerrID, user_registration.firstname,user_registration.lastname, (select category_name from Product_Category  where Product_Category.id = product_detail.category_id) as category from product_detail inner join user_registration on product_detail.added_by_id = user_registration.id  where user_registration.type='$type' and product_detail.status = 1");
        } else {
            $query = $this->db->query("select product_detail.* ,user_registration.dealerrID, user_registration.store, (select category_name from Product_Category  where Product_Category.id = product_detail.category_id) as category from product_detail inner join user_registration on product_detail.added_by_id = user_registration.id  where user_registration.type='$type' and product_detail.status = 1");
        }
        return $query->result();
    }

    function get_product_on_dealerr() {

        $query = $this->db->query("select product_detail.* ,user_registration.dealerrID, user_registration.firstname,user_registration.lastname, (select category_name from Product_Category  where Product_Category.id = product_detail.category_id) as category, (select sub_category_name from Product_sub_category  where Product_sub_category.id = product_detail.sub_category_id) as subcategory from product_detail inner join user_registration on product_detail.added_by_id = user_registration.id  where product_detail.status = 1 ");


        return $query->result();
    }

    function get_product_loc($id) {
        $query = $this->db->query("select * from product_locations where product_id = $id");
    }

    function get_products_by($id) {
        $query = $this->db->query("select * from product_detail where product_detail.added_by_id = $id");
        return $query->result();
    }

    function get_images_by($id) {
        $query = $this->db->query("select  Product_images.image_path from product_detail inner join Product_images on product_detail.id = Product_images.product_id where product_detail.added_by_id = $id");
        return $query->result();
    }

    function get_images_byy($id) {
        $query = $this->db->query("select  * from Product_images  where product_id = $id");
        return $query->result();
    }

    function get_productss($id) {
        $query = $this->db->query("select product_detail.*, Product_Category.*,Product_sub_category.* from product_detail inner join Product_Category on product_detail.category_id = Product_Category.id inner join Product_sub_category on product_detail.sub_category_id = Product_sub_category.id where product_detail.id = $id");
//        echo $this->db->last_query();
//        die();
        return $query->result();
    }

    function get_productsss($id) {
        $query = $this->db->query("select product_detail.*, Product_Category.* from product_detail inner join Product_Category on product_detail.category_id = Product_Category.id  where product_detail.id = $id");
//        echo $this->db->last_query();
//        die();
        return $query->result();
    }

    function get_products_inner($id, $cat) {
        $query = $this->db->query("select product_attributes.* , product_attribute_value.* from product_attribute_value inner join product_attributes on product_attribute_value.attribute_id = product_attributes.attribute_code where product_attribute_value.product_id = $id and product_attributes.attribute_set_id = $cat and product_attributes.status = 1  order by product_attributes.sort asc");
//        echo $this->db->last_query();
//        die();
        return $query->result();
    }

    function get_products_shipping($id) {
        $this->db->where('product_id', $id);
        $query = $this->db->get('product_shipping_details');
        return $query->result();
    }

    function check_exist($uid, $pid) {
        $this->db->where('product_id', $pid);
        $this->db->where('buyer_id', $uid);
        $this->db->where('status', 1);
        $query = $this->db->get('product_cart');
        if (count($query->result()) > 0) {

            return count($query->result());
        } else {
            return 0;
        }
    }

    function check_exist_data($uid, $pid) {
        $this->db->where('product_id', $pid);
        $this->db->where('buyer_id', $uid);
        $this->db->where('status', 1);
        $query = $this->db->get('product_cart');
        return $query->result();
    }

    function get_images($brandid, $colorid) {
        $this->db->select("image_path");
        $this->db->where("colour_id", $colorid);
        $this->db->where("brand_id", $brandid);

        $query = $this->db->get("brand_images");
//echo $this->db->last_query();die;

        if (count($query->result()) > 0) {

            return $query->result();
        } else {
            return 0;
        }
    }

    function get_sub_categories($catid) {
//$this->db->select("image_path");
        $this->db->where("main_category_id", $catid);
//$this->db->where("brand_id",$brandid);

        $query = $this->db->get("Product_sub_category");
//echo $this->db->last_query();die;

        if (count($query->result()) > 0) {

            return $query->result();
        } else {
            return 0;
        }
    }

    function fetch_lessons() {

        $this->db->where('type', 'Lessons');
        $query = $this->db->get('services');
        return $query->result();
    }

    function fetch_repairs() {

        $this->db->where('type', 'Repiar');
        $query = $this->db->get('services');
        return $query->result();
    }

    function fetch_rentals() {

        $this->db->where('type', 'Rentals');
        $query = $this->db->get('services');
        return $query->result();
    }

    function fetch_reharsal() {

        $this->db->where('type', 'Reharsal');
        $query = $this->db->get('services');
        return $query->result();
    }

    function fetch_reviews() {

        $query = $this->db->get('reviews');
        return $query->result();
    }

    function get_reviews($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('reviews');
        return $query->result();
    }

    function fetch_single_product($id) {

        //$this->db->where('id',$id);
        //$query = $this->db->get('product_detail');
        //  $query = $this->db->query("select product_attributes.* , product_attribute_value.* from product_attribute_value inner join product_attributes on product_attribute_value.attribute_id = product_attributes.id where product_attribute_value.product_id = $id");
        $query = $this->db->query("select product_detail.* , user_registration.firstname,user_registration.lastname,user_registration.email,  Product_Category.category_name from product_detail inner join user_registration on product_detail.added_by_id = user_registration.id inner join Product_Category on Product_Category.id = product_detail.category_id where product_detail.id = $id");
//echo $this->db->last_query();die;
        return $query->result();
    }

    function fetch_price($id) {

        //$query = $this->db->query("select product_detail.id, product_attributes.attribute_code from product_detail inner join product_attributes on product_detail.attribute_set = product_attributes.attribute_set_id where product_detail.id= $id");
        $this->db->where('product_id', $id);
        $this->db->where('attribute_id', 16);
        $query = $this->db->get('product_attribute_value');


//echo $this->db->last_query();die;
        return $query->result();
    }

    function fetch_color($id) {

        $this->db->where('product_id', $id);
        $this->db->where('attribute_id', 26);
        $query = $this->db->get('product_attribute_value');


//echo $this->db->last_query();die;
        return $query->result();
    }

    function get_brand($id) {

        $this->db->where('product_id', $id);
        $this->db->where('attribute_id', 25);
        $query = $this->db->get('product_attribute_value');


//echo $this->db->last_query();die;
        return $query->result();
    }

    function get_desc($id) {

        $this->db->where('product_id', $id);
        $this->db->where('attribute_id', 7);
        $query = $this->db->get('product_attribute_value');


//echo $this->db->last_query();die;
        return $query->result();
    }

    function fetch_images($id) {

        $this->db->where('product_id', $id);
        $query = $this->db->get('Product_images');

//echo $this->db->last_query();die;
        return $query->result();
    }

    function dealer_services() {

        $query = $this->db->get('dealer_services');
        return $query->result();
    }

    /*     * *** product view page ajax ****** */

    function fetch_quantity($qty, $pid) {
        $query = $this->db->query("select attribute_value from product_attribute_value where attribute_id = 'stock_value' and product_id = $pid ");
        return $query->result();
    }

    /*     * ***         end            ****** */


    /*     * ** sign_in time **** */

    function sign_time($data) {
        $query = $this->db->insert('signin_record', $data);
        return $this->db->insert_id();
    }

    function update_sign($id) {
//        echo date();
//        die();
//        $this->db->where('id',$id);
//        $this->db->set('sign_out',now());
        $query = $this->db->query("update signin_record set sign_out = now() where id = $id");
        return true;
    }

    /*     * ** end ************* */

//****end**********///
}

?>
