<!-- Title En Field -->
<div class="form-group">
    {!! Form::label('title_en', __('models/packages.fields.title_en').':') !!}
    <p>{{ $packages->title_en }}</p>
</div>

<!-- Title Ar Field -->
<div class="form-group">
    {!! Form::label('title_ar', __('models/packages.fields.title_ar').':') !!}
    <p>{{ $packages->title_ar }}</p>
</div>

<!-- Duration Field -->
<div class="form-group">
    {!! Form::label('duration', __('models/packages.fields.duration').':') !!}
    <p>{{ $packages->duration }}</p>
</div>

<!-- Ads Number Field -->
<div class="form-group">
    {!! Form::label('ads_number', __('models/packages.fields.ads_number').':') !!}
    <p>{{ $packages->ads_number }}</p>
</div>

<!-- Ads Url Number Field -->
<div class="form-group">
    {!! Form::label('ads_url_number', __('models/packages.fields.ads_url_number').':') !!}
    <p>{{ $packages->ads_url_number }}</p>
</div>

<!-- Ad Charater Number Field -->
<div class="form-group">
    {!! Form::label('ad_charater_number', __('models/packages.fields.ad_charater_number').':') !!}
    <p>{{ $packages->ad_charater_number }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', __('models/packages.fields.price').':') !!}
    <p>{{ $packages->price }}</p>
</div>

<!-- Offer Field -->
<div class="form-group">
    {!! Form::label('offer', __('models/packages.fields.offer').':') !!}
    <p>{{ $packages->offer }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/packages.fields.created_at').':') !!}
    <p>{{ $packages->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/packages.fields.updated_at').':') !!}
    <p>{{ $packages->updated_at }}</p>
</div>

