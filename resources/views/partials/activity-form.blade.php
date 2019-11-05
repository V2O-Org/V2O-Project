<div class="form-group pt-3">
    {{ Form::label('name', 'Activity Name:') }}
    
    {{ Form::text('name', $activity->name ?? '', [
        'placeholder' => 'Name', 'class' => 'form-control'
    ]) }}
    @error('name')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {{ Form::label('description', 'Description:') }}

    {{ Form::textarea('description', $activity->description ?? '', [
        'placeholder' => 'Description of the activity', 'class' => 'form-control'
    ]) }}
    @error('description')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {{ Form::label('image', 'Activity Image:') }}

    {{ Form::file('image', ['accept' => 'image/*',
        'class' => 'form-control-file col-sm-10' 
    ]) }}
    @error('image')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {{ Form::label('start_date', 'Start Date:') }}
    
    {{ Form::date('start_date', $activity->start_date ?? '', [
        'class' => 'form-control'
    ]) }}
    @error('start_date')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {{ Form::label('end_date', 'End Date:') }}

    {{ Form::date('end_date', $activity->end_date ?? '', [
        'class' => 'form-control'
    ]) }}
    @error('end_date')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
    
<div class="form-group">
    {{ Form::label('start_time', 'Start Time:') }}

    {{ Form::time('start_time', $activity->start_time ?? '', [
        'class' => 'form-control'
    ]) }}
    @error('start_time')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {{ Form::label('end_time', 'End Time:') }}
    
    {{ Form::time('end_time', $activity->end_time ?? '', [
        'class' => 'form-control'
    ]) }}
    @error('end_time')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {{ Form::label('location', 'Location:') }}

    {{ Form::text('location', $activity->location ?? '', [
        'placeholder' => 'Location', 'class' => 'form-control'
    ]) }}
    @error('location')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {{ Form::label('co_host', 'Co-Host:') }}

    {{ Form::text('co_host', $activity->co_host ?? '', [
        'placeholder' => 'Name of the co-host', 'class' => 'form-control'
    ]) }}
    @error('co_host')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {{ Form::label('registration_deadline', 'Registration Deadline:') }}

    {{ Form::date('registration_deadline', $activity->registration_deadline ?? '', [
        'class' => 'form-control'
    ]) }}
    @error('registration_deadline')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {{ Form::label('volunteer_hours', 'Volunteer Hours:') }}
    
    {{  Form::text('volunteer_hours', $activity->volunteer_hours ?? '', [
        'placeholder' => 'Number of hours earnable', 'class' => 'form-control'
    ]) }}
    @error('volunteer_hours')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

@include('partials.cause-modal')