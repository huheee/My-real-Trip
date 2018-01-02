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
	
	$totalmoney = $_POST['totalmoney'];
	$content = $_POST['content'];
	$receivername = $_POST['receivername'];
	$receiverorgan = $_POST['receiverorgan'];

	//날짜값 추출
	$now = split("-",$_POST['date']);
	$year =$now[0];
	$month =$now[1];
	$date =$now[2];
	/*
	$year = date("Y",$now);
	$month = date("m",$now);
	$date = date("d",$now);
	$mtime = date("H:i",$now);
	*/
?>

<SCRIPT>

	var initBody = document.body.innerHTML;
	//alert("a");
	var beforePrint = function() {
		document.body.innerHTML = document.getElementById('div1').innerHTML;
	}
	var afterPrint = function() {
		document.body.innerHTML = initBody;
	}
	
	if (window.matchMedia) {
		var mediaQueryList = window.matchMedia('print');
		mediaQueryList.addListener(function(mql) {
			if (mql.matches) {
				beforePrint();
			}
			else {
				afterPrint();
			}
		});
	}
	window.onbeforeprint = beforePrint();
	window.onafterprint = afterPrint();
</SCRIPT>

<style>
/*
	@media print {
		@page {
			size:auto;
			margin-top:2.5cm;
			margin-right:2cm;
			margin-bottom:1.5cm;
			margin-left:2cm;
		}
		html, body { border:0; margin:0; padding:0; }
		.printable { display:block; }
		.non-printable { display:none; }
		div .breakhere { width:auto;height;0px;page-break-before:always;line-height:0px; }
	}
	*/
	tr {
		height : 30px;
		text-align:center;
	}
	table, th, td {
		border: 2px solid black;
		border-collapse: collapse;
		text-align:center;
		padding: 15px;
	}
	th{
		background-color: #dddddd;
		font-weight : bold;
	}
	p{
		height:2em;
		font-size:14px;
		text-align:left;
	}
</style>
   <div id="div1">  
        <table class="printable" width="450px">
          <tr height="30px">
            <td colspan="2">
            	<br/><br/>
              <h2>영 수 증</h2>
              <br/>
            </td>
          </tr>
         <tr>
            <th width="30%"> &nbsp;<br/>성 명<br/>&nbsp;</th>
            <td >
              &nbsp;<br/><?=$receivername?><br/>&nbsp;
            </td>
          </tr>
           <tr>
            <th>&nbsp;<br/>소 속<br/>&nbsp;</th>
            <td>
              &nbsp;<br/><?=$receiverorgan?><br/>&nbsp;
            </td>
          </tr>
          <tr>
            <td colspan="2">
            	<br/>
              <h4>총 액 &nbsp;&nbsp;&nbsp;&nbsp; <?=number_format($totalmoney)?>&nbsp;&nbsp;원 
              </h4>     
            </td>
          </tr>
         <tr>
            <th>&nbsp;<br/>상 호<br/>&nbsp;</th>
            <td>
              &nbsp;<br/>(사) 국제융합과학기술학회<br/>&nbsp;
            </td>
          </tr>
          <tr>
            <th>&nbsp;<br/>대표자<br/>&nbsp;</th>
            <td>
              &nbsp;<br/>김 병 기<br/>&nbsp;
            </td>
          </tr>
          <tr>
            <th>&nbsp;<br/>내 역<br/>&nbsp;</th>
            <th>&nbsp;<br/>금 액<br/>&nbsp;</th>
          </tr>
          <tr>
            <td width="50%">
              &nbsp;<br/><?=$content?><br/>&nbsp;
            </td>
            <td >
              &nbsp;<br/><?=number_format($totalmoney)?>&nbsp;원<br/>&nbsp;
            </td>
          </tr>
        
          <tr>
            <td colspan="2">
            <br/><br/>
            상기 금액을 영수하였습니다.
            <br/><br/><br/>
            <?=$year?> 년&nbsp; <?=$month?> 월&nbsp;<?=$date?> 일
            <br/>
            <p>&nbsp;</p>
            <h3>사단법인 국제융합과학기술학회   (인)<img src="./iacst//img/IACST관인.png" width="66" height="66" alt="iacst"></h3>
            <p>&nbsp;
                
            </p>
            </td>
          </tr>
        </table>
   </div>
 	    <p >
           &nbsp;&nbsp;&nbsp;<input type="button" onclick="window.print(); history.back();" value="Print" />
           &nbsp;*** Use a Chrome browser to Print ***
        </p>

