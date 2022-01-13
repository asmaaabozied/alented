@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            @lang('models/packages.plural')
        </h1>


    </section>
    <br>

                <div class="box-header with-border">

        <form action="{{ route('Reportpackage') }}" method="get">

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





                @if ($packages->count() > 0)

                    <table class="table table-hover" id="table">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('models/packages.fields.title_en')</th>
                            <th>@lang('models/packages.fields.duration')</th>
                            <th>@lang('models/packages.fields.ads_number')</th>

                            <th>@lang('models/packages.fields.ads_url_number')</th>
                            <th>@lang('models/packages.fields.price')</th>
                            <th>@lang('models/packages.fields.offer')</th>
                            <th>@lang('models/products.fields.created_at')</th>


                            <th>@lang('crud.action')</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($packages as $index=>$user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->title_en }}</td>
                                <td>{{ $user->duration }}</td>
                                <td>{{ $user->ads_number }}</td>
                                <td>{{ $user->ads_url_number }}</td>
                                <td>{{ $user->price }}</td>
                                <td>{{ $user->offer ?? '' }}</td>

                                <td>{{isset($user->created_at) ? $user->created_at->diffForHumans() :'' }}</td>


                                <td>

                                    <form action="{{ route('packages.destroy', $user->id) }}"
                                          method="post" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                class="fa fa-trash"></i></button>
                                    </form><!-- end of form -->

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

