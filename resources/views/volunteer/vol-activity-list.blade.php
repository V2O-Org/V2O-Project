@include('partials.vol-nav-links')

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
@include('partials.footer')