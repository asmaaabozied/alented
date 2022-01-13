<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/clients.fields.email').':') !!}
    <p>{{ $client->email }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/clients.fields.name').':') !!}
    <p>{{ $client->name }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', __('models/clients.fields.phone_number').':') !!}
    <p>{{ $client->phone_number }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/clients.fields.image').':') !!}
    @if($client->image != null)
        <p><img src="{{ url($client->image) }}" height="200px" width="250px" class="img img-responsive" /></p>
    @else
        <p><img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" /></p>
    @endif
</div>


@if(isset($client->trade_license))
<!-- Status Field -->
<div class="form-group">
    {!! Form::label('trade_license', __('models/clients.fields.trade_license').':') !!}
    <p><a href="{{ url($client->trade_license)  }}" target="_blank">Click Here To View </a></p>
</div>
@endif

@if(isset($client->emirates_id))
<!-- Status Field -->
<div class="form-group">
    {!! Form::label('emirates_id', __('models/clients.fields.emirates_id').':') !!}
    <p><a href="{{ url($client->emirates_id)  }}" target="_blank">Click Here To View </a></p>
</div>
@endif


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/clients.fields.created_at').':') !!}
    <p>{{ $client->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/clients.fields.updated_at').':') !!}
    <p>{{ $client->updated_at }}</p>
</div>

