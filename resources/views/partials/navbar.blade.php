<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              @if (Auth::guard('anggota')->check())
                <a href="{{ route('anggota.dashboard') }}" class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
              @elseif (Auth::guard('petugas')->check()) 
                <a href="{{ route('petugas.dashboard') }}" class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>  
              @else 
              <li class="dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ __('Login') }}
                </a>

                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <li><a href="{{ route('anggota.login') }}" class="dropdown-item">Anggota</a></li> 
                    <li><hr class="dropdown-divider"></li>
                    <li><a href="{{ route('petugas.login') }}" class="dropdown-item">Petugas</a></li>  
                </ul>
              </li>
              @endif
            </li>                      
          </ul>
      </div>
  </div>
</nav>