<? session_start();
	
	include "./config/dbcon.php";
	mysql_query("set names utf8");
	
	$id= $_SESSION['ss_id'];
	$pass = $_POST['pass'];
	
	
	$sql = "update member_info set m_pass = '$pass' where m_id = '$id'";
	$result = mysql_query($sql);
	
	if(!$result)
	{
		echo("<script>
				alert('비밀번호 변경 실패. 데이터베이스 오류 입니다.');
				history.back();
			  </script>");
	}
	else
	{
		echo("<script>
				alert('비밀번호 변경 성공');
				parent.location.replace('mainpage.php');
			  </script>");
	}
	
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>비밀번호 변경</title>
</head>

<body>
</body>
</html>
