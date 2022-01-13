<!-- Name En Field -->
<div class="form-group col-sm-6 {{ $errors->has('name_en') ? 'has-error' : '' }}">
    {!! Form::label('name_en', __('models/categories.fields.name_en')) !!}<span class="astrix">*</span>:
    {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('name_en'))
        <span class="help-block">
            <strong>{{ $errors->first('name_en') }}</strong>
        </span>
    @endif
</div>

<!-- Name Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    {!! Form::label('name_ar', __('models/categories.fields.name_ar')) !!}<span class="astrix">*</span>:
    {!! Form::text('name_ar', null, ['class' => 'form-control']) !!}
    @if($errors->has('name_ar'))
        <span class="name_ar">
            <strong>{{ $errors->has('name_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', __('models/categories.fields.active').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!} 
    </label>
</div>

<!-- Home Field -->
<div class="form-group col-sm-6">
    {!! Form::label('home', __('models/categories.fields.home').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('home', 0) !!}
        {!! Form::checkbox('home', '1', null) !!} 
    </label>
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 row">
    <div class="form-group col-sm-6 {{ $errors->has('image') ? 'has-error' : '' }}">
        {!! Form::label('image', __('models/categories.fields.image')) !!}<span class="astrix">*</span>:
        <label for="image" id="image_upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to upload
        </label>
        {!! Form::file('image', ['accept' => 'image/png,image/jpeg']) !!}
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
        @if(isset($category))
            @if($category->image != null)
                <img src="{{ url($category->image) }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @endif
        @else
            <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
        @endif
    </div>
</div>
<div class="clearfix"></div>

<!-- Pdf Field -->
<div class="form-group col-sm-6">
    <div class="form-group col-sm-6 {{ $errors->has('image') ? 'has-error' : '' }}">
        {!! Form::label('pdf', __('models/categories.fields.pdf').':') !!}
        <label for="pdf" id="image_upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to upload
        </label>
        {!! Form::file('pdf') !!}
    </div>
    <div class="form-group col-sm-6">
        @if(isset($category))
            @if($category->pdf != null)
                <a href="{{ url($category->pdf) }}">Click Here to preview</a>
            @else
                <label>
                    Not Uploaded
                </label>
            @endif
            
        @endif
    </div>
    
    
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@extends('layouts.scripts')
