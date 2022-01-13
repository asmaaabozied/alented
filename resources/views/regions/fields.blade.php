<!-- Name En Field -->
<div class="form-group col-sm-6 {{ $errors->has('name_en') ? 'has-error' : '' }}">
    {!! Form::label('name_en', __('models/regions.fields.name_en')) !!}<span class="astrix">*</span>:
    {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('name_en'))
        <strong>{{ $errors->first('name_en') }}</strong>
    @endif
</div>

<!-- Name Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    {!! Form::label('name_ar', __('models/regions.fields.name_ar')) !!}<span class="astrix">*</span>:
    {!! Form::text('name_ar', null, ['class' => 'form-control']) !!}
    @if($errors->has('name_ar'))
        <strong>{{ $errors->first('name_ar') }}</strong>
    @endif
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 row">
    <div class="form-group col-sm-6 {{ $errors->has('image') ? 'has-error' : '' }}">
        {!! Form::label('image', __('models/regions.fields.image')) !!}<span class="astrix">*</span>:
        <label for="image" id="image_upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to upload
        </label>
        {!! Form::file('image', ['accept' => 'image/png,image/jpg']) !!}
        <span class="image-validation" id="image_validation">
            <strong>the type of image should be png or jpg</strong>
        </span>
        @if($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-6">
        @if(isset($region))
            @if($region->image != null)
                <img src="{{ url($region->image) }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @endif
        @else
            <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
        @endif
    </div>
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('regions.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@extends('layouts.scripts')