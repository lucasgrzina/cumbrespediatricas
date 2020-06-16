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
@if (\App\Helpers\AdminHelper::mostrarMenu(['categorias']))
<li class="{{ Request::is('admin/categorias*') ? 'active' : '' }}">
  <a href="{!! route('categorias.index') !!}"><i class="fa fa-ellipsis-v"></i><span>Categorias</span></a>
</li>
@endif
<li class="{{ Request::is('secciones*') ? 'active' : '' }}">
    <a href="{!! route('secciones.index') !!}"><i class="fa fa-ellipsis-v"></i><span>Secciones</span></a>
</li>

<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('productos.index') !!}"><i class="fa fa-ellipsis-v"></i><span>Productos</span></a>
</li>

