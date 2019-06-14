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
            <li title="Penelitian" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE24D;</i></span>
                    <span class="menu_title">Penelitian</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="{{ Request::is('collection/create') ? 'act_item' : '' }}"><a href="{{ route('collection.create') }}">Upload Penelitian</a></li>
                    <li class="{{ Request::is('collection/list') ? 'act_item' : '' }}"><a href="{{ route('collection.list') }}">Daftar Penelitian</a></li>
                    <li ><a href="javascript:;">Moderasi Penelitian</a></li>
                </ul>
            </li>
            <li title="Referensi" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE241;</i></span>
                    <span class="menu_title">Referensi</span>
                </a>
                <ul class="" style="display: none;">
                    <li class="{{ Request::is('reference/category') ? 'act_item' : '' }}"><a href="{{ route('reference.category') }}">Kategori Penelitian</a></li>
                    <li class="{{ Request::is('reference/language') ? 'act_item' : '' }}"><a href="{{ route('reference.language') }}">Bahasa Penelitian</a></li>
                    <li ><a href="javascript:;">Lembaga/Bidang</a></li>
                    <li class="{{ Request::is('reference/reason') ? 'act_item' : '' }}"><a href="{{ route('reference.reason') }}">Tujuan Mengunduh</a></li>
                </ul>
            </li>
            <li title="API" class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE8C0;</i></span>
                    <span class="menu_title">Integrasi</span>
                </a>
                <ul class="" style="display: none;">
                    <li ><a href="javascript:;">Buat Integrasi</a></li>
                    <li ><a href="javascript:;">Pengaturan Integrasi</a></li>
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
        </ul>
    </div>
</aside>
<!-- main sidebar end -->
