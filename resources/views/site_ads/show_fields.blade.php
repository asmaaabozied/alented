<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/siteAds.fields.image').':') !!}
    @if($siteAds->image != null)
        <p><img src="{{ url($siteAds->image) }}" height="200px" width="250px" class="img img-responsive" /></p>
    @else
        <p><img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" /></p>
    @endif
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', __('models/siteAds.fields.url').':') !!}
    <p>{{ $siteAds->url }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/siteAds.fields.created_at').':') !!}
    <p>{{ $siteAds->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/siteAds.fields.updated_at').':') !!}
    <p>{{ $siteAds->updated_at }}</p>
</div>

