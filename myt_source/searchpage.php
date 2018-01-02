<? session_start();
	$name = $_SESSION["ss_name"];
	
	$dbcon = mysql_connect("localhost","root","apmsetup");
	
	if(!$dbcon)
	{
		echo("#001.Database Connection Error !!!");
		exit;
	}
		
	$status = mysql_select_db("myLittleTrip", $dbcon);
		
	if(!$status)
	{
		echo("#002. Database Select Error !!!");
		exit;
	}
	mysql_query("set names utf8");
	
	
	$pr_region = $_POST["pr_region"];
	if($pr_region != "")
	{
		
		$pr_country = $_POST["pr_country"];
		$pr_city = $_POST["pr_city"];
		$pr_categorygroup = $_POST["pr_categorygroup"];
		$pr_pricelow = intval($_POST["pr_pricelow"]);
		$pr_pricehigh = intval($_POST["pr_pricehigh"]);
		$pr_durationtype = $_POST["pr_durationtype"];
		
		$sql = "select * from program where pr_code > 0 ";
		
		
		
		if($pr_region != "전체 대륙")
		{
			$sql.=" and pr_region = '$pr_region' "; 
		}
		
		if($pr_country != "전체 국가")
		{
			$sql.=" and pr_country = '$pr_country' "; 
		}
		
		if($pr_city != "전체 도시")
		{
			$sql.=" and pr_city = '$pr_city' "; 
		}
		
		if($pr_categorygroup != "전체")
		{
			$sql.=" and pr_categorygroup = '$pr_categorygroup' "; 
		}
		$sql .= " and pr_price >= $pr_pricelow and pr_price <= $pr_pricehigh ";
		
		$result = mysql_query($sql);
		
		if(($s_name = $_POST["excel_sc"]) != "")
		{
		require_once("./Classes/PHPExcel.php");
				/* PHPExcel.php 파일의 경로를 정확하게 지정해준다. */
				
				// Create new PHPExcel object
				$objPHPExcel = new PHPExcel();
				
				// Set properties
				// Excel 문서 속성을 지정해주는 부분이다. 적당히 수정하면 된다.
				$objPHPExcel->getProperties()->setCreator("관리자")
											 ->setLastModifiedBy("관리자")
											 ->setTitle("검색 결과")
											 ->setSubject("검색 결과")
											 ->setDescription("검색 결과")
											 ->setKeywords("검색 결과")
											 ->setCategory("검색 결과");
				
				
				// Add some data
				// Excel 파일의 각 셀의 타이틀을 정해준다.
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue("A1", "프로그램 코드")
							->setCellValue("B1", "프로그램 이름")
							->setCellValue("C1", "지역")
							->setCellValue("D1", "카테고리")
							->setCellValue("E1", "가격 ")
							->setCellValue("F1", "여행기간");
				
			
			
			
			
				$i = 2;
				
				
				while ($rows = mysql_fetch_object($result)) {
					$code = $rows->pr_code;
					$name = $rows->pr_name;
					$region = $rows->pr_region;
					$country = $rows->pr_country;
					$city = $rows->pr_city;
					$categorygroup = $rows->pr_categorygroup;
					$price = $rows->pr_price;
					$durationtype = $rows->pr_durationtype;
				
				
				
				$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue("A".$i, $code)
								->setCellValue("B".$i, $name)
								->setCellValue("C".$i, $region." ".$country." ".$city)
								->setCellValue("D".$i, $categorygroup)
								->setCellValue("E".$i, $price)
								->setCellValue("F".$i, $durationtype);
				
				$i++;
				} // while end
				
				$title = "검색 결과";
				//$objPHPExcel->getActiveSheet()->setTitle("개인별 혈당 데이터");
				$objPHPExcel->getActiveSheet()->setTitle($title);
				
				// Set active sheet index to the first sheet, so Excel opens this as the first sheet
				$objPHPExcel->setActiveSheetIndex(0);
				
				// 파일의 저장형식이 utf-8일 경우 한글파일 이름은 깨지므로 euc-kr로 변환해준다.
				//$filename = iconv("UTF-8", "EUC-KR", "검색결과");
				$filename = iconv("UTF-8", "EUC-KR", $title);
				
				// Redirect output to a client's web browser (Excel5)
				header('Content-Type: application/vnd.ms-excel');
				
				header('Cache-Control: max-age=0');
				
				header('Content-Disposition: attachment;filename="' .$filename.'.xls"');
				
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
				$objWriter->save('php://output');		
				
		}
				
	}
		
		
	
	
	
 ?>
	



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>무제 문서</title>
</head>

