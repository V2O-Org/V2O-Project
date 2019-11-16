<?php 
	# BELOW ARE ARGUMNENTS TO SEND FOR THE HEADER 
	//this is the list of links to appear in header
	$list  =[ 'Home','About Us','Search Organizations','Logout','Contact Us',];
	//the urls for the links listed above be sure to keep ordering the same
	$links =[ '/','#','#','/vol/logout','#'];
	//extra styles sends css that the page should use for the header
	$extraStyle = "a{color:reds !important;}";
?>
<!--includes the header and pass variables from above-->
@include('volunteer.vol-account-header',['data'=>$list,'links=>$links','extra'=>$extraStyle])

{{Html::style('css/vol-profile.css')}}



<style type="text/css">
	/*Styling for the profile picture in banner*/
	#userProfilePhotoBanner
	{
		float:left;
		width: 20%

	}
</style>


<div class="col-12 main" id="volprofile" >

<img src="{{ asset('image/userdummyimage.png')}}" alt="profile photo">




	<p> Name: {{$volunteerProfile->fullname()}}  </p>
    <p> Address: {{$volunteerProfile->fulladdress()}} </p>
    <p> Email: {{$volunteer->email}}  </p> 	

	
@if (Auth::id() ==$volunteerProfile->id)
	@include('partials.vol-profilemodal')	

@else

@endif


<div class="col-12 main"> 
	<h2> Volunteer Description </h2>

</div>

<div col-12> 
	<h2> Already volunteered for: </h2>



</div>


</div>
</div>


@include('volunteer.footer')