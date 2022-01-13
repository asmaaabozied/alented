


@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/products.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">



<!-- Title En Field -->
<div class="form-group">
    {!! Form::label('title_en', __('models/products.fields.title_en').':') !!}
    <p>{{ $product->title_en }}</p>
</div>

<!-- Title Ar Field -->
<div class="form-group">
    {!! Form::label('title_ar', __('models/products.fields.title_ar').':') !!}
    <p>{{ $product->title_ar }}</p>
</div>

<!-- Description En Field -->
<div class="form-group">
    {!! Form::label('description_en', __('models/products.fields.description_en').':') !!}
    <p>{{ $product->description_en }}</p>
</div>

<!-- Description Ar Field -->
<div class="form-group">
    {!! Form::label('description_ar', __('models/products.fields.description_ar').':') !!}
    <p>{{ $product->description_ar }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', __('models/products.fields.category_id').':') !!}
    <p>{{ optional($product->category)->name_en }}</p>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', __('models/products.fields.region_id').':') !!}
    <p>{{ optional($product->region)->name_en }}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', __('models/products.fields.url').':') !!}
    <p>{{ $product->url }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/products.fields.image').':') !!}
    @if($product->image != null)
        <p><img src="{{ url($product->image) }}" height="200px" width="250px" class="img img-responsive" /></p>
    @else
        <p><img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" /></p>
    @endif
</div>
@if(isset($product->english_pdf))
<!-- Status Field -->
<div class="form-group">
    {!! Form::label('en_pdf', __('models/products.fields.en_pdf').':') !!}
    <p><a href="{{ url($product->english_pdf)  }}" target="_blank">Click Here To View </a></p>
</div>
@endif
@if(isset($product->arabic_pdf))
<!-- Status Field -->
<div class="form-group">
    {!! Form::label('ar_pdf', __('models/products.fields.ar_pdf').':') !!}
    <p><a href="{{ url($product->arabic_pdf) }}" target="_blank">Click Here To View </a></p>
</div>
@endif

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/products.fields.status').':') !!}
    <p>{{ $product->status }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/products.fields.user_id').':') !!}
    <p>{{ optional($product->user)->name }} ( {{ optional($product->user)->email }} ) ( {{ optional($product->user)->phone_number }}  )</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/products.fields.created_at').':') !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/products.fields.updated_at').':') !!}
    <p>{{ $product->updated_at }}</p>
</div>



                    <a href="{{ route('Reportproducts') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>




                </div>
            </div>
        </div>
    </div>
@endsection

