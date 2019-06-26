<!-- main sidebar -->
<aside id="sidebar_main">

    <div class="sidebar_main_header">
                
    </div>

    <div class="menu_section">
        <ul>
            <li class="{{ Request::is('dashboard') ? 'current_section' : '' }}" title="Dashboard">
                <a href="{{ route('dashboard') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>
                
            </li>
            <li title="Koleksi" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE24D;</i></span>
                    <span class="menu_title">Koleksi</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="{{ Request::is('collection/create') ? 'act_item' : '' }}"><a href="{{ route('collection.create') }}">Upload Koleksi</a></li>
                    <li class="{{ Request::is('collection/list', 'collection/detail', 'collection/update') ? 'act_item' : '' }}"><a href="{{ route('collection.list') }}">Daftar Koleksi</a></li>
                    <li class="{{ Request::is('collection/mapping', 'collection/mapping/detail') ? 'act_item' : '' }}"><a href="{{ route('collection.mapping') }}">Moderasi Koleksi</a></li>
                </ul>
            </li>
            @if (Laratrust::hasRole('admin'))
            <li title="API" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE8C0;</i></span>
                    <span class="menu_title">Integrasi</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="{{ Request::is('integration/ojs') ? 'act_item' : '' }}"><a href="{{ route('integration.ojs') }}">Integrasi OJS</a></li>
                    <li class="{{ Request::is('integration/other') ? 'act_item' : '' }}"><a href="{{ route('integration.other') }}">Integrasi Aplikasi Lain</a></li>
                    <li ><a href="javascript:;">Pengaturan Integrasi</a></li>
                </ul>
            </li>
            <li title="Referensi" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE241;</i></span>
                    <span class="menu_title">Referensi</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="menu_subtitle">Koleksi</li>
                    <li class=""><a href="javascript:;">Penerbit</a></li>
                    <li class="{{ Request::is('reference/category') ? 'act_item' : '' }}"><a href="{{ route('reference.category') }}">Kategori</a></li>
                    <li class="{{ Request::is('reference/language') ? 'act_item' : '' }}"><a href="{{ route('reference.language') }}">Bahasa</a></li>
                    <li class=""><a href="javascript:;">Genre</a></li>
                    <li class=""><a href="javascript:;">Topik</a></li>
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
            @endif
        </ul>
    </div>
</aside>
<!-- main sidebar end -->
