<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('homeseller')}}" aria-expanded="false">
        <i class="sl-icon-pie-chart"></i>
        <span class="hide-menu">Dashboard</span>
    </a>
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
        <span class="hide-menu">Panel de Ventas</span>
    </a>
    <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
            <a href="{{route('contract.index')}}" class="sidebar-link">
                <i class="mdi mdi-octagram"></i>
                <span class="hide-menu"> Lista de Ventas </span>
            </a>
        </li>
    </ul>
</li>
