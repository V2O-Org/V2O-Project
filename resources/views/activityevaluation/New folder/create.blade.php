@include('partials.vol-nav-links')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

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
					
		{{Form::open(array('url' => '/actrate')) }}

<p>
{{ Form::label('comment', 'Comment:') }}<br>

{{ Form::textarea('comment', $activityevaluation->comment, ['placeholder' => 'Place your comment here:'] ) }}
</p>

<p>
<input id="input-1" name="rate" class="rating " data-min="0" data-max="5" data-step="1" data-show-caption="false" data-show-clear="false" >
</p>

<p>
{{ Form::submit('Submit') }}
	{{Form::close() }}
</p>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@include('volunteer.footer')