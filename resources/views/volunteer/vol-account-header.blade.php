
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

         <!--notification links-->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
    </head>
    
    <body>
    	<header>

            <div id="Logo">
                <a href="/">
                    <img src="{{ asset('image/V2O.jpeg') }}" alt="Logo">
                </a>
            </div>

			<div id="nav">
				<ul>
					<?php
						for ($i=0; $i < sizeof($data) ; $i++) { 
							# links and urls to be passed here
							echo "<li><a href='$links[$i]'>$data[$i]</a></li>";

						}

					 ?>
					 <!--
					<li><a href="#">Home</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact Us</a></li>
				-->

				</ul>
			</div>

           
            <!--notification of any unlogged volunteer hours-->
                <div class="mail">
                    <a href="#" title="header" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Activities ">
                        <img src="{{ asset('image/mail.jpg') }}" alt="notif">
                    </a>
                </div>

                    <script>
                        $(document).ready(function(){
                            $('[data-toggle="popover"]').popover();
                        });

                    </script>


			    <div id="userProfilePhoto"><img src="{{ asset('image/userdummyimage.png')}}" alt="profile photo"></div>
        
		</header>
		<!--extra css to be passed here-->
		<?php echo "<style> $extraStyle </style>"; ?>
   	
