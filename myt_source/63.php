<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>63</title>
</head>

<body>
<?
	include "./config/dbcon.php";
	mysql_query("set names utf8");
	
	$sql = "select * from program where pr_code = $code";
	$result = mysql_query($sql);
	$row = mysql_fetch_object($result);
	
	$code = $row->pr_code;
	$name = $row->pr_name;
	$price = $row->pr_price;
	$currency = $row->pr_currency;
	$emergency = $row->pr_emergency;
	$language = $row->pr_language;
	$pr_categorygroup = $row->pr_categorygroup;
	$pr_region = $row->pr_region;
	$pr_country = $row->pr_country;
	$pr_city = $row->pr_city;
	$pr_air = $row->pr_air;
	$pr_hotel = $row->pr_hotel;
	$pr_vehicle = $row->pr_vehicle;
	$pr_durationtype = $row->pr_durationtype;
	$pr_priceunit = $row->pr_priceunit;
	$pr_minno = $row->pr_minno;
	$pr_maxno = $row->pr_maxno;
	$pr_meetingpoint = $row->pr_meetingpoint;
	$pr_meetingpointmap = $row->pr_meetingpointmap;
	$pr_finishpoint = $row->pr_finishpoint;
	$pr_option = $row->pr_option;
	$pr_included = $row->pr_included;
	$pr_excluded = $row->pr_excluded;
	$pr_preparation = $row->pr_preparation;
	$pr_notice = $row->pr_notice;
	$pr_explantion = $row->pr_explantion; 
	?>
<table height="50%" width="100%" border="2" align="center"   >
    	<caption> 회원가입</caption>
        <tr>
    		<th>상품 코드</th> 
            <td><?= $code ?>
            </td>
        </tr>
        <tr>
        	<th>상품 이름</th>
            <td> <?= $name ?>
            </td>
        </tr>
        <tr>
        	<th>상품 가격</th>
            <td><?= $price." ".$currency ?> </td>
        </tr>
        
        
        <tr>
        	<th>가이드 비상 연락망</th>
            <td><?= $emergency ?> </td>
        </tr>
        <tr>
        	<th>투어 진행언어</th>
            <td> <?= $language ?> </td>
        </tr>
        <tr>
        	<th>여행 카테고리 대분류</th>
            <td> <?= $pr_categorygroup?>
            </td>
        </tr>
        
        <tr>
        	<th>국가</th>
            <td> <?= $pr_region." ".$pr_country." ".$pr_city ?> 
             </td>
        </tr>
        <tr>
        	<th>항공편</th>
            <td> <?= $pr_air ?></td>
        </tr>
        <tr>
        	<th>호텔</th>
            <td> <?= $pr_hotel ?> </td>
        </tr>
        <tr>
        	<th>이동수단</th>
            <td> <?= $pr_vehicle ?> </td>
        </tr>
        <tr>
        	<th>여행 기간</th>
            <td> <?= $pr_durationtype ?> </td>
        </tr>
        
 
        
        
        <tr>
        	<th>가격 기준 사람수</th>
            <td> <?= $pr_priceunit ?> </td>
        </tr>
        
        <tr>
        	<th>최소 인원수</th>
            <td> <?= $pr_minno ?>  </td>
        </tr>
        <tr>
        	<th>최대 인원수</th>
            <td> <?= $pr_maxno ?>  </td>
        </tr>
        <tr>
        	<th>미팅장소 설명</th>
            <td> <?=$pr_meetingpoint?> </td>
        </tr>
        <tr>
        	<th>미팅장소 구글맵 좌표</th>
            <td><?= $pr_meetingpointmap ?></td>
        </tr>
        
        <tr>
        	<th>해산위치</th>
            <td> <?= $pr_finishpoint ?> </td>
        </tr>
        <tr>
        	<th>상품특전</th>
            <td> <?= $pr_option ?> </td>
        </tr>
        <tr>
        	<th>포함사항</th>
            <td> <?= $pr_included ?> </td>
        </tr>
        <tr>
        	<th>불포함사항</th>
            <td><?= $pr_excluded ?></td>
        </tr>
        <tr>
        	<th>준비사항</th>
            <td><?= $pr_preparation ?> </td>
        </tr>
        <tr>
        	<th>주의사항</th>
            <td> <?= $pr_notice ?> </td>
        </tr>

        <tr>
        	<th>상품 설명</th>
            <td><?= $pr_explantion ?></td>
        </tr>
        
        
</table>

</body>
</html>
