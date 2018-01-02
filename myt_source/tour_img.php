<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>무제 문서</title>
</head>

<body>
<?
		include "./config/dbcon.php";
		mysql_query("set names utf8");
		$code = intval($_GET['code']);
		$num = intval($_GET['num']);
		
		$sql = "select * from program where pr_code = $code";
		
		$result = mysql_query($sql);
		$rows = mysql_fetch_object($result);
		
		if($num == 0)
		{	
			$img = $rows->pr_filename1;	
		}
		else if($num == 1)
		{	
			$img = $rows->pr_filename2;	
		}
		else if($num == 2)
		{	
			$img = $rows->pr_filename3;	
		}
		else if($num == 3)
		{	
			$img = $rows->pr_filename4;	
		}
		
?>


<a href='javascript:window.close();'><img src=<?=$img?> width="100%" height="100%"/></a>




</body>
</html>
