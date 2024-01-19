<ul class="navbar-nav bg-info-emphasis sidebar sidebar-dark accordion" id="accordionSidebar">
    <div id="header" >
        <div id="logo"><img class="rounded-circle" src="img/logo.png" alt=""></div>
        <div class="sidebar-brand-text mx-3">Gestion du Stock</div>
    </div>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<hr class="sidebar-divider my-0">
<li class="nav-item {{ request()->routeIs('categories.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('categories.index')}}">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <span>Catégories</span></a>
</li><hr class="sidebar-divider my-0">
<li class="nav-item {{ request()->routeIs('sous_categories.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('sous_categories.index')}}">
        <i class="fa fa-clone" aria-hidden="true"></i>
        <span>Sous-Catégories</span></a>
</li><hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fa fa-tasks" aria-hidden="true"></i>
        <span>Produit</span></a>
</li><hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fa fa-archive" aria-hidden="true"></i>
        <span>Stock</span></a>
</li><hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fa fa-hand-holding-usd" aria-hidden="true"></i>
        <span>Achat</span></a>
</li><hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fa fa-male" aria-hidden="true"></i>
        <span>Fournisseur</span></a>
</li><hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fa fa-truck" aria-hidden="true"></i>
        <span>Décharge</span></a>
</li><hr class="sidebar-divider my-0">
<li class="nav-item {{ request()->routeIs('tribunal.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('tribunal.index')}}">
        <i class="fa fa-balance-scale" aria-hidden="true"></i>
        <span>Tribunal</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>

