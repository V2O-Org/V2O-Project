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

	@include('partials.tester')	

</div>


</div>
</div>


@include('volunteer.footer')