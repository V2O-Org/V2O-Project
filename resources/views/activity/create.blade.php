<?php 
	# BELOW ARE ARGUMNENTS TO SEND FOR THE HEADER 
	//this is the list of links to appear in header
	$list  =[ 'Home','About Us','Sign Up/Login','Contact Us',];
	//the urls for the links listed above be sure to keep ordering the same
	$links =[ '#','#','#','#'];
	//extra styles sends css that the page should use for the header
	$extraStyle = "a{color:reds !important;}";
?>
<!--includes the header and pass variables from above-->
@include('volunteer.vol-account-header',['data'=>$list,'links=>$links','extra'=>$extraStyle])

{{Html::style('css/register.css')}}

<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        padding-top: 100px; 
        left: 0;
        top: 0;
        width: 80%; 
        height: 80%; 
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4); 
    }
    
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }
    
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<h1>Create Activity</h1>
<div class="col-12 main">

    <div class="col-6 login-sec " id="login.stf">
        {{ Form::open(array('url' => 'activity')) }}

            {{ Form::label('name', 'Activity Name:') }}
                {{ Form::text('name', $activity->name ?? '') }}
                @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('details', 'Description:') }}
                {{ Form::textarea('details', $activity->details ?? '') }}
                @error('details')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('start_date', 'Start Date:') }}
                {{ Form::date('start_date', $activity->start_date ?? '') }}
                @error('start_date')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('end_date', 'End Date:') }}
                {{ Form::date('end_date', $activity->end_date ?? '') }}
                @error('end_date')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            {{ Form::label('start_time', 'Start Time:') }}
                {{ Form::time('start_time', $activity->start_time ?? '') }}
                @error('start_time')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            {{ Form::label('end_time', 'End Time:') }}
                {{ Form::time('end_time', $activity->end_time ?? '') }}
                @error('end_time')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('location', 'Location:') }}
                {{ Form::text('location', $activity->location ?? '') }}
                @error('location')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('co_host', 'Co-Host') }}
                {{ Form::text('co_host', $activity->co_host ?? '') }}
                @error('co_host')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('registration_deadline', 'Registration Deadline:') }}
                {{ Form::date('registration_deadline', $activity->registration_deadline ?? '') }}
                @error('registration_deadline')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('volunteer_hours', 'Volunteer Hours:') }}
                {{  Form::text('volunteer_hours', $activity->volunteer_hours ?? '') }}
                @error('volunteer_hours')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <!-- Button to trigger causes modal -->
            {{ Form::button("Choose Causes", array('id' => 'modalBtn')) }}

            <!-- Causes Modal -->
            <div id="causesModal" class="modal pb-3">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    @foreach($causes as $cause)
                        {{ Form::label('cause', $cause)}}
                            {{ Form::checkbox('causes[]', $cause) }}
                    @endforeach
                </div>
            </div>
            <!-- End Causes Modal -->

            <div class="activity-div col-6">
                {{ Form::submit('Submit', array(
                    'class' => 'button',
                    'type' => 'submit',
                    'onclick'=>'return confirm("Are you sure?")')) 
                }}
            </div>

        {{ Form::close() }}

    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("causesModal");

    // Get the button that opens the modal
    var btn = document.getElementById("modalBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
    }
</script>

@include('volunteer.footer')