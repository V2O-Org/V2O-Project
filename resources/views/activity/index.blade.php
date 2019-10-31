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
@include('volunteer.vol-account-header',['data'=>$list,'links=>$links','extra'=>$extraStyle])

{{Html::style('css/activity-list.css')}}

<div id="activity-page-body">
    <div id="activity-results-container">
        <div id='activity-list-div'>
            
        <h1>Activities</h1>
        <div id="list-board">
            <table id="activity-table">
                @foreach($activities as $activity)
                <tr>
                    <div class="activity-item">
                        <h3>{{ $activity->name }}</h3>
                        <div class="activity-date">
                            <strong>{{ $activity->start_date . ($activity->start_date === $activity->end_date ? : ' to ' . $activity->end_date) }}</strong>
                        </div>
                        <p class="activity-details">
                            {{ $activity->details }}
                        </p>
                        <hr>
                    <div>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- BUTTON to return -->
        {{Form::button('Return to Profile',['id'=>'return-button'])}}
        </div>
    </div>
</div>
@include('volunteer.footer')