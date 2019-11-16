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
	<img src="{{ asset('image/bg.jpeg')}}" alt="profile photo" style>
	<div id = "center-text">
	
		<h1>
            <!-- {{$activity = DB::table('activities')
                -> where('id','$id')
                -> value('name')}} -->
				{{ $activity->name }}
		</h1>
		<h2>_________________________________</h2>
		<h2>
            <!-- {{$activity_organisation = DB::table('activity_organisation')
                ->join('activities', 'activity_organisation.activity_id','=','activities.id')
                ->join('organisations','activity_organisation.organisation_id','=','organisations.id')
                ->value('organisations.name')
            }} -->
            {{ $activity->organisations()->get()->pluck('name') }}
		</h2>
	</div>
</div>
<div class = "activ-body">
	<div id ="left">
		<h3>Details</h3>
			<p>
               <!--  {{-- {{$activity = DB::table('activities')
                    -> where('id','$id')
                    -> value('description')}} --}}-->

                {{ $activity->description }}
			</p>
	</div>
	<div id = "volunteer-list" onclick="/#">
		<h3> Current Volunteers</h3>
	<a href="#"><img src="{{ asset('image/grayarrow.png')}}"" alt="See All Volunteers" style ="float:right; width:30%; height:40px;"></a>
	<table id="volunteer-table">
	<tr>
		@foreach($activities as $activity)
			{{ $activity->volunteer()->get()->pluck('name') }}
		@endforeach
	</tr>
	</table>
	</div>
	<div id = "right">
	{{$volid = $volunteer->id}}
	{{$actid = $activity->id}}

		
	if (isset( $actid[{{$activity_volunteer = DB::table('activity_volunteer')-> where('activity_id','$actid')->get()}}])
	 and (isset $volid[{{$activity_volunteer = DB::table('activity_volunteer')-> where('volunteer_id','$volid')->get()}}]))
	{
		<button id="button"><onclick="" type="submit" >Join Activity</a></button>
 	}
	else
	{
		<div class = 'leavebutton'>
			{!!Form::open(['method'=>'DELETE', 'url'=>'actitivy_volunteer/' .$actitivy_volunteer->activity_id]) !!}
			{!!Form::button('Delete',['type'=>'submit']) !!}
			{!!Form::close() !!}	
		</div>
	}
    
	<!--	<div id="button">
			{!!Form::button('Volunteer With Us',['type'=>'submit']) !!}
		</div-->
	<div id="info-form">
		<table style="width:100%">
			<tr>
				<td id = "title">Co-Host:</td>
				<td>
				<!-- {{-- {{$activity = DB::table('activities')
				-> where('id','$id')
				-> value('co_host')}} --}}-->
				{{ $activity->co_host }}
				</td>
				</tr>
			<tr>
				<td id = "title">Location:</td>
				<td> 
					<!--{{$activity = DB::table('activities')
					-> where('id','$id')
					-> value('location')}}-->
					{{ $activity->location }}
				</td>
			</tr>
			<tr>
				<td id = "title">Date:</td>
				<td> <!--{{$activity = DB::table('activities')
					-> where('id','$id')
					-> value('start_date')}}-->
					{{ $activity->start_date }}
				</td>
			</tr>
			<tr>
				<td id = "title">Start Time:</td>
				<td> 
					<!--{{$activity = DB::table('activities')
					-> where('id','$id')
					-> value('start_time')}}-->
					{{ $activity->start_time }}
				</td>
			</tr>
			<tr>
				<td id = "title">Required Items:</td>
				<td> <!--{{$activity = DB::table('activities')
					-> where('id','$id')
					-> value('location')}}-->
					{{ $activity->required_items }}
				</td>
			</tr>
			<tr>
				<td id = "title">Attire:</td>
				<td> 
					<!--{{$activity = DB::table('activities')
					-> where('id','$id')
					-> value('location')}}-->
					{{ $activity->attire }}</td>
			</tr>
			<tr>
				<td id = "title">Registration Deadline:</td>
				<td> 
					<!--{{$activity = DB::table('activities')
					-> where('id','$id')
					-> value('registration_deadline')}}-->
					{{ $activity->registration_deadline }}
				</td>
			</tr>
			<tr>
				<td id = "title">Hours Earnable</td>
				<td> 
					<!--{{$activity = DB::table('activities')
					-> where('id','$id')
					-> value('volunteer_hours')}}-->
					{{ $activity->volunteer_hours }}
				</td>
			</tr>
		</table>
	</div>
	</div>
</div>

<footer>
@include('volunteer.footer')
</footer>
</div>