@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
<div class="content">
    @if(Auth::user()->role_id == 1)
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $products }}</h3>
        
                        <p>Accepted Ads</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document-text"></i>
                    </div>
                    <a href="{!! route('products.index') !!}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $clients }}</h3>
            
                        <p>Clients</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{!! route('clients.index') !!}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>{{ $subscriptions }}</h3>
            
                        <p>Subscriptions</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-hand"></i>
                    </div>
                    {{-- <a href="{!! route('reviews.index') !!}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a> --}}
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <section class="content-header">
                    <h1 class="pull-left">Today Ads</h1>
                </section>
                <div class="content">
                    <div class="clearfix"></div>

                    <div class="box box-d4d">
                        <div class="box-body">
                            <table class="table table-striped table-bordered dataTable no-footer" id="table" role="grid" aria-describedby="dataTableBuuilder_info" style="width: 100%">
                                <thead>
                                    <tr>
                                        <td>{{ __('models/products.fields.title_en') }}</td>
                                        <td>{{ __('models/products.fields.user_id') }}</td>
                                        <td>{{ __('models/products.fields.category_id') }}</td>
                                        <td>{{ __('models/products.fields.region_id') }}</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <section class="content-header">
                    <h1 class="pull-left">All Ads PDF</h1>
                </section>
                <div class="content">
                    <div class="clearfix"></div>
                    @include('flash::message')
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="row">
                                {!! Form::open(['route' => 'all_ads_pdf', 'files' => true]) !!}
                                    <!-- Pdf Field -->
                                    <div class="form-group col-sm-6">
                                        <div class="form-group col-sm-6 {{ $errors->has('english_pdf') ? 'has-error' : '' }}">
                                            {!! Form::label('english_pdf', __('models/categories.fields.en_pdf').':') !!}
                                            <label for="english_pdf" class="custom-file-upload">
                                                <i class="fa fa-cloud-upload"></i> click to upload
                                            </label>
                                            {!! Form::file('english_pdf', ['accept' => 'application/pdf']) !!}
                                        </div>
                                        <div class="form-group col-sm-6">
                                            @if(isset($pdf) && $pdf != null)
                                                <a href="{{ url($en_pdf) }}" target="blank">Click Here to preview</a>
                                            @else
                                                <label>
                                                    Not Uploaded
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group col-sm-6">
                                        <div class="form-group col-sm-6 {{ $errors->has('arabic_pdf') ? 'has-error' : '' }}">
                                            {!! Form::label('arabic_pdf', __('models/categories.fields.ar_pdf').':') !!}
                                            <label for="arabic_pdf" class="custom-file-upload">
                                                <i class="fa fa-cloud-upload"></i> click to upload
                                            </label>
                                            {!! Form::file('arabic_pdf', ['accept' => 'application/pdf']) !!}
                                        </div>
                                        <div class="form-group col-sm-6">
                                            @if(isset($arabic_pdf) && $arabic_pdf != null)
                                                <a href="{{ url($arabic_pdf) }}" target="blank">Click Here to preview</a>
                                            @else
                                                <label>
                                                    Not Uploaded
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
    @include('layouts.datatables_js')
    <script>
        $(function (){
            var oTable = $('#table').DataTable({
                // dom: "<'row'<'col-lg-6'i><'col-lg-6'f><'col-xs-6'r><'col-lg-12't>>" + 
                //         "<'col-lg-12'<'col-xs-6'p>>",
                processing: true,
                serverSide: true,
                pageLength: 10,
                order: [ ],
                ajax: {
                    url: "{{ route('today_products') }}",
                },
                columns: [
                    {name: 'title_en', data: 'title_en', defaultContent: ' '},
                    {name: 'user.name', data: 'user.name', defaultContent: ' '},
                    {name: 'category.name_en', data: 'category.name_en', defaultContent: ' '},
                    {name: 'region.name_en', data: 'region.name_en', defaultContent: ' '},
                    {name: 'action', data: 'action', orderable: false}
                ],
                language: {
                    "info": "Total _TOTAL_ Products",
                }
            });
        });
    </script>
@endpush
