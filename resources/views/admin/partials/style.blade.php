<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>HRM</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/naxas.png')}}"/>
    <link href="{{asset('admin-asset/layouts/modern-dark-menu/css/light/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-asset/layouts/modern-dark-menu/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('admin-asset/layouts/modern-dark-menu/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('admin-asset/src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-asset/layouts/modern-dark-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-asset/layouts/modern-dark-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('admin-asset/src/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-asset/src/assets/css/light/components/list-group.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-asset/src/assets/css/light/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('admin-asset/src/assets/css/dark/components/list-group.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-asset/src/assets/css/dark/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->


    <!-- Custom link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Table -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/src/plugins/src/table/datatable/datatables.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/src/plugins/css/light/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/src/plugins/css/light/table/datatable/custom_dt_custom.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/src/plugins/css/dark/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-asset/src/plugins/css/dark/table/datatable/custom_dt_custom.css')}}">

    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">





     <link rel="icon" type="image/x-icon" href="{{asset('admin-assets/src/assets/img/favicon.ico')}}"/>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
   







     <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico"/>
 
 

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('admin-asset/src/assets/css/light/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-asset/src/assets/css/dark/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <!-- Premium Global Table & UI Styles -->
    <style>
        /* Remove outer scrollbar - hide body/html scrollbar */
        html, body {
            overflow-x: hidden !important;
            height: 100% !important;
        }
        
        /* Hide outer vertical scrollbar but allow scrolling */
        html::-webkit-scrollbar,
        body::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        }
        
        html {
            scrollbar-width: none !important; /* Firefox */
            -ms-overflow-style: none !important; /* IE/Edge */
        }
        
        body {
            scrollbar-width: none !important; /* Firefox */
            -ms-overflow-style: none !important; /* IE/Edge */
            overflow-y: hidden !important; /* Hide outer body scrollbar */
        }
        
        /* Ensure main container handles scrolling instead of body */
        .main-container,
        #container {
            height: 100vh !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
        }
        
        /* Hide scrollbar on main container */
        .main-container::-webkit-scrollbar,
        #container::-webkit-scrollbar {
            display: none !important;
        }
        
        .main-container,
        #container {
            scrollbar-width: none !important; /* Firefox */
            -ms-overflow-style: none !important; /* IE/Edge */
        }
        
        /* Ensure sidebar keeps its own scrollbar */
        .sidebar-wrapper,
        .sidebar-scroll {
            overflow-y: auto !important;
        }
        
        /* Keep main content area scrollable but without outer scrollbar */
        .main-content {
            overflow-y: visible !important;
        }
        
        /* Premium Global Table Styles */
        .widget-content-area {
            border-radius: 12px !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
            background: #ffffff !important;
            padding: 0 !important;
            border: none !important;
            overflow: hidden;
        }

        /* Premium Table Styling - Apply employees table white background to all tables */
        table.style-2,
        table.style-1,
        table.style-3,
        table.dt-table-hover,
        .dataTable,
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            background: #ffffff !important;
        }

        /* Premium Table Headers */
        table.style-2 thead th,
        table.style-1 thead th,
        table.style-3 thead th,
        table.dt-table-hover thead th,
        .dataTable thead th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            padding: 18px 20px !important;
            border: none !important;
            white-space: nowrap;
            position: relative;
        }

        table.style-2 thead th:first-child,
        table.style-1 thead th:first-child,
        table.style-3 thead th:first-child {
            border-top-left-radius: 0;
        }

        table.style-2 thead th:last-child,
        table.style-1 thead th:last-child,
        table.style-3 thead th:last-child {
            border-top-right-radius: 0;
        }

        /* Premium Table Body - Apply employees table white background to all tables */
        table.style-2 tbody tr,
        table.style-1 tbody tr,
        table.style-3 tbody tr,
        table.dt-table-hover tbody tr,
        .dataTable tbody tr,
        table tbody tr {
            background: #ffffff !important;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        table.style-2 tbody tr:hover,
        table.style-1 tbody tr:hover,
        table.style-3 tbody tr:hover,
        table.dt-table-hover tbody tr:hover,
        .dataTable tbody tr:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%) !important;
            transform: translateX(4px);
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.1);
        }

        /* Premium Table Cells - Compact spacing */
        table.style-2 tbody td,
        table.style-1 tbody td,
        table.style-3 tbody td,
        table.dt-table-hover tbody td,
        .dataTable tbody td {
            padding: 10px 16px !important;
            font-size: 0.95rem !important;
            color: #475569 !important;
            vertical-align: middle;
            border: none !important;
        }

        /* Premium Striped Rows */
        .dataTable.table-striped tbody tr:nth-of-type(odd) {
            background: #f8fafc !important;
        }

        .dataTable.table-striped tbody tr:nth-of-type(odd):hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.08) 0%, rgba(118, 75, 162, 0.08) 100%) !important;
        }

        /* Premium Profile Images - Compact size */
        .profile-img {
            width: 50px !important;
            height: 50px !important;
            border-radius: 8px !important;
            object-fit: cover;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
        }

        table tbody tr:hover .profile-img {
            border-color: #667eea;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        /* Premium Action Buttons */
        .btn-outline-secondary {
            border: 2px solid #e2e8f0;
            color: #64748b;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: #ffffff;
        }

        .btn-outline-secondary:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        /* Premium Dropdown Menu */
        .dropdown-menu {
            border: none !important;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12) !important;
            border-radius: 12px !important;
            padding: 8px !important;
            margin-top: 8px !important;
            min-width: 200px;
        }

        .dropdown-item {
            padding: 10px 16px !important;
            border-radius: 8px !important;
            transition: all 0.2s ease;
            font-size: 0.9rem;
            color: #475569 !important;
            margin-bottom: 4px;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%) !important;
            color: #667eea !important;
            transform: translateX(4px);
        }

        .dropdown-item i {
            width: 18px;
            text-align: center;
        }

        .dropdown-item.text-danger:hover {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.1) 100%) !important;
            color: #dc2626 !important;
        }

        .dropdown-divider {
            margin: 8px 0 !important;
            border-color: #e2e8f0 !important;
        }

        /* Premium Page Heading */
        .col-lg-12 h4 {
            font-weight: 700 !important;
            font-size: 1.75rem !important;
            color: #1e293b !important;
            margin-bottom: 24px !important;
            padding-left: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Premium Statbox Widget */
        .statbox.widget {
            border-radius: 16px !important;
            overflow: hidden !important;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1) !important;
            border: none !important;
            background: #ffffff !important;
        }

        /* Premium Form Controls */
        .form-control,
        .branch-filter {
            border: 2px solid #e2e8f0 !important;
            border-radius: 10px !important;
            padding: 10px 16px !important;
            font-size: 0.95rem !important;
            transition: all 0.3s ease !important;
            background: #ffffff !important;
        }

        .form-control:focus,
        .branch-filter:focus {
            border-color: #667eea !important;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1) !important;
            outline: none !important;
        }

        .form-label {
            font-weight: 600 !important;
            color: #475569 !important;
            margin-bottom: 8px !important;
            font-size: 0.9rem !important;
        }

        /* Premium Buttons */
        .btn-secondary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border: none !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            padding: 12px 24px !important;
            border-radius: 10px !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3) !important;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4) !important;
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%) !important;
        }

        /* Premium Empty State */
        table tbody tr td.text-center {
            padding: 40px 20px !important;
            font-size: 1rem !important;
            color: #94a3b8 !important;
            font-style: italic;
        }

        /* Premium Badge Styles */
        .badge {
            padding: 4px 6px!important;
            border-radius: 6px !important;
            font-weight: 300 !important;
            font-size: 0.75rem !important;
        }

        /* Premium DataTables Controls */
        .dt--top-section {
            margin: 0 !important;              /* remove side gaps */
            padding: 16px 16px !important;     /* equal inner padding */
            background: #f8fafc;
            border-radius: 0 !important;
        }

        .dt--bottom-section {
            margin: 0 !important;              /* remove side gaps */
            padding: 16px 16px !important;     /* equal inner padding */
            background: #f8fafc;
            border-radius: 0 !important;
            border-top: 1px solid #e2e8f0;
        }

        /* Make top/bottom bars touch container sides */
        .widget-content-area .dt--top-section .row,
        .widget-content-area .dt--bottom-section .d-sm-flex,
        .widget-content-area .dt--bottom-section .row,
        .dataTables_wrapper .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
        .dt--top-section .row > [class^="col-"],
        .dt--top-section .row > [class*=" col-"],
        .dt--bottom-section .row > [class^="col-"],
        .dt--bottom-section .row > [class*=" col-"] {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        /* Ensure wrapper doesn't add internal padding */
        .dataTables_wrapper { padding: 0 !important; }

        /* Premium Pagination */
        .pagination {
            margin: 0 !important;
        }

        /* Remove any black/dark colors from pagination */
        .pagination .page-link,
        .pagination li .page-link {
            background-color: transparent !important;
        }

        .page-link {
            border: 2px solid #e2e8f0 !important;
            color: #667eea !important;
            padding: 10px 16px !important;
            border-radius: 8px !important;
            margin: 0 4px !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
        }
        
        /* Make prev/next buttons same blue as button 1 - background and icon color */
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link,
        .pagination li:first-child .page-link,
        .pagination li:last-child .page-link,
        .pagination .page-item:first-child a.page-link,
        .pagination .page-item:last-child a.page-link,
        .pagination ul li:first-child a.page-link,
        .pagination ul li:last-child a.page-link,
        nav ul.pagination li:first-child .page-link,
        nav ul.pagination li:last-child .page-link,
        .pagination .page-item:first-child:not(.disabled) .page-link,
        .pagination .page-item:last-child:not(.disabled) .page-link,
        .pagination li:first-child:not(.disabled) .page-link,
        .pagination li:last-child:not(.disabled) .page-link,
        .pagination .page-item:first-child:not(.disabled) a,
        .pagination .page-item:last-child:not(.disabled) a {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border-color: #667eea !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            font-size: 1.4rem !important;
        }

        .page-link:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border-color: #667eea !important;
            color: #ffffff !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border-color: #667eea !important;
            color: #ffffff !important;
        }

        .page-item.disabled .page-link,
        .page-item.disabled .page-link:hover,
        .pagination .page-item.disabled .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border-color: #667eea !important;
            color: #ffffff !important;
            opacity: 0.5 !important;
            cursor: not-allowed !important;
            box-shadow: none !important;
        }

        /* Pagination prev/next icons styling */
        .pagination .page-link {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 40px !important;
            font-size: 1.2rem !important;
            font-weight: 600 !important;
        }
        
        /* Ensure prev/next buttons show icons clearly with button 1 blue color */
        .pagination .page-item:first-child .page-link:not(.disabled),
        .pagination .page-item:last-child .page-link:not(.disabled),
        .pagination .page-item:first-child:not(.disabled) .page-link,
        .pagination .page-item:last-child:not(.disabled) .page-link {
            font-size: 1.3rem !important;
            font-weight: 700 !important;
            min-width: 42px !important;
            padding: 10px 14px !important;
            color: #667eea !important;
        }
        
        /* Blue color for disabled prev/next icons (white on blue background) */
        .pagination .page-item.disabled:first-child .page-link,
        .pagination .page-item.disabled:last-child .page-link {
            color: #ffffff !important;
        }

        /* Premium Search & Filter Section */
        .d-flex.justify-content-between {
            padding: 20px;
            background: #f8fafc;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        /* Role text emphasis (keep simple) */

        /* Responsive Design */
        @media (max-width: 768px) {
            table.style-2 thead th,
            table.style-1 thead th,
            table.style-3 thead th {
                font-size: 0.75rem !important;
                padding: 12px 10px !important;
            }

            table.style-2 tbody td,
            table.style-1 tbody td,
            table.style-3 tbody td {
                padding: 12px 10px !important;
                font-size: 0.85rem !important;
            }

           
        }

        /* Smooth Animations */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Premium Scrollbar */
        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        /* Executive table refinements */
        .table.align-middle > :not(caption) > * > * { vertical-align: middle; }
        .table thead th.text-center, .table tbody td.text-center { text-align: center !important; }
        .table thead th.text-end,   .table tbody td.text-end   { text-align: right !important; }
        .table thead th.text-start, .table tbody td.text-start { text-align: left !important; }

        /* Ellipsis helper for long content cells */
        .cell-ellipsis {
            max-width: 260px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: inline-block;
            vertical-align: middle;
        }

        /* Action column width helper */
        .col-actions { width: 120px; }
    </style>

    <!-- Executive UI Overrides (minimal, professional, luxury) -->
    <style>
        :root {
            --surface: #ffffff;
            --surface-2: #f8fafc;
            --border: #e5e7eb;
            --text: #0f172a;
            --muted: #64748b;
            --accent: #2563eb;   /* Primary (subtle blue) */
            --success: #16a34a;
            --warning: #d97706;
            --danger:  #b91c1c;
            --radius: 12px;
        }

        /* Cards - toned down, no gradients */
        .widget-content-area,
        .card,
        .statbox.widget {
            border-radius: var(--radius) !important;
            background: var(--surface) !important;
            border: 1px solid var(--border) !important;
            box-shadow: 0 1px 2px rgba(0,0,0,0.04) !important;
        }

        /* Headings - remove gradient text */
        .col-lg-12 h4,
        .dashboard-heading h2 {
            background: none !important;
            -webkit-text-fill-color: unset !important;
            color: var(--text) !important;
            font-weight: 600 !important;
            letter-spacing: -0.2px;
        }
        .dashboard-heading p,
        .text-muted { color: var(--muted) !important; }

        /* Tables - solid header, soft borders, subtle hover */
        table.style-1 thead th,
        table.style-2 thead th,
        table.style-3 thead th,
        .dataTable thead th {
            background: var(--surface-2) !important;
            color: var(--text) !important;
            border-bottom: 1px solid var(--border) !important;
            text-transform: none !important;
            letter-spacing: 0 !important;
            font-weight: 600 !important;
            padding: 12px 16px !important;
        }
        table.style-1 tbody tr,
        table.style-2 tbody tr,
        table.style-3 tbody tr,
        .dataTable tbody tr {
            border-bottom: 1px solid var(--border) !important;
            transition: background-color .15s ease !important;
        }
        table.style-1 tbody tr:hover,
        table.style-2 tbody tr:hover,
        table.style-3 tbody tr:hover,
        .dataTable tbody tr:hover {
            background: #f3f4f6 !important;
            transform: none !important;
            box-shadow: none !important;
        }
        table tbody td {
            color: #334155 !important;
            padding: 10px 16px !important;
            vertical-align: middle;
        }

        /* Buttons - executive palette */
        .btn-secondary,
        .btn-primary {
            background: var(--accent) !important;
            border: 1px solid var(--accent) !important;
            color: #fff !important;
            border-radius: 10px !important;
            padding: 10px 18px !important;
            box-shadow: 0 1px 2px rgba(37,99,235,0.15) !important;
            transition: background-color .15s ease, box-shadow .15s ease !important;
        }
        .btn-secondary:hover,
        .btn-primary:hover {
            background: #1d4ed8 !important;
            box-shadow: 0 2px 6px rgba(37,99,235,0.20) !important;
        }
        .btn-outline-secondary {
            border: 1px solid var(--border) !important;
            color: #475569 !important;
            background: #fff !important;
            padding: 8px 14px !important;
            border-radius: 8px !important;
        }
        .btn-outline-secondary:hover {
            border-color: #cbd5e1 !important;
            color: #0f172a !important;
            background: #f8fafc !important;
            box-shadow: none !important;
        }

        /* Dropdowns - minimal */
        .dropdown-menu {
            border: 1px solid var(--border) !important;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08) !important;
            border-radius: 10px !important;
            padding: 6px !important;
        }
        .dropdown-item {
            border-radius: 6px !important;
            color: #334155 !important;
        }
        .dropdown-item:hover {
            background: #f1f5f9 !important;
            color: #0f172a !important;
            transform: none !important;
        }

        /* Forms */
        .form-control, .form-select, .branch-filter {
            border: 1px solid var(--border) !important;
            border-radius: 10px !important;
            padding: 10px 14px !important;
            background: #fff !important;
            box-shadow: none !important;
        }
        .form-control:focus, .form-select:focus, .branch-filter:focus {
            border-color: #cbd5e1 !important;
            box-shadow: 0 0 0 3px rgba(2,132,199,0.10) !important; /* subtle cyan focus */
        }
        .form-label { color: var(--muted) !important; font-weight: 600 !important; }

        /* Badges - flat, tasteful */
      
        .badge.bg-success { background: #e7f7ec !important; color: #166534 !important; }
        .badge.bg-warning { background: #fff7ed !important; color: #92400e !important; }
        .badge.bg-danger  { background: #fef2f2 !important; color: #991b1b !important; }
        .badge.bg-info    { background: #eff6ff !important; color: #1d4ed8 !important; }

        /* Pagination */
        .page-link {
            border: 1px solid var(--border) !important;
            color: var(--accent) !important;
            border-radius: 8px !important;
        }
        .page-link:hover {
            background: #eef2ff !important;
            border-color: #c7d2fe !important;
        }
        .page-item.active .page-link {
            background: var(--accent) !important;
            border-color: var(--accent) !important;
            color: #fff !important;
        }
        
        /* Apply button 1 blue color to prev/next buttons */
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link,
        .pagination li:first-child .page-link,
        .pagination li:last-child .page-link {
            background: var(--accent) !important;
            border-color: var(--accent) !important;
            color: #ffffff !important;
        }
        .page-item.disabled .page-link,
        .page-item.disabled .page-link:hover,
        .pagination .page-item.disabled .page-link {
            background: var(--accent) !important;
            border-color: var(--accent) !important;
            color: #ffffff !important;
            opacity: 0.5 !important;
            cursor: not-allowed !important;
            box-shadow: none !important;
        }

        /* Pagination prev/next icons styling */
        .pagination .page-link {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 40px !important;
            font-size: 1.2rem !important;
            font-weight: 600 !important;
        }

        /* Ensure prev/next buttons show icons clearly with button 1 blue color */
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            font-size: 1.4rem !important;
            font-weight: 700 !important;
            min-width: 42px !important;
            padding: 10px 14px !important;
        }
        
        /* Make icons clearly visible - strong blue color - ALL SELECTORS */
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link,
        .pagination li:first-child .page-link,
        .pagination li:last-child .page-link,
        .pagination .page-item:first-child a,
        .pagination .page-item:last-child a,
        .pagination li:first-child a,
        .pagination li:last-child a,
        .pagination ul li:first-child a.page-link,
        .pagination ul li:last-child a.page-link,
        nav ul.pagination li:first-child .page-link,
        nav ul.pagination li:last-child .page-link {
            color: #667eea !important;
            font-size: 1.4rem !important;
            font-weight: 700 !important;
        }
        
        /* Blue color for disabled prev/next icons (white on blue background) */
        .pagination .page-item.disabled:first-child .page-link,
        .pagination .page-item.disabled:last-child .page-link,
        .pagination li.disabled:first-child .page-link,
        .pagination li.disabled:last-child .page-link {
            color: #ffffff !important;
        }

        /* Notification badge - smaller green dot on top of bell */
        .navbar .navbar-item .nav-item.dropdown.notification-dropdown .nav-link {
            position: relative;
        }
        .navbar .navbar-item .nav-item.dropdown.notification-dropdown .nav-link span.badge {
            width: 12px !important;
            height: 12px !important;
            top: -12px !important;
            right: 5px !important;
            transform: none !important;
            position: absolute !important;
            border-radius: 50% !important;
            background-color: #10b981 !important;
            border: 2px solid #ffffff !important;
            padding: 0 !important;
        }

        /* FORCE BLUE BACKGROUND FOR PAGINATION PREV/NEXT BUTTONS - SAME AS BUTTON 1 */
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link,
        .pagination li:first-child .page-link,
        .pagination li:last-child .page-link,
        .pagination li:first-child a,
        .pagination li:last-child a,
        .pagination li:first-child span,
        .pagination li:last-child span,
        nav ul.pagination li:first-child .page-link,
        nav ul.pagination li:last-child .page-link,
        nav ul.pagination li:first-child a,
        nav ul.pagination li:last-child a,
        nav ul.pagination li:first-child span,
        nav ul.pagination li:last-child span {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border-color: #667eea !important;
            color: #ffffff !important;
            font-size: 1.4rem !important;
            font-weight: 700 !important;
        }
        
        /* Specifically apply button 1 color for enabled buttons */
        .pagination .page-item:first-child:not(.disabled) .page-link,
        .pagination .page-item:last-child:not(.disabled) .page-link,
        .pagination li:first-child:not(.disabled) .page-link,
        .pagination li:last-child:not(.disabled) .page-link,
        .pagination li:first-child:not(.disabled) a,
        .pagination li:last-child:not(.disabled) a {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border-color: #667eea !important;
            color: #ffffff !important;
        }
        
        /* Keep white for disabled buttons only */
        .pagination .page-item.disabled:first-child .page-link,
        .pagination .page-item.disabled:last-child .page-link,
        .pagination li.disabled:first-child .page-link,
        .pagination li.disabled:last-child .page-link {
            color: #ffffff !important;
        }

        /* ULTIMATE OVERRIDE - Force blue background for all enabled prev/next - same as button 1 */
        .pagination li:first-child:not(.disabled) a.page-link,
        .pagination li:last-child:not(.disabled) a.page-link,
        .pagination .page-item:first-child:not(.disabled) a,
        .pagination .page-item:last-child:not(.disabled) a,
        .pagination li:first-child:not(.disabled) .page-link,
        .pagination li:last-child:not(.disabled) .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border-color: #667eea !important;
            color: #ffffff !important;
        }
        
        /* Override any white/light background - apply button 1 blue */
        .pagination .page-item:first-child .page-link:not([class*="disabled"]),
        .pagination .page-item:last-child .page-link:not([class*="disabled"]),
        .pagination li:first-child .page-link:not([class*="disabled"]),
        .pagination li:last-child .page-link:not([class*="disabled"]) {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border-color: #667eea !important;
            color: #ffffff !important;
        }

        /* SweetAlert2 Notification Text Color - White */
        .swal2-popup.swal2-toast .swal2-title,
        .swal2-popup .swal2-title,
        .swal2-title-white,
        .swal2-popup-white-text .swal2-title {
            color: #ffffff !important;
        }

        .swal2-popup[style*="background: rgb(40, 167, 69)"] .swal2-title,
        .swal2-popup[style*="background: #28a745"] .swal2-title,
        .swal2-popup[style*="background: #10b981"] .swal2-title,
        .swal2-popup.swal2-toast[style*="background"] .swal2-title {
            color: #ffffff !important;
        }
    </style>




</head>