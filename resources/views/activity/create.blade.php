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

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style type="text/css">
    body { 
        background: white !important; 
    } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */

    .card-header {
        background-color: white !important;
    }
    .modal-header {
        background-color: white !important;
    }
</style>

<script src="{{ asset('js/app.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Create Activity</h1>
                </div>
                
                <div class="card-body p-4">
                    <div class="col-6 login-sec " id="login.stf">
                        {{ Form::open(array('url' => '/activity', 'enctype' => 'multipart/form-data')) }}

                            <div class="form-group pt-3">
                                {{ Form::label('name', 'Activity Name:') }}
                                
                                {{ Form::text('name', $activity->name ?? '', [
                                    'placeholder' => 'Name', 'class' => 'form-control'
                                ]) }}
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{ Form::label('description', 'Description:') }}

                                {{ Form::textarea('description', $activity->description ?? '', [
                                    'placeholder' => 'Description of the activity', 'class' => 'form-control'
                                ]) }}
                                @error('description')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{ Form::label('image', 'Activity Image:') }}

                                {{ Form::file('image', ['accept' => 'image/*',
                                    'class' => 'form-control-file col-sm-10' 
                                ]) }}
                                @error('image')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{ Form::label('start_date', 'Start Date:') }}
                                
                                {{ Form::date('start_date', $activity->start_date ?? '', [
                                    'class' => 'form-control'
                                ]) }}
                                @error('start_date')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{ Form::label('end_date', 'End Date:') }}

                                {{ Form::date('end_date', $activity->end_date ?? '', [
                                    'class' => 'form-control'
                                ]) }}
                                @error('end_date')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                
                            <div class="form-group">
                                {{ Form::label('start_time', 'Start Time:') }}

                                {{ Form::time('start_time', $activity->start_time ?? '', [
                                    'class' => 'form-control'
                                ]) }}
                                @error('start_time')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{ Form::label('end_time', 'End Time:') }}
                                
                                {{ Form::time('end_time', $activity->end_time ?? '', [
                                    'class' => 'form-control'
                                ]) }}
                                @error('end_time')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{ Form::label('location', 'Location:') }}

                                {{ Form::text('location', $activity->location ?? '', [
                                    'placeholder' => 'Location', 'class' => 'form-control'
                                ]) }}
                                @error('location')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{ Form::label('co_host', 'Co-Host:') }}

                                {{ Form::text('co_host', $activity->co_host ?? '', [
                                    'placeholder' => 'Name of the co-host', 'class' => 'form-control'
                                ]) }}
                                @error('co_host')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{ Form::label('registration_deadline', 'Registration Deadline:') }}

                                {{ Form::date('registration_deadline', $activity->registration_deadline ?? '', [
                                    'class' => 'form-control'
                                ]) }}
                                @error('registration_deadline')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{ Form::label('volunteer_hours', 'Volunteer Hours:') }}
                                
                                {{  Form::text('volunteer_hours', $activity->volunteer_hours ?? '', [
                                    'placeholder' => 'Number of hours earnable', 'class' => 'form-control'
                                ]) }}
                                @error('volunteer_hours')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @include('causes.cause-modal')

                            <div class="activity-div col-6 pt-4">
                                {{ Form::submit('Submit', array(
                                    'class' => 'btn btn-light btn-outline-success',
                                    'type' => 'submit',
                                    'onclick'=>'return confirm("Are you sure?")')) 
                                }}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('volunteer.footer')