@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            @lang('models/clients.plural')
        </h1>

    </section>
<br>
    <div class="box-header with-border">

        <form action="{{ route('Reportusers') }}" method="get">

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


                @if ($users->count() > 0)

                    <table class="table table-hover" id="table">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('models/clients.fields.name')</th>
                            <th>@lang('models/clients.fields.email')</th>
                            <th>@lang('models/clients.fields.phone_number')</th>

                            <th>@lang('models/clients.fields.updated_at')</th>
                            <th>@lang('models/products.fields.created_at')</th>


                            <th>@lang('crud.action')</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($users as $index=>$user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->updated_at->diffForHumans() ?? '' }}</td>

                                <td>{{isset($user->created_at) ? $user->created_at->diffForHumans() :'' }}</td>


                                <td>

                                    <form action="{{ route('clients.destroy', $user->id) }}"
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

