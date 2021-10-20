<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Perpustakaan</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <li class="nav-item px-3">
        @if (Auth::guard('petugas')->check())
          <a href="{{ route('petugas.logout') }}" class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Sign Out</a>
        @else
          <a href="{{ route('anggota.logout') }}" class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Sign Out</a>  
        @endif
      </li>    
    </div>
  </div>
</header>