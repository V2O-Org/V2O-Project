<?php 
	# BELOW ARE ARGUMNENTS TO SEND FOR THE HEADER 
	//this is the list of links to appear in header
	$list  =[ 'Home','About Us','Contact Us'];
	//the urls for the links listed above be sure to keep ordering the same
	$links =[ '#','#','#'];
	//extra styles sends css that the page should use for the header
	$extraStyle = "a{color:reds !important;}";
?>
<!--includes the header and pass variables from above-->
@include('volunteer.vol-account-header',['data'=>$list,'links=>$links','extra'=>$extraStyle])




<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>V2O-Application</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Arial Italic:200,600" rel="stylesheet">
    {{ Html::style('css/profile.css') }}
<!-- Styles -->
<style>
        html, body {
            background-color: #0C4F14;
            color: #000000;
            font-family: 'Arial Italic', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .btn {
            display: block;
            border-radius: 12px;
            margin-left: auto;
            margin-right: auto; 
            width: 150px;  
            height: 40px;
            border-color: white;
            border-radius: 24px;
            font-size: 24px;
            background-color: #000000;
            color: white;
                   
        }

        .container {
            
            margin: auto;
            width: 50%;
        }
        .container input {
            align-self: auto;
            margin: auto;
            width: 50%;
            
        }
                    
        .content {
            text-align: center;
        }
    
        .title {
            font-size: 84px;
        }

        .member {
            text-align: center;
            margin: 60px 40px 40px 100px;
            
        }

        #orgname {
            margin-left: 30px;
            border-radius: 4px;
        }

        #loc {
            margin-left: 110px;
            border-radius: 4px;
        }

        #tfirma {
            margin-left: 112px;
            border-radius: 4px;
        }

        #letter {
            margin-left: 127px;
            border-radius: 4px;
        }

        #gentry {
            margin-left: 98px;
            border-radius: 4px;
        }

        .logospace{
            color: red;
        }

        .note {
            color:ghostwhite;
        }
            
</style>
    </head>
    <body>
        	              
        <div class = 'content'>
            <p><h1 class = 'note'>Organisation Sign Up</h1></p>
            
            <div class = "container">
                {!! Form::open(array('action' => route('org.register'))) !!}
                
                <div class='form-group'>
                    <p>
                        {{ Form::label('name', 'Organisation Name:') }}
                        {{ Form::text('name', $org->name ?? '') }}
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
        
                    <p>
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::email('email', $org->email ?? '') }}
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
        
                    <p>
                        {{ Form::label('password', 'Password:') }}
                        {{  Form::password('password') }}		
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
        
                    <p>
                        {{ Form::label('password_confirmation', 'Confirm Password:') }}
                        {{ Form::password('password_confirmation') }}
                    </p>
        
                    <p>
                        {{ Form::label('street_address', 'Street Address:') }}
                        {{ Form::text('street_address', $orgProfile->street_address ?? '') }}
                        @error('street_address')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
        
                    <p>
                        {{ Form::label('state', 'State/Parish:') }}
                        {{ Form::text('state', $orgProfile->state ?? '') }}
                        @error('state')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
        
                    <p>
                        {{ Form::label('city', 'City:') }}
                        {{ Form::text('city', $orgProfile->city ?? '') }}
                        @error('city')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
        
                    <p>
                        {{ Form::label('country', 'Country:') }}
                        {{  Form::text('country', $orgProfile->country ?? '') }}
                        @error('country')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>
        
                    <p>
                        {{ Form::label('org_url', 'Organisation Webpage URL:') }}
                        {{ Form::text('org_url', $orgProfile->org_url ?? '') }}
                        @error('org_url')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>

                    <p>
                        {{ Form::label('fax', 'Fax:') }}
                        {{ Form::text('fax', $orgProfile->fax ?? '') }}
                        @error('fax')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>

                    <p>
                        {{ Form::label('mailing_address', 'Mailing Address:') }}
                        {{ Form::text('mailing_address', $orgProfile->mailing_address ?? '') }}
                        @error('mailing_address')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </p>

                    <p class = "member">Already have an account? sign in <a href= '/org/login'>Here</a>
                </div>         

                {{Form::submit('Continue', ['class' => 'btn btn-primary btn-lg'])}}

                {!! Form::close() !!}
            </div>
        </div>

        @include('volunteer.footer');
    </body>
</html>



















