<div class='pt-4'>
    <!-- Button to trigger causes modal -->
    {{ Form::button("Choose Causes", [
        'id' => 'modalBtn', 'data-toggle' => 'modal', 'data-target' => '#causeModal',
        'class' => 'btn btn-light btn-outline-dark'
    ]) }}

    @error('causes')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Causes Modal -->
<div class="modal fade" id="causeModal" tabindex="-1" role="dialog" aria-labelledby="causeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="causeModalLabel">
                    Select your causes
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                @foreach($causes as $cause)
                    <div class="form-group">
                        {{ Form::checkbox('causes[]', $cause) }} 
                        {{ Form::label('cause', $cause, [
                            'class' => 'pl-2', 
                        ]) }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Causes Modal -->


<script type="text/javascript">
    // Get the modal.
    let causes = document.getElementById('causesModal');
    
    // Get the button that opens the modal.
    let btn = document.getElementById('modalBtn');

    // Get the <span> element that closes modal.
    let span = document.getElementsByClassName('close')[0];

    // When the user clicks the button, open the modal.
    btn.onclick = function() {
        $('#causeModal').modal('show');
    }
</script>