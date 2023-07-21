<style>
    #autoCompleteSearch:focus,
    #autoCompleteSearch {
        background: #ffffffe0;
        box-shadow: none;
    }
</style>
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/"><?= $siteName ?></a>

    <ul class="navbar-nav flex-row">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
                <i class="bi bi-search"></i>
            </button>
        </li>
        <!-- <li class="nav-item dropdown">
            <a class="nav-link px-3 text-white dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li> -->
        <li class="nav-item text-nowrap d-md-none">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
        </li>
    </ul>

    <div id="navbarSearch" class="navbar-search w-100 collapse">
        <input class="form-control w-100 rounded-0 border-0" id="autoCompleteSearch" type="text" placeholder="eg: users, min 3 characters" aria-label="Search" />
    </div>
</header>

<?= $this->section('javascript') ?>
<script>
    $('#autoCompleteSearch').on('input', async function(event) {
        event.preventDefault();
        const query = $(this).val();
        if (query && query.length >= 3) {
            console.log('query', query);
            $.ajax({
                url: '<?= route_to('dashboard') ?>',
                type: 'post',
                data: {
                    dashboard_search: query
                },
                success: function(response) {
                    if (response) {
                        console.log(response);
                    } else {
                        console.log('response.false');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }
    })
</script>
<?= $this->endSection() ?>