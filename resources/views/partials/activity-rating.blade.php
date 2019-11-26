

<style type="text/css">
#modal-btn{
  
    padding:5px;
    padding-left: 30px;
    padding-right: 30px;
   margin-left: 82.5%;   
   border-color:  black;
   background-color: white;
   font-weight: bold;
   border-width: medium;
   box-shadow: 1px 3px;
}
</style>

<div class='pt-4 submitbutton'>
        <!-- Button to trigger causes modal -->

        {{ Form::button("Submit", [
            'id' => 'modal-btn', 'data-toggle' => 'modal', 'data-target' => '#activity-rating-modal',
            //'class' => 'btn btn-light btn-outline-dark'
        ]) }}
    
        @error('rating')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
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
                    <p>Rate the Activity</p>
                    <!-- Put your buttons here Dyonté -->
					<input id="input-1" name="rate" class="rating " data-min="0" data-max="5" data-step="1" data-show-caption="false" data-show-clear="false" >
                </div>
            </div>
        </div>
    </div>
    <!-- End Activity Rating Modal -->
    
    
    <script type="text/javascript">
        // Get the modal.
        let causes = document.getElementById('activity-rating-modal');
        
        // Get the button that opens the modal.
        let btn = document.getElementById('modal-btn');
    
        // Get the <span> element that closes modal.
        let span = document.getElementsByClassName('close')[0];
    
        // When the user clicks the button, open the modal.
        btn.onclick = function() {
            $('#activity-rating-modal').modal('show');
        }
    </script>