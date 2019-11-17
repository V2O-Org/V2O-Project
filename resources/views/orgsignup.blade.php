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
@include('vol-account-header',['data'=>$list,'links=>$links','extra'=>$extraStyle])




<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>V2O-Application</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Arial Italic:200,600" rel="stylesheet">
    {{ Html::style('css/profile.css') }}
<link href="{{ asset('css/orgsignup.css') }}" rel="stylesheet">
<!-- Styles -->
<style>
            
</style>
    </head>
    <body>
        	              
            <div class = 'content'>
                    <p><h1 class = 'note'>Organization Sign Up</h1></p>
                        <div class = "container">
                    {!! Form::open(array('url' => '/orgsignup')) !!}
                        <div class='form-group'>
                            <p>
                                {!! Form::label('title', 'Organization Name:') !!}
                                {{Form::text ('title', '', ['id' => 'orgname','class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                                {!! Form::label('title', 'Email:') !!}       
                                {{Form::text ('title', '', ['id' => 'letter', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                                {!! Form::label('title', 'Password:') !!}
                                {{Form::text ('title', '', ['id' => 'gentry', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                                {!! Form::label('title', 'Confirm Password:') !!}
                                {{Form::text ('title', '', ['id' => 'cgentry', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                                {!! Form::label('title', 'Street Address:') !!}
                                {{Form::text ('title', '', ['id' => 'loc', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                                {!! Form::label('title', 'State/Parish:') !!}
                                {{Form::text ('title', '', ['id' => 'sloc', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                                {!! Form::label('title', 'City:') !!}
                                {{Form::text ('title', '', ['id' => 'town', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                                {!! Form::label('title', 'Country:') !!}
                                {{Form::text ('title', '', ['id' => 'tfirma', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                                {!! Form::label('title', 'Webpage URL:') !!}
                                {{Form::text ('title', '', ['id' => 'weburl', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                                {!! Form::label('title', 'Fax:') !!}
                                {{Form::text ('title', '', ['id' => 'fax', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                                {!! Form::label('title', 'Mailing Address:') !!}
                                {{Form::text ('title', '', ['id' => 'mail', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                                                       
                            <p class = "member">Already have an account? sign in <a href= '/login'>Here</a></p>
                        </div>
                            
                    </div>  
                    {{Form::submit('Continue', ['class' => 'btn btn-primary btn-lg'])}}         
                </div>      
                        {{Html::style('css/footer.css')}}
                         <footer><p>&copy 2019 | Volunteer-To-Organization | All Right Reserved</p></footer>
                    {!! Form::close() !!}
            
    </body>
</html>



















