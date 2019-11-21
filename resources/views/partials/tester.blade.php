{{Html::style('css/rating.css')}} 
 
 
 
 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>


<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

 

<p> Previous comments </p>
      @foreach ($volunteerEvaluations as $evaluation)
                <p> Comment: {{$evaluation->Comment}}  
                Rating:{{$evaluation->rating}} 
                  <span class=@if($evaluation->rating >= 1) "fa fa-star checked" @else "fa fa-star" @endif></span>
                  <span class=@if($evaluation->rating >= 2) "fa fa-star checked" @else "fa fa-star" @endif></span>
                  <span class=@if($evaluation->rating >= 3) "fa fa-star checked" @else "fa fa-star" @endif></span>
                  <span class=@if($evaluation->rating >= 4) "fa fa-star checked" @else "fa fa-star" @endif></span>
                  <span class=@if($evaluation->rating >= 5) "fa fa-star checked" @else "fa fa-star" @endif></span>
    
    
</fieldset>
                Organisation Id:{{$evaluation->organisation_id}} </p>
        @endforeach


       


@if (Auth::guard('org')->check())
	         
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
  
  
        {{ Form::hidden('organisation_id', Auth::guard('org')->id() ?? '') }}
  
            {{ Form::hidden('volunteer_id', $volunteer->id ?? '') }}

        {{ Form::label('rating', 'Rating:') }}
            {{ Form::number('rating', $volEval->rating ?? '',['min'=>1,'max'=>5]) }}
            
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

@endif