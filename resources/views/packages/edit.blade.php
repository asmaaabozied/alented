@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/packages.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($packages, ['route' => ['packages.update', $packages->id], 'method' => 'patch']) !!}

                        @include('packages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
