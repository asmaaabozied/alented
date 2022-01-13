@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            @lang('models/products.plural')
        </h1>

    </section>

    <br>

    <div class="box-header with-border">

        <form action="{{ route('Reportuser') }}" method="get">

            <div class="row">

                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="@lang('auth.app.search')" value="{{ request()->search }}">
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('auth.app.search')</button>

                </div>

            </div>
        </form><!-- end of form -->
    </div>


    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">


                @if ($products->count() > 0)

                    <table class="table table-hover" id="table">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('models/products.fields.title_en')</th>
                            <th>@lang('models/products.fields.title_ar')</th>
                            <th>@lang('models/products.fields.user_id')</th>
                            <th>@lang('models/products.fields.category_id')</th>
                            <th>@lang('models/products.fields.region_id')</th>

                            <th>@lang('models/products.fields.created_at')</th>

                            <th>@lang('models/products.fields.status')</th>



                            <th>@lang('crud.action')</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($products as $index=>$product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->title_en }}</td>
                                <td>{{ $product->title_ar }}</td>
                                <td>{{ $product->user->name ?? '' }}</td>
                                <td>{{ $product->category->name_en ?? '' }}</td>
                                <td>{{ $product->region->name_en ?? '' }}</td>

                                <td>{{isset($product->created_at) ? $product->created_at->diffForHumans() :'' }}</td>

                                <td>







<form action="{{ route('productss.status', $product->id) }}" method="post" style="display: inline-block">
    {{ csrf_field() }}
    {{ method_field('POST') }}

    @if( $product->status==0)
        <button type="submit" class="btn btn-success update btn-sm">

            <i class="fa fa-check"></i> @lang('models/categories.fields.active')
        </button>
    @elseif( $product->status==1)

        <button type="submit" class="btn btn-danger update btn-sm">
            <i class="fa fa-close"></i>Nonactive
        </button>
    @endif

</form><!-- end of form -->
</td>






<td>
    <a href="{{ route('showproductss', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-show"></i> show</a>

<form action="{{ route('products.destroy', $product->id) }}"
      method="post" style="display: inline-block">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button type="submit" class="btn btn-danger delete btn-sm"><i
            class="fa fa-trash"></i> </button>
</form><!-- end of form -->
</td>

</tr>

@endforeach
</tbody>

</table><!-- end of table -->


@else

<h2>No matching records found</h2>

@endif


</div>
</div>
<div class="text-center">

</div>
</div>
@endsection

