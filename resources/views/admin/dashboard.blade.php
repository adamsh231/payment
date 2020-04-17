<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.min.css') }}">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Admin</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="index.html">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>&nbsp;Dashboard</span>
                        </a>
                    </li>
                    <div class="sidebar-heading"></div>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        <p class="mb-0">MAIN MENU</p>
                    </div>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="charts.html">
                            <i class="fa fa-user"></i>
                            <span>&nbsp;Karyawan</span>
                        </a>
                        <a class="nav-link" href="charts.html">
                            <i class="fa fa-money"></i>
                            <span>&nbsp;Gaji Karyawan</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="tables.html">
                            <i class="fa fa-address-book-o"></i>
                            <span>&nbsp;Laporan</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                </ul>
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group">
                                            <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary py-0" type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small">Valerie Luna</span>
                                        <img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg">
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="#">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Profile
                                        </a>
                                        <a class="dropdown-item" role="presentation" href="#">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Settings
                                        </a>
                                        <a class="dropdown-item" role="presentation" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Activity log
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" role="presentation" href="{{ url('/logout') }}">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold">Karyawan</p>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary btn-sm float-right btn-icon-split" role="button" style="margin-bottom: 12px;">
                                <span class="text-white-50 icon">
                                    <i class="fa fa-user-plus"></i>
                                </span>
                                <span class="text-white text">Tambah Karyawan</span>
                            </a>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Position</th>
                                            <th class="text-center">Office</th>
                                            <th class="text-center">Age</th>
                                            <th class="text-center">Start date</th>
                                            <th class="text-center">Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td class="text-center"><a class="btn btn-primary btn-circle ml-1" role="button"><i class="fa fa-pencil text-white"></i></a><a class="btn btn-danger btn-circle ml-1" role="button"><i class="fas fa-trash text-white"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                                            <td>Chief Executive Officer(CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09<br></td>
                                            <td>$1,200,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar3.jpeg">Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12<br></td>
                                            <td>$86,000</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Position</strong></td>
                                            <td><strong>Office</strong></td>
                                            <td><strong>Age</strong></td>
                                            <td><strong>Start date</strong></td>
                                            <td><strong>Salary</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold">Gaji Karyawan</p>
                        </div>
                        <div class="card-body">
                            <div style="margin-bottom: 0px;">
                                <form style="margin-left: 0;margin-right: 0;margin-bottom: 0px;">
                                    <div class="form-row float-right d-xl-flex justify-content-xl-center" style="margin-right: 0px;width: 50%;">
                                        <div class="col-5" style="padding-right: 0px;padding-left: 0px;">
                                            <select class="form-control" style="padding: 10px;">
                                                <option value="12" selected="">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-3" style="padding-right: 0px;padding-left: 0px;">
                                            <select class="form-control" style="padding: 10px;padding-left: 7px;">
                                                <option value="12" selected="">2018</option>
                                            </select>
                                        </div>
                                        <div class="col-4 d-xl-flex justify-content-xl-center">
                                            <a class="btn btn-link btn-block text-white btn-facebook" role="button" style="width: 80%;">Tampilkan</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div style="margin-top: 60px;">
                                <div class="table-responsive d-block table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table dataTable my-0" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td class="text-center"><a class="btn btn-info btn-sm btn-icon-split" role="button"><span class="text-white-50 icon"><i class="fa fa-calculator"></i></span><span class="text-white text">Bayar Gaji</span></a></td>
                                            </tr>
                                            <tr>
                                                <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                                                <td>Chief Executive Officer(CEO)</td>
                                                <td>London</td>
                                                <td>47</td>
                                                <td>2009/10/09<br></td>
                                                <td class="text-center"><a class="btn btn-success btn-circle ml-1" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Cetak Ulang"><i class="fas fa-check text-white"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar3.jpeg">Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12<br></td>
                                                <td>$86,000</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td><strong>Name</strong></td>
                                                <td><strong>Position</strong></td>
                                                <td><strong>Office</strong></td>
                                                <td><strong>Age</strong></td>
                                                <td><strong>Start date</strong></td>
                                                <td><strong>Salary</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-center text-primary m-0 font-weight-bold">Laporan</p>
                        </div>
                        <div class="card-body">
                            <div style="margin-bottom: 0px;">
                                <form style="margin-left: 0;margin-right: 0;margin-bottom: 0px;">
                                    <div class="form-row float-right d-xl-flex justify-content-xl-center" style="margin-right: 0px;width: 100%;">
                                        <div class="col-3" style="padding-right: 0px;padding-left: 0px;">
                                            <select class="form-control" style="padding: 10px;">
                                                <option value="12" selected="">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-2" style="padding-right: 0px;padding-left: 0px;">
                                            <h1 class="text-center" style="font-size: 27px;">sampai</h1>
                                        </div>
                                        <div class="col-3" style="padding-right: 0px;padding-left: 0px;">
                                            <select class="form-control" style="padding: 10px;">
                                                <option value="12" selected="">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-1" style="padding-right: 0px;padding-left: 0px;margin-left: 12px;">
                                            <select class="form-control" style="padding: 10px;padding-left: 5px;">
                                                <option value="12" selected="">2018</option>
                                            </select>
                                        </div>
                                        <div class="col-2 d-xl-flex justify-content-xl-center">
                                            <a class="btn btn-link btn-block text-white btn-facebook" role="button" style="width: 80%;">Cetak</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Dashboard 2020</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/admin.min.js') }}"></script>
</body>

</html>
