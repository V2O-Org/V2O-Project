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
<style>
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}
nav{
    display: flex;
    justify-content: space-around;
    align-items: center;
    min-height: 10vh;
    background-color: white;
    font-family: 'Staatliches', cursive;
    margin-top: 10px;
}

.nav-links{
    display: flex;
    
    
    

}
.nav-links li{
    list-style: none;
    cursor: pointer;

}
.nav-links a{
    color: green;
    text-decoration: none;
    letter-spacing: 1px;
    font-weight: bold;
    font-size: 17px;
    padding: 15px;
    cursor: pointer;


}

.container{
    width: 100%;
    min-height: 100px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -moz-flexbox;
    /*display: flex;
    flex-wrap: wrap;*/
    justify-content: center;
    /*align-items: center;*/
    padding: 10px;
    z-index: 1;
    opacity: 0.9;
    
}

.word h2{
    text-align: center;
}

.signup{
    width: 700px;
    height: 1025px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    border-radius: 10px;
    padding: 40px;
    box-shadow:0 8px 16px 0 rgba(0,0,0,0.15);
    border-style: solid;
    border-color: black;
    margin-top: 270px;
}

.ActText input{
width: 400px;
height: 35px;
padding: 18px;
margin-bottom: 25px;
margin-top: 5px;
border: 2px solid #ccc;
color: #4f4f4f;
font-size: 16px;
border-radius: 5px;
margin-left: 0px;
margin-top: 10px;
border-style: solid;
border-color: black;
}

.ReqText input{
width: 400px;
height: 120px;
padding: 18px;
margin-bottom: 25px;
margin-top: 5px;
border: 2px solid #ccc;
color: #4f4f4f;
font-size: 16px;
border-radius: 5px;
margin-left: 0px;
margin-top: 10px;
border-style: solid;
border-color: black;
}

.MeetText input{
width: 400px;
height: 35px;
padding: 18px;
margin-bottom: 25px;
margin-top: 5px;
border: 2px solid #ccc;
color: #4f4f4f;
font-size: 16px;
border-radius: 5px;
margin-left: 0px;
margin-top: 10px;
border-style: solid;
border-color: black;
}

.DateText input{
width: 400px;
height: 35px;
padding: 18px;
margin-bottom: 25px;
margin-top: 5px;
border: 2px solid #ccc;
color: #4f4f4f;
font-size: 16px;
border-radius: 5px;
margin-left: 0px;
margin-top: 10px;
border-style: solid;
border-color: black;
}

.TimeText input{
width: 400px;
height: 35px;
padding: 18px;
margin-bottom: 25px;
margin-top: 5px;
border: 2px solid #ccc;
color: #4f4f4f;
font-size: 16px;
border-radius: 5px;
margin-left: 0px;
margin-top: 10px;
border-style: solid;
border-color: black;
}

.AttireText input{
width: 400px;
height: 120px;
padding: 18px;
margin-bottom: 25px;
margin-top: 5px;
border: 2px solid #ccc;
color: #4f4f4f;
font-size: 16px;
border-radius: 5px;
margin-left: 0px;
margin-top: 10px;
border-style: solid;
border-color: black;
}

.DocText input{
width: 400px;
height: 35px;
padding: 18px;
margin-bottom: 25px;

border: 2px solid #ccc;
color: #4f4f4f;
font-size: 16px;
border-radius: 5px;
margin-left: 0px;
margin-top: 15px;
border-style: solid;
border-color: black;
}


.checkbox input{
width: 40px;
height: 35px;

margin-bottom: 25px;
margin-top: 5px;
border: 2px solid #ccc;
color: #4f4f4f;
font-size: 16px;
border-radius: 5px;
margin-left: 0px;
margin-top: 10px;
border-style: solid;
border-color: black;
}

.ActName{
    margin-top: 10px;
}

.checkbox p{
    margin-left: 60px;
    margin-top: -50px;
}

.Documents{
    margin-top: 20px;
}

.sign {
    color: white;
    background-color: green;
    box-shadow: 0 4px 10px 0 rgba(0,0,0,0.15);
    font-weight: bold;
    cursor: pointer;
    
    text-align: center;
    margin-left: 200px;
    padding: 15px;
    border-radius: 11px;
    margin-left: 250px;
    

}

.sign a {
    
    color: red;
}



.signup a{
    
    color: black;
    text-align: center;
}


.footer{
    display: flex;
    
    margin-left: 120px;
    min-height: 5vh;
    background-color: white;
    margin-top: 40px;
    padding: -10px;
}

.footer p {
    margin-top: 28px;
}

.bar {
    background-color: black;
    height: 10px;
    width: 1543px;
    margin-top: 20px;
    margin-left: -480px;
}

.lines{
    background-color: black;
    height: 7px;
    width: 1999px;
    margin-top: 5px;
    margin-left: -480px;
}

.liness{
    background-color: black;
    height: 7px;
    width: 1999px;
    margin-top: -112px;
    margin-left: -480px;
}


.line {
    background-color: black;
    height: 10px;
    width: 1543px;
    margin-top: -80px;
    margin-left: -480px;
}

.ActName p{
    font-weight: 700;
}

.ReqItems p{
    font-weight: 700;
}

.Meet p{
    font-weight: 700;
}

.Date p{
    font-weight: 700;
}

.Time p{
    font-weight: 700;
}

.Attire p{
    font-weight: 700;
}

.checkbox p{
    font-weight: 700;
}

.Documents p{
    font-weight: 700;
}

</style>
<body>
<section class="container">
    <section class="signup">
        
            <div class="word">
                <h2> Activity Registration Form </h2>
            </div>
           @if($errors->any())
               @foreach($errors->all() as $error)
                   {{ $error }}
               @endforeach
           @endif
            {!! Form::open(array('url' => 'instruction/')) !!}
                
                    <div class="ActName">
                        <p> *Activity Name </p>
                    </div>
                
                
                    <div class="ActText">
                        {!! Form::text('activity_name', $instruction->activity_name) !!}
                    </div>
                </div>

             
                    <div class="ReqItems">
                        <p> *Required Items </p>
                    </div>
             

               
                    <div class="ReqText">
                       
                        {!! Form::text('required_item', $instruction->required_item) !!}
                    </div>

                    <div class="Meet">
                        <p> Meeting Point </p>
                    </div>
                
                
                    <div class="MeetText">
                        {!! Form::text('meeting_point', $instruction->meeting_point) !!}
                    </div>
                </div>

             
                    <div class="Date">
                        <p> Date </p>
                    </div>
             

               
                    <div class="DateText">
                       
                        {!! Form::text('date', $instruction->date) !!}
                    </div>
                
              
                   

                    <div class="Time">
                        <p> Time </p>
                    </div>
                
                
                    <div class="TimeText">
                        {!! Form::text('time', $instruction->time) !!}
                    </div>
                </div>

             
                    <div class="Attire">
                        <p> Attire </p>
                    </div>
             

               
                    <div class="AttireText">
                       
                        {!! Form::text('attire', $instruction->attire) !!}
                    </div>

                    <div class="checkbox">

                     <input type="checkbox" name="document" value="doc"><br>
                     <p> Documents? </p>

                 	</div>

                     <div class="Documents">
                        <p> Important Documents </p>
                    </div>
             

               
                    <div class="DocText">
                       
                        {!! Form::text('document', $instruction->document) !!}
                    </div>
   
                  <button class="sign" id="btn"> {!! Form::submit('Continue') !!} </button>

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

	








			

			

