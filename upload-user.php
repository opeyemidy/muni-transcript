<?php
$connect = mysqli_connect("localhost", "root", "", "test");
// $output = '';
session_start();
if(!isset($_SESSION['username'] )){
  header("Location: index.php");
}


if(isset($_POST["import"]))
{
@ $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file

  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
	$type = "alert alert-success"; $message = "Data Added";
  //$output .= "<label class='text-success'>Data Added: </label><br /><table class='table table-bordered'>";
  $insertion = true;
  $the_user_email = null;

  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $full_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $reg_number = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $dob = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $gender = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $department = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $faculty = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $year_entered = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $year_graduated = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
    $degree = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
    $course_code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
    $course_title = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
    $credit_unit = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
    $grade = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
    // $grade_point = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
    $course_level = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
    $course_semester = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());

    // All strings to lowercase
    $full_name       = strtolower($full_name);
    $gender          = strtolower($gender);
    $department      = strtolower($department);
    $faculty         = strtolower($faculty);
    $course_title    = strtolower($course_title);
    $grade           = strtolower($grade);
    $course_semester = strtolower($course_semester);
    $degree = strtolower($degree);
    // $dob = date_create($dob);
    // $dob =  date_format($dob,"Y-m-d");
    
    $grade_point = 0;

    switch ($grade) {
      case 'a':
        $grade_point = $credit_unit * 5;
        break;
        case 'b':
          $grade_point = $credit_unit * 4;
        break;
        case 'c':
          $grade_point = $credit_unit * 3;
        break;
        case 'd':
          $grade_point = $credit_unit * 2;
        break;
        case 'e':
          $grade_point = $credit_unit * 1;
        break;
      
      default:
        # code...
        break;
    }

    if ($gender === 'male') {
      $gender = 1;
    } else {
      $gender = 0;
    }

    if ($course_semester === 'first') {
      $course_semester = 1;
    } else {
      $course_semester = 2;
    }

    if(!empty($full_name) && !empty($reg_number)) // if none of the data are empty
    {
      // $output .= "<tr>";
      $details_query = "SELECT * FROM students WHERE reg_number = '$reg_number'";
  $student_details = mysqli_query($connect, $details_query);
  if (mysqli_num_rows($student_details) == 0) { 
        $query = "INSERT INTO students(full_name,reg_number,dob,gender,department,faculty,year_entered,year_graduated,degree) VALUES ('".$full_name."', '".$reg_number."', '".$dob."', '".$gender."', '".$department."', '".$faculty."', '".$year_entered."', '".$year_graduated."', '".$degree."')";
        mysqli_query($connect, $query);
  }
      // }
      // $output .= '<td>'.$name.'</td>';
      // $output .= '<td>'.$email.'</td>';
      // $output .= '</tr>';
    }
    // $sqlSelect = "SELECT excel_id FROM tbl_excel WHERE excel_email = '".$email."'";
    //   $result = mysqli_query($connect, $sqlSelect);
    //   if (mysqli_num_rows($result) > 0)
    //     {
    //       $row = mysqli_fetch_array($result);
    //       $the_user_id = $row['excel_id'];
    //     }
    if ($insertion) {
      $the_user_reg_number = $reg_number;
      $insertion = false;
    }
    if (!empty($course_code) && !empty($grade)) {
  $course_query = "SELECT * FROM grade WHERE student_id = '$the_user_reg_number' AND course_code = '$course_code'";
  $course_details = mysqli_query($connect, $course_query);
  if (mysqli_num_rows($course_details) == 0) { 
    $query = "INSERT INTO grade(course_code, course_title,credit_unit,grade,grade_point,course_level,course_semester,student_id) VALUES ('".$course_code."','".$course_title."','".$credit_unit."','".$grade."','".$grade_point."','".$course_level."','".$course_semester."','".$the_user_reg_number."')";
    mysqli_query($connect, $query);
  } 
    }

   }
  } 
  // $output .= '</table>';
  $target_dir = "uploads/"; //file upload folder
  $target_file = $target_dir .time().basename($_FILES["excel"]["name"]); // target file to be uploaded

  //upload the file
  if (move_uploaded_file($_FILES["excel"]["tmp_name"], $target_file)) {
       $fileUploadMsg= "<label class='text-success'>The file has been uploaded Successfully!</label><br>";
       $activateModal = true;
    } else {
    $type = "alert alert-danger"; $message = "Sorry, there was an error uploading your file!";
      // $fileUploadMsg= '<label class="text-danger">Sorry, there was an error uploading your file!</label><br>';
    }

 } else {
     $type = "alert alert-danger"; $message = "Invalid File Type. Upload Excel File.";
 }
 
}

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Elisyam - Blank Page</title>
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
      type="ca53b93569d991d19caa1d53-text/javascript"
    ></script>
    <script type="ca53b93569d991d19caa1d53-text/javascript">
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
    <link rel="stylesheet" href="assets/custom-inputs/css/demo.css" />
    <link rel="stylesheet" href="assets/custom-inputs/css/component.css" />
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
              <li class="active">
                <a href="upload-user.php"
                  ><i class="la la-upload"></i><span>Upload</span></a
                >
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
            </ul>
          </nav>
        </div>

        <div class="content-inner">
          <div class="container-fluid">
            <div class="row">
              <div class="page-header">
                <div class="d-flex align-items-center">
                  <h2 class="page-header-title">Blank Page</h2>
                  <div>
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="db-all.html"><i class="ti ti-home"></i></a>
                      </li>
                      <li class="breadcrumb-item active">Blank</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row flex-row">
              <div class="col-xl-12 col-12">
                <div class="widget has-shadow">
                  <div class="widget-body">
                    <!-- <p class="text-primary mt-2 mb-2">Play with Elisyam</p> -->
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="js d-flex">
                        <input
                          type="file"
                          name="excel"
                          id="file-5"
                          class="inputfile inputfile-4"
                          data-multiple-caption="{count} files selected"
                          multiple
                          required
                        />
                        <label for="file-5" style="margin: 0 auto"
                          ><figure>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="20"
                              height="17"
                              viewBox="0 0 20 17"
                            >
                              <path
                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"
                              />
                            </svg>
                          </figure>
                          <span>Choose a file&hellip;</span>
                          <div class="text-center">
                            <button
                              type="submit"
                              name="import"
                              class="btn btn-gradient-05 mr-1 mb-2"
                              data-toggle="modal"
                              data-target="#delay-modal"
                            >
                              Upload file
                            </button>
                            <!-- <button
                          type="button"
                          class="btn btn-gradient-01"
                          data-toggle="modal"
                          data-target="#delay-modal"
                        >
                          Launch Modal
                        </button> -->
                          </div>
                        </label>
                      </div>
                    </form>
                    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
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
      type="ca53b93569d991d19caa1d53-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/base/core.min.js"
      type="ca53b93569d991d19caa1d53-text/javascript"
    ></script>

    <script
      src="assets/vendors/js/nicescroll/nicescroll.min.js"
      type="ca53b93569d991d19caa1d53-text/javascript"
    ></script>
    <script
      src="assets/vendors/js/app/app.min.js"
      type="ca53b93569d991d19caa1d53-text/javascript"
    ></script>

    <script
      src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js"
      data-cf-settings="ca53b93569d991d19caa1d53-|49"
      defer=""
    ></script>
    <script src="./assets/custom-inputs/js/custom-file-input.js"></script>
  </body>
</html>


