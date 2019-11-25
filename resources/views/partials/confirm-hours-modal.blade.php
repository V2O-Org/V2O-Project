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
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Causes Modal -->
    
    
    <script type="text/javascript">
        // Get the modal.
        let causes = document.getElementById('confirm-hours-modal');
        
        // Get the button that opens the modal.
        let btn = document.getElementById('modal-btn');
    
        // Get the <span> element that closes modal.
        let span = document.getElementsByClassName('close')[0];
    
        // When the user clicks the button, open the modal.
        btn.onclick = function() {
            $('#confirm-hours-modal').modal('show');
        }
    </script>