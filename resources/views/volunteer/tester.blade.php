<?php 

	$list = ['Home','About Us','Sign Up/Login','Contact Us'];
	$links =['#','#','#','#'];

	$extraStyle ="#nav{margin-left:30px !important;} 
	a{color:black !important; font-size:15px !important;} 
	header{background: rgb(180,189,178) !important;
background: linear-gradient(45deg, rgba(180,189,178,1) 44%, rgba(40,94,35,1) 60%, rgba(36,93,36,1) 100%) !important;} ";
 ?>

 @include('volunteer.vol-account-header',['data'=>$list,'links'=>$links,'extra'=>$extraStyle])