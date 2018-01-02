<? session_start();
	$num = $_GET['num'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>무제 문서</title>
</head>

<body>
<center>
<table border="1">



<?
	include "./config/dbcon.php";
	mysql_query("set names utf8");
	
	$sql = "select * from notice where n_num = $num";
	
	$result = mysql_query($sql);
	
	$rows = mysql_fetch_object($result);
	$n_name = $rows->n_name;
	$n_notice = $rows->n_notice;
	?>
    <tr>
    	<td>공지사항 제목</td>
        <td><?=$n_name?></td>
    </tr>
    <tr>
    	<td>내용</td>
        <td><?=$n_notice?></td>
    </tr>
</table>
</center>

</body>
</html>
