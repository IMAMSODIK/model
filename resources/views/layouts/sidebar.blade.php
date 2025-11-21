<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div class="logo-wrapper">
        <a href="/dashboard">
            <img class="img-fluid" style="width: 85px; margin-top: -20px"
                src="{{ asset('own_assets/images/logo-text.png') }}" alt="">
        </a>
        <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
        <div class="toggle-sidebar">
            <i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
        </div>
    </div>

    <div class="logo-icon-wrapper">
        <a href="/dashboard">
            <img class="img-fluid" src="{{ asset('dashboard_assets/assets/images/logo/logo-icon.png') }}"
                alt="">
        </a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="/dashboard"><img class="img-fluid"
                            src="{{ asset('dashboard_assets/assets/images/logo/logo-icon.png') }}" alt=""></a>
                    <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2"
                            aria-hidden="true"></i></div>
                </li>
                <li class="pin-title sidebar-main-title">
                    <div>
                        <h6>Pinned</h6>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6 class="lan-1">General</h6>
                    </div>
                </li>

                @if (auth()->user()->role == 'admin')
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="/designer-group">
                            <i class="fa fa-users text-white"></i>
                            <span>Designer Group</span>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'owner')
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="/dashboard">
                            <i class="fa fa-cog text-white"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li>


                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="/vanue">
                            <i class="fa fa-building text-white"></i>
                            <span>Vanue</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="/ticket">
                            <i class="fa fa-clipboard-list text-white"></i>
                            <span>Ticket</span>
                        </a>
                    </li>
                @endif
            </ul>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</div>
