<? session_start();
	include "./config/dbcon.php";
	mysql_query("set names utf8");
	
	$id = $_SESSION['ss_id'];
	
	
	$sql = "select * from apply Inner Join program where apply.pr_code = program.pr_code and apply.m_id = '$id'";
	
	$result = mysql_query($sql);
	
	
	if(mysql_num_rows($result) > 0){
			?>
            <center>
            <table border="1">
            	<tr>
                	<th>프로그램 코드</th>
                    <th>프로그램 이름</th>
                </tr>
                
                
            <?
				
				
				
			while($rows = mysql_fetch_object($result)){
			$code = $rows->pr_code;
			$name = $rows->pr_name;
			
			
			?>
                   <tr>
                       <td> <?=$code?></td>
                       <td> <?=$name?></td>
                            
                       <td><button onclick="parent.location.replace('detail.php?code=<?echo $code;?>')">선택</button></td>
				   </tr>
			<?
			
			
			}
				
				
	}
	
	

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>무제 문서</title>
</head>

<body>
</body>
</html>
