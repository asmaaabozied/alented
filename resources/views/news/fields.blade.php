
<!-- Title En Field -->
<div class="form-group col-sm-6 {{ $errors->has('title_en') ? 'has-error' : '' }}">
    {!! Form::label('title_en', __('models/news.fields.title_en')) !!}<span class="astrix">*</span>:
    {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('title_en'))
        <span class="help-block">
            <strong>{{ $errors->first('title_en') }}</strong>
        </span>
    @endif
</div>

<!-- Title Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('title_ar') ? 'has-error' : '' }}">
    {!! Form::label('title_ar', __('models/news.fields.title_ar')) !!}<span class="title_ar">*</span>:
    {!! Form::text('title_ar', null, ['class' => 'form-control']) !!}
    @if($errors->has('title_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('title_ar') }}</strong>
        </span>
    @endif
</div>
<!-- display options Field -->
<div class="form-group col-sm-6 {{ $errors->has('display_option') ? 'has-error' : '' }}">
    {!! Form::label('display_option', __('models/news.fields.display_option')) !!}<span class="astrix">*</span>:
    {!! Form::select('display_option', ['1' => 'Header Only', '2' => 'Footer Only', '3' => 'Both'], null, ['placeholder' => 'Please choose the Display option.....', 'class' => 'form-control']) !!}
    @if($errors->has('display_option'))
        <span class="help-block">
            <strong>{{ $errors->first('display_option') }}</strong>
        </span>
    @endif
</div>

<!-- Active Field -->
<div class="form-group col-sm-12">
    {!! Form::label('active', __('models/news.fields.active').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!} 
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('news.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
