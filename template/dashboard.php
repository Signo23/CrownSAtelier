<div class="container-fluid p-0 m-0">
    <div class="row p-0 m-0">
        <nav id="navbars" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <?php require $templateParams["dashboardNav"]; ?>
                </ul>

                <div class="navbar-nav mt-5">
                    <div class="nav-item text-nowrap">
                    <a class="nav-link px-3 btn btn-danger text-white" href="utils/logout.php">Log out</a>
                    </div>
                </div>
        
            </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php require $templateParams["page"]; ?>
        </main>
    </div>
</div>
