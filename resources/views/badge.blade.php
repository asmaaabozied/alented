@if(isset($active))
    <span class="label {{ $active == 1 ? 'bg-green' : 'bg-red' }}">{{ $active == 1 ? 'Published' : 'Blocked' }}</span>
@endif


@if(isset($status))
    @if($status == 1)
        <span class="label bg-blue">{{ __('models/products.status.1') }}</span>
    @elseif($status == 2)
        <span class="label bg-yellow">{{ __('models/products.status.2') }}</span>
    @elseif($status == 3)
        <span class="label bg-green">{{ __('models/products.status.3') }}</span>
    @elseif($status == 4)
        <span class="label bg-red">{{ __('models/products.status.4') }}</span>
    @endif
    
@endif