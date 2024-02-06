        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
              <!-- Aplication Brand -->
              <div class="app-brand">
                <a href="/dashboard" title="Klinik Dashboard">
                  <img src="{{ asset('img/trika.png') }}" alt="Trika Media Solusindo" height="35" width="37" class="rounded-circle brand-icon" viewBox="0 0 50 50">
                  <span class="brand-name text-truncate">Trika Klinik</span>
                </a>
              </div>
  
              <!-- begin sidebar scrollbar -->
              <div class="" data-simplebar style="height: 100%;">
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">
                  <li class="has-sub active expand {{ ($active === "dashboard") ? "active" : "" }}">
                    <a class="sidenav-item-link" href="/dashboard" data-toggle="collapse" data-target="#dashboard"
                      aria-expanded="false" aria-controls="dashboard">
                      <i class="mdi mdi-view-dashboard-outline"></i>
                      <span class="nav-text">Dashboard</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li class="{{ ($active === "pengguna") ? "active" : "" }}">
                          <a class="sidenav-item-link" href="{{ route('pengguna.index') }}">
                            <i class="mdi mdi-account-multiple"></i>
                            <span class="nav-text mx-2">Pengguna</span>
                          </a>
                        </li>
                        <li class="{{ ($active === "dokter") ? "active" : "" }}">
                          <a class="sidenav-item-link" href="{{ route('dokter.index') }}">
                            <i class="mdi mdi-doctor"></i>
                            <span class="nav-text mx-2">Dokter</span>
                          </a>
                        </li>
                      </div>
                    </ul>
                  </li>
                  <li class="{{ ($active === "patient") ? "active" : "" }}">
                    <a class="sidenav-item-link" href="{{ route('patient.index') }}">
                      <i class="mdi mdi-human-handsdown"></i>
                      <span class="nav-text mx-2">Pasien</span>
                    </a>
                  </li>
                  <li class="{{ ($active === "pemeriksaan") ? "active" : "" }}">
                    <a class="sidenav-item-link" href="{{ route('pemeriksaan.index') }}">
                      <i class="mdi mdi-clipboard-text-outline"></i>
                      <span class="nav-text mx-2">Pemeriksaan</span>
                    </a>
                  </li>
                  <li class="has-sub active expand {{ ($active === "laporan") ? "active" : "" }}">
                    <a class="sidenav-item-link" href="" data-toggle="collapse" data-target="#dashboard"
                    aria-expanded="false" aria-controls="dashboard>
                      <i class="mdi mdi-printer"></i>
                      <span class="nav-text">Laporan</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li class="{{ ($active === "diagnosa") ? "active" : "" }}">
                          <a class="sidenav-item-link" href="{{ route('report.diagnosis') }}">
                            <i class="mdi mdi-printer"></i>
                            <span class="nav-text mx-2">Diagnosa</span>
                          </a>
                        </li>
                        <li class="{{ ($active === "layanan") ? "active" : "" }}">
                            <a class="sidenav-item-link" href="{{ route('report.service') }}">
                            <i class="mdi mdi-doctor"></i>
                            <span class="nav-text mx-2">Layanan</span>
                          </a>
                        </li>
                        <li class="{{ ($active === "transaksi") ? "active" : "" }}">
                          <a class="sidenav-item-link" href="{{ route('report.transaction') }}">
                          <i class="mdi mdi-doctor"></i>
                          <span class="nav-text mx-2">Jumlah Transaksi</span>
                        </a>
                      </li>
                      </div>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </aside>