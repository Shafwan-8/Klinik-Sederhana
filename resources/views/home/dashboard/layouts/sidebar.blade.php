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
                  <li class="has-sub active expand">
                    <a class="sidenav-item-link" href="" data-toggle="collapse" data-target="#dashboard"
                      aria-expanded="false" aria-controls="dashboard">
                      <i class="mdi mdi-view-dashboard-outline"></i>
                      <span class="nav-text">Dashboard</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li class="active">
                          <a class="sidenav-item-link" href="/pengguna">
                            <span class="nav-text">Pengguna</span>
                          </a>
                        </li>
                        <li class="">
                          <a class="sidenav-item-link" href="/dokter">
                            <span class="nav-text">Dokter</span>
                          </a>
                        </li>
                      </div>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </aside>