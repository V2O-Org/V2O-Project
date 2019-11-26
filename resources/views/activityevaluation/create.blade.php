@if (Auth::guard('org')->check())
    @include('partials.org-nav-links')
@else
    @include('partials.vol-nav-links')
@endif
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
<style type="text/css">
p{
	font-size:20px ;
	font:sans-serif;
	text-align:justify-all;
	padding-left: 10%;
	font-weight: bold;
}
.area{
font-family:sans-serif;
font-size:1em;
width:90%;
resize:none;
}
.movearea{
	padding-left: 10%;
}
.label{
	border:1px;
	border-style: solid;
	padding:0 630px; 
   border-color:  black;
     font-weight: bold;
	 color:black;
	 border-width: medium;
	 font-size: 20px;
	   padding-right: 5px;
	}
textarea{
	 border-color:  black;
	 border-width: medium;
	 font-family:sans-serif;
font-size:14em;
width:90%;
resize:none;
}
textarea::placeholder{
	font-size: 18px;
	 
}
#modal-btn{
  
    padding:5px;
    padding-left: 30px;
    padding-right: 30px;
   margin-left: 82.5%;   
   border-color:  black;
   background-color: white;
   font-weight: bold;
   border-width: medium;
   box-shadow: 1px 3px;
}
#activityimg{
	padding:50px;
	padding-left: 100px;
	padding-right: 100px;
}
</style>
 
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
 
<script src="{{ asset('js/app.js') }}"></script>
 

   <br>
   <br>
   <div>
    <p>
     Thank you for volunteering.
     <br>
     Now that has come to an end, we are gathering information on you experience and thoughts about this activity.
     </p>
   </div>
 
   
   <p> Leave us a comment on your experience</p>


 <div class="movearea">
 	<table>
    <caption class="label">Comments</caption>
</table>
		{{Form::open(array('url' => '/actrate')) }}

<div >
{{ Form::textarea('comment', $activityevaluation->comment, ['placeholder' => 'Place your comment here:'] ) }}
</div>
{{ Form::hidden('volunteer_id', Auth::guard('vol')->id() ?? '') }}
{{ Form::hidden('activity_id', '1' ?? '') }}
<table>
<caption class="label">Rate Your Experience</caption>
</table>
<input id="input-1" name="rate" class="rating " data-min="0" data-max="5" data-step="1" data-show-caption="false" data-show-clear="false" >
</div>
 
<!--<input type="submit" value="Submit">
--><div class='pt-4 submitbutton'>
        <!-- Button to trigger causes modal -->

        {{ Form::submit("Submit", [
            'id' => 'modal-btn', 'data-toggle' => 'modal', 'data-target' => '#activity-rating-modal',
            //'class' => 'btn btn-light btn-outline-dark'
        ]) }}
    
        @error('rating')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
{{Form::close() }}
<br>