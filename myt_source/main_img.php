<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>무제 문서</title>
</head>

<body>
<div style="float:left; width:100%; height:100%  position:relative">
	<img src="main1.jpg" id=mainImage alt="YsjImage" style="width:100%;height:400px;">
    <div style="position:absolute; top:50%;">
    	<h3 style="color:#FFFFFF">     쉽고 빠르게 준비하는 자유여행</h3>
    </div>
</div>

<script type="text/javascript" src="script.js"></script>
<script>



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


</script>




</body>
</html>
