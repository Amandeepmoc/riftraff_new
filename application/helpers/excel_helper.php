 <?php
class excel_helper extends CI_Controller {

 public function __construct(){
		parent::__construct();
			
		$this->load->database();
		$this->load->model('Get_category_model');
	}
		
		
  function create_excel_export()
    {
        $ci = & get_instance();
        $ci->load->Get_category_model('find_users');
        $users = $ci->Get_category_model->find_users();

        $headers = array("dealerrID", "firstname", "lastname","email","store");

        $title = "";
        $data = "";
        $filename = 'Users';
        foreach($headers as $value) {
                $title .= $value . "\t";
        }
        $headers = trim($title). "\n";

        if (!empty($users)){
            foreach ($users as $row){
                $line = '';
                $id = $row['id'];
                $dealerrID = $row['dealerrID'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $store = $row['store'];
                
                $line .= $id . "\t";
                $line .= $dealerrID . "\t";
                $line .= $firstname . "\t";
                $line .= $lastname . "\t";
                $line .= $email . "\t";
                $line .= $store . "\t";

                $data .= trim($line). "\n";
            }
        }

        $export = array(
            'filename' => $filename,
            'headers' => $headers,
            'data' => $data
        );

        return $export;
    } 
  }  
 ?>  
 
