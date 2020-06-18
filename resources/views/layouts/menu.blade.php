@if (\App\Helpers\AdminHelper::mostrarMenu(['usuarios','roles-y-permisos']))    
<li class=" treeview menu-open {{ Request::is('users*') || Request::is('roles*') ? 'active' : '' }}">
  <a href="#">
    <i class="fa fa-users"></i> <span>Administración</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu" style="">
    @if (\App\Helpers\AdminHelper::mostrarMenu('usuarios'))    
    <li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
      <a href="{!! route('usuarios.index') !!}"><i class="fa fa-user"></i><span>Usuarios - Staff</span></a>
    </li>
    @endif
    @if (\App\Helpers\AdminHelper::mostrarMenu('roles-y-permisos'))
    <li class="{{ Request::is('roles*') ? 'active' : '' }}">
      <a href="{!! route('roles.index') !!}"><i class="fa fa-user"></i><span>Roles</span></a>
    </li>
    @endif
  </ul>
</li>
@endif
@if (\App\Helpers\AdminHelper::mostrarMenu(['registrados']))    

<li class="{{ Request::is('registrados*') ? 'active' : '' }}">
    <a href="{!! route('registrados.index') !!}"><i class="fa fa-edit"></i><span>Registrados</span></a>
</li>
@endif
