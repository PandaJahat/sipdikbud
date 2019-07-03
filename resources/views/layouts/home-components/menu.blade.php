<ul class="nav flex-column flex-lg-row" id="mainNav">
    <li class="dropdown dropdown-mega">
        <a class="dropdown-item {{ Request::is('home', 'home/search/*') ? 'active' : '' }}" href="{{ route('home') }}">
            Beranda
        </a>
    </li>
    <li class="dropdown dropdown-mega">
        <a class="dropdown-item {{ Request::is('home/about') ? 'active' : '' }}" href="{{ route('home.about') }}">
            Tentang SIPDIKBUD
        </a>
    </li>
    <li class="dropdown dropdown-mega">
        <a class="dropdown-item {{ Request::is('home/contact') ? 'active' : '' }}" href="{{ route('home.contact') }}">
            Hubungi Kami
        </a>
    </li>
</ul>