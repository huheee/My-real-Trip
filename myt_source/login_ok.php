<? session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

	

	include "./config/dbcon.php";
	mysql_query("set names utf8");
	
	$id = $_POST["id"];
	$pass = $_POST["pass"];
	$name = $_POST["name"];
	
	
	//이름을 입력한 경우
	if($name!="")
	{
		$sql = "select  count(m_id) as same from member_info where m_id='$id' limit 1";
		$result = mysql_query($sql);
		
		if($result)
		{
			$row = mysql_fetch_object($result);
			$no = $row->same;
			
			if($no > 0)
			{
				echo("<script>
					alert('동일한 아이디가 이미 존재합니다.');
					history.back();
					</script>");
			}// no if
			
			else{
				$sql = "insert into member_info (m_id,m_pass,m_name) VALUES ('$id','$pass','$name')";
				
				$result = mysql_query($sql);
		
				if(!$result)
				{
					$msg = "DB에 데이터 입력 오류!!!";
					echo("<script>
							alert('$msg');
							history.back();
						</script>");
				}//result if
	
	
				else
				{	
					$sql = "select m_name, m_role  from member_info where m_id='$id' ";
					$result = mysql_query($sql);
					$row = mysql_fetch_object($result);
					$no = $row->m_name;
					$role = $row->m_role;
					
					
					$_SESSION['ss_id'] = $id;
					$_SESSION['ss_pwd'] = $pass;	
					$_SESSION['ss_name'] = $no;
					$_SESSION['ss_role'] = $role;
					session_write_close(); 
					$msg = "가입이 완료되었습니다.";
					echo("<script>
						alert('$msg');
						parent.location.replace('mainpage.php');
						
						</script>");
				}//result else
				
			}//else
		}//result if
	}// name if
	
	//이름 없이 아이디와 비밀번호만 입력한 경우
	else{
	
		$sql = "select  count(m_id) as same_id from member_info where m_id='$id' limit 1 ";
		$result = mysql_query($sql);	
		
		
		if($result)
		{
			$row = mysql_fetch_object($result);
			$no = $row->same_id;
			
			if($no > 0)
			{
				$sql = "select  count(m_pass) as same_pw from member_info where m_pass='$pass' limit 1 ";
				$result = mysql_query($sql);
				
				if($result)
				{
					$row = mysql_fetch_object($result);
					$no = $row->same_pw;
					
					if($no == 0)
					{
						echo("<script>
						alert('비밀번호를 잘 못 입력하셨습니다.');
						history.back();
						</script>");
					}
					else{
						
						$sql = "select m_name, m_role from member_info where m_id='$id' ";
						$result = mysql_query($sql);
						$row = mysql_fetch_object($result);
						$no = $row->m_name;
						$role = $row->m_role;
			
						$_SESSION['ss_id'] = $id;
						$_SESSION['ss_pwd'] = $pass;	
						$_SESSION['ss_name'] = $no;
						$_SESSION['ss_role'] = $role;
						
						
						if($role == 3)
						{
							echo("<script>
							alert('관리자님 환영합니다!');
							parent.location.replace('admin_main.php');
							</script>");
							}
						else
						{
							echo("<script>
							alert('로그인 성공!');
							parent.location.replace('mainpage.php');
							</script>");
						}
					}
					
					
					
				}
				
			}
			else{
					echo("<script>
					alert('존재하지 않는 아이디입니다.');
					history.back();
					</script>");
				}
			
		
		}
	}

?>


<script>parent.location.replace('mainpage.php');</script>
