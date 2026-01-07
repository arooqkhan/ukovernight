<!DOCTYPE html>
<html lang="en">
@include('admin.partials.style')
<body class=" layout-boxed">
<script>
    // Force light mode - remove dark mode
    (function() {
        // Remove dark class from body
        document.body.classList.remove('dark');
        
        // Set darkMode to false in localStorage if theme exists
        try {
            var theme = localStorage.getItem("theme");
            if (theme) {
                var themeObj = JSON.parse(theme);
                if (themeObj.settings && themeObj.settings.layout) {
                    themeObj.settings.layout.darkMode = false;
                    localStorage.setItem("theme", JSON.stringify(themeObj));
                }
            }
        } catch(e) {
            // If theme doesn't exist or parsing fails, create default light theme
            var defaultTheme = {
                settings: {
                    layout: {
                        darkMode: false
                    }
                }
            };
            localStorage.setItem("theme", JSON.stringify(defaultTheme));
        }
    })();
</script>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('admin.partials.header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('admin.partials.siderbar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">
    
                    @yield('content')

    
                      
    
                    </div>

                </div>

            </div>
            <!--  BEGIN FOOTER  -->
           @include('admin.partials.footer')
            <!--  END CONTENT AREA  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

  @include('admin.partials.script')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>
        // Ensure light mode is always active
        document.addEventListener('DOMContentLoaded', function() {
            // Remove dark class if present
            document.body.classList.remove('dark');
            
            // Update localStorage to ensure darkMode is false
            try {
                var theme = localStorage.getItem("theme");
                if (theme) {
                    var themeObj = JSON.parse(theme);
                    if (themeObj.settings && themeObj.settings.layout) {
                        themeObj.settings.layout.darkMode = false;
                        localStorage.setItem("theme", JSON.stringify(themeObj));
                    }
                }
            } catch(e) {
                console.log('Theme initialization completed');
            }
        });
        
        // Also check after a short delay to catch any late-loading scripts
        setTimeout(function() {
            document.body.classList.remove('dark');
        }, 100);
    </script>

</body>
</html>