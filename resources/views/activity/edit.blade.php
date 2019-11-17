@include('partials.org-nav-links')

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
                    <h1 class="card-title">Edit Activity</h1>
                </div>
                
                <div class="card-body p-4">
                    <div class="col-6 login-sec " id="login.stf">
                        <!-- Update Form for activity -->
                        {{ Form::open([
                            'method' => 'PUT', 'url' => '/activity/' . $activity->id, 
                            'enctype' => 'multipart/form-data'
                        ]) }}

                            @include('partials.activity-form')

                            <div id="update-btn-container" class="pt-4 pb-4">
                                {{ Form::submit('Update', array(
                                    'class' => 'btn btn-light btn-outline-success',
                                )) }}
                            </div>
                        {{ Form::close() }}
                        <!-- END Update Form -->

                        <!-- Delete Form for activity -->
                        {{ Form::open([
                            'method' => 'DELETE', 'url' => '/activity/' . $activity->id,
                        ]) }}
                            <div class="delete-container" class="pt-4">
                                {{ Form::submit('Delete', array(
                                    'class' => 'btn btn-danger btn-sm',
                                    'onclick' => 'return confirm("Are you sure you want to delete this activity?")',
                                )) }}
                            </div>
                        {{ Form::close() }}
                        <!-- END Delete Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('volunteer.footer')