<?php
  session_start();


  if(!isset($_SESSION['username'] )){
  
    header("Location: index.php");
  }

  if (isset($_POST['password-btn'])) {
    echo 'interesting';
  }
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Elisyam - Profile</title>
    <meta
      name="description"
      content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4"
    />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <script
      src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"
      type="066af96c48bf10436a43bd52-text/javascript"
    ></script>
    <script type="066af96c48bf10436a43bd52-text/javascript">
      WebFont.load({
        google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>

    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="assets/img/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="assets/img/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="assets/img/favicon-16x16.png"
    />

    <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css" />
    <link
      rel="stylesheet"
      href="assets/css/owl-carousel/owl.carousel.min.css"
    />
    <link rel="stylesheet" href="assets/css/owl-carousel/owl.theme.min.css" />
    <style>
      .default-sidebar > .side-navbar ul a {
        color: #fff;
      } 
      .default-sidebar>.side-navbar a i {
        color: #fff;
      }
    </style>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
  </head>
  <body id="page-top">
    <div id="preloader">
      <div class="canvas">
        <img src="assets/img/logo.png" alt="logo" class="loader-logo" />
        <div class="spinner"></div>
      </div>
    </div>

    <div class="page">
      <header class="header">
        <nav class="navbar fixed-top">
          <div class="search-box">
            <button class="dismiss"><i class="ion-close-round"></i></button>
            <form id="searchForm" action="#" role="search">
              <input
                type="search"
                placeholder="Search something ..."
                class="form-control"
              />
            </form>
          </div>

          <div
            class="navbar-holder d-flex align-items-center align-middle justify-content-between"
          >
            <div class="navbar-header">
              <a href="db-default.html" class="navbar-brand">
                <div class="brand-image brand-big">
                  <img
                    src="assets/img/logo-big.png"
                    alt="logo"
                    class="logo-big"
                  />
                </div>
                <div class="brand-image brand-small">
                  <img
                    src="assets/img/logo.png"
                    alt="logo"
                    class="logo-small"
                  />
                </div>
              </a>

              <a id="toggle-btn" href="#" class="menu-btn active">
                <span></span>
                <span></span>
                <span></span>
              </a>
            </div>

            <ul
              class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right"
            >
              <li class="nav-item d-flex align-items-center">
                <a id="search" href="#"><i class="la la-search"></i></a>
              </li>

              <li class="nav-item dropdown">
                <a
                  id="user"
                  rel="nofollow"
                  data-target="#"
                  href="#"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  class="nav-link"
                  ><img
                    src="assets/img/avatar/avatar-01.jpg"
                    alt="..."
                    class="avatar rounded-circle"
                /></a>
                <ul aria-labelledby="user" class="user-size dropdown-menu">
                  <li class="welcome">
                    <a href="#" class="edit-profil"
                      ><i class="la la-gear"></i
                    ></a>
                    <img
                      src="assets/img/avatar/avatar-01.jpg"
                      alt="..."
                      class="rounded-circle"
                    />
                  </li>
                  <li>
                    <a href="pages-profile.php" class="dropdown-item">
                      Profile
                    </a>
                  </li>
                  <li>
                    <a href="app-mail.html" class="dropdown-item"> Messages </a>
                  </li>
                  <li>
                    <a href="#" class="dropdown-item no-padding-bottom">
                      Settings
                    </a>
                  </li>
                  <li class="separator"></li>
                  <li>
                    <a
                      href="pages-faq.html"
                      class="dropdown-item no-padding-top"
                    >
                      Faq
                    </a>
                  </li>
                  <li>
                    <a
                      rel="nofollow"
                      href="include/logOut.php"
                      class="dropdown-item logout text-center"
                      ><i class="ti-power-off"></i
                    ></a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <div class="page-content d-flex align-items-stretch">
        <div class="default-sidebar" style="background: #499644;">
          <nav class="side-navbar box-scroll sidebar-scroll">
            <ul class="list-unstyled">
              <li>
                <a href="dashboard.php"
                  ><i class="la la-columns"></i><span>Dashboard</span></a
                >
              </li>
              <li>
                <a href="upload-user.php"
                  ><i class="la la-upload"></i><span>Upload</span></a
                >
              </li>
              <li>
                <a href="tables-datatables.php"
                  ><i class="la la-list"></i><span>Students List</span></a
                >
              </li>
              <li class="active">
                <a href="pages-profile.php"
                  ><i class="la la-user"></i><span>Profile</span></a
                >
              </li>
            </ul>
          </nav>
        </div>

        <div class="content-inner profile">
          <div class="container-fluid">
            <div class="row">
              <div class="page-header">
                <div class="d-flex align-items-center">
                  <h2 class="page-header-title">Profile</h2>
                  <div>
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="db-default.html"><i class="ti ti-home"></i></a>
                      </li>
                      <li class="breadcrumb-item"><a href="#">Pages</a></li>
                      <li class="breadcrumb-item active">Profile</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row flex-row">
              <div class="col-xl-3">
                <div class="widget has-shadow">
                  <div class="widget-body">
                    <div class="mt-5">
                      <img
                        src="assets/img/avatar/avatar-01.jpg"
                        alt="..."
                        style="width: 120px"
                        class="avatar rounded-circle d-block mx-auto"
                      />
                    </div>
                    <h3 class="text-center mt-3 mb-1">David Green</h3>
                    <p class="text-center">dgreen@example.com</p>
                    <div class="em-separator separator-dashed"></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9">
                <div class="widget has-shadow">
                  <div
                    class="widget-header bordered no-actions d-flex align-items-center"
                  >
                    <h4>Update Profile</h4>
                  </div>
                  <div class="widget-body">
                    <form class="form-horizontal">
                      <div
                        class="form-group row d-flex align-items-center mb-5"
                      >
                        <label
                          class="col-lg-2 form-control-label d-flex justify-content-lg-end"
                          >Full Name</label
                        >
                        <div class="col-lg-6">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="David Green"
                          />
                        </div>
                      </div>
                      <div
                        class="form-group row d-flex align-items-center mb-5"
                      >
                        <label
                          class="col-lg-2 form-control-label d-flex justify-content-lg-end"
                          >Email</label
                        >
                        <div class="col-lg-6">
                          <input
                            type="text"
                            class="form-control"
                            value="dgreen@mail.com"
                            readonly
                          />
                        </div>
                      </div>
                      <div
                        class="form-group row d-flex align-items-center mb-5"
                      >
                        <label
                          class="col-lg-2 form-control-label d-flex justify-content-lg-end"
                          >Phone</label
                        >
                        <div class="col-lg-6">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="+00 987 654 32"
                          />
                        </div>
                       
                      </div>

                      <div class="em-separator separator-dashed"></div>
                      <div class="row d-flex justify-content-between px-3">
                        <button
                          class="btn btn-gradient-01"
                          data-toggle="modal"
                          data-target="#modal-centered"
                          type="reset"
                        >
                          Change Password
                        </button>
                        <button class="btn btn-shadow">
                          Save Changes
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <footer class="main-footer">
            <div class="row">
              <div
                class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center"
              >
                <p class="text-gradient-02">Design By Saerox</p>
              </div>
              <div
                class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center"
              >
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" href="documentation.html"
                      >Documentation</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="changelog.html">Changelog</a>
                  </li>
                </ul>
              </div>
            </div>
          </footer> -->
          <div id="modal-centered" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Password</h4>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">close</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" method="POST">
                    <div class="form-group row d-flex align-items-center mb-5">
                      <label
                        class="col-lg-5 form-control-label d-flex justify-content-lg-end"
                        >Old Password</label
                      >
                      <div class="col-lg-6">
                        <input
                          type="password"
                          class="form-control"
                          placeholder="old password"
                        />
                      </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                      <label
                        class="col-lg-5 form-control-label d-flex justify-content-lg-end"
                        >New Password</label
                      >
                      <div class="col-lg-6">
                        <input
                          type="password"
                          class="form-control"
                          placeholder="new password"
                        />
                      </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                      <label
                        class="col-lg-5 form-control-label d-flex justify-content-lg-end"
                        >Confirm New Password</label
                      >
                      <div class="col-lg-6">
                        <input
                          type="password"
                          placeholder="confirm new password"
                          class="form-control"
                          placeholder="+00 987 654 32"
                        />
                      </div>
                    </div>
                    <!-- <button
                        type="button"
                        class="btn btn-shadow"
                        data-dismiss="modal"
                      >
                        Close
                      </button> -->
                    <div class="d-flex justify-content-end">
                      <button type="submit" name="password-btn" class="btn btn-primary">
                        Save
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
          </div>
        </div>
      </div>
    </div>
    <script
      src="assets/vendors/js/base/jquery.min.js"
      type="066af96c48bf10436a43bd52-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/base/core.min.js"
      type="066af96c48bf10436a43bd52-text/javascript"
    ></script>

    <script
      src="assets/vendors/js/nicescroll/nicescroll.min.js"
      type="066af96c48bf10436a43bd52-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/owl-carousel/owl.carousel.min.js"
      type="066af96c48bf10436a43bd52-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/app/app.min.js"
      type="066af96c48bf10436a43bd52-text/javascript"
    ></script>

    <script
      src="assets/js/app/contact/contact.min.js"
      type="066af96c48bf10436a43bd52-text/javascript"
    ></script>

    <script
      src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js"
      data-cf-settings="066af96c48bf10436a43bd52-|49"
      defer=""
    ></script>
  </body>
</html>
