<style id="sidebarCss">
    /*
    * Sidebar
    */

    @media (min-width: 768px) {
        .sidebar .offcanvas-lg {
            position: -webkit-sticky;
            position: sticky;
            /* top: 48px; */
        }

        .navbar-search {
            display: block;
        }
    }
    @media (max-width: 768px) {
        .sidebar .offcanvas-lg {
            top: 48px;
        }
    }

    .sidebar .nav-link {
        font-size: .875rem;
        font-weight: 500;
    }

    .sidebar .nav-link.active {
        color: #2470dc;
    }

    .sidebar-heading {
        font-size: .75rem;
    }

    /*
    * Navbar
    */

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .form-control {
        padding: .75rem 1rem;
    }

    @media (min-width: 768px) {
        .sidebar {
            min-height: 100vh;
            max-height: 100vh;
            /* overflow-y: scroll; */
            position: fixed;
            top: 0;
            bottom: 0;
            /* padding-top: 55px !important; */
            padding: 55px 5px 15px 15px;
        }

        .sidebar #sidebarCanvas {
            /* margin: 10px; */
            /* margin-top: 55px !important; */
            height: 100%;
            overflow: hidden;
            overflow-y: scroll;
            /* border-radius: 20px; */
            border-radius: var(--bs-border-radius-xl) !important;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-white-rgb), var(--bs-bg-opacity)) !important;
            padding: 1rem!important;
        }

        .sidebar #sidebarCanvas::-webkit-scrollbar {
            width: 13px;
            height: 13px;
        }

        .sidebar #sidebarCanvas::-webkit-scrollbar-track {
            /* background-color: var(--bs-primary-border-subtle); */
            /* border-radius: 15px; */
            margin: 15px;
        }

        .sidebar #sidebarCanvas::-webkit-scrollbar-thumb {
            border-radius: 15px;
            background-color: var(--bs-primary);
        }
    }
</style>

<div class="sidebar col-md-3 col-lg-2">
    <div id="sidebarCanvas">
        <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="sidebarMenuLabel"><?= $PageName ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                <?php echo view('Components/Navigation') ?>
            </div>
        </div>
    </div>
</div>