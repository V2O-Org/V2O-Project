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
<html>
	<body>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- CSRF Token -->
			<meta name="csrf-token" content="{{ csrf_token() }}">

			<title>V2O-Organization Profile</title>

			<!-- Scripts -->
			<script src="{{ asset('js/app.js') }}" defer></script>

			<!-- Fonts -->
			<link rel="dns-prefetch" href="//fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
			<!--
	
			<!-- Styles -->
			<link href="{{ asset('css/org_prof.css')}}" rel="stylesheet">
		</head>


	</div>
		<div class="slider">

		</div>
		<div>
			

			<div class="col-6" style="float: right;">
				<div class="misson">
				<h1>Mission Statement</h1>
				<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
			</div>
		</div>
			<div class="slider">
				
		</div>
		</div>
		<div class="footer">
				
			<h1>Volunteer with Us!</h1>
			<form>
				<table>
					<tr>
						<td>
							<table>
								<tr>
									<td>
										<input type = "name" name="name">
									</td>
								</tr>
								<tr>
									<td>
									<input type = "email" email="email">
									</td>
								</tr>
							</table>
						</td>
						<td>
							<textarea>Message:</textarea>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="submit">
						</td>
					</tr>
				</table>
				<img style="width: 75px;" src = "{{asset('https://facebookbrand.com/wp-content/uploads/2019/04/f_logo_RGB-Hex-Blue_512.png?w=256&h=256')}}">
				<img style="width: 75px;" src = "{{asset('https://image.flaticon.com/icons/svg/174/174855.svg')}}">
			</form>
		
		</div>

		<div class="footer1" style="margin-top: 50px !important;">
				
			<h1>Volunteer with Us!</h1>
			<form>
				<table>
					<tr>
						<td>
							<table>
								<tr>
									<td>
										<input type = "name" name="name">
									</td>
								</tr>
								<tr>
									<td>
									<input type = "email" email="email">
									</td>
								</tr>
							</table>
						</td>
						<td>
							<textarea>Message:</textarea>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="submit" style=" margin-left: 443px !important;">
						</td>
					</tr>
				</table>
				<img style="width: 75px; padding: 5px;" src = "{{asset('https://facebookbrand.com/wp-content/uploads/2019/04/f_logo_RGB-Hex-Blue_512.png?w=256&h=256')}}">
				<img style="width: 75px; padding: 5px; margin-top: 35px;" src = "{{asset('https://image.flaticon.com/icons/svg/174/174855.svg')}}">
			</form>
		</div>
	</body>
</html>

@include('footer')