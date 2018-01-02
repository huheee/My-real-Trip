<? @session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>로그인 화면 </title>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>

<body>

<div style="background-color:#25A8C9" class ="up_bar" >

<h1 class="head_text" > My Real Trip</h1>

</div>

<div style=" width:100%; height:400px  position:relative">
	<img src="main1.jpg" id=mainImage alt="YsjImage" style="width:100%;height:400px;">
    <div style="position:absolute; top:50%; left:40%">
    	<h2 style="color:#FFFFFF">     쉽고 빠르게 준비하는 자유여행</h2>
    </div>
</div>






<form action="login_ok.php" method="post" name="checked">
<table height="50%" width="50%" border="2" align="center">

<tr>
<th>아이디</th>
<td>
<input type="text" name="id" id="id" onkeyup = "getEmailList();"/>
<table class = "emaillist"  align="center" name = "emaillist" id="emaillist" >      </table>
</td>
</tr>
<tr>
<th>비밀번호</th>
<td>
<input type="password" name="pass" id="pass"/>
</td>
</tr>
<tr>
<th>이름</th>
<td>
<input type="text" name="name" id="name" placeholder="회원 가입 할때만 입력">
</td>
</tr>
</table>

<center>
    <input type="button" value="로그인" onClick="loginCheck(); return false;"  />
    <input type="button" value="회원가입" onClick="checker(); return false;"/>
     </center>


</form>
<script>



function getEmailList() {
		var val=document.getElementById("id").value;
		
		// 이전 email검색결과 테이블 내용 지우기
		var tbl = document.getElementById("emaillist");
		tbl.innerHTML = "";

		
		
		if (val.length <=0) {
			return;
		}

		$.post("search_email.php", {id : val}, function (responseTxt, statusTxt, xhr) {
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
								
								document.getElementById("pass").value = arr[1];
								//document.getElementById("receiverorgan").value = arr[1];
								document.getElementById("id").value = arr[2];
				});
			}
		});
	}






var myImage=document.getElementById("mainImage");
var imageArray=["main1.jpg","main2.jpg","main3.jpg","main4.jpg"];
var imageIndex=0;

function changeImage(){
	myImage.setAttribute("src",imageArray[imageIndex]);
	imageIndex++;
	if(imageIndex>=imageArray.length){
		imageIndex=0;
	}
}
setInterval(changeImage,3000);





function loginCheck(){
	var chId = document.getElementById("id");
	if(chId.value.length < 1)
	{
		alert("ID를 입력해주세요");
		return ;
	}
	var chPass = document.getElementById("pass");
	if(chPass.value.length < 1)
	{
		alert("PASSWORD를 입력해주세요");
		return ;
	}
	
	document.checked.submit();
}

function checker(){
	var chName = document.getElementById("name");
	if(chName.value == "" || chName.value.length < 2)
	{
		alert("이름을 제대로 입력해주세요(2자 이상)");
		return ;
	}
	document.checked.submit();
}
</script>
</body>
<style type="text/css">
table.emaillist {
			position:absolute;
			top : 559px;
			right : 214px;
			border-collapse : collapse;
			border : "0";
}

</style>
</html>
