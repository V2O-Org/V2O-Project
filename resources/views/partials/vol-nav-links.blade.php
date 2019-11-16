<?php 
	# BELOW ARE ARGUMNENTS TO SEND FOR THE HEADER 
	//this is the list of links to appear in header
	$list  =[ 'Home','About Us','Search Organizations', (Auth::guard('vol')->check() ? 'Logout' : 'Login'),'Contact Us',];
	//the urls for the links listed above be sure to keep ordering the same
	$links =[ '/','#','#', (Auth::guard('vol')->check() ? '/vol/logout' : '/vol/login'),'#'];
	//extra styles sends css that the page should use for the header
	$extraStyle = "a{color:reds !important;}";
?>

<!--includes the header and pass variables from above-->
@include('volunteer.vol-account-header',['data'=>$list,'links=>$links','extra'=>$extraStyle])