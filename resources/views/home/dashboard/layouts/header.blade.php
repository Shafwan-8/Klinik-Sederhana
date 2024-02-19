<!-- Header -->
<header class="main-header d-print-none" id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <!-- search form -->
        <div class="search-form d-none d-lg-inline-block">
            <div class="d-flex justify-content-center align-items-center absolute">
                {{ \Carbon\Carbon::now()->setTimezone('Asia/Makassar')->format('d F Y') }}
            </div>
            <script>
                function updateTime() {
                    let now = new Date();
                    let timeString = now.getHours().toString().padStart(2, '0') + ":" +
                        now.getMinutes().toString().padStart(2, '0') + ":" +
                        now.getSeconds().toString().padStart(2, '0');
                    document.getElementById('realtime-clock').textContent = timeString;
                }

                window.onload = function() {
                    setInterval(updateTime, 1000); // Update the time every second
                }
            </script>

            <div id="realtime-clock">
                {{ \Carbon\Carbon::now()->setTimezone('Asia/Makassar')->format('H:i:s') }}
            </div>

        </div>
        <div class="navbar-right ">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        @if (auth()->check() && auth()->user()->dokter->isNotEmpty())
                        @foreach (auth()->user()->dokter as $dokter)
                        @if ($dokter->foto)
                        <img src="{{ asset('storage/' . $dokter->foto) }}" class="user-image rounded-lg"
                            alt="User Image" />
                        @break

                        {{-- Hentikan iterasi setelah menemukan satu dokter dengan foto --}}
                        @endif
                        @endforeach
                        @else
                        <img src="{{ asset('img/default-profile.jpg') }}" class="user-image rounded-lg"
                            alt="User Image" />
                        @endif
                        <span class="d-none d-lg-inline-block">{{ auth()->user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <!-- User image -->
                        <li class="dropdown-header">
                            @if (auth()->check() && auth()->user()->dokter->isNotEmpty())
                            @foreach (auth()->user()->dokter as $dokter)
                            @if ($dokter->foto)
                            <img src="{{ asset('storage/' . $dokter->foto) }}" class="user-image rounded-lg"
                                alt="User Image" />
                            @break

                            {{-- Hentikan iterasi setelah menemukan satu dokter dengan foto --}}
                            @endif
                            @endforeach
                            @else
                            <img src="{{ asset('img/default-profile.jpg') }}" class="user-image rounded-lg"
                                alt="User Image" />
                            @endif
                            <div class="d-inline-block">
                                {{ auth()->user()->name }}
                                <small class="pt-1">Role: {{ auth()->user()->role }}</small>
                                <small class="pt-1">{{ auth()->user()->email }}</small>
                            </div>
                        </li>
                        @if (auth()->user()->role == 'dokter')
                        <li>
                            <a href="{{ route('profile.show', auth()->user()->dokter->first()->id) }}">
                                <i class="mdi mdi-account"></i> My Profile
                            </a>
                        </li>
                        @endif
                        <li class="dropdown-footer">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="nav-link d-flex align-items-center gap-2 w-100">

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