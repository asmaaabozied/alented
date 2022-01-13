{!! Form::open(['route' => ['siteAds.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('siteAds.show', $id) }}" class='btn btn-default btn-xs'>
        <span class="tooltiptext">Show</span><i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('siteAds.edit', $id) }}" class='btn btn-default btn-xs'>
        <span class="tooltiptext">Edit</span><i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<span class="tooltiptext">Delete</span><i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}
