<?php
  $computed_cgp_1_1 = 0; 
  $computed_cgp_1_2 = 0;
  $computed_cgp_2_1 = 0;
  $computed_cgp_2_2 = 0;
  $computed_cgp_3_1 = 0;
  $computed_cgp_3_2 = 0;
  $computed_cgp_4_1 = 0;
  $computed_cgp_4_2 = 0;
  $computed_cgp_5_1 = 0;
  $computed_cgp_5_2 = 0;

  $total_points_1_1 = 0; 
  $total_points_1_2 = 0;
  $total_points_2_1 = 0;
  $total_points_2_2 = 0;
  $total_points_3_1 = 0;
  $total_points_3_2 = 0;
  $total_points_4_1 = 0;
  $total_points_4_2 = 0;
  $total_points_5_1 = 0;
  $total_points_5_2 = 0;

  $total_units_1_1 = 0; 
  $total_units_1_2 = 0;
  $total_units_2_1 = 0;
  $total_units_2_2 = 0;
  $total_units_3_1 = 0;
  $total_units_3_2 = 0;
  $total_units_4_1 = 0;
  $total_units_4_2 = 0;
  $total_units_5_1 = 0;
  $total_units_5_2 = 0;

  $total_units_passed_1_1 = 0; 
  $total_units_passed_1_2 = 0;
  $total_units_passed_2_1 = 0;
  $total_units_passed_2_2 = 0;
  $total_units_passed_3_1 = 0;
  $total_units_passed_3_2 = 0;
  $total_units_passed_4_1 = 0;
  $total_units_passed_4_2 = 0;
  $total_units_passed_5_1 = 0;
  $total_units_passed_5_2 = 0;
  $conn = mysqli_connect("localhost","root","","test");
  function confirmQuery($result) {
    global $conn;
    if($result) {
    } else {
      // header("Location: index.php");
      die("QUERY FAILD" . mysqli_error($conn));
    }
    
  }
  if(isset($_GET['s_id']) && !empty($_GET['s_id'])) {
      
    $the_student_id = mysqli_real_escape_string($conn, $_GET['s_id']);
    function resultQuery($level, $semester){
      global $the_student_id;
      return "SELECT `course_code`,`course_title`,`credit_unit`,`grade`,`grade_point`, `course_level`,`course_semester` FROM `grade` WHERE student_id = '$the_student_id' AND course_level = '$level' AND course_semester = '$semester'";
    }
    // function gradeQuery($level, $semester){
    //   global $the_student_id;
    //   return "SELECT `course_code`,`course_title`,`credit_unit`,`grade`,`grade_point` FROM `grade` WHERE student_id = '$the_student_id' AND course_level = '$level' AND course_semester = '$semester'";
    // }
    $details_query = "SELECT * FROM students WHERE reg_number = '$the_student_id'";
    $student_details = mysqli_query($conn, $details_query);
    confirmQuery($student_details);
    if (mysqli_num_rows($student_details) > 0) { 
      $student_data = mysqli_fetch_array($student_details); 
    } else {
      header("Location: index.php"); 
    } 
  } else { 
    header("Location: index.php"); 
  } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      * {
        box-sizing: border-box;
        margin: 0;
        text-transform: uppercase;
      }
      div.wrapper {
        margin: 0 auto;
        max-width: 1200px;
        padding: 16px;
      }
      div.header {
        /* display: flex; */
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 16px;
      }
      div.header-content h1 {
        font-weight: 100;
        font-size: 20px;
        margin: 5px 0;
      }
      div.header-content h6 {
        margin: 0;
      }
      div.confidential {
        width: 200px;
        height: 60px;
        background-color: rgb(77, 73, 73);
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: flex-end;
      }
      div.student-info div {
        display: flex;
        margin-bottom: 10px;
        font-size: 13px;
        flex: 1 1 0;
      }
      div.student-info div div.field {
        border-bottom: 1px solid #000;
        height: 20px;
        justify-content: center;
        font-size: 20px;
        padding-bottom: 20px;
      }
      div.student-info {
        text-transform: uppercase;
      }
      div.student-info div h3:not(:first-child) {
        margin: 0 5px;
      }
      div.result-wrapper {
        margin-bottom: 16px;
      }
      div.semester-result {
        display: flex;
        justify-content: space-between;
      }
      div.semester-result div span {
        margin-right: 10px;
      }
      table,
      table tr th,
      table tr td {
        page-break-inside: avoid;
      }
      table.result-table {
        width: 100%;
        text-align: center;
      }
      table.result-table,
      table.result-table th {
        border: 1px solid #000;
        border-collapse: collapse;
        font-size: 12px;
      }
      table.result-table thead tr:first-child th {
        border: 1px solid transparent;
        border-bottom: 1px solid;
      }
      table.result-table tbody tr td {
        border-left: 1px solid #000;
        border-right: 1px solid #000;
        font-size: 10px;
      }
      table.result-table tfoot tr td {
        border-top: 1px solid #000;
        padding: 0 16px;
        font-weight: bold;
        background-color: #777171;
      }
      table.result-table tfoot tr td div:first-child {
        float: left;
      }
      table.result-table tfoot tr td div:last-child {
        float: right;
      }
      table.result-table tfoot tr td div span {
        margin-right: 5px;
      }
      div.accumulated {
        display: flex;
        justify-content: space-between;
      }
      div.accumulated table {
        width: 500px;
        border-collapse: collapse;
        font-size: 12px;
        text-align: center;
        font-weight: bold;
      }
      div.accumulated table tr:first-child td {
        border: 1px solid #000;
      }
      div.accumulated table tr:not(:first-child) td {
        text-transform: capitalize;
      }
      .text-uppercase {
        text-transform: uppercase;
      }
      .text-capitalize {
        text-transform: capitalize;
      }
      .summary-title {
        font-weight: bold;
      }
      .signature-left {
        border-top: 1px solid;
        width: 220px;
        text-align: center;
        margin-top: 70px;
        float: left;
      }
      .signature-right {
        border-top: 1px solid;
        width: 304px;
        text-align: center;
        margin-top: 70px;
        float: right;
      }
      .container-signature {
        width: 100%;
        padding: 30px;
      }
      .boxed-left {
        border: 2px solid black;
        width: 11em;
        float: left;
        padding: 15px;
        margin: 10px;
        height: 5em;
        text-align: center;
      }
      .boxed-right {
        border: 2px solid black;
        width: 11em;
        float: left;
        padding: 15px;
        margin: 10px;
        height: 5em;
        text-align: center;
      }
      .grade-section {
        width: 100%;
        padding: 5px;
        display: inline-block;
      }
      .header3 {
        margin: 10px;
      }
      .header {
        word-spacing: 10px;
        letter-spacing: 0px;
      }
      .grade-section thead tr th {
        padding: 10px;
        text-align: justify;
      }
      .grade-section2 tr td {
        padding: 5px;
        text-align: center;
      }
      .section2 {
        margin-bottom: 20px;
      }
      .section2-grade tr td {
        margin: 10px;
        padding: 5px;
        word-spacing: 10px;
      }
      .grade-section-2 {
        margin-left: 10em;
        margin-top: 2em;
      }

      @media print {
        .page-break {
          page-break-after: always;
        }

        /* a {
          page-break-inside: avoid;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
          page-break-before: always;
        }

        table,
        figure {
          page-break-inside: avoid;
        } */
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="page-break">
        <div class="header">
          <div class="header-logo">
            <img src="https://www.abu.edu.ng/images/logo.png" alt="" />
          </div>
          <div class="header-content">
            <h1>(office of the registrar)</h1>
            <h1 style="margin-bottom: 0">transcript of academic record</h1>
            <h6>(for external use only)</h6>
            <div class="confidential">Confidential</div>
          </div>
        </div>
        <div class="student-info">
          <div>
            <h3>name in full(surname first)</h3>
            <div class="field"><?php echo $student_data['full_name']?></div>
          </div>
          <div>
            <h3>student number</h3>
            <div class="field"><?php echo $student_data['reg_number']?></div>
            <h3>date of birth</h3>
            <div class="field"><?php echo $student_data['dob']?></div>
            <h3>sex</h3>
            <div class="field">
              <?php echo $student_data['gender'] == 1?'male':'female'?>
            </div>
          </div>
          <div>
            <h3>dates in this university (entered)</h3>
            <div class="field"><?php echo $student_data['year_entered']?></div>
            <h3>(left)</h3>
            <div class="field">
              <?php echo $student_data['year_graduated']?>
            </div>
          </div>
          <div>
            <h3>faculty</h3>
            <div class="field"><?php echo $student_data['faculty']?></div>
          </div>
          <div>
            <h3>department</h3>
            <div class="field"><?php echo $student_data['department']?></div>
          </div>
          <div>
            <h3>course/specialization</h3>
            <div class="field"></div>
            <h3>m.b.b.s</h3>
            <div class="field"></div>
          </div>
          <div>
            <h3>degree/diploma/certificate awarded & class</h3>
            <div class="field"><?php echo $student_data['degree']?></div>
          </div>
        </div>
        <!-- 100l first semester -->
        <?php
          $sqlSelect_1_1 = resultQuery(100, 1);
          $result_1_1    = mysqli_query($conn, $sqlSelect_1_1);
          confirmQuery($result_1_1);
          if (mysqli_num_rows($result_1_1) > 0) { 
            $row_1_1 = mysqli_fetch_array($result_1_1);
        ?>
        <div class="result-wrapper">
          <table class="result-table">
            <thead>
              <tr>
                <th colspan="6">
                  <div class="semester-result">
                    <div>
                      <span>level</span
                      ><?php echo $row_1_1['course_level']?>
                    </div>
                    <div>
                      <span>year</span
                      ><?php echo "{$student_data['year_entered']}/"; echo $student_data['year_entered'] + 1?>
                    </div>
                    <div>
                      <span>semester</span
                      ><?php echo $row_1_1['course_semester'] == 1?'first':'second'?>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th>course code</th>
                <th>course title</th>
                <th>credit unit</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>weighted grade point</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result_query_1_1 = resultQuery(100,1);
              $grade_result_1_1 = mysqli_query($conn, $result_query_1_1);
              while ($grade_row_1_1 = mysqli_fetch_array($grade_result_1_1)) {
                if ($grade_row_1_1['grade'] != 'f') {
                  $total_units_passed_1_1 += $grade_row_1_1['credit_unit'];
                }
                $total_units_1_1 += $grade_row_1_1['credit_unit'];
                $total_points_1_1 += $grade_row_1_1['grade_point'];
            ?>
              <tr>
                <td><?php echo $grade_row_1_1['course_code']?></td>
                <td><?php echo $grade_row_1_1['course_title']?></td>
                <td><?php echo $grade_row_1_1['credit_unit']?></td>
                <td><?php echo $grade_row_1_1['grade']?></td>
                <td>
                  <?php $course_grade_1_1 = $grade_row_1_1['grade'];
                switch ($course_grade_1_1) {
                  case "a":
                    echo 5;
                    break;
                  case "b":
                    echo 4;
                    break;
                  case "c":
                    echo 3;
                    break;
                    case "d":
                    echo 2;
                    break;
                    case "e":
                    echo 1;
                    break;
                  default:
                    echo 0;
                  }
                  ?>
                </td>
                <td><?php echo $grade_row_1_1['grade_point']?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div>
                    <span>gpa</span>
                    <?php 
                    $computed_cgp_1_1 = $total_points_1_1/$total_units_1_1; 
                    echo number_format($computed_cgp_1_1, 2);
                  ?>
                  </div>
                  <div>
                    <span>cgpa</span>
                    <?php 
                  echo number_format($computed_cgp_1_1, 2);
                  ?>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php } ?>

        <!-- 100L second semester -->
        <?php
          $sqlSelect_1_2 = resultQuery(100, 2);
          $result_1_2    = mysqli_query($conn, $sqlSelect_1_2);

          if (mysqli_num_rows($result_1_2) > 0) { 
            $row_1_2 = mysqli_fetch_array($result_1_2);
        ?>
        <div class="result-wrapper">
          <table class="result-table">
            <thead>
              <tr>
                <th colspan="6">
                  <div class="semester-result">
                    <div>
                      <span>level</span
                      ><?php echo $row_1_2['course_level']?>
                    </div>
                    <div>
                      <span>year</span
                      ><?php echo "{$student_data['year_entered']}/"; echo $student_data['year_entered'] + 1?>
                    </div>
                    <div>
                      <span>semester</span
                      ><?php echo $row_1_2['course_semester'] == 1?'first':'second'?>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th>course code</th>
                <th>course title</th>
                <th>credit unit</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>weighted grade point</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result_query_1_2 = resultQuery(100,2);
              $grade_result_1_2 = mysqli_query($conn, $result_query_1_2);
              while ($grade_row_1_2 = mysqli_fetch_array($grade_result_1_2)) {
                if ($grade_row_1_2['grade'] != 'f') {
                  $total_units_passed_1_2 += $grade_row_1_2['credit_unit'];
                }
                $total_units_1_2 += $grade_row_1_2['credit_unit'];
                $total_points_1_2 += $grade_row_1_2['grade_point'];
            ?>
              <tr>
                <td><?php echo $grade_row_1_2['course_code']?></td>
                <td><?php echo $grade_row_1_2['course_title']?></td>
                <td><?php echo $grade_row_1_2['credit_unit']?></td>
                <td><?php echo $grade_row_1_2['grade']?></td>
                <td>
                  <?php $course_grade_1_2 = $grade_row_1_2['grade'];
                switch ($course_grade_1_2) {
                  case "a":
                    echo 5;
                    break;
                  case "b":
                    echo 4;
                    break;
                  case "c":
                    echo 3;
                    break;
                    case "d":
                    echo 2;
                    break;
                    case "e":
                    echo 1;
                    break;
                  default:
                    echo 0;
                  }
                  ?>
                </td>
                <td><?php echo $grade_row_1_2['grade_point']?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div>
                    <span>gpa</span>
                    <?php 
                    $computed_gp_1_2 = $total_points_1_2/$total_units_1_2; 
                    echo number_format($computed_gp_1_2, 2);
                  ?>
                  </div>
                  <div>
                    <span>cgpa</span>
                    <?php
                  $computed_cgp_1_2 = ($total_points_1_1 + $total_points_1_2)/($total_units_1_1 + $total_units_1_2); 
                  echo number_format($computed_cgp_1_2, 2);
                  ?>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php } ?>
      </div>
      <div class="page-break">
        <?php if ($computed_cgp_1_2 > 0) { ?>
        <div class="accumulated">
          <div class="text-capitalize summary-title">grade point summary</div>
          <table>
            <tr>
              <td><?php echo $total_units_1_1 + $total_units_1_2?></td>
              <td>
                <?php echo $total_units_passed_1_1 + $total_units_passed_1_2 ?>
              </td>
              <td><?php echo number_format($computed_cgp_1_2, 2); ?></td>
            </tr>
            <tr>
              <td>total credit units</td>
              <td><span class="text-uppercase"></span>total credits passed</td>
              <td><span class="text-uppercase">cgpa</span></td>
            </tr>
          </table>
        </div>
        <?php } ?>
        <div class="container-signature">
          <div class="signature-left">
            <table class="">
              <tr>
                <td>
                  <span class="text-uppercase"></span> signature of provost
                </td>
              </tr>
            </table>
            <div class="boxed-left">Stamp and Date</div>
          </div>
          <div class="signature-right">
            <table class="">
              <tr>
                <td>
                  <span class="text-uppercase"></span> signature of academic
                  secretary
                </td>
              </tr>
            </table>
            <div class="boxed-right">Stamp and Date</div>
          </div>
        </div>
        <div class="grade-section">
          <h3 class="header3">NOTE</h3>
          <h4 class="header">1) classifeed degree</h4>
          <table class="text-uppercase grade-section">
            <thead>
              <tr>
                <th>Score(%)</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>cgpa</th>
                <th>class of degree</th>
              </tr>
            </thead>
            <tbody class="grade-section2">
              <tr>
                <td>70-100</td>
                <td>A</td>
                <td>5</td>
                <td>4.50-5.00</td>
                <td>1st CLASS</td>
              </tr>
              <tr>
                <td>60-69</td>
                <td>b</td>
                <td>4</td>
                <td>3.50-4.49</td>
                <td>2nd CLASS upper</td>
              </tr>
              <tr>
                <td>50-59</td>
                <td>c</td>
                <td>3</td>
                <td>2.40-3.49</td>
                <td>2nd CLASS lower</td>
              </tr>
              <tr>
                <td>45-49</td>
                <td>d</td>
                <td>2</td>
                <td>1.50-2.39</td>
                <td>Third CLASS</td>
              </tr>
              <tr>
                <td>40-44</td>
                <td>e</td>
                <td>1</td>
                <td>1.00-1.49</td>
                <td>pass</td>
              </tr>
              <tr>
                <td>0-39</td>
                <td>f</td>
                <td>0</td>
                <td>.00-.99</td>
                <td>fail</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="grade-section-2">
          <h4 class="header">2) non-classifeed degree</h4>
          <p class="section2">(To be inserted the Faculty concened)</p>
          <table>
            <tbody class="section2-grade">
              <tr>
                <td>70 - 100 - A</td>
              </tr>
              <tr>
                <td>60 - 69 - B</td>
              </tr>
              <tr>
                <td>50 - 59 - C</td>
              </tr>
            </tbody>
          </table>

          <h4>Fail</h4>
          <p class="section2">
            50 and about but failed <br />
            Clinical Exams.
          </p>

          <table>
            <tbody class="section2-grade">
              <tr>
                <td>45 - 49 - D</td>
              </tr>
              <tr>
                <td>40 - 44 - E</td>
              </tr>
              <tr>
                <td>0 - 39 - F</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- 200L Result -->
      <div class="page-break">
        <!-- 200L first semester -->
        <?php
          $sqlSelect_2_1 = resultQuery(200, 1);
          $result_2_1    = mysqli_query($conn, $sqlSelect_2_1);

          if (mysqli_num_rows($result_2_1) > 0){ 
            $row_2_1 = mysqli_fetch_array($result_2_1);
        ?>
        <div class="result-wrapper">
          <table class="result-table">
            <thead>
              <tr>
                <th colspan="6">
                  <div class="semester-result">
                    <div>
                      <span>level</span
                      ><?php echo $row_2_1['course_level']?>
                    </div>
                    <div>
                      <span>year</span
                      ><?php echo $student_data['year_entered'] + 1; echo '/'; echo $student_data['year_entered'] + 2?>
                    </div>
                    <div>
                      <span>semester</span
                      ><?php echo $row_2_1['course_semester'] == 1?'first':'second'?>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th>course code</th>
                <th>course title</th>
                <th>credit unit</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>weighted grade point</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result_query_2_1 = resultQuery(200,1);
              $grade_result_2_1 = mysqli_query($conn, $result_query_2_1);
              while ($grade_row_2_1 = mysqli_fetch_array($grade_result_2_1)) {
                if ($grade_row_2_1['grade'] != 'f') {
                  $total_units_passed_2_1 += $grade_row_2_1['credit_unit'];
                }
                $total_units_2_1 += $grade_row_2_1['credit_unit'];
                $total_points_2_1 += $grade_row_2_1['grade_point'];
            ?>
              <tr>
                <td><?php echo $grade_row_2_1['course_code']?></td>
                <td><?php echo $grade_row_2_1['course_title']?></td>
                <td><?php echo $grade_row_2_1['credit_unit']?></td>
                <td><?php echo $grade_row_2_1['grade']?></td>
                <td>
                  <?php $course_grade_2_1 = $grade_row_2_1['grade'];
                  switch ($course_grade_2_1) {
                    case "a":
                      echo 5;
                      break;
                    case "b":
                      echo 4;
                      break;
                    case "c":
                      echo 3;
                      break;
                    case "d":
                      echo 2;
                      break;
                    case "e":
                      echo 1;
                      break;
                    default:
                      echo 0;
                  }
                ?>
                </td>
                <td><?php echo $grade_row_2_1['grade_point']?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div>
                    <span>gpa</span>
                    <?php 
                    $computed_gp_2_1 = $total_points_2_1/$total_units_2_1; 
                    echo number_format($computed_gp_2_1, 2);
                  ?>
                  </div>
                  <div>
                    <span>cgpa</span>
                    <?php
                  $computed_cgp_2_1 = ($total_points_1_1 + $total_points_1_2 + $total_points_2_1)/($total_units_1_1 + $total_units_1_2 + $total_units_2_1); 
                  echo number_format($computed_cgp_2_1, 2);
                  ?>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php } ?>
        <!-- 200L second semester -->
        <?php
          $sqlSelect_2_2 = resultQuery(200, 2);
          $result_2_2 = mysqli_query($conn, $sqlSelect_2_2);

          if (mysqli_num_rows($result_2_2) > 0) {
            $row_2_2 = mysqli_fetch_array($result_2_2); 
        ?>
        <div class="result-wrapper">
          <table class="result-table">
            <thead>
              <tr>
                <th colspan="6">
                  <div class="semester-result">
                    <div>
                      <span>level</span
                      ><?php echo $row_2_2['course_level']?>
                    </div>
                    <div>
                      <span>year</span
                      ><?php echo $student_data['year_entered'] + 1; echo '/'; echo $student_data['year_entered'] + 2?>
                    </div>
                    <div>
                      <span>semester</span
                      ><?php echo $row_2_2['course_semester'] == 1?'first':'second'?>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th>course code</th>
                <th>course title</th>
                <th>credit unit</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>weighted grade point</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result_query_2_2 = resultQuery(200,2);
              $grade_result_2_2 = mysqli_query($conn, $result_query_2_2);
              while ($grade_row_2_2 = mysqli_fetch_array($grade_result_2_2)) {
                if ($grade_row_2_2['grade'] != 'f') {
                  $total_units_passed_2_2 += $grade_row_2_2['credit_unit'];
                }
                $total_units_2_2 += $grade_row_2_2['credit_unit'];
                $total_points_2_2 += $grade_row_2_2['grade_point'];
            ?>
              <tr>
                <td><?php echo $grade_row_2_2['course_code']?></td>
                <td><?php echo $grade_row_2_2['course_title']?></td>
                <td><?php echo $grade_row_2_2['credit_unit']?></td>
                <td><?php echo $grade_row_2_2['grade']?></td>
                <td>
                  <?php $course_grade_2_2 = $grade_row_2_2['grade'];
                switch ($course_grade_2_2) {
                  case "a":
                    echo 5;
                    break;
                  case "b":
                    echo 4;
                    break;
                  case "c":
                    echo 3;
                    break;
                    case "d":
                    echo 2;
                    break;
                    case "e":
                    echo 1;
                    break;
                  default:
                    echo 0;
                  }
                  ?>
                </td>
                <td><?php echo $grade_row_2_2['grade_point']?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div>
                    <span>gpa</span>
                    <?php 
                    $computed_gp_2_2 = $total_points_2_2/$total_units_2_2; 
                    echo number_format($computed_gp_2_2, 2);
                  ?>
                  </div>
                  <div>
                    <span>cgpa</span>
                    <?php
                  $computed_cgp_2_2 = ($total_points_1_1 + $total_points_1_2 + $total_points_2_1 + $total_points_2_2)/($total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2); 
                  echo number_format($computed_cgp_2_2, 2);
                  ?>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php } ?>
      </div>
      <div class="page-break">
        <?php if ($computed_cgp_2_2 > 0){ ?>
        <div class="accumulated">
          <div class="text-capitalize summary-title">grade point summary</div>
          <table>
            <tr>
              <td>
                <?php echo $total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2?>
              </td>
              <td>
                <?php echo $total_units_passed_1_1 + $total_units_passed_1_2 + $total_units_passed_2_1 + $total_units_passed_2_2 ?>
              </td>
              <td><?php echo number_format($computed_cgp_2_2, 2); ?></td>
            </tr>
            <tr>
              <td>total credit units</td>
              <td>
                <span class="text-uppercase"></span>total credits passed
              </td>
              <td><span class="text-uppercase">cgpa</span></td>
            </tr>
          </table>
        </div>
        <?php } ?>
        <div class="container-signature">
          <div class="signature-left">
            <table class="">
              <tr>
                <td>
                  <span class="text-uppercase"></span> signature of provost
                </td>
              </tr>
            </table>
            <div class="boxed-left">Stamp and Date</div>
          </div>
          <div class="signature-right">
            <table class="">
              <tr>
                <td>
                  <span class="text-uppercase"></span> signature of academic
                  secretary
                </td>
              </tr>
            </table>
            <div class="boxed-right">Stamp and Date</div>
          </div>
        </div>
        <div class="grade-section">
          <h3 class="header3">NOTE</h3>
          <h4 class="header">1) classifeed degree</h4>
          <table class="text-uppercase grade-section">
            <thead>
              <tr>
                <th>Score(%)</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>cgpa</th>
                <th>class of degree</th>
              </tr>
            </thead>
            <tbody class="grade-section2">
              <tr>
                <td>70-100</td>
                <td>A</td>
                <td>5</td>
                <td>4.50-5.00</td>
                <td>1st CLASS</td>
              </tr>
              <tr>
                <td>60-69</td>
                <td>b</td>
                <td>4</td>
                <td>3.50-4.49</td>
                <td>2nd CLASS upper</td>
              </tr>
              <tr>
                <td>50-59</td>
                <td>c</td>
                <td>3</td>
                <td>2.40-3.49</td>
                <td>2nd CLASS lower</td>
              </tr>
              <tr>
                <td>45-49</td>
                <td>d</td>
                <td>2</td>
                <td>1.50-2.39</td>
                <td>Third CLASS</td>
              </tr>
              <tr>
                <td>40-44</td>
                <td>e</td>
                <td>1</td>
                <td>1.00-1.49</td>
                <td>pass</td>
              </tr>
              <tr>
                <td>0-39</td>
                <td>f</td>
                <td>0</td>
                <td>.00-.99</td>
                <td>fail</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="grade-section-2">
          <h4 class="header">2) non-classifeed degree</h4>
          <p class="section2">(To be inserted the Faculty concened)</p>
          <table>
            <tbody class="section2-grade">
              <tr>
                <td>70 - 100 - A</td>
              </tr>
              <tr>
                <td>60 - 69 - B</td>
              </tr>
              <tr>
                <td>50 - 59 - C</td>
              </tr>
            </tbody>
          </table>

          <h4>Fail</h4>
          <p class="section2">
            50 and about but failed <br />
            Clinical Exams.
          </p>

          <table>
            <tbody class="section2-grade">
              <tr>
                <td>45 - 49 - D</td>
              </tr>
              <tr>
                <td>40 - 44 - E</td>
              </tr>
              <tr>
                <td>0 - 39 - F</td>
              </tr>
            </tbody>
          </table>
        </div>
        
      </div>
      <!-- 300L Result -->
      <div class="page-break">
        <!-- 300L first semester -->
        <?php
          $sqlSelect_3_1 = resultQuery(300, 1);
          $result_3_1 = mysqli_query($conn, $sqlSelect_3_1);

          if (mysqli_num_rows($result_3_1) > 0) { 
            $row_3_1 = mysqli_fetch_array($result_3_1); 
        ?>
        <div class="result-wrapper">
          <table class="result-table">
            <thead>
              <tr>
                <th colspan="6">
                  <div class="semester-result">
                    <div>
                      <span>level</span
                      ><?php echo $row_3_1['course_level']?>
                    </div>
                    <div>
                      <span>year</span
                      ><?php echo $student_data['year_entered'] + 2; echo '/'; echo $student_data['year_entered'] + 3?>
                    </div>
                    <div>
                      <span>semester</span
                      ><?php echo $row_3_1['course_semester'] == 1?'first':'second'?>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th>course code</th>
                <th>course title</th>
                <th>credit unit</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>weighted grade point</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result_query_3_1 = resultQuery(300,1);
              $grade_result_3_1 = mysqli_query($conn, $result_query_3_1);
              while ($grade_row_3_1 = mysqli_fetch_array($grade_result_3_1)) {
                if ($grade_row_3_1['grade'] != 'f') {
                  $total_units_passed_3_1 += $grade_row_3_1['credit_unit'];
                }
                $total_units_3_1 += $grade_row_3_1['credit_unit'];
                $total_points_3_1 += $grade_row_3_1['grade_point'];
            ?>
              <tr>
                <td><?php echo $grade_row_3_1['course_code']?></td>
                <td><?php echo $grade_row_3_1['course_title']?></td>
                <td><?php echo $grade_row_3_1['credit_unit']?></td>
                <td><?php echo $grade_row_3_1['grade']?></td>
                <td>
                  <?php $course_grade_3_1 = $grade_row_3_1['grade'];
                switch ($course_grade_3_1) {
                  case "a":
                    echo 5;
                    break;
                  case "b":
                    echo 4;
                    break;
                  case "c":
                    echo 3;
                    break;
                    case "d":
                    echo 2;
                    break;
                    case "e":
                    echo 1;
                    break;
                  default:
                    echo 0;
                  }
                  ?>
                </td>
                <td><?php echo $grade_row_3_1['grade_point']?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div>
                    <span>gpa</span>
                    <?php 
                    $computed_gp_3_1 = $total_points_3_1/$total_units_3_1; 
                    echo number_format($computed_gp_3_1, 2);
                  ?>
                  </div>
                  <div>
                    <span>cgpa</span>
                    <?php
                  $computed_cgp_3_1 = ($total_points_1_1 + $total_points_1_2 + $total_points_2_1 + $total_points_2_2 + $total_points_3_1)/($total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2 + $total_units_3_1); 
                  echo number_format($computed_cgp_3_1, 2);
                  ?>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php } ?>
        <!-- 300L second semester -->
        <?php
          $sqlSelect_3_2 = resultQuery(300, 2);
          $result_3_2 = mysqli_query($conn, $sqlSelect_3_2);

          if (mysqli_num_rows($result_3_2) > 0) { 
            $row_3_2 = mysqli_fetch_array($result_3_2); 
        ?>
        <div class="result-wrapper">
          <table class="result-table">
            <thead>
              <tr>
                <th colspan="6">
                  <div class="semester-result">
                    <div>
                      <span>level</span
                      ><?php echo $row_3_2['course_level']?>
                    </div>
                    <div>
                      <span>year</span
                      ><?php echo $student_data['year_entered'] + 2; echo '/'; echo $student_data['year_entered'] + 3?>
                    </div>
                    <div>
                      <span>semester</span
                      ><?php echo $row_3_2['course_semester'] == 1?'first':'second'?>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th>course code</th>
                <th>course title</th>
                <th>credit unit</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>weighted grade point</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $result_query_3_2 = resultQuery(300,2);
              $grade_result_3_2 = mysqli_query($conn, $result_query_3_2);
              while ($grade_row_3_2 = mysqli_fetch_array($grade_result_3_2)) {
                if ($grade_row_3_2['grade'] != 'f') {
                  $total_units_passed_3_2 += $grade_row_3_2['credit_unit'];
                }
                $total_units_3_2 += $grade_row_3_2['credit_unit'];
                $total_points_3_2 += $grade_row_3_2['grade_point'];
            ?>
              <tr>
                <td><?php echo $grade_row_3_2['course_code']?></td>
                <td><?php echo $grade_row_3_2['course_title']?></td>
                <td><?php echo $grade_row_3_2['credit_unit']?></td>
                <td><?php echo $grade_row_3_2['grade']?></td>
                <td>
                  <?php $course_grade_3_2 = $grade_row_3_2['grade'];
                switch ($course_grade_3_2) {
                  case "a":
                    echo 5;
                    break;
                  case "b":
                    echo 4;
                    break;
                  case "c":
                    echo 3;
                    break;
                    case "d":
                    echo 2;
                    break;
                    case "e":
                    echo 1;
                    break;
                  default:
                    echo 0;
                  }
                  ?>
                </td>
                <td><?php echo $grade_row_3_2['grade_point']?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div>
                    <span>gpa</span>
                    <?php 
                    $computed_gp_3_2 = $total_points_3_2/$total_units_3_2; 
                    echo number_format($computed_gp_3_2, 2);
                  ?>
                  </div>
                  <div>
                    <span>cgpa</span>
                    <?php
                  $computed_cgp_3_2 = ($total_points_1_1 + $total_points_1_2 + $total_points_2_1 + $total_points_2_2 + $total_points_3_1 + $total_points_3_2)/($total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2 + $total_units_3_1 + $total_units_3_2); 
                  echo number_format($computed_cgp_3_2, 2);
                  ?>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php } ?>
      </div>
      <div class="page-break">
        <?php if ($computed_cgp_3_2 > 0){ ?>
        <div class="accumulated">
          <div class="text-capitalize summary-title">grade point summary</div>
          <table>
            <tr>
              <td>
                <?php echo $total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2 + $total_units_3_1 + $total_units_3_2?>
              </td>
              <td>
                <?php echo $total_units_passed_1_1 + $total_units_passed_1_2 + $total_units_passed_2_1 + $total_units_passed_2_2 + $total_units_passed_3_1 + $total_units_passed_3_2 ?>
              </td>
              <td><?php echo number_format($computed_cgp_3_2, 2); ?></td>
            </tr>
            <tr>
              <td>total credit units</td>
              <td>
                <span class="text-uppercase"></span>total credits passed
              </td>
              <td><span class="text-uppercase">cgpa</span></td>
            </tr>
          </table>
        </div>
        <?php } ?>
        <div class="container-signature">
          <div class="signature-left">
            <table class="">
              <tr>
                <td>
                  <span class="text-uppercase"></span> signature of provost
                </td>
              </tr>
            </table>
            <div class="boxed-left">Stamp and Date</div>
          </div>
          <div class="signature-right">
            <table class="">
              <tr>
                <td>
                  <span class="text-uppercase"></span> signature of academic
                  secretary
                </td>
              </tr>
            </table>
            <div class="boxed-right">Stamp and Date</div>
          </div>
        </div>
        <div class="grade-section">
          <h3 class="header3">NOTE</h3>
          <h4 class="header">1) classifeed degree</h4>
          <table class="text-uppercase grade-section">
            <thead>
              <tr>
                <th>Score(%)</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>cgpa</th>
                <th>class of degree</th>
              </tr>
            </thead>
            <tbody class="grade-section2">
              <tr>
                <td>70-100</td>
                <td>A</td>
                <td>5</td>
                <td>4.50-5.00</td>
                <td>1st CLASS</td>
              </tr>
              <tr>
                <td>60-69</td>
                <td>b</td>
                <td>4</td>
                <td>3.50-4.49</td>
                <td>2nd CLASS upper</td>
              </tr>
              <tr>
                <td>50-59</td>
                <td>c</td>
                <td>3</td>
                <td>2.40-3.49</td>
                <td>2nd CLASS lower</td>
              </tr>
              <tr>
                <td>45-49</td>
                <td>d</td>
                <td>2</td>
                <td>1.50-2.39</td>
                <td>Third CLASS</td>
              </tr>
              <tr>
                <td>40-44</td>
                <td>e</td>
                <td>1</td>
                <td>1.00-1.49</td>
                <td>pass</td>
              </tr>
              <tr>
                <td>0-39</td>
                <td>f</td>
                <td>0</td>
                <td>.00-.99</td>
                <td>fail</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="grade-section-2">
          <h4 class="header">2) non-classifeed degree</h4>
          <p class="section2">(To be inserted the Faculty concened)</p>
          <table>
            <tbody class="section2-grade">
              <tr>
                <td>70 - 100 - A</td>
              </tr>
              <tr>
                <td>60 - 69 - B</td>
              </tr>
              <tr>
                <td>50 - 59 - C</td>
              </tr>
            </tbody>
          </table>

          <h4>Fail</h4>
          <p class="section2">
            50 and about but failed <br />
            Clinical Exams.
          </p>

          <table>
            <tbody class="section2-grade">
              <tr>
                <td>45 - 49 - D</td>
              </tr>
              <tr>
                <td>40 - 44 - E</td>
              </tr>
              <tr>
                <td>0 - 39 - F</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- 400L Result -->
      <div class="page-break">
        <!-- 400L first semester -->
        <?php
        $sqlSelect_4_1 = resultQuery(400, 1);
        $result_4_1 = mysqli_query($conn, $sqlSelect_4_1);

        if (mysqli_num_rows($result_4_1) >
        0) { $row_4_1 = mysqli_fetch_array($result_4_1); ?>
        <div class="result-wrapper">
          <table class="result-table">
            <thead>
              <tr>
                <th colspan="6">
                  <div class="semester-result">
                    <div>
                      <span>level</span
                      ><?php echo $row_4_1['course_level']?>
                    </div>
                    <div>
                      <span>year</span
                      ><?php echo $student_data['year_entered'] + 3; echo '/'; echo $student_data['year_entered'] + 4?>
                    </div>
                    <div>
                      <span>semester</span
                      ><?php echo $row_4_1['course_semester'] == 1?'first':'second'?>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th>course code</th>
                <th>course title</th>
                <th>credit unit</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>weighted grade point</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $result_query_4_1 = resultQuery(400,1);
              $grade_result_4_1 = mysqli_query($conn, $result_query_4_1);
              while ($grade_row_4_1 = mysqli_fetch_array($grade_result_4_1)) {
                if ($grade_row_4_1['grade'] != 'f') {
                  $total_units_passed_4_1 += $grade_row_4_1['credit_unit'];
                }
                $total_units_4_1 += $grade_row_4_1['credit_unit'];
                $total_points_4_1 += $grade_row_4_1['grade_point'];
            ?>
              <tr>
                <td><?php echo $grade_row_4_1['course_code']?></td>
                <td><?php echo $grade_row_4_1['course_title']?></td>
                <td><?php echo $grade_row_4_1['credit_unit']?></td>
                <td><?php echo $grade_row_4_1['grade']?></td>
                <td>
                  <?php $course_grade_4_1 = $grade_row_4_1['grade'];
                switch ($course_grade_4_1) {
                  case "a":
                    echo 5;
                    break;
                  case "b":
                    echo 4;
                    break;
                  case "c":
                    echo 3;
                    break;
                    case "d":
                    echo 2;
                    break;
                    case "e":
                    echo 1;
                    break;
                  default:
                    echo 0;
                  }
                  ?>
                </td>
                <td><?php echo $grade_row_4_1['grade_point']?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div>
                    <span>gpa</span>
                    <?php 
                    $computed_gp_4_1 = $total_points_4_1/$total_units_4_1; 
                    echo number_format($computed_gp_4_1, 2);
                  ?>
                  </div>
                  <div>
                    <span>cgpa</span>
                    <?php
                  $computed_cgp_4_1 = ($total_points_1_1 + $total_points_1_2 + $total_points_2_1 + $total_points_2_2 + $total_points_3_1 + $total_points_3_2 + $total_points_4_1)/($total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2 + $total_units_3_1 + $total_units_3_2 + $total_units_4_1); 
                  echo number_format($computed_cgp_4_1, 2);
                  ?>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php } ?>
        <!-- 400L second semester -->
        <?php
        $sqlSelect_4_2 = resultQuery(400, 2);
        $result_4_2 = mysqli_query($conn, $sqlSelect_4_2);

        if (mysqli_num_rows($result_4_2) >
        0) { $row_4_2 = mysqli_fetch_array($result_4_2); ?>
        <div class="result-wrapper">
          <table class="result-table">
            <thead>
              <tr>
                <th colspan="6">
                  <div class="semester-result">
                    <div>
                      <span>level</span
                      ><?php echo $row_4_2['course_level']?>
                    </div>
                    <div>
                      <span>year</span
                      ><?php echo $student_data['year_entered'] + 3; echo '/'; echo $student_data['year_entered'] + 4?>
                    </div>
                    <div>
                      <span>semester</span
                      ><?php echo $row_4_2['course_semester'] == 1?'first':'second'?>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th>course code</th>
                <th>course title</th>
                <th>credit unit</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>weighted grade point</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $result_query_4_2 = resultQuery(400,2);
              $grade_result_4_2 = mysqli_query($conn, $result_query_4_2);
              while ($grade_row_4_2 = mysqli_fetch_array($grade_result_4_2)) {
                if ($grade_row_4_2['grade'] != 'f') {
                  $total_units_passed_4_2 += $grade_row_4_2['credit_unit'];
                }
                $total_units_4_2 += $grade_row_4_2['credit_unit'];
                $total_points_4_2 += $grade_row_4_2['grade_point'];
            ?>
              <tr>
                <td><?php echo $grade_row_4_2['course_code']?></td>
                <td><?php echo $grade_row_4_2['course_title']?></td>
                <td><?php echo $grade_row_4_2['credit_unit']?></td>
                <td><?php echo $grade_row_4_2['grade']?></td>
                <td>
                  <?php $course_grade_4_2 = $grade_row_4_2['grade'];
                switch ($course_grade_4_2) {
                  case "a":
                    echo 5;
                    break;
                  case "b":
                    echo 4;
                    break;
                  case "c":
                    echo 3;
                    break;
                    case "d":
                    echo 2;
                    break;
                    case "e":
                    echo 1;
                    break;
                  default:
                    echo 0;
                  }
                  ?>
                </td>
                <td><?php echo $grade_row_4_2['grade_point']?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div>
                    <span>gpa</span>
                    <?php 
                    $computed_gp_4_2 = $total_points_4_2/$total_units_4_2; 
                    echo number_format($computed_gp_4_2, 2);
                  ?>
                  </div>
                  <div>
                    <span>cgpa</span>
                    <?php
                  $computed_cgp_4_2 = ($total_points_1_1 + $total_points_1_2 + $total_points_2_1 + $total_points_2_2 + $total_points_3_1 + $total_points_3_2 + $total_points_4_1 + $total_points_4_2)/($total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2 + $total_units_3_1 + $total_units_3_2 + $total_units_4_1 + $total_units_4_2); 
                  echo number_format($computed_cgp_4_2, 2);
                  ?>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php } ?>
      </div>
      <div class="page-break">
        <?php if($computed_cgp_4_2 > 0){ ?>
        <div class="accumulated">
          <div class="text-capitalize summary-title">grade point summary</div>
          <table>
            <tr>
              <td>
                <?php echo $total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2 + $total_units_3_1 + $total_units_3_2 + $total_units_4_1 + $total_units_4_2 ?>
              </td>
              <td>
                <?php echo $total_units_passed_1_1 + $total_units_passed_1_2 + $total_units_passed_2_1 + $total_units_passed_2_2 + $total_units_passed_3_1 + $total_units_passed_3_2 + $total_units_passed_4_1 + $total_units_passed_4_2 ?>
              </td>
              <td><?php echo number_format($computed_cgp_4_2, 2); ?></td>
            </tr>
            <tr>
              <td>total credit units</td>
              <td>
                <span class="text-uppercase"></span>total credits passed
              </td>
              <td><span class="text-uppercase">cgpa</span></td>
            </tr>
          </table>
        </div>
        <?php } ?>
        <div class="container-signature">
          <div class="signature-left">
            <table class="">
              <tr>
                <td>
                  <span class="text-uppercase"></span> signature of provost
                </td>
              </tr>
            </table>
            <div class="boxed-left">Stamp and Date</div>
          </div>
          <div class="signature-right">
            <table class="">
              <tr>
                <td>
                  <span class="text-uppercase"></span> signature of academic
                  secretary
                </td>
              </tr>
            </table>
            <div class="boxed-right">Stamp and Date</div>
          </div>
        </div>
        <div class="grade-section">
          <h3 class="header3">NOTE</h3>
          <h4 class="header">1) classifeed degree</h4>
          <table class="text-uppercase grade-section">
            <thead>
              <tr>
                <th>Score(%)</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>cgpa</th>
                <th>class of degree</th>
              </tr>
            </thead>
            <tbody class="grade-section2">
              <tr>
                <td>70-100</td>
                <td>A</td>
                <td>5</td>
                <td>4.50-5.00</td>
                <td>1st CLASS</td>
              </tr>
              <tr>
                <td>60-69</td>
                <td>b</td>
                <td>4</td>
                <td>3.50-4.49</td>
                <td>2nd CLASS upper</td>
              </tr>
              <tr>
                <td>50-59</td>
                <td>c</td>
                <td>3</td>
                <td>2.40-3.49</td>
                <td>2nd CLASS lower</td>
              </tr>
              <tr>
                <td>45-49</td>
                <td>d</td>
                <td>2</td>
                <td>1.50-2.39</td>
                <td>Third CLASS</td>
              </tr>
              <tr>
                <td>40-44</td>
                <td>e</td>
                <td>1</td>
                <td>1.00-1.49</td>
                <td>pass</td>
              </tr>
              <tr>
                <td>0-39</td>
                <td>f</td>
                <td>0</td>
                <td>.00-.99</td>
                <td>fail</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="grade-section-2">
          <h4 class="header">2) non-classifeed degree</h4>
          <p class="section2">(To be inserted the Faculty concened)</p>
          <table>
            <tbody class="section2-grade">
              <tr>
                <td>70 - 100 - A</td>
              </tr>
              <tr>
                <td>60 - 69 - B</td>
              </tr>
              <tr>
                <td>50 - 59 - C</td>
              </tr>
            </tbody>
          </table>

          <h4>Fail</h4>
          <p class="section2">
            50 and about but failed <br />
            Clinical Exams.
          </p>

          <table>
            <tbody class="section2-grade">
              <tr>
                <td>45 - 49 - D</td>
              </tr>
              <tr>
                <td>40 - 44 - E</td>
              </tr>
              <tr>
                <td>0 - 39 - F</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- 500L result -->
      <div class="page-break">
        <!-- 500L first semester -->
        <?php
        $sqlSelect_5_1 = resultQuery(500, 1);
        $result_5_1 = mysqli_query($conn, $sqlSelect_5_1);

        if (mysqli_num_rows($result_5_1) >
        0) { $row_5_1 = mysqli_fetch_array($result_5_1); ?>
        <div class="result-wrapper">
          <table class="result-table">
            <thead>
              <tr>
                <th colspan="6">
                  <div class="semester-result">
                    <div>
                      <span>level</span
                      ><?php echo $row_5_1['course_level']?>
                    </div>
                    <div>
                      <span>year</span
                      ><?php echo $student_data['year_entered'] + 4; echo '/'; echo $student_data['year_entered'] + 5?>
                    </div>
                    <div>
                      <span>semester</span
                      ><?php echo $row_5_1['course_semester'] == 1?'first':'second'?>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th>course code</th>
                <th>course title</th>
                <th>credit unit</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>weighted grade point</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $result_query_5_1 = resultQuery(500,1);
              $grade_result_5_1 = mysqli_query($conn, $result_query_5_1);
              while ($grade_row_5_1 = mysqli_fetch_array($grade_result_5_1)) {
                if ($grade_row_5_1['grade'] != 'f') {
                  $total_units_passed_5_1 += $grade_row_5_1['credit_unit'];
                }
                $total_units_5_1 += $grade_row_5_1['credit_unit'];
                $total_points_5_1 += $grade_row_5_1['grade_point'];
            ?>
              <tr>
                <td><?php echo $grade_row_5_1['course_code']?></td>
                <td><?php echo $grade_row_5_1['course_title']?></td>
                <td><?php echo $grade_row_5_1['credit_unit']?></td>
                <td><?php echo $grade_row_5_1['grade']?></td>
                <td>
                  <?php $course_grade_5_1 = $grade_row_5_1['grade'];
                switch ($course_grade_5_1) {
                  case "a":
                    echo 5;
                    break;
                  case "b":
                    echo 4;
                    break;
                  case "c":
                    echo 3;
                    break;
                    case "d":
                    echo 2;
                    break;
                    case "e":
                    echo 1;
                    break;
                  default:
                    echo 0;
                  }
                  ?>
                </td>
                <td><?php echo $grade_row_5_1['grade_point']?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div>
                    <span>gpa</span>
                    <?php 
                    $computed_gp_5_1 = $total_points_5_1/$total_units_5_1; 
                    echo number_format($computed_gp_5_1, 2);
                  ?>
                  </div>
                  <div>
                    <span>cgpa</span>
                    <?php
                  $computed_cgp_5_1 = ($total_points_1_1 + $total_points_1_2 + $total_points_2_1 + $total_points_2_2 + $total_points_3_1 + $total_points_3_2 + $total_points_4_1 + $total_points_4_2 + $total_points_5_1)/($total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2 + $total_units_3_1 + $total_units_3_2 + $total_units_4_1 + $total_units_4_2 + + $total_units_5_1); 
                  echo number_format($computed_cgp_5_1, 2);
                  ?>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php } ?>
        <!-- 500L second semester -->
        <?php
        $sqlSelect_5_2 = resultQuery(500, 2);
        $result_5_2 = mysqli_query($conn, $sqlSelect_5_2);

        if (mysqli_num_rows($result_5_2) >
        0) { $row_5_2 = mysqli_fetch_array($result_5_2); ?>
        <div class="result-wrapper">
          <table class="result-table">
            <thead>
              <tr>
                <th colspan="6">
                  <div class="semester-result">
                    <div>
                      <span>level</span
                      ><?php echo $row_5_2['course_level']?>
                    </div>
                    <div>
                      <span>year</span
                      ><?php echo $student_data['year_entered'] + 4; echo '/'; echo $student_data['year_entered'] + 5?>
                    </div>
                    <div>
                      <span>semester</span
                      ><?php echo $row_5_2['course_semester'] == 1?'first':'second'?>
                    </div>
                  </div>
                </th>
              </tr>
              <tr>
                <th>course code</th>
                <th>course title</th>
                <th>credit unit</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>weighted grade point</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result_query_5_2 = resultQuery(500,2);
              $grade_result_5_2 = mysqli_query($conn, $result_query_5_2);
              while ($grade_row_5_2 = mysqli_fetch_array($grade_result_5_2)) {
                if ($grade_row_5_2['grade'] != 'f') {
                  $total_units_passed_5_2 += $grade_row_5_2['credit_unit'];
                }
                $total_units_5_2 += $grade_row_5_2['credit_unit'];
                $total_points_5_2 += $grade_row_5_2['grade_point'];
            ?>
              <tr>
                <td><?php echo $grade_row_5_2['course_code']?></td>
                <td><?php echo $grade_row_5_2['course_title']?></td>
                <td><?php echo $grade_row_5_2['credit_unit']?></td>
                <td><?php echo $grade_row_5_2['grade']?></td>
                <td>
                  <?php $course_grade_5_2 = $grade_row_5_2['grade'];
                switch ($course_grade_5_2) {
                  case "a":
                    echo 5;
                    break;
                  case "b":
                    echo 4;
                    break;
                  case "c":
                    echo 3;
                    break;
                    case "d":
                    echo 2;
                    break;
                    case "e":
                    echo 1;
                    break;
                  default:
                    echo 0;
                  }
                  ?>
                </td>
                <td><?php echo $grade_row_5_2['grade_point']?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div>
                    <span>gpa</span>
                    <?php 
                    $computed_gp_5_2 = $total_points_5_2/$total_units_5_2; 
                    echo number_format($computed_gp_5_2, 2);
                  ?>
                  </div>
                  <div>
                    <span>cgpa</span>
                    <?php
                  $computed_cgp_5_2 = ($total_points_1_1 + $total_points_1_2 + $total_points_2_1 + $total_points_2_2 + $total_points_3_1 + $total_points_3_2 + $total_points_4_1 + $total_points_4_2 + $total_points_5_1 + $total_points_5_2)/($total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2 + $total_units_3_1 + $total_units_3_2 + $total_units_4_1 + $total_units_4_2 + $total_units_5_1 + $total_units_5_2); 
                  echo number_format($computed_cgp_5_2, 2);
                  ?>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <?php } ?>
      </div>
      <div class="page-break">
        <?php if ($computed_cgp_5_2 > 0 ) { ?>
        <div class="accumulated">
          <div class="text-capitalize summary-title">grade point summary</div>
          <table>
            <tr>
              <td>
                <?php echo $total_units_1_1 + $total_units_1_2 + $total_units_2_1 + $total_units_2_2 + $total_units_3_1 + $total_units_3_2 + $total_units_4_1 + $total_units_4_2 + $total_units_5_1 + $total_units_5_2?>
              </td>
              <td>
                <?php echo $total_units_passed_1_1 + $total_units_passed_1_2 + $total_units_passed_2_1 + $total_units_passed_2_2 + $total_units_passed_3_1 + $total_units_passed_3_2 + $total_units_passed_4_1 + $total_units_passed_4_2 + $total_units_passed_5_1 + $total_units_passed_5_2 ?>
              </td>
              <td><?php echo number_format($computed_cgp_5_2, 2); ?></td>
            </tr>
            <tr>
              <td>total credit units</td>
              <td>
                <span class="text-uppercase"></span>total credits passed
              </td>
              <td><span class="text-uppercase">cgpa</span></td>
            </tr>
          </table>
        </div>
        <?php } ?>
        <div class="container-signature">
          <div class="signature-left">
            <table class="">
              <tr>
                <td>
                  <span class="text-uppercase"></span> signature of provost
                </td>
              </tr>
            </table>
            <div class="boxed-left">Stamp and Date</div>
          </div>
          <div class="signature-right">
            <table class="">
              <tr>
                <td>
                  <span class="text-uppercase"></span> signature of academic
                  secretary
                </td>
              </tr>
            </table>
            <div class="boxed-right">Stamp and Date</div>
          </div>
        </div>
        <div class="grade-section">
          <h3 class="header3">NOTE</h3>
          <h4 class="header">1) classifeed degree</h4>
          <table class="text-uppercase grade-section">
            <thead>
              <tr>
                <th>Score(%)</th>
                <th>letter grade</th>
                <th>grade point</th>
                <th>cgpa</th>
                <th>class of degree</th>
              </tr>
            </thead>
            <tbody class="grade-section2">
              <tr>
                <td>70-100</td>
                <td>A</td>
                <td>5</td>
                <td>4.50-5.00</td>
                <td>1st CLASS</td>
              </tr>
              <tr>
                <td>60-69</td>
                <td>b</td>
                <td>4</td>
                <td>3.50-4.49</td>
                <td>2nd CLASS upper</td>
              </tr>
              <tr>
                <td>50-59</td>
                <td>c</td>
                <td>3</td>
                <td>2.40-3.49</td>
                <td>2nd CLASS lower</td>
              </tr>
              <tr>
                <td>45-49</td>
                <td>d</td>
                <td>2</td>
                <td>1.50-2.39</td>
                <td>Third CLASS</td>
              </tr>
              <tr>
                <td>40-44</td>
                <td>e</td>
                <td>1</td>
                <td>1.00-1.49</td>
                <td>pass</td>
              </tr>
              <tr>
                <td>0-39</td>
                <td>f</td>
                <td>0</td>
                <td>.00-.99</td>
                <td>fail</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="grade-section-2">
            <h4 class="header">2) non-classifeed degree</h4>
            <p class="section2">(To be inserted the Faculty concened)</p>
            <table>
              <tbody class="section2-grade">
                <tr>
                  <td>70 - 100 - A</td>
                </tr>
                <tr>
                  <td>60 - 69 - B</td>
                </tr>
                <tr>
                  <td>50 - 59 - C</td>
                </tr>
              </tbody>
            </table>

            <h4>Fail</h4>
            <p class="section2">
              50 and about but failed <br />
              Clinical Exams.
            </p>

            <table>
              <tbody class="section2-grade">
                <tr>
                  <td>45 - 49 - D</td>
                </tr>
                <tr>
                  <td>40 - 44 - E</td>
                </tr>
                <tr>
                  <td>0 - 39 - F</td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
      <!-- <div class="accumulated">
        <div class="text-capitalize summary-title">grade point summary</div>
        <table>
          <tr>
            <td>
              <?php
              $units_array = array(
                $total_units_5_2,
                $total_units_5_1,
                $total_units_4_2,
                $total_units_4_1,
                $total_units_3_2,
                $total_units_3_1,
                $total_units_2_2,
                $total_units_2_1,
                $total_units_1_2,
                $total_units_1_1
              );
              echo array_sum($units_array);
            ?>
            </td>
            <td>
              <?php
              $points_array = array(
                $total_points_5_2,
                $total_points_5_1,
                $total_points_4_2,
                $total_points_4_1,
                $total_points_3_2,
                $total_points_3_1,
                $total_points_2_2,
                $total_points_2_1,
                $total_points_1_2,
                $total_points_1_1
              );
              echo array_sum($points_array);
            ?>
            </td>
            <td>
              <?php
            $cgpa_array = array(
              $computed_cgp_5_2,
              $computed_cgp_5_1,
              $computed_cgp_4_2,
              $computed_cgp_4_1,
              $computed_cgp_3_2,
              $computed_cgp_3_1,
              $computed_cgp_2_2,
              $computed_cgp_2_1,
              $computed_cgp_2_1,
              $computed_cgp_1_1
            );
            function current_cgp($cgp_array){
              global $cgpa_array;
              foreach ($cgp_array as $value) {
                if ($value >
              0) { echo number_format($value, 2); break; } } } echo
              current_cgp($cgpa_array); ?>
            </td>
          </tr>
          <tr>
            <td>total credit units</td>
            <td><span class="text-uppercase">abu</span> cum grade points</td>
            <td><span class="text-uppercase">abu cgpa</span></td>
          </tr>
        </table>
      </div> -->
    </div>
  </body>
</html>
