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
            border-radius: 12px;
            margin: auto.
            width: 80%
        }

        .center_div {
            margin: auto.
            width: 80%
        }
    
                    
        .content {
            text-align: center;
        }
    
        .title {
            font-size: 84px;
        }
            
</style>
    </head>
    <body>
            <div class = 'content'>
                    <h3 class="logospace">Volunteer .To. Organization</h3>
                        <p><h1>Sign Up</h1></p>
                    </div>
                    <div class = "center_div">
                    {!! Form::open(array('url' => '/orgsignup')) !!}
                        <div class='form-group'>
                            <p>
                            {!! Form::label('title', 'Organization Name:') !!}
                            {{Form::text ('title', '', ['class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                            {!! Form::label('title', 'Address:') !!}
                            {{Form::text ('title', '', ['class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                            {!! Form::label('title', 'Country:') !!}
                            {{Form::text ('title', '', ['class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                            {!! Form::label('title', 'Email:') !!}       
                            {{Form::text ('title', '', ['class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>
                            {!! Form::label('title', 'Password:') !!}
                            {{Form::text ('title', '', ['class' => 'form-control', 'placeholder' => ''])}}
                            </p>
                            <p>Already have an account? sign in <a href= 'https://www.w3schools.com'>Here</a>
                        </div>
                    </div>           
                        {{Form::submit('Continue', ['class' => 'btn btn-primary btn lg'])}}
                    {!! Form::close() !!}
            
    </body>
</html>



















