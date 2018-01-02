<? session_start();
   


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<title>무제 문서</title>
</head>




<body>
<h1>
플레이어를 기다리는 중입니다!!
<br />(최소 인원수 6명)
<p id="num">asd</p>
</h1>
<script>
$(document).ready(function() {
     
 
setInterval("ck_users()", 2000); 

});

function ck_users(){
	$.post("ck_user.php",{},function (responseTxt, statusTxt, xhr){
		
		document.getElementById('num').innerHTML = responseTxt;
		
		
		
		
		});
	
	}



</script>




</body>
</html>
