 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Trigger the modal with a button -->
<button type="button" class="modal_button" data-toggle="modal" data-target="#edit">Edit</button>

<!-- Modal -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <div class="modal-body">
        
      {!! Form::open(array ('method' =>'PUT', 'url' => '/vol/'.$volunteerProfile->id)) !!}
        
      {{ Form::label('first_name', 'First Name:') }}
                {{ Form::text('first_name', $volunteerProfile->first_name ?? '') }}
                @error('first_name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('last_name', 'Last Name:') }}
                {{ Form::text('last_name', $volunteerProfile->last_name ?? '') }}
                @error('last_name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', $volunteer->email ?? '') }}
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('date_of_birth',' Date of Birth:') }}
                {{ Form::date("date_of_birth", $volunteerProfile->date_of_birth ?? '') }}
                @error('date_of_birth')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('street_address', 'Street Address:') }}
                {{ Form::text('street_address', $volunteerProfile->street_address ?? '') }}
                @error('street_address')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('state', 'State/Parish:') }}
                {{ Form::text('state', $volunteerProfile->state ?? '') }}
                @error('state')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('city', 'City:') }}
                {{ Form::text('city', $volunteerProfile->city ?? '') }}
                @error('city')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{ Form::label('country', 'Country:') }}
                {{  Form::text('country', $volunteerProfile->country ?? '') }}
                @error('country')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
          <p>
          {{ Form::button('Update', array(
                    'type' => 'submit',
                    'onclick'=>'return confirm("Are you sure you want to update your information?")')) 
                }}
                     {!! Form::close() !!}    
        
                     {!! Form::open(['method' => 'DELETE', 'url' => '/vol/' . $volunteerProfile->id]) !!}
                    {!! Form::button('delete', ['type' => 'submit']) !!}
                {!! Form::close() !!}
        
                
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>