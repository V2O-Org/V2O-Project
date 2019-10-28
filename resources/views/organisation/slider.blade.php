<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.slider-container
		{
			width: 80%;
			position: relative;
			margin:50px auto;
		}

		.slider1
		{
			width: 100%;
			max-height: 250px;
		}

		.left-click
		{
			float:left;
			position: absolute;
			top: 120px;
			background-color: rgba(0,0,0,0);
			border:none;
			color: white;
		}
		.right-click
		{
			float:right;
			position: relative;
			top: -120px;
			background-color: rgba(0,0,0,0);
			border:none;
			color: white;
			
		}

	</style>
</head>
<body>

	<div class="slider-container">

		<button class="left-click" onclick="move(-1)">&#10094;</button>
		<img class="slider1" src="{{asset('image/img1.jpg')}}">
		<img class="slider1" src="{{asset('image/img2.jpg')}}">
		<img class="slider1" src="{{asset('image/img3.jpg')}}">
		
		
		<button class="right-click" onclick="move(+1)">&#10095;</button>
	</div>
</body>

<script type="text/javascript">

	var slideIndex = 1;
	showImage(slideIndex);
	function move(n)
	{
		showImage(slideIndex += n);
	}
	function showImage(n)
	{
		var i;
		var x = document.getElementsByClassName("slider1");
		
		if(n>x.length){slideIndex = 1};
		if(n<1){slideIndex=x.length};
		for(i=0;i<x.length;i++)
		{
			x[i].style.display="none";
		}

		x[slideIndex-1].style.display="block";
	}
</script>
</html>