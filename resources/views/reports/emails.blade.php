@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            Newsletter
        </h1>

    </section>

    <br>

    <div class="box-header with-border">

        <form action="{{ route('emailproductss') }}" method="get">

            <div class="row">

                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="@lang('auth.app.search')"
                           value="{{ request()->search }}">
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('auth.app.search')
                    </button>

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
                            <th>Email</th>


                            <th>@lang('crud.action')</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($products as $index=>$product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->email }}</td>


                                <td>

                                    <form action="{{ route('emailproductss.destroy', $product->id) }}"
                                          method="post" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                class="fa fa-trash"></i></button>
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

