<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme hidden-print">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            {{-- <span class="app-brand-logo demo">
               <img src="{{ asset('assets/img/img-1.jpeg') }}" alt="">
            </span> --}}
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin Panel</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('booths') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Booths <br> (बूथ)</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('members') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">All Members <br> (सभी सदस्य)</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('assembly') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-checkbox-square"></i>
                <div data-i18n="Boxicons">Add Assembly <br> (विधानसभा जोड़ें)</div>
            </a>
        </li>
        {{-- <li class="menu-item">
            <a href="{{ route('member.create') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-checkbox-square"></i>
                <div data-i18n="Boxicons">Add Mmebers <br> (सदस्य जोड़ें)</div>
            </a>
        </li> --}}
    </ul>
</aside>
