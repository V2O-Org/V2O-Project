@if (Auth::guard('org')->check())
    @include('partials.org-nav-links')
@else
    @include('partials.vol-nav-links')
@endif

{{Html::style('css/vol-profile.css')}}



<style type="text/css">
	/*Styling for the profile picture in banner*/
	#userProfilePhotoBanner
	{
		float:left;
		width: 20%

	}
	
p{
	font-size:25px ;
	font:sans-serif;
	text-align:justify-all;
	padding-left: 9%;
	font-weight: bold;
}
h1{
	
	font:sans-serif;
	text-align:justify-all;
	padding-left: 9%;
	font-weight: bold;
}
.label2{
	border:1px;
	border-style: solid;
   border-color:  black;
     font-weight: bold;
	 color:black;
	 border-width: medium;
	 font-size: 20px;
	}
#historyTab{
	 font-family: sans-serif;
  border-collapse: collapse;
  width: 83%;
  margin-left: 140px;
  float:middle;
}
#historyTab td, #historyTab th {
  border: 1px solid #ddd;
  padding: 8px;
}
#historyTab tr:nth-child(even){
	background-color: #f2f2f2;
}
#historyTab th{
	background-color: #ddd;
}
#historyTab tr:hover {
	background-color: #ddd;
}
#historyTab td, #historyTab th{ 
		padding:7px; 
		border:black 3px solid;
}
#btn1{
  
    padding:5px;
    padding-left: 30px;
    padding-right: 30px;
   
   border-color:  black;
   background-color: #ddd;
   font-weight: bold;
   border-width: normal;
   font-family: sans-serif;
  
}	
#btn2{
   
    padding:5px;
    padding-left: 20px;
    padding-right: 25px;
    margin-left: 0px;     
   border-color:  black;
   background-color: #ddd;
   font-weight: bold;
   border-width: normal;
   font-family: sans-serif;
   
}	
#movebtns{
	float:left;
	margin-top: 90px;
	margin-left:42.5px;
	
	cursor: pointer; 
}
#movebtns button:not(:last-child),#movebtns button:not(:first-child)  {
  border-right: none; /* Prevent double borders */
}
</style>


<div class="col-12 main" id="volprofile" >

<img src="{{ asset('image/userdummyimage.png')}}" alt="profile photo">




	<p> Name: {{$volunteerProfile->fullname()}}  </p>
    <p> Address: {{$volunteerProfile->fulladdress()}} </p>
    <p> Email: {{$volunteer->email}}  </p> 	

    <!-- 
        Check if the current user is the volunteer that the profile belongs to.
        If so, show the edit button. 
    -->
    @if (Auth::guard('vol')->check() && Auth::guard('vol')->id() === $volunteer->id)
	    @include('partials.vol-profilemodal')	
    @endif    


<div class="col-12 main"> 
	<h2> Volunteer Description </h2>

</div>

<div col-12> 
	<h2> Already volunteered for: </h2>

<div id="movebtns">
<button id="btn1">History</button>
<br>
<button id="btn2">Comment</button>
</div>

<div>
	<div >
    <br>
    <div id="tScroll">
        <table id="historyTab">
        	<caption class="label2">Activity History</caption>
        <thead>
            <th>Activity Name</th><th>Organisations</th><th>Hours Earned</th>
            <th>Active</th><th></th>
        </thead>
        <tbody>
		
        	<tr>
        		<td>Activity</td>
        		<td> Dummy Organisation</td>
        		<td> 6</td>
        		<td>No</td>
        		<td><a href="{{url('/actrate/create')}}"> Reviews</a></td>
        	</tr>
				
        </tbody>
           <!--
           insert php code here
           -->
        </tbody>
        </table>
    </div>
</div></div>
<br>
<p>Total Hours Earned:</p>

</div>


</div>
</div>


@include('volunteer.footer')