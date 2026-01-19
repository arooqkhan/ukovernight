<style>
    .sidebar-wrapper {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        overflow-y: auto;
        overflow-x: visible;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        border-radius: 0;
        width: 276px;
        transition: width 0.3s ease;
    }

    /* Collapsed sidebar state */
    .sidebar-wrapper.collapsed {
        width: 100px;
    }

    /* Toggle button - Highly Visible */
    .sidebar-toggle {
        position: absolute;
        top: 20px;
        right: -12px;
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        display: flex !important;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 1001;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }


    .sidebar-toggle:hover {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        transform: scale(1.15);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.4), 0 0 0 3px rgba(255, 255, 255, 0.7);
    }

    .sidebar-toggle:active {
        transform: scale(1.05);
    }

    .sidebar-toggle svg {
        width: 18px;
        height: 18px;
        color: #ffffff !important;
        stroke: #ffffff !important;
        stroke-width: 3;
        fill: none;
        transition: transform 0.3s ease;
    }
    
    .sidebar-toggle svg path,
    .sidebar-toggle svg polyline,
    .sidebar-toggle svg line {
        stroke: #ffffff !important;
        color: #ffffff !important;
    }

    .sidebar-wrapper.collapsed .sidebar-toggle svg {
        transform: rotate(180deg);
    }

    .sidebar-wrapper::-webkit-scrollbar {
        width: 5px;
    }

    .sidebar-wrapper::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }

    .sidebar-wrapper::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 10px;
    }

    .nav-logo {
        padding: 8px 7px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav-logo h4 {
        color: white;
        font-weight: 700;
        margin: 0;
        font-size: 1.5rem;
    }

    .user-info::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    }


    .profile-content {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .profile-content h6 {
        margin: 0 0 8px 0;
        font-weight: 700;
        font-size: 1rem;
        color: white;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        letter-spacing: 0.3px;
        line-height: 1.3;
        word-break: break-word;
    }

    /* Animation for profile section */
    @keyframes profileGlow {
        0% {
            box-shadow: 0 0 0 0 rgba(74, 144, 226, 0.4);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(74, 144, 226, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(74, 144, 226, 0);
        }
    }

    .user-info {
        animation: profileGlow 2s infinite;
    }

    .menu-categories {
        padding: 15px 0;
    }

    .menu {
        margin-bottom: 5px;
    }

    .menu a {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        color: white !important;
        transition: all 0.3s ease;
        text-decoration: none;
        border-left: 3px solid transparent;
    }

    .menu a:hover,
    .menu a:focus,
    .menu a.active {
        background: rgba(255, 255, 255, 0.15);
        color: white !important;
        border-left: 3px solid #4CAF50;
        text-decoration: none;
    }

    .menu a div {
        display: flex;
        align-items: center;
    }

    .menu svg {
        width: 20px;
        height: 20px;
        margin-right: 15px;
        color: white !important;
        opacity: 0.9;
        display: block;
        flex-shrink: 0;
    }
    
    .menu i {
        width: 20px;
        height: 20px;
        margin-right: 15px;
        color: white !important;
        opacity: 0.9;
        display: block;
        flex-shrink: 0;
        font-size: 20px;
        text-align: center;
    }

    .menu a:hover svg,
    .menu a:focus svg,
    .menu a.active svg,
    .menu a:hover i,
    .menu a:focus i,
    .menu a.active i {
        opacity: 1;
        color: white !important;
    }

    .menu span {
        font-weight: 400;
        font-size: 0.95rem;
        color: white !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sidebar-wrapper {
            width: 70px !important;
        }

        .nav-logo h4,
        .profile-content,
        .menu span {
            display: none;
        }

        .profile-img {
            margin-right: 0;
        }

        .menu a {
            justify-content: center;
            padding: 15px;
        }

        .menu svg {
            margin-right: 0;
        }
    }

    .profile-info {
        padding: 12px 12px;
        border-bottom: none;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
        margin: 8px 8px 12px 8px;
        border-radius: 20px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2), 0 0 0 1px rgba(255, 255, 255, 0.1);
        position: relative;
        overflow: hidden;
    }
    
    .profile-name {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
    }
    
    .profile-name h6 {
        margin: 0 0 4px 0;
        font-weight: 600;
        font-size: 0.9rem;
        color: white;
        text-shadow: none;
        letter-spacing: 0.1px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.3;
    }

    .user-info {
        display: flex;
        align-items: flex-start;
        padding: 0;
        margin-bottom: 0;
        gap: 10px;
        background: transparent !important;
    }

    .profile-img {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.4);
        flex-shrink: 0;
        margin-right: 10px;
        background: transparent;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        padding: 0 !important;
        margin: 0;
        box-sizing: border-box;
    }

    .profile-img:hover {
        border-color: rgba(255, 255, 255, 0.5);
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
    }

    .profile-img img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        object-position: center center !important;
        border-radius: 12px !important;
        display: block !important;
        transition: transform 0.3s ease;
        padding: 0 !important;
        margin: 0 !important;
        border: none !important;
        box-sizing: border-box !important;
    }

    .profile-img:hover img {
        transform: scale(1.1);
    }

    /* Fallback for broken images */
    .profile-img img[src=""],
    .profile-img img:not([src]),
    .profile-img img[onerror] {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
       
    }

    .profile-designation {
        margin-top: 0;
        text-align: left;
        width: auto;
        display: inline-block;
    }

    .profile-designation p {
        margin: 0;
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.85);
        font-weight: 500;
        background: transparent;
        padding: 0;
        border-radius: 0;
        display: inline;
        width: auto;
        min-width: auto;
        backdrop-filter: none;
        -webkit-backdrop-filter: none;
        border: none;
        white-space: nowrap;
        transition: all 0.3s ease;
        text-align: left;
        box-shadow: none;
    }

    .profile-designation p:hover {
        color: rgba(255, 255, 255, 1);
    }

    /* Responsive design for profile */
    @media (max-width: 768px) {
        .profile-info {
            margin: 10px;
            padding: 15px;
        }

        .profile-img {
            width: 50px;
            height: 50px;
            margin-right: 0;
            border-radius: 8px;
        }
        
      

        .profile-content h6 {
            font-size: 1rem;
        }

        .profile-content p {
            font-size: 0.8rem;
            padding: 4px 10px;
        }
    }

    /* Sidebar scrollbar - hide visually but keep scrolling */
    .sidebar-wrapper {
        overflow-y: auto;
    }
    
    /* Hide sidebar scrollbar completely */
    .sidebar-wrapper::-webkit-scrollbar {
        display: none !important;
        width: 0 !important;
    }
    
    .sidebar-wrapper {
        scrollbar-width: none !important; /* Firefox */
        -ms-overflow-style: none !important; /* IE/Edge */
    }

    /* Collapsed state styles */
    .sidebar-wrapper.collapsed .profile-info {
        margin: 8px 6px;
        padding: 10px 6px;
    }

    .sidebar-wrapper.collapsed .menu span {
        display: none !important;
    }

    /* Show name and designation when collapsed */
    .sidebar-wrapper.collapsed .profile-name {
        display: flex !important;
        flex-direction: column !important;
        visibility: visible !important;
        text-align: center !important;
        width: 100% !important;
        align-items: center !important;
    }
    
    .sidebar-wrapper.collapsed .profile-designation {
        display: block !important;
        visibility: visible !important;
        text-align: center !important;
        width: 100% !important;
        margin-top: 2px !important;
    }

    .sidebar-wrapper.collapsed .profile-name h6 {
        font-size: 0.7rem !important;
        margin: 6px 0 2px 16px !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        width: 100% !important;
        text-align: center !important;
        line-height: 1.2 !important;
    }

    .sidebar-wrapper.collapsed .profile-designation p {
        font-size: 0.65rem !important;
        padding: 0 !important;
        margin: 0 !important;
        color: rgba(255, 255, 255, 0.85) !important;
        font-weight: 500 !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        text-align: center !important;
        width: 100% !important;
    }

    .sidebar-wrapper.collapsed .profile-img {
        margin-right: 0;
        margin-bottom: 6px;
        width: 50px !important;
        height: 50px !important;
    }

    .sidebar-wrapper.collapsed .user-info {
        flex-direction: column !important;
        justify-content: center !important;
        align-items: center !important;
        margin-bottom: 0 !important;
        width: 100% !important;
    }
    
    .sidebar-wrapper.collapsed .profile-info {
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
    }

    .sidebar-wrapper.collapsed .menu a {
        justify-content: center;
        padding: 12px;
    }

    /* Ensure menu icons are always visible when collapsed */
    .sidebar-wrapper.collapsed .menu-categories,
    .sidebar-wrapper.collapsed ul.menu-categories,
    .sidebar-wrapper.collapsed .list-unstyled {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    .sidebar-wrapper.collapsed .menu,
    .sidebar-wrapper.collapsed li.menu {
        display: block !important;
        visibility: visible !important;
        margin-bottom: 5px !important;
        opacity: 1 !important;
    }
    
    .sidebar-wrapper.collapsed .menu a {
        display: flex !important;
        visibility: visible !important;
        justify-content: center !important;
        align-items: center !important;
        padding: 12px !important;
        opacity: 1 !important;
    }
    
    .sidebar-wrapper.collapsed .menu a div {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        width: 100% !important;
        visibility: visible !important;
    }
    
    /* Force all SVG icons to be visible when collapsed - Larger size */
    .sidebar-wrapper.collapsed .menu svg,
    .sidebar-wrapper.collapsed .menu a svg,
    .sidebar-wrapper.collapsed .menu a div svg,
    .sidebar-wrapper.collapsed svg.feather {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
        margin-right: 0 !important;
        margin-left: 0 !important;
        width: 26px !important;
        height: 26px !important;
        min-width: 26px !important;
        min-height: 26px !important;
        max-width: 26px !important;
        max-height: 26px !important;
        color: white !important;
        flex-shrink: 0 !important;
    }
    
    /* Ensure all SVG paths are white and visible */
    .sidebar-wrapper.collapsed .menu svg path,
    .sidebar-wrapper.collapsed .menu svg polyline,
    .sidebar-wrapper.collapsed .menu svg line,
    .sidebar-wrapper.collapsed .menu svg circle,
    .sidebar-wrapper.collapsed .menu svg rect,
    .sidebar-wrapper.collapsed svg.feather path,
    .sidebar-wrapper.collapsed svg.feather polyline,
    .sidebar-wrapper.collapsed svg.feather line,
    .sidebar-wrapper.collapsed svg.feather circle,
    .sidebar-wrapper.collapsed svg.feather rect {
        stroke: white !important;
        fill: none !important;
        opacity: 1 !important;
        visibility: visible !important;
    }
    
    /* Ensure SVG has proper stroke width */
    .sidebar-wrapper.collapsed .menu svg,
    .sidebar-wrapper.collapsed svg.feather {
        stroke: white !important;
        stroke-width: 2 !important;
    }

    /* Track (background) */
    .sidebar-wrapper::-webkit-scrollbar {
        width: 8px;
    }

    .sidebar-wrapper::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    /* Thumb (the draggable part) */
    .sidebar-wrapper::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        transition: background 0.3s ease;
    }

    /* Thumb hover effect */
    .sidebar-wrapper::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.4);
    }

    /* Optional: minimal scrollbar for Firefox */
    .sidebar-wrapper {
        scrollbar-width: thin;
        scrollbar-color: rgba(255, 255, 255, 0.2) rgba(0, 0, 0, 0.1);
    }
