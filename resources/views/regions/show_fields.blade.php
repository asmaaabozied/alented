<!-- Name En Field -->
<div class="form-group">
    {!! Form::label('name_en', __('models/regions.fields.name_en').':') !!}
    <p>{{ $region->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group">
    {!! Form::label('name_ar', __('models/regions.fields.name_ar').':') !!}
    <p>{{ $region->name_ar }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/regions.fields.image').':') !!}
    @if($region->image != null)
        <p><img src="{{ url($region->image) }}" height="200px" width="250px" class="img img-responsive" /></p>
    @else
        <p><img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" /></p>
    @endif
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/regions.fields.created_at').':') !!}
    <p>{{ $region->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/regions.fields.updated_at').':') !!}
    <p>{{ $region->updated_at }}</p>
</div>

