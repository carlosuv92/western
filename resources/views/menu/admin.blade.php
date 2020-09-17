<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('home')}}" aria-expanded="false">
        <i class="sl-icon-pie-chart"></i>
        <span class="hide-menu">Dashboard</span>
    </a>
</li>
<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('prospect.dashboard')}}" aria-expanded="false">
        <i class="sl-icon-pie-chart"></i>
        <span class="hide-menu">Detalle Prospecto</span>
    </a>
</li>
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

