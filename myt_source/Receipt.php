<? session_start();
	//-------------------------------------
	// Check user authority
	//-------------------------------------
	// If not logged, return
	$login_permission =1;
	if ($login_status != "LOGGED_IN") {
		$login_permission =0;
		$msg = "Plz. Log-In as a Qualified User First ";
	}
	else if ($userlevel <5 || $userlevel =="") { // 5
		$login_permission =0;
		$msg = "Not Authorized member. No previledge to manage this !!!";
	}
	if ($login_permission < 1) {
		echo ("<meta http-equiv='refresh' content='0; url=/index.php'>");
		/*
		echo ("<script>
					alert('$msg');
					history.back();
		</script>");
		*/
	}
	

	//날짜값 추출
	$now = mktime();
	$mdate = date("Y-m-d",$now);
	$mtime = date("H:i",$now);
?>
<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./css/basic.css" rel="stylesheet" type="text/css">

<title>Issue Receipt</title>

<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>

<body >
    <h2>Receipt Creation</h2>
    <p>To issue a new receipt, please fill the following form and push the &quot;Make a Receipt&quot; button below. <br/>
    If the recipient has a subscribed IACST email ID, please type email ID first and slect a proper information. </p>
    <form id="id_makereceiptorm" name="makereceiptform" method="post" enctype="multipart/form-data" action="./index.php?page=Printreceipt">
    
        <table width="90%" border="0" cellspacing="1" cellpadding="1" align="center">
          <tr>
            <th width="35%">Email ID(이메일 아이디)</th>
            <td width="65%">
              <input type="email" name="email" id="email" class="form_text" onkeyup = "getEmailList();" placeholder = "Input email ID"  /> 
            </td>
          </tr>
          <tr>
            <th width="35%">Receipient Name(성명)</th>
            <td width="65%">
              <input type="text" name="receivername" id="receivername" class="form_text"  Placeholder="홍길동" /> 
            </td>
          </tr>
           <tr>
            <th>Receipient Organization(소속)</th>
            <td width="65%">
              <input type="text" name="receiverorgan" id="receiverorgan" class="form_text"  Placeholder="**대학교" /> 
            </td>
          </tr>
          <tr>
            <th>Content(내역)</th>
            <td width="65%">
              <select name="content" onChange = "setTotalMoney(this.value);"  >
                    <option value="" >영수 내역을 선택하세요</option>
                    <option value="종신 회비" >종신 회비</option>
                    <option value="기업 년회비">기업 년회비</option>
                    <option value="학생 년회비">학생 년회비</option>
                    <option value="기관 년회비">기관 년회비</option>
                   <option value="심포지엄 등록비">심포지엄 등록비</option>
                   <option value="컨퍼런스 등록비">컨퍼런스 등록비</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Total Money(총액,단위:원)</th>
            <td width="65%">
              <input type="number" name="totalmoney" id="totalmoney" class="form_text" Placeholder="Input amount here" min="10,000" /> 
            </td>
          </tr>
          <tr>
            <th>Issue Date(발행일자)</th>
            <td width="65%">
              <input type="date" name="date" class="form_text" value="<?=$mdate?>" /> 
            </td>
          </tr>
        
          <tr>
            <td colspan="2"><p>&nbsp;</p>
              <p>
                <input type="submit" name="submit" id="id_submit" value="Make a Receipt"  />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" name="reset" id="id_reset" value="Reset"  />
            </p></td>
          </tr>
        </table>
    </form>
	<table class = "emaillist"  align="center" name = "emaillist" id="emaillist" >      </table>

</body>
<script type="text/Javascript">

	function setTotalMoney (member_type) {

		var field = document.getElementById("totalmoney");
		
		if (member_type == "종신 회비")  field.value=300000;	
		else if (member_type == "기업 년회비")  field.value=1000000;	
		else if (member_type == "학생 년회비")  field.value=10000;	
		else if (member_type == "기관 년회비")  field.value=300000;	
		else if (member_type == "심포지엄 등록비")  field.value=300000;	
		else if (member_type == "컨퍼런스 등록비")  field.value=500000;	
		return false ;
	}
	
	function getEmailList() {
		var val=document.getElementById("email").value;
		
		// 이전 email검색결과 테이블 내용 지우기
		var tbl = document.getElementById("emaillist");
		tbl.innerHTML = "";

		if (val.length <=0) {
			return;
		}

		$.post("./iacst/search_email.php", {email : val}, function (responseTxt, statusTxt, xhr) {
			if(statusTxt == "success") {
				var tbl = document.getElementById("emaillist");
				var i;
				
				var emaillist = responseTxt.split("/");
				
				for (i=0; i<emaillist.length-1; i++)  {
				
					var newRow = tbl.insertRow(-1);
					var newCell = newRow.insertCell(0);
					//var newText = document.createTextNode(emaillist[i]);
					
					var btn = document.createElement('input');
					btn.setAttribute('type','button');
					btn.value=emaillist[i];
					
					//newCell.appendChild(newText);
					newCell.appendChild(btn);
					
					
					var idname = "emaillist"+i;
					var att = document.createAttribute("id");       
					att.value = idname;                           
					btn.setAttributeNode(att); 
					
				} // for
				
				$('input[type="button"]').click(function() {
   								var infostr = $(this).attr('value'); 
								//alert(infostr);
								var arr = infostr.split(",");
								
								document.getElementById("receivername").value = arr[0];
								document.getElementById("receiverorgan").value = arr[1];
								document.getElementById("email").value = arr[2];
				});
			}
		});
	}
</script>


<style type="text/css">

table.emaillist {
			position : absolute;
			top : 210px;
			right : 80px;
			border-collapse : collapse;
			border : "0";
}
table.emaillist.tr {
			border : "0";
}
.form_text {
	width:90%;
	height:2em;
	font-family:Arial, Helvetica, sans-serif;
	color:#666666;
	font-size:12px;
	text-align:left;
	border:0px solid #CCCCCC;
	margin-left : 5px;
}
.subscribe{
	font-family:calibri, Verdana, tahoma;
	font-size:18px;
	color:#FFFFFF;
	font-weight:bold;
	text-align:center;
}

.subscrib_box_cont{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#FFFFFF;
	text-align:left;
}

.seb_textfield{
	width:175px;
	height:25px;
	font-family:Arial, Helvetica, sans-serif;
	color:#666666;
	font-size:12px;
	text-align:left;
	border:none;
}
.sub_tab{
  
  border:2px solid #FFFFFF;
  border-radius:5px;
  box-shadow: 3px 3px 3px #666666;
}
</style>


</html>

