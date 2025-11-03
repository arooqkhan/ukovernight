<style>
    .sidebar-wrapper {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        overflow-y: auto;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
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



    .profile-img:hover {
        border-color: rgba(255, 255, 255, 0.6);
        transform: scale(1.05);
    }

    .profile-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-content {
        flex: 1;
    }

    .profile-content h6 {
        margin: 0;
        font-weight: 700;
        font-size: 1.1rem;
        color: white;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        letter-spacing: 0.5px;
    }

    .profile-content p {
        margin: 5px 0 0;
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        background: rgba(255, 255, 255, 0.15);
        padding: 4px 10px;
        border-radius: 20px;
        display: inline-block;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.1);
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
        /* Force white color */
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
        /* Force white color for icons */
        opacity: 0.9;
    }

    .menu a:hover svg,
    .menu a:focus svg,
    .menu a.active svg {
        opacity: 1;
        color: white !important;
    }

    .menu span {
        font-weight: 500;
        font-size: 0.95rem;
        color: white !important;
        /* Force white color for text */
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
        padding: 20px 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
        margin: 10px 15px;
        border-radius: 12px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .user-info {
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
        padding: 15px;
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
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

    .profile-img:hover img {
        transform: scale(1.1);
    }

    /* Fallback for broken images */
    .profile-img img[src=""],
    .profile-img img:not([src]) {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        font-weight: bold;
    }

    .profile-img img[src=""]::after,
    .profile-img img:not([src])::after {
        content: "👤";
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }

    .profile-content {
        flex: 1;
        min-width: 0;
        /* Prevents text overflow */
    }

    .profile-content h6 {
        margin: 0;
        font-weight: 700;
        font-size: 1.1rem;
        color: white;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        letter-spacing: 0.5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .profile-content p {
        margin: 8px 0 0;
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.95);
        font-weight: 600;
        background: rgba(255, 255, 255, 0.2);
        padding: 6px 12px;
        border-radius: 20px;
        display: inline-block;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        text-transform: capitalize;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
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

    /* Responsive design for profile */
    @media (max-width: 768px) {
        .profile-info {
            margin: 10px;
            padding: 15px;
        }

        .profile-img {
            width: 50px;
            height: 50px;
            margin-right: 12px;
        }

        .profile-content h6 {
            font-size: 1rem;
        }

        .profile-content p {
            font-size: 0.8rem;
            padding: 4px 10px;
        }
    }

    /* Sidebar scrollbar - professional style */
    .sidebar-wrapper {
        overflow-y: auto;
        /* Only this div scrolls */
    }

    /* Track (background) */
    .sidebar-wrapper::-webkit-scrollbar {
        width: 8px;
        /* thinner scrollbar */
    }

    .sidebar-wrapper::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.1);
        /* subtle track */
        border-radius: 10px;
    }

    /* Thumb (the draggable part) */
    .sidebar-wrapper::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        /* subtle, blends with sidebar */
        border-radius: 10px;
        transition: background 0.3s ease;
    }

    /* Thumb hover effect */
    .sidebar-wrapper::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.4);
        /* stands out on hover */
    }

    /* Optional: minimal scrollbar for Firefox */
    .sidebar-wrapper {
        scrollbar-width: thin;
        scrollbar-color: rgba(255, 255, 255, 0.2) rgba(0, 0, 0, 0.1);
    }
</style>

<div class="sidebar-wrapper sidebar-theme" style="width: 260px;">
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
                    <img src="{{ asset(Auth::user()->image) }}" alt="{{ auth()->user()->name }}" onerror="this.src='{{ asset('images/dummy.jpg') }}'" style="width: 60px; height: 60px;">
                    @else
                    <img src="{{ asset('images/dummy.jpg') }}" alt="{{ auth()->user()->name }}">
                    @endif
                </div>
                <div class="profile-content">
                    @if(auth()->check())
                    <h6 class="text-white">{{ auth()->user()->name }}</h6>
                    @endif
                    <p class="text-white">
                        @if (auth()->user()->role == 0)
                        HR
                        @else
                        {{ auth()->user()->role }}
                        @endif
                    </p>
                </div>
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
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                <path d="M10 17l5-5-5-5M15 12H3" />
            </svg>
            <span>Logout</span>
        </div>
    </a>
</li>
        </ul>
    </nav>
</div>