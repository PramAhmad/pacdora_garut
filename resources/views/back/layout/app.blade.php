<!DOCTYPE html>
<html lang="en">

<head>
  <!--  Title -->
  <title>Mordenize</title>
  <!--  Required Meta Tag -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="handheldfriendly" content="true" />
  <meta name="MobileOptimized" content="width" />
  <meta name="description" content="Mordenize" />
  <meta name="author" content="" />
  <meta name="keywords" content="Mordenize" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--  Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{asset('admin/package/dist/images/logos/favicon.ico')}}" />
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{asset('admin/package/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/package/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
  <style>
    .dataTables_length {
      display: none;
    }
  </style>
  <style>
    .select2.select2-container {
      width: 100% !important;
    }

    .select2.select2-container .select2-selection {
      border: 1px solid rgb(231 232 236);
      -webkit-border-radius: 7px;
      -moz-border-radius: 7px;
      border-radius: 7px;
      height: 40px;
      margin-bottom: 15px;
      outline: none !important;
      transition: all .15s ease-in-out;
    }

    .select2.select2-container .select2-selection .select2-selection__rendered {
      color: #333;
      line-height: 40px;
      padding-right: 33px;
    }

    .select2.select2-container .select2-selection .select2-selection__arrow {
      background: #f8f8f8;
      border-left: 1px solid rgb(231 232 236);
      -webkit-border-radius: 0 3px 3px 0;
      -moz-border-radius: 0 3px 3px 0;
      border-radius: 0 7px 7px 0;
      height: 40px;
      width: 33px;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
      background: #f8f8f8;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
      -webkit-border-radius: 0 3px 0 0;
      -moz-border-radius: 0 3px 0 0;
      border-radius: 0 3px 0 0;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
      border: 1px solid #34495e;
    }

    .select2.select2-container .select2-selection--multiple {
      height: auto;
      min-height: 34px;
    }

    .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
      margin-top: 0;
      height: 30px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
      display: block;
      padding: 0 4px;
      line-height: 29px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice {
      background-color: #f8f8f8;
      border: 1px solid rgb(231 232 236);
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 9px;
      margin: 4px 4px 0 0;
      padding: 0 6px 0 22px;
      height: 30px;
      line-height: 30px;
      font-size: 12px;
      position: relative;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
      position: absolute;
      top: 0;
      left: 0;
      height: 46px;
      width: 46px;
      margin: 0;
      text-align: center;
      color: #e74c3c;
      font-weight: bold;
      font-size: 16px;
    }

    .select2-container .select2-dropdown {
      background: transparent;
      border: none;
      margin-top: -5px;
    }

    .select2-container .select2-dropdown .select2-search {
      padding: 0;
    }

    .select2-container .select2-dropdown .select2-search input {
      outline: none !important;
      border: 1px solid #34495e !important;
      border-bottom: none !important;
      padding: 8px 12px !important;
    }

    .select2-container .select2-dropdown .select2-results {
      padding: 0;
    }

    .select2-container .select2-dropdown .select2-results ul {
      background: #fff;
      border: 1px solid #34495e;
    }

    .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
      background-color: #3498db;
    }
  </style>

  <style>
    .paginate_button {
      padding: 6px 12px;
      border: 1px solid #eaeff4
    }

   .dataTables_paginate .paginate_button .previous {
      border-radius: 7px 0 0 7px;
      background-color: #eaeff4
    }

   .dataTables_paginate .paginate_button.current {
      color: #fff;
      background-color: #5d87ff;
      border-color: #5d87ff
    }
  </style>

  <!-- Core Css -->
  <link id="themeColors" rel="stylesheet" href="{{asset('admin/package/dist/css/style.min.css')}}" />
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{asset('admin/package/dist/images/logos/favicon.ico')}}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{asset('admin/package/dist/images/logos/favicon.ico')}}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{route('dashboard')}}l" class="text-center fs-7 fw-6">
           Myopia
          </a>
          <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8 text-muted"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('dashboard')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-database"></i>
                </span>
                <span class="hide-menu">Master Data</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="{{route('category.index')}}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Category</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{route('subcategory.index')}}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Sub Category</span>
                  </a>
                </li>



              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-file-text"></i>
                </span>
                <span class="hide-menu">UMKM</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="{{route('umkm.index')}}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Data UMKM</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{route('approved.index')}}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Menunggu Persetujuan</span>
                  </a>
                </li>



              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('model.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-paper-bag"></i>
                </span>
                <span class="hide-menu">Models</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('template.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-template"></i>
                </span>
                <span class="hide-menu">Template Desain</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('history.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-history"></i>
                </span>
                <span class="hide-menu">History Design</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Halaman</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('customer.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-edit"></i>
                </span>
                <span class="hide-menu">Testimoni</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('contact.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-mailbox"></i>
                </span>
                <span class="hide-menu">Contact</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('mitra.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Mitra</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Account</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('account.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-circle"></i>
                </span>
                <span class="hide-menu">Profile Setting</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="asda" aria-expanded="false">
                <span>
                  <i class="ti ti-logout"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
          </ul>


        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
          <div class="hstack gap-3">
            <div class="john-img">
              <img src="{{asset('admin/package/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="40" height="40" alt="">
            </div>
            <div class="john-title">
              <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
              <span class="fs-2 text-dark">Designer</span>
            </div>
            <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
              <i class="ti ti-power fs-6"></i>
            </button>
          </div>
        </div>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>

    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="ti ti-search"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav quick-links d-none d-lg-flex">
          
            <li class="nav-item dropdown-hover d-none d-lg-block">
              <a class="nav-link" href="{{route('model.index')}}">Models</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
              <a class="nav-link" href="{{route('umkm.index')}}">Umkm</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
              <a class="nav-link" href="{{route('account.index')}}">Account</a>
            </li>
          </ul>
          <div class="d-block d-lg-none">
            <img src="admin/package/dist/images/logos/dark-logo.svg" class="dark-logo" width="180" alt="" />
            <img src="admin/package/dist/images/logos/light-logo.svg" class="light-logo" width="180" alt="" />
          </div>
          <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
              <i class="ti ti-dots fs-7"></i>
            </span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
              <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                <i class="ti ti-align-justified fs-7"></i>
              </a>
              <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                <li class="nav-item dropdown">
                  <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="admin/package/dist/images/svgs/icon-flag-en.svg" alt="" class="rounded-circle object-fit-cover round-20">
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                    <div class="message-body" data-simplebar>
                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                        <div class="position-relative">
                          <img src="admin/package/dist/images/svgs/icon-flag-en.svg" alt="" class="rounded-circle object-fit-cover round-20">
                        </div>
                        <p class="mb-0 fs-3">English (UK)</p>
                      </a>
                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                        <div class="position-relative">
                          <img src="admin/package/dist/images/svgs/icon-flag-cn.svg" alt="" class="rounded-circle object-fit-cover round-20">
                        </div>
                        <p class="mb-0 fs-3">中国人 (Chinese)</p>
                      </a>
                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                        <div class="position-relative">
                          <img src="admin/package/dist/images/svgs/icon-flag-fr.svg" alt="" class="rounded-circle object-fit-cover round-20">
                        </div>
                        <p class="mb-0 fs-3">français (French)</p>
                      </a>
                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                        <div class="position-relative">
                          <img src="admin/package/dist/images/svgs/icon-flag-sa.svg" alt="" class="rounded-circle object-fit-cover round-20">
                        </div>
                        <p class="mb-0 fs-3">عربي (Arabic)</p>
                      </a>
                    </div>
                  </div>
                </li>
              
                <li class="nav-item dropdown">
                  <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                  </a>
                  <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                    <div class="d-flex align-items-center justify-content-between py-3 px-7">
                      <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                      <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                    </div>
                    <div class="message-body" data-simplebar>
                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                        <span class="me-3">
                          <img src="{{asset('admin/package/dist/images/profile/user-1.jpg')}}" alt="user" class="rounded-circle" width="48" height="48" />
                        </span>
                        <div class="w-75 d-inline-block v-middle">
                          <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                          <span class="d-block">Congratulate him</span>
                        </div>
                      </a>
                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                        <span class="me-3">
                          <img src="admin/package/dist/images/profile/user-2.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                        </span>
                        <div class="w-75 d-inline-block v-middle">
                          <h6 class="mb-1 fw-semibold">New message</h6>
                          <span class="d-block">Salma sent you new message</span>
                        </div>
                      </a>
                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                        <span class="me-3">
                          <img src="admin/package/dist/images/profile/user-3.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                        </span>
                        <div class="w-75 d-inline-block v-middle">
                          <h6 class="mb-1 fw-semibold">Bianca sent payment</h6>
                          <span class="d-block">Check your earnings</span>
                        </div>
                      </a>
                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                        <span class="me-3">
                          <img src="admin/package/dist/images/profile/user-4.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                        </span>
                        <div class="w-75 d-inline-block v-middle">
                          <h6 class="mb-1 fw-semibold">Jolly completed tasks</h6>
                          <span class="d-block">Assign her new tasks</span>
                        </div>
                      </a>
                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                        <span class="me-3">
                          <img src="admin/package/dist/images/profile/user-5.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                        </span>
                        <div class="w-75 d-inline-block v-middle">
                          <h6 class="mb-1 fw-semibold">John received payment</h6>
                          <span class="d-block">$230 deducted from account</span>
                        </div>
                      </a>
                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                        <span class="me-3">
                          <img src="{{asset('admin/package/dist/images/profile/user-1.jpg')}}" alt="user" class="rounded-circle" width="48" height="48" />
                        </span>
                        <div class="w-75 d-inline-block v-middle">
                          <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                          <span class="d-block">Congratulate him</span>
                        </div>
                      </a>
                    </div>
                    <div class="py-6 px-7 mb-1">
                      <button class="btn btn-outline-primary w-100"> See All Notifications </button>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <div class="user-profile-img">
                        <img src="{{asset('admin/package/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="35" height="35" alt="" />
                      </div>
                    </div>
                  </a>
                  <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                    <div class="profile-dropdown position-relative" data-simplebar>
                      <div class="py-3 px-7 pb-0">
                        <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                      </div>
                      <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                        <img src="{{asset('admin/package/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="80" height="80" alt="" />
                        <div class="ms-3">
                          <h5 class="mb-1 fs-3">{{Auth::user()->name}}</h5>
                          <span class="mb-1 d-block text-dark">{{Auth::user()->role}}</span>
                          <p class="mb-0 d-flex text-dark align-items-center gap-2">
                            <i class="ti ti-mail fs-4"></i> {{Auth::user()->email}}
                          </p>
                        </div>
                      </div>
                      <div class="message-body">
                       
                      </div>
                      <div class="d-grid py-4 px-7 pt-8">
                        
                          <a href="#" class="btn btn-outline-primary" id="logoutButton">Log Out</a>

                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <div class="container-fluid">
      <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
              <div class="row align-items-center">
                <div class="col-9">
                  <h4 class="fw-semibold mb-8">Myopia</h4>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a class="text-muted" href="./index.html">Home</a></li>
                      <li class="breadcrumb-item" aria-current="page">Selamat Datang Di Admin Myopia</li>
                    </ol>
                  </nav>
                </div>
                <div class="col-3">
                  <div class="text-center mb-n5">  
                    <img src="{{asset('admin/package/dist/images/breadcrumb/ChatBc.png')}}" alt="" class="img-fluid mb-n4">
                  </div>
                </div>
              </div>
            </div>
          </div>
        @yield('content')
      </div>

    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>
  </div>
  <!--  Shopping Cart -->


  <!--  Mobilenavbar -->
  <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
    <nav class="sidebar-nav scroll-sidebar">
      <div class="offcanvas-header justify-content-between">
        <img src="{{asset('admin/package/dist/images/logos/favicon.ico')}}" alt="" class="img-fluid">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar="" data-simplebar>
        <ul id="sidebarnav">
          <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
              <span>
                <i class="ti ti-apps"></i>
              </span>
              <span class="hide-menu">Apps</span>
            </a>
            <ul aria-expanded="false" class="collapse first-level my-3">
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="admin/package/dist/images/svgs/icon-dd-chat.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                    <span class="fs-2 d-block fw-normal text-muted">New messages arrived</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="admin/package/dist/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                    <span class="fs-2 d-block fw-normal text-muted">Get latest invoice</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="admin/package/dist/images/svgs/icon-dd-mobile.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                    <span class="fs-2 d-block fw-normal text-muted">2 Unsaved Contacts</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="admin/package/dist/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Email App</h6>
                    <span class="fs-2 d-block fw-normal text-muted">Get new emails</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="admin/package/dist/images/svgs/icon-dd-cart.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                    <span class="fs-2 d-block fw-normal text-muted">learn more information</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="admin/package/dist/images/svgs/icon-dd-date.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                    <span class="fs-2 d-block fw-normal text-muted">Get dates</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="admin/package/dist/images/svgs/icon-dd-lifebuoy.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                    <span class="fs-2 d-block fw-normal text-muted">Add new contact</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="admin/package/dist/images/svgs/icon-dd-application.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                    <span class="fs-2 d-block fw-normal text-muted">To-do and Daily tasks</span>
                  </div>
                </a>
              </li>
              <ul class="px-8 mt-7 mb-4">
                <li class="sidebar-item mb-3">
                  <h5 class="fs-5 fw-semibold">Quick Links</h5>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">Pricing Page</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">Authentication Design</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">Register Now</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">404 Error Page</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">Notes App</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">User Application</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">Account Settings</a>
                </li>
              </ul>
            </ul>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="app-chat.html" aria-expanded="false">
              <span>
                <i class="ti ti-message-dots"></i>
              </span>
              <span class="hide-menu">Chat</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="app-calendar.html" aria-expanded="false">
              <span>
                <i class="ti ti-calendar"></i>
              </span>
              <span class="hide-menu">Calendar</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="app-email.html" aria-expanded="false">
              <span>
                <i class="ti ti-mail"></i>
              </span>
              <span class="hide-menu">Email</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <!--  Search Bar -->

  <!--  Customizer -->
  <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"></i>
  </button>
  <div class="offcanvas offcanvas-end customizer" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" data-simplebar="">
    <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
      <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
      <div class="theme-option pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Theme Option</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" onclick="toggleTheme('admin/package/dist/css/style.min.css')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
            <i class="ti ti-brightness-up fs-7 text-primary"></i>
            <span class="text-dark">Light</span>
          </a>
          <a href="javascript:void(0)" onclick="toggleTheme('admin/package/dist/css/style-dark.min.css')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
            <i class="ti ti-moon fs-7 "></i>
            <span class="text-dark">Dark</span>
          </a>
        </div>
      </div>
      <div class="theme-direction pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Theme Direction</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="./index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-text-direction-ltr fs-6 text-primary"></i>
            <span class="text-dark">LTR</span>
          </a>
          <a href="../rtl/index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-text-direction-rtl fs-6 text-dark"></i>
            <span class="text-dark">RTL</span>
          </a>
        </div>
      </div>
      <div class="theme-colors pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Theme Colors</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <ul class="list-unstyled mb-0 d-flex gap-3 flex-wrap change-colors">
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin1-bluetheme-primary active-theme " onclick="toggleTheme('admin/package/dist/css/style.min.css')" data-color="blue_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME"><i class="ti ti-check text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin2-aquatheme-primary " onclick="toggleTheme('admin/package/dist/css/style-aqua.min.css')" data-color="aqua_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin3-purpletheme-primary" onclick="toggleTheme('admin/package/dist/css/style-purple.min.css')" data-color="purple_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin4-greentheme-primary" onclick="toggleTheme('admin/package/dist/css/style-green.min.css')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin5-cyantheme-primary" onclick="toggleTheme('admin/package/dist/css/style-cyan.min.css')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin6-orangetheme-primary" onclick="toggleTheme('admin/package/dist/css/style-orange.min.css')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="layout-type pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Layout Type</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="./index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-layout-sidebar fs-6 text-primary"></i>
            <span class="text-dark">Vertical</span>
          </a>
          <a href="../horizontal/index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-layout-navbar fs-6 text-dark"></i>
            <span class="text-dark">Horizontal</span>
          </a>
        </div>
      </div>
      <div class="container-option pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Container Option</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 boxed-width text-dark">
            <i class="ti ti-layout-distribute-vertical fs-7 text-primary"></i>
            <span class="text-dark">Boxed</span>
          </a>
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 full-width text-dark">
            <i class="ti ti-layout-distribute-horizontal fs-7"></i>
            <span class="text-dark">Full</span>
          </a>
        </div>
      </div>
      <div class="sidebar-type pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Sidebar Type</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 fullsidebar">
            <i class="ti ti-layout-sidebar-right fs-7"></i>
            <span class="text-dark">Full</span>
          </a>
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center text-dark sidebartoggler gap-2">
            <i class="ti ti-layout-sidebar fs-7"></i>
            <span class="text-dark">Collapse</span>
          </a>
        </div>
      </div>
      <div class="card-with pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Card With</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 text-dark cardborder">
            <i class="ti ti-border-outer fs-7"></i>
            <span class="text-dark">Border</span>
          </a>
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 cardshadow">
            <i class="ti ti-border-none fs-7"></i>
            <span class="text-dark">Shadow</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--  Customizer -->
  <!--  Import Js Files -->
  @stack('js')

  <script src="{{asset('/admin/package/dist/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('/admin/package/dist/libs/simplebar/dist/simplebar.min.js')}}"></script>
  <script src="{{asset('/admin/package/dist/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('/admin/package/dist/js/datatable/datatable-basic.init.js')}}"></script>

  <script src="{{asset('/admin/package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!--  core files -->
  <script src="{{asset('/admin/package/dist/js/app.min.js')}}"></script>
  <script src="{{asset('/admin/package/dist/js/app.init.js')}}"></script>
  <script src="{{asset('/admin/package/dist/js/app-style-switcher.js')}}"></script>
  <script src="{{asset('/admin/package/dist/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('/admin/package/dist/js/custom.js')}}"></script>
  <!--  current page js files -->
  <script src="{{asset('/admin/package/dist/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
  <script src="{{asset('/admin/package/dist/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('/admin/package/dist/js/dashboard.js')}}"></script>
  <script>
    $(document).ready(function() {
      $('#logoutButton').on('click', function(e) {
        e.preventDefault();

        Swal.fire({
          title: 'Are you sure?',
          text: "You are about to log out.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, log out!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: `{{ route('logout') }}`,
              type: 'POST',
              data: {
                _token: '{{ csrf_token() }}'
              },
              success: function(response) {
                Swal.fire(
                  'Logged Out!',
                  'You have been logged out successfully.',
                  'success'
                ).then(() => {
                  window.location.href = '/';
                });
              },
              error: function(xhr) {
                Swal.fire(
                  'Error!',
                  'There was an error logging you out.',
                  'error'
                );
              }
            });
          }
        });
      });
    });
  </script>
</body>

</html>