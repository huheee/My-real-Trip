<? session_start();
// db 연결
include "./config/dbconn.php";
mysql_query("set names utf8");
//	전페이지에서 가져온값을 변수에 저장


// ldlc 계산
/*
if (!$_SESSION['ss_admin_id'] ) 
{
	echo ("<script language='javascript'>
				<!--
					alert('정상적인 관리자 모드가 아닙니다!!');
					history.back();
				//-->
				</script>");
	exit;
}
*/
$username = $_SESSION['ss_user_name'];
$usergender = $_SESSION['ss_user_gender'];
$userjuminno1 = $_SESSION['ss_user_juminno1'];

//-----
	$sql_glu = " select *  from glu_data ";
	$sql_glu .= " where gd_name = '$username' and gd_gender = '$usergender' and gd_juminno1 = '$userjuminno1' ";
	$sql_glu .= " order by gd_datetime desc ";
	
	$result_glu =  mysql_query($sql_glu);
	//echo "row_no : ".mysql_num_rows($result_high_diabetsrisk);

//-----

				//========================
				// 엑셀파일로 저장
				//========================
				/** PHPExcel */
				require_once("./Classes/PHPExcel.php");
				/* PHPExcel.php 파일의 경로를 정확하게 지정해준다. */
				
				// Create new PHPExcel object
				$objPHPExcel = new PHPExcel();
				
				// Set properties
				// Excel 문서 속성을 지정해주는 부분이다. 적당히 수정하면 된다.
				$objPHPExcel->getProperties()->setCreator("보건소")
											 ->setLastModifiedBy("관리자")
											 ->setTitle("개인별 혈당 데이터")
											 ->setSubject("개인별 혈당 데이터")
											 ->setDescription("개인별 혈당 데이터")
											 ->setKeywords("개인별 혈당 데이터")
											 ->setCategory("개인별 혈당 데이터");
				
				
				// Add some data
				// Excel 파일의 각 셀의 타이틀을 정해준다.
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue("A1", "성 명")
							->setCellValue("B1", "성 별")
							->setCellValue("C1", "생년월일")
							->setCellValue("D1", "검사일시")
							->setCellValue("E1", "혈당치")
							->setCellValue("F1", "전송일")
							->setCellValue("G1", "관리자");
				
				// for 문을 이용해 DB에서 가져온 데이터를 순차적으로 입력한다.
				// 변수 i의 값은 2부터 시작하도록 해야한다.
				$i = 2;
				while ($rows = mysql_fetch_object($result_glu)) {
					
					$name = $rows->gd_name;
					$gender = $rows->gd_gender;
					$juminno1 = $rows->gd_juminno1;
					$date_time = $rows->gd_datetime;
					$glu = $rows->gd_glu;
					$writedate = $rows->gd_date;
					$writer = $rows->gd_writer;
					
					
					// Add some data
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue("A$i", "$name")
								->setCellValue("B$i", "$gender")
								->setCellValue("C$i", "$juminno1")
								->setCellValue("D$i", "$date_time")
								->setCellValue("E$i", "$glu")
								->setCellValue("F$i", "$writedate")
								->setCellValue("G$i", "$writer");
								
								$i++;
				} // while
				
				// Rename sheet
				$title = "개인별 혈당 데이터-".$username."-".$usergender."-".$userjuminno1;
				//$objPHPExcel->getActiveSheet()->setTitle("개인별 혈당 데이터");
				$objPHPExcel->getActiveSheet()->setTitle($title);
				
				// Set active sheet index to the first sheet, so Excel opens this as the first sheet
				$objPHPExcel->setActiveSheetIndex(0);
				
				// 파일의 저장형식이 utf-8일 경우 한글파일 이름은 깨지므로 euc-kr로 변환해준다.
				//$filename = iconv("UTF-8", "EUC-KR", "개인별 혈당 데이터");
				$filename = iconv("UTF-8", "EUC-KR", $title);
				
				// Redirect output to a client’s web browser (Excel5)
				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment;filename="' .$filename.'.xls"');
				header('Cache-Control: max-age=0');
				
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
				$objWriter->save('php://output');			
			

?>
<!-- alert문에서 한글 출력되게,,,-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

