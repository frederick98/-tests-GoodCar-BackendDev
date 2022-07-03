<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : ''}}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('dataKecamatan.list') }}" class="nav-link {{ request()->is('data-kecamatan', 'data-kecamatan/edit') ? 'active' : ''}}">
        <i class="nav-icon fas fa-address-book"></i>
        <p>Data Kecamatan</p>
    </a>
</li>
