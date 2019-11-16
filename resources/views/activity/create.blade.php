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

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style type="text/css">
    body { 
        background: white !important; 
    } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */

    .card-header {
        background-color: white !important;
    }
    .modal-header {
        background-color: white !important;
    }
</style>

<script src="{{ asset('js/app.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Create Activity</h1>
                </div>
                
                <div class="card-body p-4">
                    <div class="col-6 login-sec" id="login.stf">
                        {{ Form::open(array('url' => '/activity', 'enctype' => 'multipart/form-data')) }}

                            @include('partials.activity-form')

                            <div id="submit-container" class="col-6 pt-4 pb-4">
                                {{ Form::submit('Submit', array(
                                    'class' => 'btn btn-light btn-outline-success',
                                )) }}
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('volunteer.footer')