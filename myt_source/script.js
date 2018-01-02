// JavaScript Document



function changeIframeUrl(url)
{
	
    document.getElementById("main_frame").src = url;
}




function logout(){
	
	document.main.action = "logout.php";
	document.main.submit();
}

function guide_ck(){
	
	var role = document.getElementById('role_c');
	
	if(role.value == 2)
	{
		document.getElementById('pr_input').style.display="";
	}
	
}




