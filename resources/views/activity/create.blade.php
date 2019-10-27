@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Activity') }}</div>

                <div class="card-body">
                    {{ Form::open(["url" => "/activity", "files" => true]) }}
                        @csrf

                        <div class="form-group row">
                            {{ Form::label("name", __("Name"), [ 
                                "class" => "col-md-4 col-form-label text-md-right" 
                            ]) }}

                            <div class="col-md-6">
                                {{ Form::text("name", $activity->name, [ 
                                    "class" => "form-control", "required",  "autocomplete" => "name", "autofocus" 
                                ]) }}

                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label("details", __("Details"), [ 
                                "class" => "col-md-4 col-form-label text-md-right" 
                            ]) }}

                            <div class="col-md-6">
                                {{ Form::textarea("details", $activity->details, [ 
                                    "class" => "form-control", "required",  "autocomplete" => "details", "autofocus" 
                                ]) }}

                                @error('details')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label("start_date", __("Start Date"), [ 
                                "class" => "col-md-4 col-form-label text-md-right" 
                            ]) }}

                            <div class="col-md-6">
                                {{ Form::text("start_date", $activity->start_date, [ 
                                    "class" => "form-control", "required",  "autocomplete" => "end_date", "autofocus" 
                                ]) }}

                                @error('start_date')
                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label("end_date", __("End Date"), [ 
                                "class" => "col-md-4 col-form-label text-md-right" 
                            ]) }}

                            <div class="col-md-6">
                                {{ Form::text("end_date", $activity->end_date, [ 
                                    "class" => "form-control", "required",  "autocomplete" => "end_date", "autofocus" 
                                ]) }}

                                @error('end_date')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label("start_time", __("Start Time"), [ 
                                "class" => "col-md-4 col-form-label text-md-right" 
                            ]) }}

                            <div class="col-md-6">
                                {{ Form::text("start_time", $activity->start_time, [ 
                                    "class" => "form-control", "required",  "autocomplete" => "end_time", "autofocus" 
                                ]) }}

                                @error('start_time')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label("end_time", __("End Time"), [ 
                                "class" => "col-md-4 col-form-label text-md-right" 
                            ]) }}

                            <div class="col-md-6">
                                {{ Form::text("end_time", $activity->end_time, [ 
                                    "class" => "form-control", "required",  "autocomplete" => "end_time", "autofocus" 
                                ]) }}

                                @error('end_time')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label("location", __("Location"), [ 
                                "class" => "col-md-4 col-form-label text-md-right" 
                            ]) }}

                            <div class="col-md-6">
                                {{ Form::text("location", $activity->location, [ 
                                    "class" => "form-control", "required",  "autocomplete" => "location", "autofocus" 
                                ]) }}

                                @error('location')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label("image", __("Activity Image"), [
                                "class" => "col-md-4 col-form-label text-md-right"
                            ]) }}

                            <div class="col-md-6">
                                {{ Form::file("image", $activity->image, [
                                    "class" => "form-control-file", "required", "accept" => "image/*"
                                ]) }}

                                @error('image')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label("causes", __("Causes"), [
                                "class" => "col-md-4 col-form-label text-md-right"
                            ]) }}

                            <div class="col-md-6">
                                {{ Form::select("causes", $causes) }}

                                @error('image')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row align-self-center">
                            <div class="form-check">
                                <input class="form-check-input" name="causes[]" type="checkbox" value="1" id="Agriculture">
                                <label class="form-check-label" for="Agriculture">
                                    Agriculture
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-check col-md-6">
                                <input class="form-check-input" name="causes[]" type="checkbox" value="2" id="Animals">
                                <label class="form-check-label" for="Animals">
                                    Animals
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-check col-md-6">
                                <input class="form-check-input" name="causes[]" type="checkbox" value="3" id="Arts & Culture">
                                <label class="form-check-label" for="Arts & Culture">
                                    Arts & Culture
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-check col-md-6">
                                <input class="form-check-input" name="causes[]" type="checkbox" value="4" id="Children & Youth">
                                <label class="form-check-label" for="Children & Youth">
                                    Children & Youth
                                </label>
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <div class="form-check col-md-6">
                                <input class="form-check-input" name="causes[]" type="checkbox" value="5" id="Community Development">
                                <label class="form-check-label" for="Community Development">
                                    Community Development
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-check col-md-6">
                                <input class="form-check-input" name="causes[]" type="checkbox" value="6" id="Computers & IT">
                                <label class="form-check-label" for="Computers & IT">
                                    Computers & IT
                                </label>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Create', ["class" => "btn btn-primary"]) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
