<!-- Image Field -->
<div class="form-group col-sm-6 row">
    <div class="form-group col-sm-6 {{ $errors->has('image') ? 'has-error' : '' }}">
        {!! Form::label('image', __('models/clients.fields.image')) !!}<span class="astrix">*</span>:
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
        @if(isset($product))
            @if($product->image != null)
                <img src="{{ url($product->image) }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @endif
        @else
            <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
        @endif
    </div>
</div>
<div class="clearfix"></div>

<!-- Url Field -->
<div class="form-group col-sm-6 {{ $errors->has('url') ? 'has-error' : '' }}">
    {!! Form::label('url', __('models/products.fields.url')) !!}<span class="astrix">*</span>:
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
    @if($errors->has('url'))
        <span class="help-block">
            <span>{{ $errors->first('url') }}</span>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('siteAds.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@extends('layouts.scripts')