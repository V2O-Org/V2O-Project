<div class='pt-4'>
        <!-- Button to trigger activity rating modal -->
        {{ Form::button("Submit", [
            'id' => 'modal-btn', 'data-toggle' => 'modal', 'data-target' => '#activity-rating-modal',
            'class' => 'btn btn-light btn-outline-dark'
        ]) }}
    
        @error('rating')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    <!-- Activity Rating Modal -->
    <div class="modal fade" id="activity-rating-modal" tabindex="-1" role="dialog" aria-labelledby="activity-rating-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activity-rating-modal-label">
                        Evaluate Activity!
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    <p>Select a rating for Save the Sea Turtles: Beach Cleanup</p>
                    <!-- Put your buttons here Dyonté -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Activity Rating Modal -->
    
    
    <script type="text/javascript">
        // Get the modal.
        let rating = document.getElementById('activity-rating-modal');
        
        // Get the button that opens the modal.
        let btn = document.getElementById('modal-btn');
    
        // Get the <span> element that closes modal.
        let span = document.getElementsByClassName('close')[0];
    
        // When the user clicks the button, open the modal.
        btn.onclick = function() {
            $('#activity-rating-modal').modal('show');
        }
    </script>