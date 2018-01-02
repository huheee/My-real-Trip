<? session_start();
	session_destroy();
	echo("<script>alert('로그아웃 되었습니다.');parent.location.replace('login.php');</script>");
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>무제 문서</title>
</head>

<body>
</body>
</html>
