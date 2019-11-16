<?php 

	$list = ['Home','About Us','Sign Up/Login','Contact Us'];
	$links =['#','#','/vol/login','#'];

	$extraStyle ="#nav{margin-left:30px !important;} 
	a{color:black !important; font-size:15px !important;} 
	header{background: rgb(180,189,178) !important;
background: linear-gradient(45deg, rgba(180,189,178,1) 44%, rgba(40,94,35,1) 60%, rgba(36,93,36,1) 100%) !important;} ";
 ?>
 

 @include('volunteer.vol-account-header',['data'=>$list,'links'=>$links,'extra'=>$extraStyle])
 {{Html::style('css/indi-act.css')}}
 <div class = 'page'> 

<div class = "single-activity-header">
	<img src="/storage/{{ $activity->image }}" alt="Activity Image" style>
	<div id = "center-text">
	
		<h1>
            {{ $activity->name }}
		</h1>
		<h2>_________________________________</h2>
		<h2>
            @foreach ($activity->organisations()->get()->pluck('name') as $org)
                {{ $org }}
            @endforeach
		</h2>
	</div>
</div>
<div class = "activ-body">
	<div id ="left">
		<h3>Details</h3>
			<p>
                {{ $activity->description }}
			</p>
	</div>
	<div id = "right">
        @if (Auth::guard('vol')->check())
            @if ($activity->volunteers()->get()->where('id', Auth::id())->count() >= 1)
                <div class = 'leavebutton'>
                    {!!Form::open(['method'=>'DELETE', 'url'=>'/actitivy_volunteer/']) !!}
                    {!!Form::button('Leave Activity',['type'=>'submit']) !!}
                    {!!Form::close() !!}	
                </div>
            @else
                <button id="button" onclick="" type="submit" >Volunteer With Us</button>
            @endif
        @endif
        @if (Auth::guard('org')->check())
            @if ($activity->organisations()->get()->where('id', Auth::guard('org')->id())->count() !== 0)
                <div class='editbutton'>
                    {!! Form::open(['method' => 'GET', 'url' => '/activity/' . $activity->id . '/edit']) !!}
                        {!! Form::submit('Edit Activity') !!}
                    {!! Form::close() !!}
                </div>
            @endif
        @endif

	      
	<!--	<div id="button">
			{!!Form::button('Volunteer With Us',['type'=>'submit']) !!}
		</div-->
		<div id="info-form">
		<table style="width:100%">
	<tr>
	<td id = "title">Co-Host:</td>
	<td>{{ $activity->co_host }}</td>
	</tr>
	<tr>
	<td id = "title">Location:</td>
	<td> {{ $activity->location }}</td>
    </tr>
	<tr>
	<td id = "title">Date:</td>
    <td>{{ $activity->start_date }}</td>
	</tr>
	<tr>
	<td id = "title">Start Time:</td>
	<td>{{ $activity->start_time }}</td>
	</tr>
	<tr>
   <td id = "title">Required Items:</td>
   {{-- <td>{{ $activity->required_items }}</td> --}}
    </tr>
	<tr>
	<td id = "title">Attire:</td>
	{{-- <td>{{ $activity->attire }}</td> --}}
    </tr>
	<tr>
	<td id = "title">Registration Deadline:</td>
	<td>{{ $activity->registration_deadline }}</td>
	</tr>
		<tr>
	<td id = "title">Hours Earnable</td>
	<td>{{ $activity->volunteer_hours }}</td>
	</tr>
</table>
		</div>
	</div>
</div>

<footer>
@include('volunteer.footer')
</footer>
</div>