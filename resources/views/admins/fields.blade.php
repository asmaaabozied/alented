<!-- Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name', 'Name') !!}<span class="astrix">*</span>:
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email', 'Email') !!}<span class="astrix">*</span>:
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    @if($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<!-- Password Field -->
<div class="form-group col-sm-6 {{ $errors->has('password') ? 'has-error' : '' }}">
    {!! Form::label('password', 'Password') !!}<span class="astrix">*</span>:
    {!! Form::password('password', ['class' => 'form-control']) !!}
    @if($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<!-- Password Confirmation Field -->
<div class="form-group col-sm-6 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    {!! Form::label('password_confirmation', 'Password Confirmation') !!}<span class="astrix">*</span>:
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    @if($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
    @endif
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('phone_number') ? 'has-error' : '' }}">
    {!! Form::label('phone_number', 'Phone Number') !!}<span class="astrix">*</span>:
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
    @if($errors->has('phone_number'))
        <span class="help-block">
            <strong>{{ $errors->first('phone_number') }}</strong>
        </span>
    @endif
</div>

<!-- Role Field -->
<div class="form-group col-sm-6 {{ $errors->has('role_id') ? 'has-error' : '' }}">
    {!! Form::label('role_id', 'Role') !!}<span class="astrix">*</span>:
    {!! Form::select('role_id', $roleItems, null, ['placeholder' => 'Please Select a Role for the admin....', 'class' => 'form-control select2']) !!}
    @if($errors->has('role_id'))
        <span class="help-block">
            <strong>{{ $errors->first('role_id') }}</strong>
        </span>
    @endif
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 row">
    <div class="form-group col-sm-6 {{ $errors->has('image') ? 'has-error' : '' }}">
        {!! Form::label('image', 'Image') !!}
        <label for="image" id="image_label" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to upload
        </label>
        {!! Form::file('image', ['accept' => 'image/png,image/jpg,image/jpeg']) !!}
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
        @if(isset($admin))
            @if($admin->image != null)
                <img src="{{ url($admin->image) }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
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
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admins.index') }}" class="btn btn-default">Cancel</a>
</div>

@include('layouts.scripts')