<?php
// DB Connection==>
$hostname="localhost";
$username="DBUsername";
$password="DBpassword";
$dbname="DB";

mysql_connect($hostname,$username,$password) or die(mysql_error());

mysql_select_db("$dbname") or die("table unavailable");
//<==




// insert multiple Image ==>
$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp");
$max_file_size = 1024*900; //100 kb
$path = "upload"; // Upload directory
$count = 0;
$code=time();
 
 foreach ($_FILES['image_icon']['name'] as $f => $imgname) {     
	    if ($_FILES['image_icon']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['image_icon']['error'][$f] == 0) {	           
	        if ($_FILES['image_icon']['size'][$f] > $max_file_size) {
	            $message[] = "$imgname is too large!.";
	            continue; // Skip large files
	        }
			else if( ! in_array(pathinfo($imgname, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$imgname is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
			
			$insert_img=mysql_query("INSERT INTO multiple_image(image) VALUES ('$code$imgname')");
			
			
	            if(move_uploaded_file($_FILES["image_icon"]["tmp_name"][$f], "$path/$code$imgname")) {
	            	$count++; // Number of successfully uploaded files
	            }
	        }
	    }
	}
 
 
 	# error messages
	
		if(isset($message)) {
			foreach ($message as $msg) {
				printf("<p class='status'>%s</p></ br>\n", $msg);
			}
		}
		# success message
		if($count !=0){
			printf("<p class='status'>%d files added successfully!</p>\n", $count);
		}
  
?>