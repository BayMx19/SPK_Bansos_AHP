<div class="sidebar">

    <div class="sidebar-wrapper">
        <div class="logo logo-sidebar">
            <img src="{{ asset('image\Logo_Kota_Kediri_-_Seal_of_Kediri_City.svg') }}" style="width: 25%; height:25px;"
                alt="Logo" />
            SPK Bantuan Sosial AHP
        </div>
        <ul class="nav">
            <li class="nav-item @if(request()->is('home')) active @endif"">
                <a class=" nav-link" href="{{'home'}}">
                <i class="nc-icon nc-chart-pie-35"></i>
                <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item @if(request()->is('master-users')) active @endif">
                <a class=" nav-link" href="{{'master-users'}}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Master Users</p>
                </a>
            </li>
            <li class="nav-item @if(request()->is('master-warga')) active @endif">
                <a class=" nav-link" href="{{'/master-warga'}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Master Warga</p>
                </a>
            </li>
            <li class="nav-item @if(request()->is('master-kriteria')) active @endif">
                <a class=" nav-link" href="{{'/master-kriteria'}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Master Kriteria</p>
                </a>
            </li>
            <li class="nav-item @if(request()->is('master-subkriteria')) active @endif">
                <a class=" nav-link" href="{{'/master-subkriteria'}}">
                    <i class="nc-icon nc-atom"></i>
                    <p>Master Sub Kriteria</p>
                </a>
            </li>
            <li class="nav-item @if(request()->is('perhitungan')) active @endif">
                <a class=" nav-link" href="{{'/perhitungan'}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Perhitungan AHP</p>
                </a>
            </li>
            <li class="nav-item @if(request()->is('hasil-rekomendasi')) active @endif">
                <a class=" nav-link" href="{{'/hasil-rekomendasi'}}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>Hasil Rekomendasi</p>
                </a>
            </li>
            <li class="nav-item active active-pro">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link active border-0 bg-transparent w-90 text-start">
                        <i class="nc-icon nc-button-power"></i>
                        <p class="text-center">Logout</p>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>