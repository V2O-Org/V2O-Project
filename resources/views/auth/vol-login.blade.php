<!DOCTYPE html>
<html>
<head>
	<title>Volunteer Login</title>
	<style type="text/css">
		*
		{
			box-sizing: border-box;
		}

		.col-1 {width: 8.33%;}
		.col-2 {width: 16.66%;}
		.col-3 {width: 25%;}
		.col-4 {width: 33.33%;}
		.col-5 {width: 41.66%;}
		.col-6 {width: 50%;}
		.col-7 {width: 58.33%;}
		.col-8 {width: 66.66%;}
		.col-9 {width: 75%;}
		.col-10 {width: 83.33%;}
		.col-11 {width: 91.66%;}
		.col-12 {width: 100%;}

		body 
		{
			height: 100vh;
			background: rgb(13,40,6);
background: linear-gradient(45deg, rgba(13,40,6,1) 26%, rgba(32,121,24,1) 77%, rgba(36,93,36,1) 100%);
		}

		body div:first-child
		{
			margin: 0 auto;
		}
		img
		{
			width: 100%;
		}
		.login-sec
		{
			
			
			border:5px solid white;
			border-radius: 15px;
			height: max-content;
		}

		h1
		{
			text-align: center;
			font-style: italic;
			font-weight: bolder;
			font-family: 'verdana';
		}
		form table
		{
			margin: 0 auto;
		}
		td
		{
			font-family: 'verdana';
			font-weight: bolder;
			padding-left: 5px;
		}
		form input
		{
			background-color: rgba(0,0,0,0.8);
			border:none;
			border-radius: 10px;
			height: 30px;
		}
        
        input:focus {
            background-color: white;
        }

		.signin-div
		{
			width: max-content;
			margin-left: auto;		
			margin-right: auto;

		}
		.signin-btn button
		{

			color: white;
			font-size: 25px;
			font-family: italic;
			background-color: black;
			border:5px solid white;
			border-radius: 25px;
			padding: 5px 20px;
		}

		#login.stf
		{
			position: relative;
			top: 5%;
			margin:50px auto 0px auto;
		}
		p
		{
			text-align: center;
			color: grey;
		}

		p a 
		{
			text-decoration: none;
			color: white;
			font-weight: bold;

		}
	</style>
</head>
<body>
	<div class="col-12" >
		<div class = "col-6 login-sec " id="login.stf">
			<div class="col-5">
				<img src="{{asset('image/Logo png.png')}}" >
			</div>
			<h1>Login</h1>

			 <form url={{ route('vol.login') }} method="POST" id="login-form">
                 @csrf
			 	<table>

			 		<tr>
			 			<td>Email:</td>
			 			<td><input type="email" name="email"> </td>
				 	</tr>
				 	<tr>
				 		<td>Password:</td>
				 		<td><input type="password" name="password"></td>
				 	</tr>

                    <!-- TODO: ADD REMEMBER ME OPTION -->
			 	</table>
			 	

			 	<p>Forgot your password? Reset <a href={{ route('vol.password.request') }}>Here</a></p>
			 	
			 	<div class="signin-div">
                     <span class="signin-btn">
                        <button type="submit" form="login-form">Sign in</button>
                    </span>
			 	</div>
			 	


			 </form>
			 <p>No Account? Sign Up <a href="/vol/register">Here</a></p>
		</div>
	</div>
</body>
</html>