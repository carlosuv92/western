<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('homesuper')}}" aria-expanded="false">
        <i class="sl-icon-pie-chart"></i>
        <span class="hide-menu">Dashboard General</span>
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
                <span class="hide-menu"> Ingreso de Ventas </span>
            </a>
        </li>
    </ul>
</li>

<li class="sidebar-item">
    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
                   " aria-expanded="false">
        <i class="sl-icon-note"></i>
        <span class="hide-menu">Panel de Visitas</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            <a href="{{route('visita.index')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Lista de Visitas </span>
            </a>
        </li>
    </ul>
</li>

<li class="sidebar-item">
    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
               " aria-expanded="false">
        <i class="sl-icon-note"></i>
        <span class="hide-menu">Modulo de Liquidaciones</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            <a href="{{route('contract.index_liqui')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Lista de Liquidaciones </span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-item">
    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
               " aria-expanded="false">
        <i class="sl-icon-note"></i>
        <span class="hide-menu">Modulo de Carpetas</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            <a href="{{route('folder.index')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Lista de Status </span>
            </a>
        </li>
    </ul>
</li>
