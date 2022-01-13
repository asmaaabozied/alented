<li class="{{ Request::is('home') ? 'active' : '' }}">
    <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
</li>

@if(Auth::user()->hasPermission("Categories"))
<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-database"></i><span>@lang('models/categories.plural')</span></a>
</li>
@endif

@if(Auth::user()->hasPermission("Regions"))
<li class="{{ Request::is('regions*') ? 'active' : '' }}">
    <a href="{{ route('regions.index') }}"><i class="fa fa-map-pin"></i><span>@lang('models/regions.plural')</span></a>
</li>
@endif

@if(Auth::user()->hasPermission("Informative Datas"))
<li class="{{ Request::is('informativeDatas*') ? 'active' : '' }}">
    <a href="{{ route('informativeDatas.edit', 1) }}"><i class="fa fa-file"></i><span>@lang('models/informativeDatas.plural')</span></a>
</li>
@endif

@if(Auth::user()->hasPermission("Slider"))
<li class="{{ Request::is('sliders*') ? 'active' : '' }}">
    <a href="{{ route('sliders.index') }}"><i class="fa fa-edit"></i><span>@lang('models/sliders.plural')</span></a>
</li>
@endif

@if(Auth::user()->hasPermission("Packages"))
<li class="{{ Request::is('packages*') ? 'active' : '' }}">
    <a href="{{ route('packages.index') }}"><i class="fa fa-credit-card"></i><span>@lang('models/packages.plural')</span></a>
</li>
@endif

@if(Auth::user()->hasPermission("Clients"))
<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{{ route('clients.index') }}"><i class="fa fa-users"></i><span>@lang('models/clients.plural')</span></a>
</li>
@endif

@if(Auth::user()->hasPermission("News"))
<li class="{{ Request::is('news*') ? 'active' : '' }}">
    <a href="{{ route('news.index') }}"><i class="fa fa-newspaper-o"></i><span>@lang('models/news.plural')</span></a>
</li>
@endif

@if(Auth::user()->hasPermission("Contact Us"))
    <li class="{{ Request::is('contentuses*') ? 'active' : '' }}">
        <a href="{{ route('emailproductss') }}"><i class="fa fa-envelope"></i><span>NewLetter</span></a>
    </li>
@endif

@if(Auth::user()->hasPermission("Products"))
<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{{ route('products.index') }}"><i class="fa fa-edit"></i><span>adds</span></a>
</li>
@endif

@if(Auth::user()->hasPermission("Products"))
    <li class="{{ Request::is('admins*') ? 'active' : '' }}">
        <a href="{{ route('Reportproducts') }}"><i class="fa fa-user-secret"></i><span> Orders</span></a>
    </li>
@endif

@if(Auth::user()->hasPermission("Contact Us"))
<li class="{{ Request::is('contentuses*') ? 'active' : '' }}">
    <a href="{{ route('contentuses.index') }}"><i class="fa fa-envelope"></i><span>@lang('models/contentuses.plural')</span></a>
</li>
@endif



@if(Auth::user()->hasPermission("Site Ads"))
<li class="{{ Request::is('siteAds*') ? 'active' : '' }}">
    <a href="{{ route('siteAds.index') }}"><i class="fa fa-edit"></i><span>@lang('models/siteAds.plural')</span></a>
</li>
@endif

{{-- <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>@lang('models/permissions.plural')</span></a>
</li> --}}

@if(Auth::user()->hasPermission("Roles"))
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-lock"></i><span>@lang('models/roles.plural')</span></a>
</li>
@endif

@if(Auth::user()->hasPermission("Admins"))
<li class="{{ Request::is('admins*') ? 'active' : '' }}">
    <a href="{{ route('admins.index') }}"><i class="fa fa-user-secret"></i><span>@lang('models/admins.plural')</span></a>
</li>
@endif


@if(Auth::user()->hasPermission("Admins"))



<li class="treeview">
    <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>Reports</span>
        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
    </a>
    <ul class="treeview-menu" style="display:none">
        <li class="{{ Request::is('admins*') ? 'active' : '' }}">
            <a href="{{ route('Reportuser') }}"><i class="fa fa-user-secret"></i><span> @lang('models/products.plural')</span></a>
        </li>

        <li class="{{ Request::is('admins*') ? 'active' : '' }}">
            <a href="{{ route('Reportusers') }}"><i class="fa fa-user-secret"></i><span> @lang('models/clients.plural')</span></a>
        </li>

        <li class="{{ Request::is('admins*') ? 'active' : '' }}">
            <a href="{{ route('Reportpackage') }}"><i class="fa fa-user-secret"></i><span> @lang('models/packages.plural')</span></a>
        </li>

    </ul>
    r
</li>
@endif
