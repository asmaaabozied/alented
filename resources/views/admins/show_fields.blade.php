<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/admins.fields.name').':') !!}
    <p>{{ $admin->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/admins.fields.email').':') !!}
    <p>{{ $admin->email }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', __('models/admins.fields.password').':') !!}
    <p>{{ $admin->password }}</p>
</div>

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', 'Role :') !!}
    <p><span class="label bg-blue" style="font-size: 16px">{{ optional($admin->role)->name }}</span></p>
</div>

<!-- Active Field -->
{{-- <div class="form-group">
    {!! Form::label('active', __('models/admins.fields.active').':') !!}
    <p>{{ $admin->active }}</p>
</div> --}}

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/admins.fields.image').':') !!}
    <p>{{ $admin->image }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/admins.fields.created_at').':') !!}
    <p>{{ $admin->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/admins.fields.updated_at').':') !!}
    <p>{{ $admin->updated_at }}</p>
</div>

