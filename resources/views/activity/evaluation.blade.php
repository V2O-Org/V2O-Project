@if (Auth::guard('org')->check())
    @include('partials.org-nav-links')
@else
    @include('partials.vol-nav-links')
@endif

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
	}

textarea{
	 border-color:  black;
	 border-width: medium;

}
textarea::placeholder{
	font-size: 18px;
	 
}
#activityimg{
	padding:50px;
	padding-left: 100px;
	padding-right: 100px;
}

</style>
 
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
 
<script src="{{ asset('js/app.js') }}"></script>
 
   <img id="activityimg" src="image/bg.jpeg" width="100%" height="600px"/>
   <br>
   <br>
   <div>
    <p>
     Thank you for participating in "Save the Turtles: Beach CleanUp."
     <br>
     Now that has come to an end, we are gathering information on you experience and thoughts about this activity.
     </p>
   </div>
 
   
   <p> Leave us a comment on your experience</p>


 <div class="movearea">
 	<table>
    <caption class="label">Comments</caption>
</table>
<form action="/" method="post" enctype='multipart/form-data'>

<textarea class="area"  rows="5" name="comments" id="comments" placeholder="comment something..."></textarea>
@include('partials.activity-rating')
</div>
 
<!--<input type="submit" value="Submit">
-->
</form>
<br>