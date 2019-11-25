@include('partials.org-nav-links')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style type="text/css">
    body { 
        background: white !important; 
    } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */

    .card-header {
        background-color: white !important;
    }

    .page-title {
        color: green;
        font-family: 'verdana';
	    font-size: 75;
        font-weight: bold;
        margin-top: 10px
    }
</style>

<script src="{{ asset('js/app.js') }}"></script>

<div class="container">
    <div class="col-lg-12 mt-3 mb-3">
        <div class="card" style="border: none;">
            <div class="card-header" style="border-bottom: none;">
                <h1 class="card-title page-title">{{  $activity->name }}</h1>
                <h3 class="card-subtitle page-title pl-4">Volunteer List</h3>
            </div>

            <div class="card-body p-4">
                <div class="vol-table-container">
                    <table class="table vol-table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Email</th>
                                <th scope="col">Total Hours</th>
                                <th scope="col">Hours Submitted</th>
                                <th scope="col">Confirmed?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($volunteers->all() as $vol)
                                <tr>
                                    <td>{{ $vol->getName() }}</td>
                                    <td>{{ $vol->getAge() }}</td>
                                    <td>{{ $vol->getEmail() }}</td>
                                    <td>{{ $vol->getAllHoursEarned() }}</td>
                                    <td>{{ $vol->getHoursEarned($activity->id) }}</td>
                                    <td>
                                        {{ $vol->pivot->hours_confirmed ? "Yes" : "No" }} 
                                        <a href="#" class="modal-btn" onclick="showModal()"><i class="pl-2 fas fa-edit"></i><a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-center pt-3">
                        {{ $volunteers->links() }}
                    </div>
                    <div class="col-12 d-flex justify-content-center pt-1">
                        Showing {{ $volunteers->firstItem() . '-' . 
                        $volunteers->lastItem() . ' out of ' . $volunteers->total() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm Hours Modal -->
    <div class="modal fade" id="confirm-hours-modal" tabindex="-1" role="dialog" aria-labelledby="confirm-hours-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm-hours-modal-label">
                        Please confirm {{ $vol->getName() }}'s hours
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    {{ Form::open([
                        'method' => 'PUT', 'url' => "/activity/$activity->id/volunteer/hours",
                    ]) }}
                        {{ Form::selectRange('confirm-hours', 0, $activity->volunteer_hours, 
                            isset($activity->volunteer_hours)? $activity->volunteer_hours : '', [
                            'class' => 'form-group'
                        ]) }}
                        {{ Form::submit('Confirm', [
                            'class' => 'btn btn-success'
                        ]) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <!-- End Causes Modal -->
    
    
    <script type="text/javascript">
        // Get the modal.
        let causes = document.getElementById('confirm-hours-modal');
        
        // Get the button that opens the modal.
        let btn = document.getElementByClassName('modal-btn');
    
        // Get the <span> element that closes modal.
        let span = document.getElementsByClassName('close')[0];
    
        function showModal() {
            // When the user clicks the button, open the modal.
            $('#confirm-hours-modal').modal('show');
        }
        
        // // When the user clicks the button, open the modal.
        // btn.onclick = function() {
        //     $('#confirm-hours-modal').modal('show');
        // }
    </script>
</div>

@include('partials.footer')