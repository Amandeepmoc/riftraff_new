<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	//print_r($_FILES);

     
	
//die();
	//database configuration
/* 	$dbHost = 'localhost';
	$dbUsername = 'mediaforestdemo';
	$dbPassword = 'mediaforest123$%^';
	$dbName = 'demo_image';
	//connect with the database
	$link = mysql_connect('localhost', 'mediaforestdemo', 'mediaforest123$%^');
    mysql_select_db('demo_image',$link); */
	//$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
	//if($mysqli->connect_errno){
	//	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	//}
	
		if(move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$_FILES['file']['name'])){
		
		echo "<h1>file moved</h1>";
              /*   $ii = "insert into brand_images(brand_id, brand_name,image_path) values($id,'$bname','".$_FILES['file']['name']."')";
				$kk = mysql_query($ii);
echo($_POST['index']); */
	}else
	{
		echo "not";
	}
			
			
			
		
		
	
	
	
}
exit;
?>
