@include('vol-account-header')
<style type="text/css">

	#activity-page-body
	{
		border-top: 5px solid lightgrey;
	}
	#activity-list-div
	{
		width: 50%;
		margin-left: auto;
		margin-right: auto;
		
	}

	#list-board
	{
		background-color: lightgrey;
		width: 100%;
		min-height: 300px;
		border-radius: 5px;

	}

	#activity-table
	{
		background-color: white;
	}

	#return-button
	{
		color: white;
		font-weight: bold;
		font-size: 25px;
		background-color: green;
		border-radius: 5px;
		border:none;
		width: 50%;
		margin: 50px 25% 15px 25%;

	}
</style>
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