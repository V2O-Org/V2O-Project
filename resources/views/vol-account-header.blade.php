
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>V2O-Application</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--The css for the header -->
		{{ Html::style('css/profile.css') }}

        
    </head>
    
    <body>
    	<header>
			<div id="Logo"><img src="{{ asset('image/Logo.jpeg') }}" alt="Logo"></div>
			<div id="nav">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact Us</a></li>

				</ul>
			</div>
			<div id="userProfilePhoto"><img src="{{ asset('image/userdummyimage.png')}}" alt="profile photo"></div>
		</header>
   	