<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/roles.fields.name').':') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Permissions Field -->
<div class="form-group">
    {!! Form::label('permissions', 'Permissions:') !!}
    @foreach($role->permissions as $permission)
        <p><span class="label bg-blue" style="font-size: 16px">{{ $permission->name }}</span></p>
    @endforeach
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/roles.fields.created_at').':') !!}
    <p>{{ $role->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/roles.fields.updated_at').':') !!}
    <p>{{ $role->updated_at }}</p>
</div>