<body>

<form action="searchpage.php" method="post" name="s_result">
<center><table border="1">
        <tr>
        	<th>지역</th>
            <td><select id="pr_region" name="pr_region">
            		<option value="전체 대륙">전체 대륙</option>
            		<option value="아메리카"> 아메리카</option>
                    <option value="유럽"> 유럽</option>
                    <option value="아시아"> 아시아 </option>
                    <option value="아프리카"> 아프리카</option>
                    <option value="남극"> 남극</option>
                    <option value="오세아니아"> 오세아니아</option>
            </select>
            <select id="pr_country" name="pr_country">
            		<option value="전체 국가">전체 국가</option>
            		<option value="미국"> 미국</option>
                    <option value="프랑스"> 프랑스</option>
                    <option value="한국"> 한국 </option>
                    <option value="일본"> 일본</option>
                    <option value="중국"> 중국</option>
                    <option value="필리핀"> 필리핀</option>
                    <option value="대만"> 대만</option>
            </select> 
            <select id="pr_city" name="pr_city">
    		        <option value="전체 도시">전체 도시</option>
            		<option value="서울"> 서울</option>
                    <option value="부산"> 부산</option>
                    <option value="뉴욕"> 뉴욕 </option>
                    <option value="도쿄"> 도쿄</option>
                    <option value="상하이"> 상하이</option>
                    <option value="마닐라"> 마닐라</option>
                    <option value="타이베이"> 타이베이</option>
            </select> 
             </td>
        </tr>
        
        <tr>
        	<th>카테고리</th>
            <td> <select id="pr_categorygroup" name="pr_categorygroup">
            		<option value="전체"> 전체</option>
            		<option value="문화"> 문화</option>
                    <option value="스포츠"> 스포츠</option>
                    <option value="역사"> 역사</option>
            </select> 
            
            </td>
        </tr>
        
        
        <tr>
        	<th>가격대</th>
            <td> <input type="text" id="pr_pricelow" name="pr_pricelow" value="0"> ~ 
           		 <input type="text" id="pr_pricehigh" name="pr_pricehigh" value="1000000000">       
            </td>
        </tr>
        <tr>
        	<th>여행 기간</th>
            <td> <select id="pr_durationtype" name="pr_durationtype">
            		<option value="반나절"> 반나절</option>
                    <option value="하루"> 하루</option>
                    <option value="2일이상"> 2일이상 </option>
                    <option value="맞춤시간"> 맞춤시간</option>
            </select>  </td>
        
        
            	
        
        
	</table>
	<input type="submit" value="검색" name="sc" ><input type="submit" value="엑셀로 출력" name="excel_sc"/><input type="button" value="돌아가기" onclick="back();"/></center>
</form>



<script>
function back(){
		parent.location.replace('mainpage.php');
	
	}
	
	
</script>


</body>

 <? 
		if($pr_region != ""){
			
			if(($s_name = $_POST["sc"]) != "")
			{
			$result = mysql_query($sql);
		
			if(mysql_num_rows($result) > 0){
			?>
            <center>
            <table border="1">
            	<tr>
                	<th>프로그램 코드</th>
                    <th>프로그램 이름</th>
                    <th>지역</th>
                	<th>카테고리</th>
                    <th>가격</th>
                    <th>여행기간</th>
                </tr>
            <?
			
				
				
				
				
			
				while($rows = mysql_fetch_object($result)){
					$code = $rows->pr_code;
					$name = $rows->pr_name;
					$region = $rows->pr_region;
					$country = $rows->pr_country;
					$city = $rows->pr_city;
					$categorygroup = $rows->pr_categorygroup;
					$price = $rows->pr_price;
					$durationtype = $rows->pr_durationtype;
					
					
					?>
                    	<tr>
                        	<td> <?=$code?></td>
                            <td> <?=$name?></td>
                            <td> <?=$region."  ".$country."  ".$city ?></td>
                            <td> <?=$categorygroup?></td>
                            <td> <?=$price?></td>
                            <td> <?=$durationtype?></td>
                            <td><button onclick="location.href='detail.php?code=<?echo $code;?>'">선택</button></td>
						</tr>
					<?
		
				}

           ?>
           	  
              </table>
              </center>
           <?
                	
		
	}
	}
		}
 ?>
 
 


</html>
