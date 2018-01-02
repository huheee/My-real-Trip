<? session_start();
	
	include "./config/dbcon.php";
	mysql_query("set names utf8");
	$name = $_SESSION["ss_name"];
	$role = $_SESSION["ss_role"];
	
	
	
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" href="mystyle.css">
 <script type="text/javascript" src="script.js"></script>
 <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

	
<title>메인 페이지</title>
</head>

<body>

<a href="mainpage.php"><div style="background-color:#25A8C9" class ="up_bar" >

<h1 class="head_text" > My Real Trip</h1>

</div>
</a>
<div style="width:20%; float:left">
<form action="input_p.php" method="post" name="main" id="main">
<table width="100%" border="0" class="log_on">
	<tr>
    	<td width="306" colspan="2"><center><? echo $name ?> 님 환영합니다.</center></td>
    </tr>
    <tr>
    <td><center><input type="button" value="상세 정보" onclick="changeIframeUrl('detail_info.php');"/><input type="button" value="로그 아웃" onclick="logout();"/></center></td>
    </tr>
    
    <tr>
    
    	<td rowspan="2"> 
        <center>
        <input type="hidden" value="<?=$role?>" id="role_c" name="role_c"/>
        <input type="button" value="상품 입력" style="display:none" id="pr_input" name="pr_input" onclick="changeIframeUrl('input_p.php');"/><script>guide_ck();</script><input type="button" value="검색 하기" onclick="changeIframeUrl('searchpage.php');"/>
        </center>
		</td>
        
        
	</tr>
    
    
    

</table>
	
</form>
</div>
<a href="#" onclick="move_notice();">
<div style="width:79%; float:left">
<table border="1" width="100%" bgcolor="#CCCCCC">
<tr><td>
<h3 id="notice_page"></h3>
</td>
</tr>
</table>
</div>
</a>
<iframe src="main_img.php" width="79%" height="700px" style="float:left;" name="main_frame" id="main_frame"></iframe>





</body>
<script>
var n_body;
var n_cnt = 0;
var n_split;

setInterval("change_notice()",10000);
$(document).ready(function() {
     
 
setTimeout("ck_notice()", 500); 

});



function ck_notice(){
	
	
	$.post("ck_notice.php",{},function (responseTxt, statusTxt, xhr){
		var cl = document.getElementById("notice_page");
		cl.innerHTML="";

		
		n_body = responseTxt.split("/");
		
		n_split = n_body[n_cnt].split(",");
		
		
		cl.innerHTML = (n_cnt+1)+"번 공지 > "+n_split[1];
		
		n_cnt++;
		
		});
	
	}
	
function change_notice(){
	var cl = document.getElementById("notice_page");
		cl.innerHTML="";
	var n_split = n_body[n_cnt].split(",");		
		
		cl.innerHTML = (n_cnt+1)+"번 공지 > "+n_split[1];
		
		
		n_cnt++;
		if(n_cnt >= n_body.length-1)
		{
			n_cnt = 0;
		}
		


}


function move_notice(){
	window.open("notice.php?num="+(n_cnt-1),"new","width=250px height=200px menubar=no status=no");
	
	}

	
	
	



</script>



</html>
