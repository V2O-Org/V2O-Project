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
@include('vol-account-header',['data'=>$list,'links=>$links','extra'=>$extraStyle])

{{Html::style('css/register.css')}}


<h1>Volunteer Sign Up</h1>
<div class="col-12 main" >

<div class = "col-6 login-sec " id="login.stf">
			
{{ Form::open(array('url' => 'foo/bar')) }}
   
			
			{!!Form::label('name','Full Name:') !!}
			{!! Form::text('firstname',$name ?? '')!!}		
			{!!Form::label('email','Email:') !!}
			{!! Form::email('email',$email ?? '') !!}
			{!!Form::label('birth_date','Date of Birth:') !!}
			{!!Form::date("date_of_birth",$dob ?? '')!!}
			{!!Form::label('country','Country:') !!}
			{!! Form::text('country',$country ?? '') !!}
			{!!Form::label('password','Password:') !!}
			{!! Form::text('password',$password ?? '') !!}		
			{!!Form::label('password_check','Confirm Password:') !!}
			{!!Form::text('passsword_check',$password_check ?? '') !!}
			<div class="register-div">
			{!!Form::button('Submit', array(
            'type' => 'submit',
            'onclick'=>'return confirm("Are you sure?")')); !!}
			<a href="/" class="register-div button">Cancel</a>

			<p>Already have an account? Sign In <a href="/vol-login">Here</a></p>
			</div>
{{ Form::close() }}		 	




</div>
</div>


@include('footer')