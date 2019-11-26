@if (Auth::guard('org')->check())
    @include('partials.org-nav-links')
@else
    @include('partials.vol-nav-links')
@endif
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

{{Html::style('css/activity-list.css')}}

<div id="activity-page-body">
    <div id="activity-results-container">
        <div id='activity-list-div'>
            
        <h1>Activities</h1>
        
      
  <hr>
  



  @foreach($activityevaluations as $activityevaluation)
 
  <div class="row">
    <div class="col-md-12">
   
<input id="input-2" name = "rate" class="rating " data-min="0" data-max="5" data-step="1" data-show-caption="false" data-show-clear="false" value ="{{$activityevaluation->rating}}" data-readonly="true" data-size ="sm" >
     

    <p>{{{$activityevaluation->comment}}}</p>
    </div>
  </div>

@endforeach
         
         <br><br><br>


@include('volunteer.footer')