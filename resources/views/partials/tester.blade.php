{{Html::style('css/rating.css')}} 
 
 
 
 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>


<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

 

              <a class="btn btn-light" data-toggle="collapse" href="#Comments" role="button" aria-expanded="false" aria-controls="comment">
              Comments
            </a>

          <a class="btn btn-default" data-toggle="collapse" href="#History" role="button" aria-expanded="false" aria-controls="History">
              History
            </a> 



    <div class="collapse" id="History">
          <div class="card card-body">

              <h5 class="card-title">History </h5>
          </div>
    </div>

    <div class="col">
          </p>
          <div class="collapse" id="Comments">
            <div class="card card-body">

              <h5 class="card-title">Previous comments </h5>
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
        </div>

                
       
                

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
                  


                <div class="form-group">
                {!! Form::open(array ('route' => 'voleval.store')) !!}
                
                
                      {{ Form::hidden('organisation_id', Auth::guard('org')->id() ?? '') }}
                
                          {{ Form::hidden('volunteer_id', $volunteer->id ?? '') }}

                      {{ Form::label('rating', 'Rating:') }}
                          {{ Form::number('rating', $volEval->rating ?? '',['min'=>1,'max'=>5]) }}
                          
                      {{ Form::label('comment', 'Comment:') }}
                          {{ Form::textarea ('comment', $volEval->comment ?? '',['class' => 'form-control','rows'=> 5]) }}

                      
                    <p>
                    {{ Form::button('Add Comment', array(
                              'type' => 'submit',
                              'onclick'=>'return confirm("Are you sure you want to add this comment?")')) 
                          }}
                              {!! Form::close() !!}    
                  
                          {!! Form::close() !!}
                  
                          
                  </p>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>


</div>
            </div>

</div>
</div>

@endif