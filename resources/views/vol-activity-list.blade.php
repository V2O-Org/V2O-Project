<?php 
	# BELOW ARE ARGUMNENTS TO SEND FOR THE HEADER 
	//this is the list of links to appear in header
	$list  =[ 'Home','About Us','Contact Us'];
	//the urls for the links listed above be sure to keep ordering the same
	$links =[ '#','#','#'];
	//extra styles sends css that the page should use for the header
	$extraStyle = "a{color:reds !important;}";
?>
<!--includes the header and pass variables from above-->
@include('vol-account-header',['data'=>$list,'links=>$links','extra'=>$extraStyle])

{{Html::style('css/activity-list.css')}}

<div id="activity-page-body">
	<div id='activity-list-div'>
		
	<h2>List of Activites</h2>
	<div id="list-board">
		<table id="activity-table">
			
		</table>
	</div>
	<!-- BUTTON to return -->
	{{Form::button('Return to Profile',['id'=>'return-button'])}}
	</div>
</div>
@include('footer')