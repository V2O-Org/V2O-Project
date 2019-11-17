@if (Auth::guard('org')->check())
    @include('partials.org-nav-links')
@else
    @include('partials.vol-nav-links')
@endif

{{Html::style('css/activity-search.css')}}


//double check for this id below
    <div id="activity-results-container">
        <div id='search-actlist-div'>
            
{{-- <h1> Search Results of "<b>{{ $query }}</b>" </h1> --}}
        @if(isset($details))
        <div id="actlist-board">
            <table id="search-table">
                @foreach($details as $activity)
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
        @endif

        <!-- if no matches found-->
        @if(!isset($details))
         <p>No matches found</p>
         @endif

        <!-- BUTTON to return -->
        {{Form::button('Return to Profile',['id'=>'return-button'])}}
        </div>
    </div>
</div>
@include('volunteer.footer')
