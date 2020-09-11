<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('home')}}" aria-expanded="false">
        <i class="sl-icon-pie-chart"></i>
        <span class="hide-menu">Dashboard</span>
    </a>
</li>
{{--<li class="sidebar-item">
    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
               " aria-expanded="false">
        <i class="mdi mdi-notification-clear-all"></i>
        <span class="hide-menu">Panel de Logistica</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            <a href="{{route('pocket.assign')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Dashboard de Pocket </span>
            </a>
            <a href="{{route('warehouse.list')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Ingreso de Guia </span>
            </a>
        </li>
    </ul>
</li>--}}
<li class="sidebar-item">
    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
               " aria-expanded="false">
        <i class="sl-icon-note"></i>
        <span class="hide-menu">Modulo de Usuarios</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            <a href="{{route('usuarios.index')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Lista de Usuarios </span>
            </a>
        </li>
    </ul>
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
        <span class="hide-menu">Panel de Visitas</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            <a href="{{route('visita.index')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Lista de Visitas </span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('visita.create')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Ingreso de Visita </span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-item">
    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
               " aria-expanded="false">
        <i class="sl-icon-note"></i>
        <span class="hide-menu">Pendiente de Liquidacion</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            <a href="{{route('contract.index_liqui')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Lista de Pendientes </span>
            </a>
        </li>
    </ul>
</li>

