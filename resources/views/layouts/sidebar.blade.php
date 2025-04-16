@can('is-admin')
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
  <a class="sidebar-brand brand-logo" href="index.html">
    <h3 style="margin: 0; color: white;">SkillForge</h3>
  </a>
  <a class="sidebar-brand brand-logo-mini" href="index.html">
    <h4 style="margin: 0; color: white;">SF</h4>
  </a>
</div>

        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items" x-data="{ open: false }">
  <a href="#" @click.prevent="open = !open" class="nav-link">
    <span class="menu-icon">
      <i class="mdi mdi-laptop"></i>
    </span>
    <span class="menu-title">Pelatihan</span>
    <i class="menu-arrow"></i>
  </a>
  <div x-show="open" x-transition class="ml-10 mt-2 space-y-2">
    <a href="/pelatihan_populer" class="nav-link block text-sm text-gray-700 hover:text-indigo-600">Pelatihan Populer</a>
    <a href="/pelatihan_offline" class="nav-link block text-sm text-gray-700 hover:text-indigo-600">Pelatihan Offline</a>
    <a href="/pelatihan_online" class="nav-link block text-sm text-gray-700 hover:text-indigo-600">Pelatihan Online</a>
  </div>
</li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="/profile">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/pembayaran">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Pembayaran</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/sertifikat">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Sertifikat</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/kejuruan">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Kejuruan</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/pendapat_anggota">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Pendapat Anggota</span>
            </a>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="dokumentasi">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Dokumentasi</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="/guru_pelatihan">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Guru</span>
            </a>
          </li>


        </ul>
      </nav>
      @endcan
      @can('is-user')
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
  <a class="sidebar-brand brand-logo" href="index.html">
    <h3 style="margin: 0; color: white;">SkillForge</h3>
  </a>
  <a class="sidebar-brand brand-logo-mini" href="index.html">
    <h4 style="margin: 0; color: white;">SF</h4>
  </a>
</div>
        <ul class="nav">
        
        <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="profile">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/pendapat_anggota">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">History Pelatihan</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/pembayaran-history">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">History Pembayaran</span>
            </a>
          </li>
        </ul>
      </nav>
      @endcan