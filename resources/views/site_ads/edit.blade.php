@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/siteAds.singular')
        </h1>
   </section>
   <div class="content">
       {{-- @include('adminlte-templates::common.errors') --}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($siteAds, ['route' => ['siteAds.update', $siteAds->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('site_ads.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
