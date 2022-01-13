<!-- Email Field -->
<div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email', __('models/clients.fields.email')) !!}<span class="astrix">*</span>:
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    @if($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<!-- Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name', __('models/clients.fields.name')) !!}<span class="astrix">*</span>:
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
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

<!-- Password Field -->
<div class="form-group col-sm-6 {{ $errors->has('password') ? 'has-error' : '' }}">
    {!! Form::label('password', __('models/clients.fields.password')) !!}<span class="astrix">*</span>:
    {!! Form::password('password', ['class' => 'form-control']) !!}
    @if($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<!-- Password Confirmation Field -->
<div class="form-group col-sm-6 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    {!! Form::label('password_confirmation', __('models/clients.fields.password_confirmation')) !!}<span class="astrix">*</span>:
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    @if($errors->has('password_confirmation'))
        <span class="help-block">    
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
    @endif
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 row">
    <div class="form-group col-sm-6 {{ $errors->has('image') ? 'has-error' : '' }}">
        {!! Form::label('image', __('models/clients.fields.image')) !!}<span class="astrix">*</span>:
        <label for="image" id="image_upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to upload
        </label>
        {!! Form::file('image', ['accept' => 'image/png,image/jpeg']) !!}
        <span class="image-validation" id="image_validation">
            <strong>the type of image should be png or jpg</strong>
        </span>
        @if($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-6">
        @if(isset($client))
            @if($client->image != null)
                <img src="{{ url($client->image) }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @endif
        @else
            <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
        @endif
    </div>
</div>
<div class="clearfix"></div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clients.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

