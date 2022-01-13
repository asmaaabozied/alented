@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/informativeDatas.singular')
        </h1>
   </section>
   <div class="content">
       {{-- @include('adminlte-templates::common.errors') --}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($informativeData, ['route' => ['informativeDatas.update', $informativeData->id], 'method' => 'patch']) !!}

                        @include('informative_datas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
