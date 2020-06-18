<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->

        
        <a href="#" class="sidebar-logo">
            <img src="{{asset('admin/img/logo.png')}}"/>
        </a>
        @if(Auth::check())
        <div class="media sidebar-user">
            <div class="media-left">
              <a href="#">
                <img src="{!! asset('admin/img/user.png') !!}" style="max-width: 50px;" class="media-object"/>
              </a>
            </div>
            <div class="media-body">
                <h5 class="media-heading">{!! Auth::user()->nombre_completo !!}</h5>
                <div class="text-left">
                    <a href="{!! route('admin.logout') !!}" class="btn-logout">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Salir
                    </a>
                </div>
            </div>
        </div>
        @endif
        <ul class="sidebar-menu">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>