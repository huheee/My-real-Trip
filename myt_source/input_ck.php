<? session_start();
	
	error_reporting(0);
	
	
	
	
	include "./config/dbcon.php";
	mysql_query("set names utf8");
			
			$target_file = array();
			
			
			
			for($i = 1; $i < 5; $i= $i + 1)
			{
			
			$pr_file = $_POST["pr_file".$i];
			
			$target_dir = "uploads/";
			$target_file[$i] = $target_dir . basename($_FILES["pr_file".$i]["name"]);
			
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file[$i],PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
			if(isset($_POST["submit_ok"])) {
 			   $check = getimagesize($_FILES["pr_file".$i]["tmp_name"]);
 			   if($check !== false) {
   			     echo "File is an image - " . $check["mime"] . ".";
  			      $uploadOk = 1;
 			   }
			   else {
       			 echo "File is not an image.";
      			 $uploadOk = 0;
 			   }
			}

// Check if file already exists
			if (file_exists($target_file[$i])) {
  			  echo "Sorry, file already exists.";
  			  $uploadOk = 0;
			}
// Check file size
			else if ($_FILES["pr_file".$i]["size"] > 500000) {
  			  echo "Sorry, your file is too large.";
   			 $uploadOk = 0;
			}
// Allow certain file formats
			else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			 echo $imageFileType;
   			 echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    		 $uploadOk = 0;
			}
			
			
			
// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
  			 echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
			} 
			else {
   				 if (move_uploaded_file($_FILES["pr_file".$i]["tmp_name"], $target_file[$i])) {
      			  echo "The file ". basename( $_FILES["pr_file".$i]["name"]). " has been uploaded.";
    
	
	
	
	
			} 
			else {
       			 echo " Sorry, there was an error uploading your file.";
  			  }
			}
	
		}//for end
	

			$pr_code = intval($_POST["pr_code"]);
			if($pr_code == "")
			{}
			else
			{
				$pr_name = $_POST["pr_name"];
				$pr_emergency = $_POST["pr_emergency"];
				$pr_language = $_POST["pr_language"];
				$pr_categorygroup = $_POST["pr_categorygroup"];
				$pr_region = $_POST["pr_region"];
				$pr_country = $_POST["pr_country"];
				$pr_city = $_POST["pr_city"];
				$pr_air = $_POST["pr_air"];
				$pr_hotel = $_POST["pr_hotel"];
				$pr_vehicle = $_POST["pr_vehicle"];
				$pr_durationtype = $_POST["pr_durationtype"];
				$pr_currency = $_POST["pr_currency"];
				
				$pr_meetingpoint = $_POST["pr_meetingpoint"];
				$pr_meetingpointmap = $_POST["pr_meetingpointmap"];
				$pr_finishpoint = $_POST["pr_finishpoint"];
				$pr_option = $_POST["pr_option"];
				$pr_included = $_POST["pr_included"];
				$pr_excluded = $_POST["pr_excluded"];
				$pr_preparation = $_POST["pr_preparation"];
				$pr_notice = $_POST["pr_notice"];
				$pr_explantion = $_POST["pr_explantion"];
				
				
				
				$pr_priceunit = intval($_POST["pr_priceunit"]);
				$pr_minno = intval($_POST["pr_minno"]);
				$pr_maxno = intval($_POST["pr_maxno"]);
				$pr_price = intval($_POST["pr_price"]);
				$pr_authorno = intval($_POST["pr_authorno"]);
				
				
				
				$sql = "insert into program (pr_code, pr_name, pr_explantion, pr_emergency, pr_language, pr_categorygroup, pr_region, pr_country, pr_city, pr_air, pr_hotel, pr_vehicle, pr_durationtype, pr_currency, pr_priceunit, pr_minno, pr_maxno, pr_meetingpoint, pr_meetingpointmap, pr_finishpoint, pr_option, pr_included, pr_excluded, pr_preparation, pr_notice, pr_price,pr_authorno, pr_filename1, pr_filename2, pr_filename3, pr_filename4) ";
				
				
				$sql .=" VALUES ($pr_code, '$pr_name', '$pr_explantion', '$pr_emergency', '$pr_language', '$pr_categorygroup', '$pr_region', '$pr_country', '$pr_city', '$pr_air', '$pr_hotel', '$pr_vehicle', '$pr_durationtype', '$pr_currency', $pr_priceunit, $pr_minno, $pr_maxno, '$pr_meetingpoint', '$pr_meetingpointmap', '$pr_finishpoint', '$pr_option', '$pr_included', '$pr_excluded', '$pr_preparation', '$pr_notice', $pr_price, pr_authorno,'$target_file[1]','$target_file[2]','$target_file[3]','$target_file[4]')";
				
				
				
				$result = mysql_query($sql);
				
				if($result=="")
				{
					echo("<script>alert('데이터 입력 실패');parent.location.replace('input_p.php');</script>");
				}
				else
				{
					echo("<script>alert('데이터 입력 성공');parent.location.replace('mainpage.php');</script>");
				}
			}
		?>

