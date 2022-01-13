<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/contentuses.fields.name').':') !!}
    <p>{{ $contentUs->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/contentuses.fields.email').':') !!}
    <p>{{ $contentUs->email }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', __('models/contentuses.fields.phone_number').':') !!}
    <p>{{ $contentUs->phone_number }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', __('models/contentuses.fields.message').':') !!}
    <p>{{ $contentUs->message }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/contentuses.fields.created_at').':') !!}
    <p>{{ $contentUs->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/contentuses.fields.updated_at').':') !!}
    <p>{{ $contentUs->updated_at }}</p>
</div>

