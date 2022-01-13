<!-- Title En Field -->
<div class="form-group col-sm-6 {{ $errors->has('title_en') ? 'has-error' : '' }}">
    {!! Form::label('title_en', __('models/products.fields.title_en')) !!}<span class="astrix">*</span>:
    {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('title_en'))
        <span class="help-block">
            <strong>{{ $errors->first('title_en') }}</strong>
        </span>
    @endif
</div>

<!-- Title Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('title_ar') ? 'has-error' : '' }}">
    {!! Form::label('title_ar', __('models/products.fields.title_ar')) !!}<span class="astrix">*</span>:
    {!! Form::text('title_ar', null, ['class' => 'form-control']) !!}
    @if($errors->has('title_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('title_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Description En Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('description_en') ? 'has-error' : '' }}">
    {!! Form::label('description_en', __('models/products.fields.description_en')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('description_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('description_en'))
        <span class="help-block">
            <strong>{{ $errors->first('description_en') }}</strong>
        </span>
    @endif
</div>

<!-- Description Ar Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('description_ar') ? 'has-error' : '' }}">
    {!! Form::label('description_ar', __('models/products.fields.description_ar')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('description_ar', null, ['class' => 'form-control']) !!}
    @if($errors->has('description_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('description_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('category_id') ? 'has-error' : '' }}">
    {!! Form::label('category_id', __('models/products.fields.category_id')) !!}<span class="astrix">*</span>:
    {!! Form::select('category_id', $categories, null, ['placeholder' => 'Please select Category.....', 'class' => 'form-control']) !!}
    @if($errors->has('category_id'))
        <span class="help-block">
            <span>{{ $errors->first('category_id') }}</span>
        </span>
    @endif
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('region_id') ? 'has-error' : '' }}">
    {!! Form::label('region_id', __('models/products.fields.region_id')) !!}<span class="astrix">*</span>:
    {!! Form::select('region_id', $regions, null, ['placeholder' => 'Please select Region....', 'class' => 'form-control']) !!}
    @if($errors->has('region_id'))
        <span class="help-block">
            <strong>{{ $errors->has('region_id') }}</strong>
        </span>
    @endif
</div>

<!-- Url Field -->
{{--<div class="form-group col-sm-6 {{ $errors->has('url') ? 'has-error' : '' }}">--}}
{{--    {!! Form::label('url', __('models/products.fields.url')) !!}<span class="astrix">*</span>:--}}
{{--    {!! Form::text('url', null, ['class' => 'form-control']) !!}--}}
{{--    @if($errors->has('url'))--}}
{{--        <span class="help-block">--}}
{{--            <span>{{ $errors->first('url') }}</span>--}}
{{--        </span>--}}
{{--    @endif--}}
{{--</div>--}}

{{--<!-- Status Field -->--}}
{{--<div class="form-group col-sm-6 {{ $errors->has('status') ? 'has-error' : '' }}">--}}
{{--    {!! Form::label('status', __('models/products.fields.status')) !!}<span class="astrix">*</span>:--}}
{{--    {!! Form::select('status', ['1' => __('models/products.status.1'), '2' => __('models/products.status.2'), '3' => __('models/products.status.3'), '4' => __('models/products.status.4'),], null, ['placeholder' => 'Please select Product status....', 'class' => 'form-control']) !!}--}}
{{--    @if($errors->has('status'))--}}
{{--        <span class="help-block">--}}
{{--            <strong>{{ $errors->first('status') }}</strong>--}}
{{--        </span>--}}
{{--    @endif--}}
{{--</div>--}}

<!-- Type Field
<div class="form-group col-sm-6 {{ $errors->has('type') ? 'has-error' : '' }}">
    {!! Form::label('type', __('models/products.fields.type')) !!}<span class="astrix">*</span>:
    {!! Form::select('type', ['1' => __('models/products.type.1'), '2' => __('models/products.type.2')], null, ['placeholder' => 'Please select Product status....', 'class' => 'form-control']) !!}
    @if($errors->has('type'))
        <span class="help-block">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
</div> -->

<!-- Start Date Field -->
{{--<div class="form-group col-sm-6 {{ $errors->has('start_date') ? 'has-error' : '' }}">--}}
{{--    {!! Form::label('start_date', 'Start Date') !!}<span class="astrix">*</span>:--}}
{{--    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}--}}
{{--    @if($errors->has('start_date'))--}}
{{--        <span class="help-block">--}}
{{--            <strong>{{ $errors->first('start_date') }}</strong>--}}
{{--        </span>--}}
{{--    @endif--}}
{{--</div>--}}

{{--<!-- End Date Field -->--}}
{{--<div class="form-group col-sm-6 {{ $errors->has('end_date') ? 'has-error' : '' }}">--}}
{{--    {!! Form::label('end_date', 'End Date') !!}<span class="astrix">*</span>:--}}
{{--    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}--}}
{{--    @if($errors->has('end_date'))--}}
{{--        <span class="help-block">--}}
{{--            <strong>{{ $errors->first('end_date') }}</strong>--}}
{{--        </span>--}}
{{--    @endif--}}
{{--</div>--}}

<!-- User Id Field -->

{{--<div class="form-group col-sm-6 {{ $errors->has('user_id') ? 'has-error' : '' }}">--}}
{{--    {!! Form::label('user_id', __('models/products.fields.user_id')) !!}<span class="astrix">*</span>:--}}
{{--    {!! Form::select('user_id', $users, null, ['placeholder' => 'Please select product Owner....', 'class' => 'form-control']) !!}--}}
{{--    @if($errors->has('user_id'))--}}
{{--        <span class="help-block">--}}
{{--            <strong>{{ $errors->first('user_id') }}</strong>--}}
{{--        </span>--}}
{{--    @endif--}}
{{--</div>--}}


<!-- Pdf Field -->
<div class="form-group col-sm-3 {{ $errors->has('english_pdf') ? 'has-error' : '' }}">

        {!! Form::label('english_pdf', __('models/categories.fields.en_pdf').':') !!}
        <label for="english_pdf" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to upload
        </label>
        {!! Form::file('english_pdf', ['accept' => 'application/pdf']) !!}

        @if($errors->has('english_pdf'))
            <span class="help-block">
                <strong>{{ $errors->first('english_pdf') }}</strong>
            </span>
        @endif


</div>


<!-- Pdf Field -->
<div class="form-group col-sm-3 {{ $errors->has('arabic_pdf') ? 'has-error' : '' }}">

        {!! Form::label('arabic_pdf', __('models/categories.fields.ar_pdf').':') !!}
        <label for="arabic_pdf" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to upload
        </label>
        {!! Form::file('arabic_pdf', ['accept' => 'application/pdf']) !!}

        @if($errors->has('arabic_pdf'))
            <span class="help-block">
                <strong>{{ $errors->first('arabic_pdf') }}</strong>
            </span>
        @endif


</div>
<div class="clearfix"></div>

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




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('products.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>


@extends('layouts.scripts')

@push('scripts')
    <script type="text/javascript">

        $('#start_date').datetimepicker({
            format     : 'YYYY-MM-DD',
            useCurrent : true,
            sideBySide : true,
        })
        $('#end_date').datetimepicker({
            format     : 'YYYY-MM-DD',
            useCurrent : true,
            sideBySide : true,
        })
        $('#start_date').on("dp.change", function(e){
            $('#end_date').data("DateTimePicker").minDate(e.date);
        })
    </script>
@endpush
