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


<h1>Volunteer Sign Up</h1>
<div class="col-12 main">

    <div class="col-6 login-sec " id="login.stf">
        {{ Form::open(array('url' => route('vol.register'))) }}

            {{ Form::label('first_name', 'First Name:') }}
                {{ Form::text('first_name', $vol->first_name ?? '') }}
                @error('first_name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('last_name', 'Last Name:') }}
                {{ Form::text('last_name', $vol->last_name ?? '') }}
                @error('last_name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', $vol->email ?? '') }}
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('date_of_birth',' Date of Birth:') }}
                {{ Form::date("date_of_birth", $volProfile->date_of_birth ?? '') }}
                @error('date_of_birth')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('street_address', 'Street Address:') }}
                {{ Form::text('street_address', $volProfile->street_address ?? '') }}
                @error('street_address')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('state', 'State/Parish:') }}
                {{ Form::text('state', $volProfile->state ?? '') }}
                @error('state')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('city', 'City:') }}
                {{ Form::text('city', $volProfile->city ?? '') }}
                @error('city')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('country', 'Country:') }}
                {{  Form::text('country', $volProfile->country ?? '') }}
                @error('country')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('password', 'Password:') }}
                {{  Form::password('password') }}		
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('password_confirmation', 'Confirm Password:') }}
                {{ Form::password('password_confirmation') }}

            <div class="register-div">
                {{ Form::button('Submit', array(
                    'type' => 'submit',
                    'onclick'=>'return confirm("Are you sure?")')) 
                }}
                
                <a href="/" class="register-div button">Cancel</a>

                <p>Already have an account? Sign In <a href={{ route('vol.login.form') }}>Here</a></p>
            </div>

        {{ Form::close() }}

    </div>
</div>


@include('partials.footer')