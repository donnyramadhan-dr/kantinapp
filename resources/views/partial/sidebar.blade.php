<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion toggled" style="background-color: #14e3dc;" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboardadmin') }}">
  <div class="sidebar-brand-icon rotate-n-15">
    <img src="{{ asset('img/') }}" >
  </div>
  <div class="sidebar-brand-text mx-3">Layson</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="{{ route('dashboardadmin') }}">
    <i class="fas fa-fw fa-tachometer-alt" style="color: black;"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Menu Action
</div>


@if(auth()->user()->role == "kasir")
<li class="nav-item">
  <a class="nav-link " href="{{ route('orderview') }}">
    <i class="fas fa-fw fa-clipboard" style="color: black;"></i>
    <span>Orders</span>
  </a> 
</li>
@else

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book-open" style="color: black;"></i>
            <span class="text-gray-900">Menu</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header text-gray-700">List Menu :</h6>
                <a class="collapse-item" href="{{ route('menuview')}}"><i class="fas fa-fw fa-eye mr-2" style="color: blue;"></i> View Menu</a>
                <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-th-large mr-2" style="color: brown;"></i> Menu Catalogue</a>
            </div>
        </div>
    </li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  User Action
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">List User :</h6>
      <a class="collapse-item" href="{{ route('userview') }}"><i class="fas fa-fw fa-eye mr-2" style="color: navy;"></i> View User</a>
      <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-cog mr-2" style="color: saddlebrown;"></i> User Overview</a>
    </div>
  </div>
</li>
@endif

</ul>
<!-- End of Sidebar -->
