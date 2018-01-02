<? session_start();
	
	
	include "./config/dbcon.php";
	mysql_query("set names utf8");
	$name = $_SESSION["ss_name"];
	$id = $_SESSION["ss_id"];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>무제 문서</title>
</head>

<body>

 <form enctype="multipart/form-data" action="input_ck.php" method="post" name="dude" >
	<table height="50%" width="100%" border="2" align="center"   >
    	<caption> 상품 입력</caption>
        <tr>
    		<th>상품 코드</th> 
            <td><input type="text" name="pr_code" id="pr_code" placeholder="숫자만 입력" />
            	<input type="hidden" name="pr_authorno" id="pr_authorno" value="<?=$id?>" />
            </td>
        </tr>
        <tr>
        	<th>상품 이름</th>
            <td> <input type="text" name="pr_name" id="pr_name"/>
            </td>
        </tr>
        <tr>
        	<th>상품 가격</th>
            <td><input type="text" name="pr_price" id="pr_price"/></td>
        </tr>
        
        
        <tr>
        	<th>가이드 비상 연락망</th>
            <td> <input type="text" name="pr_emergency" id="pr_emergency"/> </td>
        </tr>
        <tr>
        	<th>투어 진행언어</th>
            <td> <input type="text" name="pr_language" id="pr_language"/> </td>
        </tr>
        <tr>
        	<th>여행 카테고리 대분류</th>
            <td> <select id="pr_categorygroup" name="pr_categorygroup">
            		<option value="문화"> 문화</option>
                    <option value="스포츠"> 스포츠</option>
                    <option value="역사"> 역사</option>
            </select> 
            <select id="pr_categoryconcept" name="pr_categoryconcept">
            <option value="소분류"> 소분류</option>
            </select> 
            </td>
        </tr>
        
        <tr>
        	<th>국가</th>
            <td><select id="pr_region" name="pr_region">
            		<option value="아메리카"> 아메리카</option>
                    <option value="유럽"> 유럽</option>
                    <option value="아시아"> 아시아 </option>
                    <option value="아프리카"> 아프리카</option>
                    <option value="남극"> 남극</option>
                    <option value="오세아니아"> 오세아니아</option>
            </select>
            <select id="pr_country" name="pr_country">
            		<option value="미국"> 미국</option>
                    <option value="프랑스"> 프랑스</option>
                    <option value="한국"> 한국 </option>
                    <option value="일본"> 일본</option>
                    <option value="중국"> 중국</option>
                    <option value="필리핀"> 필리핀</option>
                    <option value="대만"> 대만</option>
            </select> 
            <select id="pr_city" name="pr_city">
            		<option value="뉴욕"> 뉴욕 </option>
                    <option value="파리"> 파리 </option>
            		<option value="서울"> 서울</option>
                    <option value="부산"> 부산</option>
                    <option value="도쿄"> 도쿄</option>
                    <option value="상하이"> 상하이</option>
                    <option value="마닐라"> 마닐라</option>
                    <option value="타이베이"> 타이베이</option>
            </select> 
             </td>
        </tr>
        <tr>
        	<th>항공편</th>
            <td><input type="text" name="pr_air" id="pr_air"/> </td>
        </tr>
        <tr>
        	<th>호텔</th>
            <td> <input type="text" name="pr_hotel" id="pr_hotel"/> </td>
        </tr>
        <tr>
        	<th>이동수단</th>
            <td> <input type="text" name="pr_vehicle" id="pr_vehicle"/> </td>
        </tr>
        <tr>
        	<th>여행 기간</th>
            <td> <select id="pr_durationtype" name="pr_durationtype">
            		<option value="반나절"> 반나절</option>
                    <option value="하루"> 하루</option>
                    <option value="2일이상"> 2일이상 </option>
                    <option value="맞춤시간"> 맞춤시간</option>
            </select>  </td>
        </tr>
        
 
        <tr>
        	<th>통화</th>
            <td> <select id="pr_currency" name="pr_currency">
            		<option value="원"> 원</option>
                    <option value="달러"> 달러</option>
                    <option value="유로"> 유로 </option>
                    <option value="엔"> 엔</option>
                    <option value="위안"> 위안</option>
            </select> </td>
        </tr>
        
        <tr>
        	<th>가격 기준 사람수</th>
            <td> <input type="text" name="pr_priceunit" id="pr_priceunit"/> </td>
        </tr>
        
        <tr>
        	<th>최소 인원수</th>
            <td> <select id="pr_minno" name="pr_minno">
            		<option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>  
            </select>  </td>
        </tr>
        <tr>
        	<th>최대 인원수</th>
            <td> <select id="pr_maxno" name="pr_maxno">
            		<option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>  
                    <option value="4"> 4 </option>  
            </select>  </td>
        </tr>
        <tr>
        	<th>미팅장소 설명</th>
            <td> <input type="text" name="pr_meetingpoint" id="pr_meetingpoint"/> </td>
        </tr>
        <tr>
        	<th>미팅장소 구글맵 좌표</th>
            <td> <input type="text" name="pr_meetingpointmap" id="pr_meetingpointmap"/> </td>
        </tr>
        
        <tr>
        	<th>해산위치</th>
            <td> <input type="text" name="pr_finishpoint" id="pr_finishpoint"/> </td>
        </tr>
        <tr>
        	<th>상품특전</th>
            <td> <input type="text" name="pr_option" id="pr_option"/> </td>
        </tr>
        <tr>
        	<th>포함사항</th>
            <td> <input type="text" name="pr_included" id="pr_included"/> </td>
        </tr>
        <tr>
        	<th>불포함사항</th>
            <td> <input type="text" name="pr_excluded" id="pr_excluded"/> </td>
        </tr>
        <tr>
        	<th>준비사항</th>
            <td> <input type="text" name="pr_preparation" id="pr_preparation"/> </td>
        </tr>
        <tr>
        	<th>주의사항</th>
            <td> <input type="text" name="pr_notice" id="pr_notice"/> </td>
        </tr>
		
        <tr>
        	<th>사진 등록</th>
            <td> <input type="file" name="pr_file1"/> 
            	 <input type="file" name="pr_file2"/>
                 <input type="file" name="pr_file3"/>
                 <input type="file" name="pr_file4"/>
            
            </td>
        </tr>

        <tr>
        	<th>상품 설명</th>
            <td><textarea name="pr_explantion" id="pr_explantion"></textarea></td>
        </tr>
        
        
        
        
</table>

<center><input type="submit" value="입력 완료" name="submit_ok"  />
        <input type="button" value="돌아가기" onclick="back();" /></center>
		
</form>



<script>
	function back(){
		parent.location.replace('mainpage.php');
	
	}
		

</script>

</body>


</html>
