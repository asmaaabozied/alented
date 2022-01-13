<!-- Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name', __('models/contentuses.fields.name')) !!}<span class="astrix">*</span>:
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email', __('models/contentuses.fields.email')) !!}<span class="astrix">*</span>:
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    @if($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('phone_number') ? 'has-error' : '' }}">
    {!! Form::label('phone_number', __('models/clients.fields.phone_number')) !!}<span class="astrix">*</span>:
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
    @if($errors->has('phone_number'))
        <span class="help-block">
            <strong>{{ $errors->first('phone_number') }}</strong>
        </span>
    @endif
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('message') ? 'has-error' : '' }}">
    {!! Form::label('message', __('models/contentuses.fields.message')) !!}<span class="astrix">*</span>:
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
    @if($errors->has('message'))
        <span class="help-block">
            <strong>{{ $errors->has('message') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contentuses.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
