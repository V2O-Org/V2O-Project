<?php 
	$list  = ['Home','About Us','Contact Us'];
	$links = ['#','#','#'];

	$extraStyle = "a{color:red !important;}";

?>
@include('vol-account-header',['data'=>$list,'links'=>$links,'extraStyle' => $extraStyle])


<!-- div is the body of the page -->
<style type="text/css">
	*
	{
		box-sizing: border-box;

	}
	.col-1 {width: 8.33%;}
	.col-2 {width: 16.66%;}
	.col-3 {width: 25%;}
	.col-4 {width: 33.33%;}
	.col-5 {width: 41.66%;}
	.col-6 {width: 50%;}
	.col-7 {width: 58.33%;}
	.col-8 {width: 66.66%;}
	.col-9 {width: 75%;}
	.col-10 {width: 83.33%;}
	.col-11 {width: 91.66%;}
	.col-12 {width: 100%;}


	#activity-info-body 
	{
		border-top: 5px solid lightgray;
	}
	#activity-info-body .main
	{
		margin-left:auto;
		margin-right:auto;
		margin-top:20px;
	}
	.act-image
	{
		display: inline-block;
		position: relative;
		width: 20%;
		min-height: 150px;
		background-color: lightgray;
		border:1px solid black;
		border-radius: 5px;
		text-align: center;
		top:20%;
		line-height: 150px;
	}

	.act-info-section
	{
		display: inline-block;
		padding-left: 50px;
	}

	section h3
	{
		display: inline-block;
		width: fit-content;
	}

	.bottom
	{
		margin-top: 20px;
	}
</style>
<div id="activity-info-body" class="col-12">

	<div class="col-8 main" >
		<div class="col-12 top">
			<div class="col-4 act-image"><img  src="" alt="Event Image"></div>
			<div class="col-8 act-info-section">
				<h3>Title of Activity: </h3>
				<h3>Description of activity: </h3>
				<h3>Location of Activity: </h3>
				
			</div>
		</div>
		<div class="col-12 bottom">
			<table class="col-6">
				<tr>
					<td>Start Date: </td>
					<td>End Date:</td>
				</tr>
				<tr>
					<td>Start Time:</td>
					<td>End Time: </td>
				</tr>

				
			</table>
			<ul>
				<p>Co-host(s)</p>
			</ul>
		</div>
	</div>	
</div>



@include('footer')