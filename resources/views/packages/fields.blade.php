<!-- Title En Field -->
<div class="form-group col-sm-6 {{ $errors->has('title_en') ? 'has-error' : '' }}">
    {!! Form::label('title_en', __('models/packages.fields.title_en')) !!}<span class="astrix">*</span>:
    {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('title_en'))
        <span class="help-block">
            <strong>{{ $errors->first('title_en') }}</strong>
        </span>
    @endif
</div>

<!-- Title Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('title_ar') ? 'has-error' : '' }}">
    {!! Form::label('title_ar', __('models/packages.fields.title_ar')) !!}<span class="astrix">*</span>:
    {!! Form::text('title_ar', null, ['class' => 'form-control']) !!}
    @if($errors->has('title_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('title_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Duration Field -->
<div class="form-group col-sm-6 {{ $errors->has('duaration') ? 'has-error' : '' }}">
    {!! Form::label('duration', __('models/packages.fields.duration')) !!}<span class="astrix">*</span>:
    {!! Form::select('duration', ['1' => 'Week','2' => '2 Week','3' => 'Month', '4' => '3 Months', '5' => ' 6 Months','6'=>'Year'], null, ['placeholder' => 'Please choose the Package Duration.....', 'class' => 'form-control']) !!}
    @if($errors->has('duration'))
        <span class="help-block">

            <strong>{{ $errors->first('duration') }}</strong>
        </span>
    @endif
</div>

<!-- Ads Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('ads_number') ? 'has-error' : '' }}">
    {!! Form::label('ads_number', __('models/packages.fields.ads_number')) !!}<span class="astrix">*</span>:
    {!! Form::number('ads_number', null, ['class' => 'form-control']) !!}
    @if($errors->has('ads_number'))
        <span class="help-block">
            <strong>{{ $errors->first('ads_number') }}</strong>
        </span>
    @endif
</div>

<!-- Ads Url Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('ads_url_number') ? 'has-error' : '' }}">
    {!! Form::label('ads_url_number', __('models/packages.fields.ads_url_number')) !!}<span class="astrix">*</span>:
    {!! Form::number('ads_url_number', null, ['class' => 'form-control']) !!}
    @if($errors->has('ads_url_number'))
        <span class="help-block">
            <strong>{{ $errors->first('ads_url_number') }}</strong>
        </span>
    @endif
</div>

<!-- Ad Charater Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('ad_charater_number') ? 'has-error' : '' }}">
    {!! Form::label('ad_charater_number', __('models/packages.fields.ad_charater_number')) !!}<span class="astrix">*</span>:
    {!! Form::number('ad_charater_number', null, ['class' => 'form-control']) !!}
    @if($errors->has('ad_charater_number'))
        <span class="help-block">
            <strong>{{ $errors->first('ad_charater_number') }}</strong>
        </span>
    @endif
</div>

<!-- Price Field -->
<div class="form-group col-sm-6 {{ $errors->has('price') ? 'has-error' : '' }}">
    {!! Form::label('price', __('models/packages.fields.price')) !!}<span class="astrix">*</span>:
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
    @if($errors->has('price'))
        <span class="help-block">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif
</div>

<!-- Offer Field -->
<div class="form-group col-sm-6 {{ $errors->has('offer') ? 'has-error' : '' }}">
    {!! Form::label('offer', __('models/packages.fields.offer').':') !!}
    {!! Form::number('offer', null, ['class' => 'form-control']) !!}
    @if($errors->has('offer'))
        <span class="help-block">
            <strong>{{ $errors->first('offer') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('packages.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