</style>

<div class="sidebar-wrapper sidebar-theme" id="sidebarWrapper">
    <!-- Toggle Button -->
    <div class="sidebar-toggle" id="sidebarToggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
            <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
    </div>
    <nav id="sidebar">
        <!-- <div class="navbar-nav">
            <div class="nav-logo">

                <h4 class="text-center mt-2">UK Overnight</h4>

            </div>
        </div> -->

        <div class="profile-info">
            <div class="user-info">
                <div class="profile-img">
                    @if (Auth::user()->image && file_exists(public_path(Auth::user()->image)))
                    <img src="{{ asset(Auth::user()->image) }}" alt="{{ auth()->user()->name }}" onerror="this.src='{{ asset('images/dummy.jpg') }}'">
                    @else
                    <img src="{{ asset('images/dummy.jpg') }}" alt="{{ auth()->user()->name }}">
                    @endif
                </div>
                    @if(auth()->check())
                <div class="profile-name">
                    <h6 class="text-white">{{ auth()->user()->name }}</h6>
                    <div class="profile-designation">
                    <p class="text-white">
                        @if (auth()->user()->role == 0)
                        HR
                            @elseif(auth()->user()->role == 'admin')
                            Admin
                        @else
                            {{ ucfirst(auth()->user()->role) }}
                        @endif
                    </p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <ul class="list-unstyled menu-categories">
            <li class="menu">
                <a href="{{ route('dashboard') }}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('employee.index') }}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('employee.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>
                            @if (in_array(auth()->user()->role, ['admin', 'HR', 'Accountant']))
                            Employee
                            @else
                            Profile
                            @endif
                        </span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('document.index') }}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('document.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"></path>
                            <line x1="6" y1="10" x2="14" y2="10"></line>
                            <line x1="6" y1="14" x2="14" y2="14"></line>
                            <line x1="6" y1="18" x2="14" y2="18"></line>
                        </svg>
                        <span>EmployeeDocument</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{route('leave.index')}}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('leave.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-watch">
                            <circle cx="12" cy="12" r="7"></circle>
                            <polyline points="12 9 12 12 13.5 13.5"></polyline>
                            <path d="M16.24 7.76l1.42-1.42M7.76 7.76L6.34 6.34M6.34 17.66l1.42-1.42M17.66 17.66l-1.42-1.42"></path>
                            <path d="M12 2v2M12 20v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42"></path>
                        </svg>
                        <span>Leave Status</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{route('attendance.index')}}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('attendance.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar-check">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                            <polyline points="9 16 11 18 15 14"></polyline>
                        </svg>
                        <span>Attendance</span>
                    </div>
                </a>
            </li>

            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'Accountant' || auth()->user()->role == 'HR')
            <li class="menu">
                <a href="{{route('payslipupload.index')}}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('payslipupload.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                        <span>PaySlip Upload</span>
                    </div>
                </a>
            </li>
            @endif

            <li class="menu">
                <a href="{{ route('shift.index') }}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('shift.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="6" x2="12" y2="12"></line>
                            <line x1="12" y1="12" x2="16" y2="10"></line>
                        </svg>
                        <span>Shift</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{route('rota.index')}}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('rota.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <span>Rota</span>
                    </div>
                </a>
            </li>

            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'Accountant' || auth()->user()->role == 'HR')
            <li class="menu">
                <a href="{{ route('expenses.index') }}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('expenses.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-wallet">
                            <path d="M20 15V8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v7"></path>
                            <rect x="1" y="8" width="22" height="14" rx="2" ry="2"></rect>
                            <line x1="6" y1="15" x2="6" y2="15"></line>
                        </svg>
                        <span>Expenses</span>
                    </div>
                </a>
            </li>
            @endif

            <li class="menu">
                <a href="{{ route('announcements.index') }}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('announcements.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8v5H3v2h1v2h14v-2h1v-2h-3V8z"></path>
                            <path d="M13 21h-2a2 2 0 0 1-2-2h6a2 2 0 0 1-2 2z"></path>
                        </svg>
                        <span>Announcement</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{route('profile.update')}}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('profile.update') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders">
                            <line x1="4" y1="21" x2="4" y2="14"></line>
                            <line x1="4" y1="10" x2="4" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12" y2="3"></line>
                            <line x1="20" y1="21" x2="20" y2="16"></line>
                            <line x1="20" y1="12" x2="20" y2="3"></line>
                            <line x1="1" y1="14" x2="7" y2="14"></line>
                            <line x1="9" y1="8" x2="15" y2="8"></line>
                            <line x1="17" y1="16" x2="23" y2="16"></line>
                        </svg>
                        <span>Setting</span>
                    </div>
                </a>
            </li>

            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'Accountant' || auth()->user()->role == 'HR')
            <li class="menu">
                <a href="{{ route('roles.index') }}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M9 21v-2a4 4 0 0 1 3-3.87"></path>
                            <path d="M9 5a4 4 0 1 0 0 8"></path>
                            <path d="M17 5a4 4 0 1 0 0 8"></path>
                        </svg>
                        <span>Roles Permissions</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('branch.index') }}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('branch.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-git-branch">
                            <line x1="6" y1="3" x2="6" y2="15"></line>
                            <circle cx="18" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M18 9a9 9 0 0 1-9 9"></path>
                        </svg>
                        <span>Add Branch</span>
                    </div>
                </a>
            </li>
                        
            <li class="menu">
                <a href="{{route('onboarding.index')}}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('onboarding.index') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user-check">
                            <path d="M20 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M4 21v-2a4 4 0 0 1 3-3.87"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                            <polyline points="16 11 18 13 22 9"></polyline>
                        </svg>
                        <span>OnBoarding</span>
                    </div>
                </a>
            </li>
          


            <li class="menu">
    <a href="{{ route('pensions.index') }}" 
       aria-expanded="false" 
       class="dropdown-toggle {{ request()->routeIs('pensions.index') ? 'active' : '' }}">
        <div class="">
            <!-- Pension Icon (Dollar Coin / Savings Style) -->
            <svg xmlns="http://www.w3.org/2000/svg" 
                 width="24" height="24" viewBox="0 0 24 24" 
                 fill="none" stroke="currentColor" 
                 stroke-width="2" stroke-linecap="round" 
                 stroke-linejoin="round" 
                 class="feather feather-piggy-bank">
                <path d="M5 11c1.5-4.5 6.5-4.5 8 0h4a2 2 0 0 1 2 2v3h-2l-1 3h-9l-1-3H3v-3a2 2 0 0 1 2-2z"></path>
                <circle cx="16" cy="8" r="1"></circle>
            </svg>
            <span>Pension Status</span>
        </div>
    </a>
</li>


  @endif



            <li class="menu">
                <a href="{{route('contacts')}}" aria-expanded="false" class="dropdown-toggle {{ request()->routeIs('contacts') ? 'active' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Contacts</span>
                    </div>
                </a>
            </li>

           <li class="menu">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-toggle">
        <div>
            <i class="fas fa-power-off"></i>
            <span>Logout</span>
        </div>
    </a>
</li>
        </ul>
    </nav>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebarWrapper = document.getElementById('sidebarWrapper');
    const sidebarToggle = document.getElementById('sidebarToggle');
    
    // Check if sidebar state is saved in localStorage
    const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    if (isCollapsed) {
        sidebarWrapper.classList.add('collapsed');
    }
    
    // Toggle sidebar on button click
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebarWrapper.classList.toggle('collapsed');
            
            // Save state to localStorage
            const collapsed = sidebarWrapper.classList.contains('collapsed');
            localStorage.setItem('sidebarCollapsed', collapsed);
            
            // Adjust main content margin
            adjustContentMargin();
        });
    }
    
    // Function to adjust main content margin based on sidebar state
    function adjustContentMargin() {
        const content = document.getElementById('content');
        const headerContainer = document.querySelector('.header-container');
        
        const isCollapsed = sidebarWrapper.classList.contains('collapsed');
        
        // Sidebar widths (matching CSS values)
        const sidebarExpandedWidth = 280; // Expanded sidebar width
        const sidebarCollapsedWidth = 100; // Collapsed sidebar width
        
        // Adjust main content margin
        const contentMargin = isCollapsed ? sidebarCollapsedWidth + 'px' : sidebarExpandedWidth + 'px';
        if (content) {
            content.style.marginLeft = contentMargin;
            content.style.transition = 'margin-left 0.3s ease';
        }
        
        // Adjust header container - uses 'left' property (as per CSS structure.css)
        if (headerContainer) {
            const headerLeft = isCollapsed ? (sidebarCollapsedWidth + 3) + 'px' : (sidebarExpandedWidth - 1) + 'px';
            const headerWidth = isCollapsed ? 'calc(100% - ' + (sidebarCollapsedWidth + 48) + 'px)' : 'calc(100% - ' + (sidebarExpandedWidth + 48) + 'px)';
            
            headerContainer.style.left = headerLeft;
            headerContainer.style.width = headerWidth;
            headerContainer.style.transition = 'left 0.3s ease, width 0.3s ease';
        }
    }
    
    // Initialize content margin
    adjustContentMargin();
    
    // Adjust on window resize
    window.addEventListener('resize', adjustContentMargin);
});
</script>