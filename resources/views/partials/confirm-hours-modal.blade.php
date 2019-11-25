<!-- Icon to press to open modal -->
<a 
    href="#" 
    class="modal-btn" 
    onclick="showModal({{$vol->id}})"
    data-target="#confirm-hours-modal"
    data-toggle="modal"
    data-id={{ $vol->id }}
    data-name="{{ $vol->getName() }}"
>
    <i class="pl-2 fas fa-edit"></i>
<a>

<!-- Confirm Hours Modal -->
<div class="modal fade" class="confirm-hours-modal" id="confirm-hours-modal-{{ $vol->id }}" tabindex="-1" role="dialog" aria-labelledby="confirm-hours-modal-label" aria-hidden="true">
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
                    'method' => 'PUT', 'url' => route('activity.hours.confirm', ['activity' => $activity->id, 'vol' => $vol->id ]),
                    
                ]) }}
                    <div class="row form-group justify-content-center">
                        {{ Form::label('confirm-hours', "Logged Hours: ", [
                            'class' => 'col-4 pt-2'
                        ]) }}
                        {{ Form::selectRange('confirm-hours', 0, $activity->volunteer_hours, 
                            $vol->getHoursEarned($activity->id), [
                            'class' => 'form-control col-3'
                        ]) }}
                        @error('confirm-hours')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-center">
                        {{ Form::submit('Confirm', [
                            'class' => 'btn btn-success'
                        ]) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<!-- End Confirm Hours Modal -->


<script type="text/javascript">
    // Get the modal.
    let causes = document.getElementsByClassName('confirm-hours-modal')[0];
    
    // Get the button that opens the modal.
    let btn = document.getElementByClassName('modal-btn');

    // Get the <span> element that closes modal.
    let span = document.getElementsByClassName('close')[0];

    // Function to show the modal
    function showModal(id) {
        // When the user clicks the button, open the modal.
        $('#confirm-hours-modal-' + id).modal('show');
    }
</script>