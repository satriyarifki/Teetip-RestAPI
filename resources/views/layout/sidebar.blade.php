<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/dashboard') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui"  aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Basic UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/basic-ui/buttons') }}">Buttons</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/basic-ui/dropdowns') }}">Dropdowns</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Typography</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/owners') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Owners</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/customers') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Customers</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#main-sidebar"  aria-controls="main-sidebar">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Main</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="main-sidebar">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/warehouses') }}">Warehouse</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/detail-warehouse') }}">Detail Warehouse</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/transactions') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Transactions</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/charts/chartjs') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Charts</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/tables/basic-table') }}">
        <i class="menu-icon mdi mdi-table-large"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/icons/material') }}">
        <i class="menu-icon mdi mdi-emoticon"></i>
        <span class="menu-title">Icons</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#user-pages"  aria-controls="user-pages">
        <i class="menu-icon mdi mdi-lock-outline"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="user-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/user-pages/login') }}">Login</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/user-pages/register') }}">Register</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/user-pages/lock-screen') }}">Lock Screen</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://www.bootstrapdash.com/demo/star-laravel-free/documentation/documentation.html" target="_blank">
        <i class="menu-icon mdi mdi-file-outline"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
  </ul>
</nav>