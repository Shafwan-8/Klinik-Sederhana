<!-- Header -->
<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
      <!-- Sidebar toggle button -->
      <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <!-- search form -->
      <div class="search-form d-none d-lg-inline-block">
        {{date('Y-m-d', time())}}
      </div>

      <div class="navbar-right ">
        <ul class="nav navbar-nav">
          <!-- User Account -->
          <li class="dropdown user-menu">
            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              @if (auth()->check() && auth()->user()->dokter->isNotEmpty())
                  @foreach (auth()->user()->dokter as $dokter)
                    @if ($dokter->foto)
                        <img src="{{ asset('storage/' . $dokter->foto) }}" class="user-image rounded-lg" alt="User Image" />
                      @break {{-- Hentikan iterasi setelah menemukan satu dokter dengan foto --}}
                    @endif
                  @endforeach
                  @else
                      <img src="{{ asset('img/default-profile.jpg') }}" class="user-image rounded-lg" alt="User Image" />
                @endif
              <span class="d-none d-lg-inline-block">{{ auth()->user()->name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <!-- User image -->
              <li class="dropdown-header">
                @if (auth()->check() && auth()->user()->dokter->isNotEmpty())
                  @foreach (auth()->user()->dokter as $dokter)
                    @if ($dokter->foto)
                        <img src="{{ asset('storage/' . $dokter->foto) }}" class="user-image rounded-lg" alt="User Image" />
                      @break {{-- Hentikan iterasi setelah menemukan satu dokter dengan foto --}}
                    @endif
                  @endforeach
                  @else
                      <img src="{{ asset('img/default-profile.jpg') }}" class="user-image rounded-lg" alt="User Image" />
                @endif
                <div class="d-inline-block">
                  {{ auth()->user()->name }}
                  <small class="pt-1">Role: {{ auth()->user()->role }}</small>
                  <small class="pt-1">{{ auth()->user()->email }}</small>
                </div>
              </li>
              <li class="dropdown-footer">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link d-flex align-items-center gap-2">
                      
                      <i class="mdi mdi-logout"></i>
                      
                      Logout
                    </button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

