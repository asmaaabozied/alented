<!-- Title En Field -->
<div class="form-group">
    {!! Form::label('title_en', __('models/news.fields.title_en').':') !!}
    <p>{{ $news->title_en }}</p>
</div>

<!-- Title Ar Field -->
<div class="form-group">
    {!! Form::label('title_ar', __('models/news.fields.title_ar').':') !!}
    <p>{{ $news->title_ar }}</p>
</div>

<!-- Display option-->
<div class="form-group">
    {!! Form::label('display_option', __('models/news.fields.display_option').':') !!}
    <p>@if( $news->display_option==1)
            Header Only
       @elseif ( $news->display_option==2)
             Footer Only
       @elseif( $news->display_option==3)
             Both Header and Footer
       @endif

      </p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', __('models/news.fields.active').':') !!}
    <p><p>@include('badge', ['active' => $news->active])</p></p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/news.fields.created_at').':') !!}
    <p>{{ $news->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/news.fields.updated_at').':') !!}
    <p>{{ $news->updated_at }}</p>
</div>

