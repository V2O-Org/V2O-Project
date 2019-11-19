@include('partials.org-nav-links')

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
</style>

<script src="{{ asset('js/app.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">{{  $activity->name }}</h1>
                    <h2 class="card-subtitle pl-4">Volunteer List</h2>
                </div>

                
                <div class="card-body p-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Email</th>
                                <th scope="col">Total Hours</th>
                                <th scope="col">Hours Submitted</th>
                                <th scope="col">Confirmed?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Isabelle Adams</td>
                                <td>23</td>
                                <td>isabellebb246@outlook.com</td>
                                <td>15</td>
                                <td>5</td>
                                <td>yes / no</td>
                            </tr>
                            @foreach($volunteerProfiles->all() as $vol)
                                <tr>
                                    <td>{{ $vol->getName() }}</td>
                                    <td>{{ $vol->getAge() }}</td>
                                    <td>{{ $vol->volunteer->email }}</td>
                                    <td>{{ $vol->getHoursEarned() }}</td>
                                    <td>5</td>
                                    <td>yes / no</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>