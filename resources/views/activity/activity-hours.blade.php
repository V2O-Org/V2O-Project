@include('partials.vol-nav-links')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style type="text/css">
    body { 
        background: white !important; 
    } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */

    .card-header {
        background-color: white !important;
    }
    .modal-header {
        background-color: white !important;
    }

     	*{
			box-sizing: border-box;
		}
		.col-1 {width: 8.33%;}
		.col-2 {width: 16.66%;}
		.col-3 {width: 25%;}
		.col-4 {width: 33.33%;}
		.col-5 {width: 41.66%;}
		.col-6 {width: 50%;}
		.col-7 {width: 58.33%;}
		.col-8 {width: 66.66%;}
		.col-9 {width: 75%;}
		.col-10 {width: 83.33%;}
		.col-11 {width: 91.66%;}
		.col-12 {width: 100%;}


        .cardBorder{
            border-style: solid;
            border-radius: 6px;
            padding: 10px;
            border-width: 2px;
        }

        .center{text-align:center;}
</style>


<script src="{{ asset('js/app.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3">
             <div>
                  <div>
                         <div class="card-header">
                            <h2 class="card-title pl-4 center"><strong>Log hours</strong></h2>
                          </div>


                @foreach($activities as $activity)

                <div class = "row cardBorder">
                    <div class= "col-8">

                   <p> Activity Name: {{  $activity->name }}</p>
                   <p> {{  $activity->start_date }} &nbsp;
                    {{  $activity->end_date }} &nbsp;&nbsp;
                    {{  $activity->start_time }} to {{  $activity->end_time }}</p>

                    <p>
                    Description<br>
                    {{  $activity->description }}
                    </p>
                    </div>

                    <div class= "col-4 dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Hours
                        <span class="caret"></span></button>
                                <select class="dropdown-menu" multiple="yes" style="height: 150px; width: 100px;">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
	                                <option>7</option>
	                                <option>8</option>
	                                <option>9</option>
	                                <option>10</option>
	                                <option>11</option>
	                                <option>12</option>
                                </select>
                    </div>
                </div>

                <br><br>
                  @endforeach
               
            </div>
        </div>
        </div>
    </div>
</div>

