<!-- Name En Field -->
<div class="form-group">
    {!! Form::label('name_en', __('models/categories.fields.name_en').':') !!}
    <p>{{ $category->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group">
    {!! Form::label('name_ar', __('models/categories.fields.name_ar').':') !!}
    <p>{{ $category->name_ar }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', __('models/categories.fields.active').':') !!}
    <p>@include('badge', ['active' => $category->active])</p>
</div>

<!-- Home Field -->
{{-- <div class="form-group">
    {!! Form::label('home', __('models/categories.fields.home').':') !!}
    <p>{{ $category->home }}</p>
</div> --}}

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/categories.fields.image').':') !!}
    @if($category->image != null)
        <p><img src="{{ url($category->image) }}" height="200px" width="250px" class="img img-responsive" /></p>
    @else
        <p><img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" /></p>
    @endif
</div>

<!-- Pdf Field -->
<div class="form-group">
    {!! Form::label('pdf', __('models/categories.fields.pdf').':') !!}
    <p>
        @if($category->pdf != null)
            <a href="{{ url($category->pdf) }}">Click Here to preview</a>
        @else
            <label>
                Not Uploaded
            </label>
        @endif
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/categories.fields.created_at').':') !!}
    <p>{{ $category->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/categories.fields.updated_at').':') !!}
    <p>{{ $category->updated_at }}</p>
</div>

