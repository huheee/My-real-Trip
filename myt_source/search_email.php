<? session_start();
// db 연결
	include "./config/dbcon.php";
	mysql_query("set names utf8");

$emailid = trim($_POST['id']);
$emailid = $emailid."%";

$sql = "select * from member_info where m_id like '$emailid'  order by m_id asc   limit 5";

$result = mysql_query($sql);

$emailids = array();

$ndx = 0;
while ($row=mysql_fetch_object($result)) {
	
	$emailids[$ndx] = $row->m_name.",";
	$emailids[$ndx] .= $row->m_pass.",";
	$emailids[$ndx] .= $row->m_id."/";
	echo $emailids[$ndx];
	$ndx++;	
}


?>