@if (Auth::guard('org')->check())
    @include('partials.org-nav-links')
@else
    @include('partials.vol-nav-links')
@endif

{{Html::style('css/activity-list.css')}}

<div id="activity-page-body">
    <div id="activity-results-container">
        <div id='activity-list-div'>
            
        <h1>Activities</h1>
        
        <form class="activity-search-form" action="/search" method="POST" role="search">
          {{ csrf_field() }}
             <div class="input-group">
                 <input type="text" class="form-control" name="name" placeholder="Search"> 
                 <input type="date" class="form-control" name="startDate" >
                      <span class="input-group-btn">
                          <button type="submit" class="btn btn-default">
                                 <span class="glyphicon glyphicon-search">Go</span>
                           </button>
                      </span>
             </div>
         </form>
         
         <br><br><br>

        <div id="list-board">
            <table id="activity-table">
                @foreach($activities as $activity)
                <tr>
                    <div class="activity-item">
                        <h3>{{ $activity->name }}</h3>
                        <div class="activity-date">
                            <strong>{{ $activity->start_date . ($activity->start_date === $activity->end_date ? '' : (' to ' . $activity->end_date)) }}</strong>
                        </div>
                        <div class="activity-causes">
                            @foreach($activity->causes()->get() as $cause)
                                <span>{{ $cause->name }} | </span>
                            @endforeach
                        <p class="activity-description">
                            {{ $activity->description }}
                        </p>
                        <hr>
                    <div>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- BUTTON to return -->
        {{Form::button('Return to Profile',['id'=>'return-button'])}}
        </div>
    </div>
</div>
@include('partials.footer')