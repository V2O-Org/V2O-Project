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
<body>
<div class="header">
	<nav>
		<div class="logo">
			<img src="img/V20.jpg" style="height: 80px; width: 130px; margin-left: -90px;">
		</div>
           
		<nav>
		<ul class="nav-links" style="margin-left: -210px;">
			<li>
				<a href="#">Home</a>
			</li>
			<li>
				<a href="#">About Us</a>
			</li>
			<li>
				<a href="#">Search Organization</a>
			</li>
			<li>
				<a href="#">Contact Us</a>
			</li>
		</ul>
	</nav>


	<div class="icon">
			<img src="img/icon.png" style="height: 80px; width: 80px; margin-top: 5px;">
		</div>



		
</div>

@if($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<div class="lines">
    </div>

    <div class ="liness">
    </div>

<section class="container">
    <section class="signup">
        {!! Form::open(array('url' => 'instruction/')) !!}
        
            <div class="word">
                <h2> Activity Registration Form </h2>
            </div>
           
            <form id="Registration">
                
                    <div class="ActName">
                        <p> *Activity Name </p>
                    </div>
                
                
                    <div class="ActText">
                        <input type="email" name="email" pattern="^[a-zA-Z\s]+$" required><br>
                    </div>
                </div>

             
                    <div class="ReqItems">
                        <p> *Required Items </p>
                    </div>
             

               
                    <div class="ReqText">
                       
                        <input type="text" class="password" pattern="^[a-zA-Z\s]+$" id="passReg" name="password" required> <br>
                    </div>

                    <div class="Meet">
                        <p> Meeting Point </p>
                    </div>
                
                
                    <div class="MeetText">
                        <input type="text" name="email" pattern="^[a-zA-Z\s]+$" required><br>
                    </div>
                </div>

             
                    <div class="Date">
                        <p> Date </p>
                    </div>
             

               
                    <div class="DateText">
                       
                        <input type="text"   name="text" pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$" required> <br>
                    </div>
                
              
                   

                    <div class="Time">
                        <p> Time </p>
                    </div>
                
                
                    <div class="TimeText">
                        <input type="text" name="email" pattern="([0-9]{2}:[0-9]{2}:[0-9]{2})"    required><br>
                    </div>
                </div>

             
                    <div class="Attire">
                        <p> Attire </p>
                    </div>
             

               
                    <div class="AttireText">
                       
                        <input type="text" class="password" pattern="^[a-zA-Z\s]+$" id="passReg" name="password" required> <br>
                    </div>

                    <div class="checkbox">

                     <input type="checkbox" name="document" value="doc"><br>
                     <p> Documents? </p>

                 	</div>

                     <div class="Documents">
                        <p> Important Documents </p>
                    </div>
             

               
                    <div class="DocText">
                       
                        <input type="text" class="password" id="passReg" name="password" pattern="^[a-zA-Z\s]+$" required> <br>
                    </div>
             
            </form>

            
            
             <div class="button">
                        <button class="sign" id="btn"><a href="#" type="submit" color: black;">Continue</a></button>
                    </div>

                    <div class="footer">
						<p>&copy; 2019 | Volunteer-To-Organization | All Rights Reserved</p>
					</div>

					<div class="bar">
            </div>

            		<div class="line">
            		</div>
        {!! Form::close() !!}
    </section>
</section>
</body>

	








			

			

