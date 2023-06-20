@php
    $menus = config('menulist');
@endphp
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        @yield('menu_active')
        @php
        @endphp
        @foreach($menus as $menu)
            <li class="nav-item  @if($menu_parent == $menu['value']) menu-open @endif">
                <a href="#" class="nav-link @if($menu_parent == $menu['value']) active @endif">
                    <i class="nav-icon @if($menu['icon']) {{$menu['icon']}} @endif"></i>
                    <p>
                        {{$menu['name']}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if($menu['children'])
                        @foreach($menu['children'] as $child)
                            <li class="nav-item">
                                <a href="{{route($child['route'])}}"
                                   class="nav-link @if($menu_child == $child['value'] && $menu_parent == $menu['value']) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{$child['name']}}</p>
                                </a>
                            </li>
                        @endforeach

                    @endif
                </ul>
            </li>
        @endforeach
    </ul>
</nav>
<!-- /.sidebar-menu -->
