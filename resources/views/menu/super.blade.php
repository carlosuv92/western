<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('super.dashboard')}}" aria-expanded="false">
        <i class="sl-icon-pie-chart"></i>
        <span class="hide-menu">Dashboard</span>
    </a>
</li>
<li class="sidebar-item">
    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
               " aria-expanded="false">
        <i class="sl-icon-note"></i>
        <span class="hide-menu">Panel de Ventas</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            <a href="{{route('contract.index')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Lista de Ventas </span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('contract.create')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Nueva Venta </span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-item">
    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
               " aria-expanded="false">
        <i class="sl-icon-user"></i>
        <span class="hide-menu">Panel de Prospectos</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            <a href="{{route('prospect.index')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Lista de Prospectos </span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('prospect.create')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Ingreso de Prospecto </span>
            </a>
        </li>
    </ul>
</li>

