<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>V2O-Application</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Arial Italic:200,600" rel="stylesheet">

<!-- Styles -->
<style>
        html, body {
            background-color: #4BAEA0;
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
                    <img src = "/images/Logo.jpeg" alt = "V2O-Logo" class = "headsup" width = "100%" height = "150">
                    
                        <p><h1 class = 'note'>Sign Up</h1></p>
                    </div>
                    <div class = "container">
                    {!! Form::open(array('url' => '/orgsignup')) !!}
                        <div class='form-group'>
                            <p>
                            {!! Form::label('title', 'Organization Name:') !!}
                            {{Form::text ('title', '', ['id' => 'orgname','class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                            {!! Form::label('title', 'Address:') !!}
                            {{Form::text ('title', '', ['id' => 'loc', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                            {!! Form::label('title', 'Country:') !!}
                            {{Form::text ('title', '', ['id' => 'tfirma', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                            {!! Form::label('title', 'Email:') !!}       
                            {{Form::text ('title', '', ['id' => 'letter', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                            {!! Form::label('title', 'Password:') !!}
                            {{Form::text ('title', '', ['id' => 'gentry', 'class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p class = "member">Already have an account? sign in <a href= 'https://www.w3schools.com'>Here</a>
                        </div>
                    </div>           
                        {{Form::submit('Continue', ['class' => 'btn btn-primary btn-lg'])}}
                    {!! Form::close() !!}
            
    </body>
</html>



















