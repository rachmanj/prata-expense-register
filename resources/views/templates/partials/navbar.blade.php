<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
  <div class="container">
    <a href="{{ route('home') }}"class="navbar-brand">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text text-white font-weight-light">Pratasaba</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        @if (auth()->user()->role === 'ADMIN')
        <li class="nav-item">
          <a href="{{ route('aset.index') }}" class="nav-link">Asset</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('transaksi.index') }}" class="nav-link">Transaksi</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('kategori.index') }}" class="nav-link">Kategori</a>
        </li>
        @endif
        @if (auth()->user()->role === 'FUELMAN' || auth()->user()->role === 'ADMIN')
        <li class="nav-item">
          <a href="{{ route('fuels.index') }}" class="nav-link">Fuel</a>
        </li>
        @endif
        @if (auth()->user()->role === 'ADMIN')
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Admin</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{ route('user.activate_index') }}" class="dropdown-item">Activate User </a></li>
            <li><a href="{{ route('users.index') }}" class="dropdown-item">User List</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item">
        <a href="#" class="nav-link">Omanof Sullivan</a>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="nav-link text-dark">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        </form>
      </li>
    </ul>
  </div>
</nav>
<!-- /.navbar -->