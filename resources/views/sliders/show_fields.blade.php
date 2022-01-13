<!-- Title En Field -->
<div class="form-group">
    {!! Form::label('title_en', __('models/sliders.fields.title_en').':') !!}
    <p>{{ $slider->title_en }}</p>
</div>

<!-- Title Ar Field -->
<div class="form-group">
    {!! Form::label('title_ar', __('models/sliders.fields.title_ar').':') !!}
    <p>{{ $slider->title_ar }}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', __('models/sliders.fields.url').':') !!}
    <p>{{ $slider->url }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/categories.fields.image').':') !!}
    @if($slider->image != null)
        <p><img src="{{ url($slider->image) }}" height="200px" width="250px" class="img img-responsive" /></p>
    @else
        <p><img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" /></p>
    @endif
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/sliders.fields.created_at').':') !!}
    <p>{{ $slider->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/sliders.fields.updated_at').':') !!}
    <p>{{ $slider->updated_at }}</p>
</div>

