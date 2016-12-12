<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	
	/* $link = mysql_connect('localhost', 'mediaforestdemo', 'mediaforest123$%^');
    mysql_select_db('demo_image',$link);
	 */
	
		if(move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$_FILES['file']['name'])){
		
		echo "uploaded";
		/* 
                $ii = "insert into brand_images(brand_id, brand_name,image_path) values($id,'$bname','".$_FILES['file']['name']."')";
				$kk = mysql_query($ii);
echo($_POST['index']); */
	}
			
			
			
		
		
	
	
	
}
exit;
?>