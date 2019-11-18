 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>


<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">


<p> Previous comments </p>
      @foreach ($ as $discussion)
                <p> {{$discussion->title}}: {{$discussion->message}} 
                {!! Form::open(['method' => 'DELETE', 'url' => 'discussion/' . $discussion->id]) !!}
                    {!! Form::button('delete', ['type' => 'submit']) !!}
                {!! Form::close() !!}
                
                
                </p>
        @endforeach

<!-- Trigger the modal with a button -->
<button type="button" class="modal_button" data-toggle="modal" data-target="#comment">Add Comment</button>

<!-- Modal -->
<div id="comment" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">View Comments</h4>
  </div>
  <div class="modal-body">
    

 




  {!! Form::open(array ('route' => 'voleval.store')) !!}
    
  {{ Form::label('vol_id', 'Volunteer Id:') }}
            {{ Form::text('volunteer_id', $volunteer->id ?? '') }}


        {{ Form::label('org_id', 'Organisation Id:') }}
            {{ Form::text('organisation_id', $volEval->organisation_id ?? '') }}

        {{ Form::label('rating', 'Rating:') }}
            {{ Form::text('rating', $volEval->rating ?? '') }}
            
         {{ Form::label('comment', 'Comment:') }}
            {{ Form::textarea ('comment', $volEval->comment ?? '') }}

        
      <p>
      {{ Form::button('Add Comment', array(
                'type' => 'submit',
                'onclick'=>'return confirm("Are you sure you want to update your information?")')) 
            }}
                 {!! Form::close() !!}    
    
            {!! Form::close() !!}
    
            
    </p>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>

</div>
</div>