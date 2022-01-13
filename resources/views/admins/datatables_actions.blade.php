{!! Form::open(['route' => ['admins.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admins.show', $id) }}" class='btn btn-default btn-xs'>
        <span class="tooltiptext">Show</span><i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('admins.edit', $id) }}" class='btn btn-default btn-xs'>
        <span class="tooltiptext">Edit</span><i class="glyphicon glyphicon-edit"></i>
    </a>
    @if(Auth::id() != $id)
    {!! Form::button('<span class="tooltiptext">Delete</span><i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endif
</div>
{!! Form::close() !!}
