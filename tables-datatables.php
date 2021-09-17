<?php 
  $conn = mysqli_connect("localhost","root","","test");

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
    <title>Elisyam - Datatables</title>
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
      type="b287473e9cda885496007abf-text/javascript"
    ></script>
    <script type="b287473e9cda885496007abf-text/javascript">
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
    <link rel="stylesheet" href="assets/css/datatables/datatables.min.css" />
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
              <li class="active">
                <a href="tables-datatables.php"
                  ><i class="la la-list"></i><span>Students List</span></a
                >
              </li>
              <li>
                <a href="pages-profile.php"
                  ><i class="la la-user"></i><span>Profile</span></a
                >
              </li>
            </ul>
          </nav>
        </div>

        <div class="content-inner">
          <div class="container-fluid">
            <div class="row">
              <div class="page-header">
                <div class="d-flex align-items-center">
                  <h2 class="page-header-title">Datatables</h2>
                  <div>
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="db-default.html"><i class="ti ti-home"></i></a>
                      </li>
                      <li class="breadcrumb-item active">Datatables</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xl-12">
                <div class="widget has-shadow">
                  <div
                    class="widget-header bordered no-actions d-flex align-items-center"
                  >
                    <h4>Export</h4>
                  </div>
                  <div class="widget-body">
                    <div class="table-responsive">
                      <?php
                      $sqlSelect = "SELECT * FROM students ORDER BY student_id DESC";
                      $result = mysqli_query($conn, $sqlSelect);

                      if (mysqli_num_rows($result) >
                      0) {
                         ?>
                      <table id="export-table" class="table mb-0">
                        <thead>
                          <tr>
                            <!-- <th>Order ID</th> -->
                            <th>Student Name</th>
                            <th>Reg Number</th>
                            <th>Gender</th>
                            <th>Department</th>
                            <th>Faculty</th>
                            <th>Degree</th>
                            <!-- <th>Country</th>
                            <th>Ship Date</th>
                            <th><span style="width: 100px">Status</span></th>
                            <th>Order Total</th> -->
                            <th class="no-print">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tr>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['reg_number']; ?></td>
                            <td>
                              <?php echo $row['gender'] == 1?'male':'female'?>
                            </td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['faculty']; ?></td>
                            <td><?php echo $row['degree']; ?></td>
                            <td class="td-actions" style="text-align: center">
                              <a
                                href="transcript.php?s_id=<?php echo $row['reg_number'];?>"
                                ><i
                                  class="la la-eye edit"
                                ></i
                              ></a>
                              <!-- <a href="#"><i class="la la-close delete"></i></a> -->
                            </td>
                          </tr>
                          <?php
                          }
                        ?>
                        </tbody>
                      </table>
                      <?php
                        }
                      ?>
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

    <script
      src="assets/vendors/js/base/jquery.min.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/base/core.min.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>

    <script
      src="assets/vendors/js/datatables/datatables.min.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/datatables/dataTables.buttons.min.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/datatables/jszip.min.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/datatables/buttons.html5.min.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/datatables/pdfmake.min.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/datatables/vfs_fonts.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/datatables/buttons.print.min.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/nicescroll/nicescroll.min.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/app/app.min.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>

    <script
      src="assets/js/components/tables/tables.js"
      type="b287473e9cda885496007abf-text/javascript"
    ></script>

    <script
      src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js"
      data-cf-settings="b287473e9cda885496007abf-|49"
      defer=""
    ></script>
  </body>
</html>
