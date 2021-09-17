<?php
session_start();


if(!isset($_SESSION['username'] )){

  header("Location: index.php");
}

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Elisyam - Dashboard</title>
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
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>
    <script type="cd21e38ad2e7f19e9060b801-text/javascript">
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
    <link rel="stylesheet" href="./assets/css/custom/style.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
    <style>
      .default-sidebar > .side-navbar ul a {
        color: #fff;
      } 
      .default-sidebar>.side-navbar a i {
        color: #fff;
      }
    </style>
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
                    src="./abupix.png"
                    alt="logo"
                    class="logo-big"
                    style=" width: 50px"
                  />
                </div>
                <div class="brand-image brand-small">
                  <img
                    src="./abupix.png"
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
              <li class="active">
                <a href="dashboard.php"
                  ><i class="la la-columns"></i><span>Dashboard</span></a
                >
              </li>
              <li>
                <a href="upload-user.php"><i class="la la-upload"></i><span>Upload</span></a>
              </li>
              <li>
                <a href="tables-datatables.php"
                  ><i class="la la-list"></i><span>Students List</span></a
                >
              </li>
              <li>
                <a href="pages-profile.php"
                  ><i class="la la-user"></i><span>Profile</span></a
                >
              </li>
          </nav>
        </div>

        <div class="content-inner">
          <div class="container-fluid">
            <div class="row">
              <div class="page-header">
                <div class="d-flex align-items-center">
                  <h2 class="page-header-title">Dashboard</h2>
                  <?php echo   $_SESSION['username']; ?>
                </div>
              </div>
            </div>

            <div class="row flex-row">
              <div class="col-xl-4 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                  <div class="widget-body">
                    <div class="media">
                      <div class="align-self-center ml-5 mr-5">
                        <i class="ion-social-facebook text-facebook"></i>
                      </div>
                      <div class="media-body align-self-center">
                        <div class="title text-facebook">David Green</div>
                        <div class="number">10,865 Likes</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-4 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                  <div class="widget-body">
                    <div class="media">
                      <div class="align-self-center ml-5 mr-5">
                        <i class="ion-social-twitter text-twitter"></i>
                      </div>
                      <div class="media-body align-self-center">
                        <div class="title text-twitter">@David_Green</div>
                        <div class="number">8,986 Followers</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-4 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                  <div class="widget-body">
                    <div class="media">
                      <div class="align-self-center ml-5 mr-5">
                        <i
                          class="ion-social-linkedin-outline text-linkedin"
                        ></i>
                      </div>
                      <div class="media-body align-self-center">
                        <div class="title text-linkedin">@David_Green</div>
                        <div class="number">3,654 Followers</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row flex-row">
              <div class="col-xl-12 col-md-6">
                <div class="widget widget-09 has-shadow">
                  <div class="widget-body">
                    <div class="row">
                      <div
                        class="col-xl-2 col-12 d-flex flex-column my-auto no-padding text-center"
                      >
                        <div class="new-orders">
                          <div class="title">New Orders</div>
                          <div class="circle-orders">
                            <div class="percent-orders"></div>
                          </div>
                        </div>
                        <div class="some-stats mt-5">
                          <div class="title">Total Delivered</div>
                          <div class="number text-blue">856</div>
                        </div>
                        <div class="some-stats mt-3">
                          <div class="title">Total Estimated</div>
                          <div class="number text-blue">297</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
        </div>
      </div>
    </div>

    <div id="delay-modal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body text-center">
            <div class="sa-icon sa-success animate" style="display: block">
              <span class="sa-line sa-tip animateSuccessTip"></span>
              <span class="sa-line sa-long animateSuccessLong"></span>
              <div class="sa-placeholder"></div>
              <div class="sa-fix"></div>
            </div>
            <div class="section-title mt-5 mb-5">
              <h2 class="text-dark">Meeting successfully created</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="modal-view-event" class="modal modal-top fade calendar-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title event-title"></h4>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">close</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="media">
              <div class="media-left align-self-center mr-3">
                <div class="event-icon"></div>
              </div>
              <div class="media-body align-self-center mt-3 mb-3">
                <div class="event-body"></div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <script
      src="assets/vendors/js/base/jquery.min.js"
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/base/core.min.js"
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>

    <script
      src="assets/vendors/js/nicescroll/nicescroll.min.js"
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/chart/chart.min.js"
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/progress/circle-progress.min.js"
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/calendar/moment.min.js"
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/calendar/fullcalendar.min.js"
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/owl-carousel/owl.carousel.min.js"
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/app/app.js"
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>

    <script
      src="assets/js/dashboard/db-default.min.js"
      type="cd21e38ad2e7f19e9060b801-text/javascript"
    ></script>

    <script
      src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js"
      data-cf-settings="cd21e38ad2e7f19e9060b801-|49"
      defer=""
    ></script>
  </body>
</html>
