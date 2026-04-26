<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
          <div class="pull-left image">
              @if(Auth::user()->user_type == 1)
                  <i class="fa fa-user-secret fa-3x text-warning"></i> {{-- Admin --}}
              @elseif(Auth::user()->user_type == 2)
                  <i class="fa fa-graduation-cap fa-3x text-info"></i> {{-- Siswa --}}
              @elseif(Auth::user()->user_type == 3)
                  <i class="fa fa-chalkboard-teacher fa-3x text-primary"></i> {{-- Pembina --}}
              @elseif(Auth::user()->user_type == 4)
                  <i class="fa fa-user-tie fa-3x text-success"></i> {{-- Kepala Sekolah --}}
              @else
                  <i class="fa fa-user fa-3x text-muted"></i> {{-- Default --}}
              @endif
          </div>
          <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        @if(Auth::user()->user_type == 1)
          <li class="header">Menu</li>
          <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
            <a href="{{ url('admin/dashboard') }}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'user' ? 'active' : '' }}">
            <a href="{{ url('admin/user/index') }}">
              <i class="fa fa-user"></i> <span>User</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'pembina' ? 'active' : '' }}">
            <a href="{{ url('admin/pembina/index') }}">
              <i class="fa fa-user"></i> <span>Data Pembina</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'ekskul' ? 'active' : '' }}">
            <a href="{{ url('admin/ekskul/index') }}">
              <i class="fa fa-bank"></i> <span>Data Ekskul</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'siswa' ? 'active' : '' }}">
            <a href="{{ url('admin/siswa/index') }}">
              <i class="fa fa-folder"></i> <span>Data Siswa</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'daftar' ? 'active' : '' }}">
            <a href="{{ url('admin/pendaftaran/index') }}">
              <i class="fa fa-folder"></i> <span>Pendafataran</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'jadwal' ? 'active' : '' }}">
            <a href="{{ url('admin/jadwal/index') }}">
              <i class="fa fa-folder-open"></i> <span>Data Penjadwalan</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'absen_siswa' ? 'active' : '' }}">
            <a href="{{ url('admin/absen_siswa/index') }}">
              <i class="fa fa-archive"></i> <span>Absensi Siswa</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'absen_pembina' ? 'active' : '' }}">
            <a href="{{ url('admin/absen_pembina/index') }}">
              <i class="fa fa-book"></i> <span>Absensi Pembina</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'nilai' ? 'active' : '' }}">
            <a href="{{ url('admin/nilai_siswa/index') }}">
              <i class="fa fa-book"></i> <span>Nilai Siswa</span>
            </a>
          </li>
          <li class="header">Logout</li>
          <li><a href="{{ url('logout') }}"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
        @endif
        @if(Auth::user()->user_type == 2)
          <li class="header">Menu</li>
          <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
            <a href="{{ url('siswa/dashboard') }}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'pendaftaran' ? 'active' : '' }}">
            <a href="{{ url('siswa/pendaftaran/index') }}">
              <i class="fa fa-folder"></i> <span>Pendafataran</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'siswa' ? 'active' : '' }}">
            <a href="{{ url('siswa/siswa/index') }}">
              <i class="fa fa-folder"></i> <span>Data Siswa</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'jadwal' ? 'active' : '' }}">
            <a href="{{ url('siswa/jadwal/index') }}">
              <i class="fa fa-folder-open"></i> <span>Jadwal Ekstrakurikuler</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'absen_siswa' ? 'active' : '' }}">
            <a href="{{ url('siswa/absen_siswa/index') }}">
              <i class="fa fa-archive"></i> <span>Absensi</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'nilai_siswa' ? 'active' : '' }}">
            <a href="{{ url('siswa/nilai_siswa/index') }}">
              <i class="fa fa-book"></i> <span>Nilai Ektrakurikuler</span>
            </a>
          </li>
          <li class="header">Logout</li>
          <li><a href="{{ url('logout') }}"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
        @endif
        @if(Auth::user()->user_type == 3)
          <li class="header">Menu</li>
          <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
            <a href="{{ url('pembina/dashboard') }}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'absen_siswa' ? 'active' : '' }}">
            <a href="{{ url('pembina/absen_siswa/index') }}">
              <i class="fa fa-archive"></i> <span>Absensi Siswa</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'absen_pembina' ? 'active' : '' }}">
            <a href="{{ url('pembina/absen_pembina/index') }}">
              <i class="fa fa-book"></i> <span>Absensi Pembina</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'jadwal' ? 'active' : '' }}">
            <a href="{{ url('pembina/jadwal/index') }}">
              <i class="fa fa-folder-open"></i> <span>Penjadwalan</span>
            </a>
          </li>
          
          <li class="{{ Request::segment(2) == 'nilai' ? 'active' : '' }}">
            <a href="{{ url('pembina/nilai_siswa/index') }}">
              <i class="fa fa-book"></i> <span>Nilai</span>
            </a>
          </li>
          <li class="header">Logout</li>
          <li><a href="{{ url('logout') }}"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
        @endif
        {{-- @if(Auth::user()->user_type == 4)
          <li class="header">Menu</li>
          <li>
            <a href="{{ url('kasekolah/dashboard') }}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }} treeview" class="active treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::segment(2) == 'laporan_siswa' ? 'active' : '' }}"><a href="index.html"><i class="fa fa-circle-o"></i>Data Pendaftaran</a></li>
            <li class="{{ Request::segment(2) == 'laporan_pembina' ? 'active' : '' }}"><a href="index2.html"><i class="fa fa-circle-o"></i>Data Siswa</a></li>
            <li class="{{ Request::segment(2) == 'laporan_pembina' ? 'active' : '' }}"><a href="index2.html"><i class="fa fa-circle-o"></i>Data Ekskul</a></li>
            <li class="{{ Request::segment(2) == 'laporan_pembina' ? 'active' : '' }}"><a href="index2.html"><i class="fa fa-circle-o"></i>Data Pembina</a></li>
            <li class="{{ Request::segment(2) == 'laporan_pembina' ? 'active' : '' }}"><a href="index2.html"><i class="fa fa-circle-o"></i>Data Absensi Pembina</a></li>
            <li class="{{ Request::segment(2) == 'laporan_pembina' ? 'active' : '' }}"><a href="index2.html"><i class="fa fa-circle-o"></i>Data Absensi Siswa</a></li>
            <li class="{{ Request::segment(2) == 'laporan_pembina' ? 'active' : '' }}"><a href="index2.html"><i class="fa fa-circle-o"></i>Data Nilai Siswa</a></li>
            <li class="{{ Request::segment(2) == 'laporan_pembina' ? 'active' : '' }}"><a href="index2.html"><i class="fa fa-circle-o"></i>Data Pembina</a></li>
            
          </ul>
        </li>
          
          <li class="header">Logout</li>
          <li><a href="{{ url('logout') }}"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
        @endif --}}
        @if(Auth::user()->user_type == 4)
          <li class="header">Menu</li>

          {{-- Dashboard --}}
          <li class="{{ Request::is('kasekolah/dashboard') ? 'active' : '' }}">
            <a href="{{ url('kasekolah/dashboard') }}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          {{-- Laporan --}}
          @php
            $laporanActive = Request::is('kasekolah/pendaftaran/index*') ||
                             Request::is('kasekolah/siswa/index*') ||
                             Request::is('kasekolah/pembina/index*') ||
                             Request::is('kasekolah/ekskul/index*') ||
                             Request::is('kasekolah/absen_pembina/index*') ||
                             Request::is('kasekolah/absen_siswa/index*') ||
                             Request::is('kasekolah/nilai_siswa/index*');
          @endphp

          <li class="treeview {{ $laporanActive ? 'active menu-open' : '' }}">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('kasekolah/pendaftaran/index') ? 'active' : '' }}">
                <a href="{{ url('kasekolah/pendaftaran/index') }}"><i class="fa fa-circle-o"></i> Data Pendaftaran</a>
              </li>
              <li class="{{ Request::is('kasekolah/siswa/index') ? 'active' : '' }}">
                <a href="{{ url('kasekolah/siswa/index') }}"><i class="fa fa-circle-o"></i> Data Siswa</a>
              </li>
              <li class="{{ Request::is('kasekolah/ekskul/index') ? 'active' : '' }}">
                <a href="{{ url('kasekolah/ekskul/index') }}"><i class="fa fa-circle-o"></i> Data Ekskul</a>
              </li>
              <li class="{{ Request::is('kasekolah/pembina/index') ? 'active' : '' }}">
                <a href="{{ url('kasekolah/pembina/index') }}"><i class="fa fa-circle-o"></i> Data Pembina</a>
              </li>
              <li class="{{ Request::is('kasekolah/absen_pembina/index') ? 'active' : '' }}">
                <a href="{{ url('kasekolah/absen_pembina/index') }}"><i class="fa fa-circle-o"></i> Absensi Pembina</a>
              </li>
              <li class="{{ Request::is('kasekolah/absen_siswa/index') ? 'active' : '' }}">
                <a href="{{ url('kasekolah/absen_siswa/index') }}"><i class="fa fa-circle-o"></i> Absensi Siswa</a>
              </li>
              <li class="{{ Request::is('kasekolah/nilai_siswa/index') ? 'active' : '' }}">
                <a href="{{ url('kasekolah/nilai_siswa/index') }}"><i class="fa fa-circle-o"></i> Nilai Siswa</a>
              </li>
            </ul>
          </li>

          <li class="header">Logout</li>
          <li><a href="{{ url('logout') }}"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
        @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>