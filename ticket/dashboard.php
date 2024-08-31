<?php
$requiredPermission = 'Common';
include 'include/navbar.php';

// Check if the user has the required permission
if (!hasPermission($requiredPermission)) {
   echo '<script>window.location.href = "user-login.php";</script>';
 // Redirect to an unauthorized page if the user doesn't have the required permission
    exit;
}
$userPermissions = getUserPermissions();
?>
<link rel="stylesheet" href="assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">


<div class="container mt-2 mb-3">
  <div class="card">
<div class="card-header pt-2 pb-2">
      <h2 class="text-center">Dashboard</h2>
    </div>
<!-- <div class="card-body">
<div class="content mt-3"> -->

<!-- //bootstrap cards -->


<style>
        .card-custom {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 150px;
        }
        .card-icon {
            font-size: 2rem;
        }
        .card-title {
            font-size: 1.5rem;
        }
        .card-value {
            font-size: 1.2rem;
        }
    </style>

<!-- Template-1 Card Section 1 -->
<div class="container animated fadeIn mt-3">
    <div class="row">

    <div class="col-md-6 col-lg-3">
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body pb-0">
                                <div class="dropdown float-right">
                                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <div class="dropdown-menu-content">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-0">
                                    <span class="count">10468</span>
                                </h4>
                                <p class="text-light">Members online</p>

                                <div class="chart-wrapper px-0" style="height:70px;" height="70" />
                                <canvas id="widgetChart1"></canvas>
                            </div>

                        </div>

                    </div>
                </div>
                <!--/.col-->

                <div class="col-md-6 col-lg-3">
                    <div class="card text-white bg-flat-color-2">
                        <div class="card-body pb-0">
                            <div class="dropdown float-right">
                                <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <div class="dropdown-menu-content">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-0">
                                    <span class="count">10468</span>
                                </h4>
                            <p class="text-light">Members online</p>

                            <div class="chart-wrapper px-0" style="height:70px;" height="70" />
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-md-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                                    <span class="count">10468</span>
                                </h4>
                        <p class="text-light">Members online</p>

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70" />
                    <canvas id="widgetChart3"></canvas>
                </div>
            </div>
        </div>
        <!--/.col-->

        <div class="col-md-6 col-lg-3">
            <div class="card text-white bg-flat-color-4">
                <div class="card-body pb-0">
                    <div class="dropdown float-right">
                        <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                            <div class="dropdown-menu-content">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-0">
                                    <span class="count">10468</span>
                                </h4>
                    <p class="text-light">Members online</p>

                    <div class="chart-wrapper px-3" style="height:70px;" height="70" />
                    <canvas id="widgetChart4"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->


        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary text-white card-custom">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="card-title">Total Tickets</div>
                    <div class="card-value count">10468</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success text-white card-custom">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="far fa-check-circle"></i>
                    </div>
                    <div class="card-title">Ticket Closed</div>
                    <div class="card-value count">1012</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-info text-white card-custom">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div class="card-title">Ticket Inprogress</div>
                    <div class="card-value count">961</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-danger text-white card-custom">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="card-title">Ticket Open</div>
                    <div class="card-value count">770</div>
                </div>
            </div>
        </div>
<!-- Template-1 Card Section 1 -->


        <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="fas fa-receipt text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="h5 text-dark stat-text">Assigned To You</div>
                        <div class="h5 text-primary stat-digit count">1012</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="fas fa-clipboard-check text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="h5 text-dark stat-text">You Closed</div>
                        <div class="h5 text-success stat-digit count">1012</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="fas fa-comment-dots text-info border-info"></i></div>
                    <div class="stat-content dib">
                        <div class="h5 text-dark stat-text">You Replied</div>
                        <div class="h5 text-info stat-digit count">1012</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="fas fa-hourglass-half text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="h5 text-dark stat-text">Your Pending</div>
                        <div class="h5 text-danger stat-digit count">1012</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Tickets Data Chart </h4>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>


    <div class="col-md-6 col-lg-3">
        <div class="card bg-flat-color-1 text-light">
            <div class="card-body">
                <div class="h4 m-0">89.9%</div>
                <div>Lorem ipsum...</div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">Lorem ipsum dolor sit amet enim.</small>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-md-6 col-lg-3">
        <div class="card bg-flat-color-3 text-light">
            <div class="card-body">
                <div class="h4 m-0">12.124</div>
                <div>Lorem ipsum...</div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">Lorem ipsum dolor sit amet enim.</small>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-md-6 col-lg-3">
        <div class="card bg-flat-color-4 text-light">
            <div class="card-body">
                <div class="h4 m-0">$98.111,00</div>
                <div>Lorem ipsum...</div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">Lorem ipsum dolor sit amet enim.</small>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-md-6 col-lg-3">
        <div class="card bg-flat-color-2 text-light">
            <div class="card-body">
                <div class="h4 m-0">$98.111,00</div>
                <div>Lorem ipsum...</div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">Lorem ipsum dolor sit amet enim.</small>
            </div>
        </div>
    </div>
    <!--/.col-->

    
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-server text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Database</div>
                            <div class="stat-text">Total: 765</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-user text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Users</div>
                            <div class="stat-text">Total: 24720</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-stats-up text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Daily Sales</div>
                            <div class="stat-text">Total: $76,58,714</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-pulse text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Bandwidth</div>
                            <div class="stat-text">Total: 4TB</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Tickets Data Chart </h4>
                    <canvas id="lineChart2"></canvas>
                </div>
            </div>
        </div>
    
<!-- Template-1 Card Section 2 -->
        <div class="col-lg-3 col-md-6 mt-3">
            <div class="card bg-info text-white card-custom">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-title">Total Users</div>
                    <div class="card-value">2,781</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-3">
            <div class="card bg-success text-white card-custom">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-title">Active Users</div>
                    <div class="card-value">2,781</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-3">
            <div class="card bg-info text-white card-custom">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="card-title">Total BC</div>
                    <div class="card-value">2,781</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-3">
            <div class="card bg-success text-white card-custom">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-title">Active BC</div>
                    <div class="card-value">2,781</div>
                </div>
            </div>
        </div>
<!-- Template-1 Card Section 2 -->                


    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Profit</div>
                        <div class="stat-digit">1,012</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">New Customer</div>
                        <div class="stat-digit">961</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Active Projects</div>
                        <div class="stat-digit">770</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-link text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Referrals</div>
                        <div class="stat-digit">2,781</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div><!-- .row -->
    </div><!-- .animated -->
    </div><!-- .content -->

</div>
</div>
</div>
<script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/widgets.js"></script>
<?php include 'include/footer.php'; ?>
