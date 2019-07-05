<!-- main sidebar -->
<aside id="sidebar_main">

    <div class="sidebar_main_header">
                
    </div>

    <div class="menu_section">
        <ul>
            <li title="Beranda">
                <a href="{{ route('home') }}">
                    <span class="menu_icon"><i class="material-icons">home</i></span>
                    <span class="menu_title">Beranda</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard') ? 'current_section' : '' }}" title="Dashboard">
                <a href="{{ route('dashboard') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>
            </li>
            <li title="Publikasi" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE24D;</i></span>
                    <span class="menu_title">Publikasi</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="{{ Request::is('collection/search') ? 'act_item' : '' }} {{ Request::is('collection/detail') && Laratrust::hasRole('public') ? 'act_item' : '' }}"><a href="{{ route('collection.search') }}">Pencarian Publikasi</a></li>
                    @if (Laratrust::hasRole(['admin', 'researcher']))
                    <li class="{{ Request::is('collection/create') ? 'act_item' : '' }}"><a href="{{ route('collection.create') }}">Upload Publikasi</a></li>
                    <li class="{{ Request::is('collection/list', 'collection/detail', 'collection/update') ? 'act_item' : '' }}"><a href="{{ route('collection.list') }}">Daftar Publikasi</a></li>
                    <li class="{{ Request::is('collection/mapping', 'collection/mapping/detail') ? 'act_item' : '' }}"><a href="{{ route('collection.mapping') }}">Moderasi Publikasi</a></li>
                    @endif
                </ul>
            </li>
            <li title="API" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE8C0;</i></span>
                    <span class="menu_title">Integrasi</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="{{ Request::is('integration/ojs') ? 'act_item' : '' }}"><a href="{{ route('integration.ojs') }}">Integrasi OJS</a></li>
                    <li class="{{ Request::is('integration/other', 'integration/app/*') ? 'act_item' : '' }}"><a href="{{ route('integration.other') }}">Integrasi Aplikasi Lain</a></li>
                    <li ><a href="javascript:;">Pengaturan Integrasi</a></li>
                </ul>
            </li>
            <li title="Referensi" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE241;</i></span>
                    <span class="menu_title">Referensi</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="menu_subtitle">Publikasi</li>
                    <li class="{{ Request::is('reference/category') ? 'act_item' : '' }}"><a href="{{ route('reference.category') }}">Kategori</a></li>
                    <li class="{{ Request::is('reference/language') ? 'act_item' : '' }}"><a href="{{ route('reference.language') }}">Bahasa</a></li>
                    <li class="{{ Request::is('reference/genre') ? 'act_item' : '' }}"><a href="{{ route('reference.genre') }}">Genre</a></li>
                    <li class="{{ Request::is('reference/topic') ? 'act_item' : '' }}"><a href="{{ route('reference.topic') }}">Topik</a></li>
                    <li class="{{ Request::is('reference/institution') ? 'act_item' : '' }}"><a href="{{ route('reference.institution') }}">Lembaga</a></li>
                    <li class="menu_subtitle">Kebermanfaatan</li>
                    <li class="{{ Request::is('reference/reason') ? 'act_item' : '' }}"><a href="{{ route('reference.reason') }}">Kategori</a></li>
                </ul>
            </li>
            <li title="Mitra" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">location_city</i></span>
                    <span class="menu_title">Mitra</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="{{ Request::is('partner/list') ? 'act_item' : '' }}"><a href="{{ route('partner.list') }}">Daftar Mitra</a></li>
                </ul>
            </li>
            <li title="Pengguna" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE87C;</i></span>
                    <span class="menu_title">Akun</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="{{ Request::is('user/create') ? 'act_item' : '' }}"><a href="{{ route('user.create') }}">Tambah Pengguna</a></li>
                    <li class="{{ Request::is('user/list', 'user/update') ? 'act_item' : '' }}"><a href="{{ route('user.list') }}">Daftar Pengguna</a></li>
                </ul>
            </li>
            <li title="Pengaturan Konten" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">settings_applications</i></span>
                    <span class="menu_title">Pengaturan Konten</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="{{ Request::is('home/setting/about') ? 'act_item' : '' }}"><a href="{{ route('home.setting.about') }}">Halaman Tentang</a></li>
                </ul>
            </li>
            <li title="Keluar">
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <span class="menu_icon"><i class="material-icons">close</i></span>
                    <span class="menu_title">Keluar</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- main sidebar end -->
