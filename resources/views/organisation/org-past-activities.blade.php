@include('partials.org-nav-links')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style type="text/css">
    body { 
        background: white !important; 
    } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */

    .page-title {
        color: green;
        font-family: 'verdana';
	    font-size: 75;
        font-weight: bold;
        margin-top: 20px
    }

    .card-header {
        background-color: white !important;
    }
</style>

<script src="{{ asset('js/app.js') }}"></script>

<div class="container">
    <div class="page-header row">
        <div class="col-md-6 col-sm-8 col-xs-12">
            <h1 class="page-title">My Past Activities</h1>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-12 pt-4 align-items-end">
            {{ Form::open([
                'method' => 'GET', 'url' => '/org/activities/past/search/',
                'role' => 'search',
            ]) }}

                <div class="col-md-10 col-sm-10 col-xs-12">
                    <div class="input-group">
                        {{ Form::search('query', '', [
                            'placeholder' => 'Search activities',
                            'class' => 'form-control'
                        ]) }}

                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>

    <div class="row">
        <div class="w-75 mt-3 mb-3 mx-auto">
            @foreach($pastActivities as $activity)
                <div class="card m-4">
                    <div class="activity-name card-header">
                        <h3>{{ $activity->name }}</h4>
                    </div>
                    
                    <div class="card-body pl-5 pt-3">
                        <h5 class="activity-org card-subtitle pb-2">
                            @foreach($activity->organisations()->get() as $org)
                                {{ $org->name . ($loop->last ? "" : ", ") }}
                            @endforeach
                        </h5>

                        <div class="activity-end-date pb-2">End Date: {{ $activity->end_date }}</div>

                        <p class="activity-description card-text">
                            {{ Str::limit($activity->description, 250, '...') }}
                        </p>

                        <div class="text-center">
                            <a href="/activity/{{ $activity->id }}" class="btn btn-primary p-2 m-2">More Info</a>
                            <a href="/activity/{{ $activity->id }}/volunteers" class="btn btn-danger p-2 m-2">Volunteers</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('partials.footer')