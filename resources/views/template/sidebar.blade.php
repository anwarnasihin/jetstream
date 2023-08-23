 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Home</div>
    </a>

    <?php

    $menu = \DB::table('refmenu')->join('refmenuakses','refmenuakses.menu_id', '=', 'refmenu.id')->where('role_id',\Auth::user()->role_id)->get();

    ?>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @foreach ($menu as $datmenu)

    <?php
        $submenu = \DB::table('refmenu_sub')->where('menu_id',$datmenu->id)->get();
        $jumlah_submenu = count($submenu);
    ?>
    @if ($jumlah_submenu == 0)
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{$datmenu->routing}}">
                <i class="{{$datmenu->icon}}"></i>
                <span>{{$datmenu->menu}}</span></a>
        </li> 
    @else
    
    <li class="nav-item">
        <a 
            class="nav-link collapsed" 
            href="#" 
            data-toggle="collapse" 
            data-target="#collapse{{ $datmenu->id }}"
            aria-expanded="true" 
            aria-controls="collapse{{ $datmenu->id }}">
            <i class="{{$datmenu->icon}}"></i>
            <span>{{$datmenu->menu}}</span>
        </a>
        <div 
            id="collapse{{$datmenu->id}}" 
            class="collapse" 
            aria-labelledby="heading{{ $datmenu->id }}" 
            data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">
            @foreach ($submenu as $datsubmenu)
                <a class="collapse-item" href="buttons.html">{{ $datsubmenu->menu_sub }}</a>
            @endforeach
            </div>
        </div>
    </li>
    @endif
    <hr class="sidebar-divider">
    @endforeach


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->