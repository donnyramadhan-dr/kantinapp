<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion toggled" style="background-color: #defcff;" id="accordionSidebar">

@if(auth()->user()->role == 'kasir')
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboardkasir') }}">
  <div class="sidebar-brand-icon ">
    <img style="width: 50px;" src="{{ asset('img/icon_kasir.png') }}" >
  </div>
  <div class="sidebar-brand-text mx-3">Layson</div>
</a>
@else
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboardadmin') }}">
  <div class="sidebar-brand-icon ">
    <img style="width: 45px;" src="{{ asset('img/layson.jpg') }}" >
  </div>
  <div class="sidebar-brand-text mx-3">Layson</div>
</a>
@endif
<!-- Divider -->
<hr class="sidebar-divider my-0">

@if(auth()->user()->role == 'kasir')
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="{{ route('dashboardkasir') }}">
    <i class="fas fa-fw fa-tachometer-alt" style="color: black;"></i>
    <span style="color: black;">Dashboard</span></a>
</li>
@else
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="{{ route('dashboardadmin') }}">
    <i class="fas fa-fw fa-tachometer-alt" style="color: black;"></i>
    <span style="color: black;">Dashboard</span></a>
</li>
@endif

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading text-gray-500">
  Menu Action
</div>


@if(auth()->user()->role == "kasir")
<li class="nav-item">
  <a class="nav-link " href="{{ route('orderview') }}">
    <i class="fas fa-fs fa-clipboard" style="color: black;"></i>
    <span style="color: black;">Orders</span>
  </a> 
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
        <a class="nav-link" href="{{ route('invoiceview')}}">
            <i class="fas fa-fw fa-file-invoice" style="color: black;"></i>
            <span class="text-gray-900">History</span></a>
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
