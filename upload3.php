<?php
/*
* Supported File Formats: .XLS | .XLS | .CSV  (Excel 1997-2007)
* 
* Table structure:
* +---------+-----------+------------+
* |   id    |   name    |    email   |
* +---------+-----------+------------+
* | int(11) | char(250) | char(300)  |
* +----+----+-----------+------------+
* #3c763d
* #0cb313b3
*/

$connect = mysqli_connect("localhost", "root", "", "test");
$output = '';
if(isset($_POST["import"]))
{
@ $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file

  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Data Added: </label><br /><table class='table table-bordered'>";
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
    $grade_point = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
    $course_level = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
    $course_semester = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());

    // All strings to lowercase
    $full_name       = strtolower($full_name);
    $gender          = strtolower($gender);
    $department      = strtolower($department);
    $faculty         = strtolower($faculty);
    $course_title    = strtolower($course_title);
    $grade           = strtolower($grade);
    $course_semester = strtolower($course_semester);
    $dob = date_create($dob);
    $dob =  date_format($dob,"Y-m-d");

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
      $output .= "<tr>";
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
  $output .= '</table>';
  $target_dir = "uploads/"; //file upload folder
  $target_file = $target_dir .time().basename($_FILES["excel"]["name"]); // target file to be uploaded

  //upload the file
  if (move_uploaded_file($_FILES["excel"]["tmp_name"], $target_file)) {
       $fileUploadMsg= "<label class='text-success'>The file has been uploaded Successfully!</label><br>";
    } else {
       $fileUploadMsg= '<label class="text-danger">Sorry, there was an error uploading your file!</label><br>';
    }

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>

<html>
 <head>
  <title>PHP Excel Importer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color: #0cb313b3;
  }
  .box
  {
   width:700px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  input[type="file"]{
    border:1px solid gray;
  }
  
  </style>
 </head>
 <body>
  <div class="container box">
   <form method="post" enctype="multipart/form-data">
    <div class="container-fluid">
      <h3 align="center" class="text-success" style="font-weight:600;">Excel to Mysql Importer</h3><br />
      <div class="row" style="margin-bottom:20px">
        <div class="col-md-4 col-xs-4 col-sm-4"></div>  <!-- Blank Div -->
        <div class="col-md-4 ">
          <img src="img/excel.png" height="150px" width="150px">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <label>Select Excel File*</label>
        </div>
        <div class="col-xs-6 col-md-5 col-sm-6 col-lg-5">
            <input type="file" name="excel" />
        </div>
        <div class="col-xs-7 col-md-7 col-sm-6 col-lg-7">
            <input type="submit" name="import" class="btn btn-info" value="Import" style="padding:2px 20px;"/>
        </div>
      </div>
  </div>
   </form>
   <br />
   <br />
   <?php
      echo $output;
      echo @$fileUploadMsg;
      echo "<hr/>
			<p style='float:left'>* Supported Formats: .xls | .xlsx | .csv</p>
			<p style='float:right'><a href='export.php'>Exporter &#8594;</a></p>";
      mysqli_close($connect);
   ?>
  </div>
 </body>
</html>


