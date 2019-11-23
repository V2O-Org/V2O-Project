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

{{Html::style('css/activity-search.css')}}


<h1> Search For Volunteer Activity  </h1>

<p> If an Acivity has already been choosen, please enter </p>

<form>

</form>


<div id="activity-search-body">
//double check for this id below
    <div id="activity-results-container">
        <div id='search-actlist-div'>
            
<h1> Search Results of <b> {{ $query }}  </h1>
        <div id="actlist-board">
            <table id="search-table">
                @foreach($details as $user)
                <tr>
                    <div class="activity-item">
                        <h3>{{ $activity->name }}</h3>
                        <div class="activity-date">
                            <strong>{{ $activity->start_date . ($activity->start_date === $activity->end_date ? '' : (' to ' . $activity->end_date)) }}</strong>
                        </div>
                        <div class="activity-causes">
                            @foreach($activity->causes()->get() as $cause)
                                <span>{{ $cause->name }} | </span>
                            @endforeach
                        <p class="activity-description">
                            {{ $activity->description }}
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
@include('partials.footer')
