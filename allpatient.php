<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clinic Manager : All Patient</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
      <div class="alert alert-warning">
        <p align="right"><strong>เรียกดูข้อมูลผู้ป่วย !</strong>&nbsp;<a href="logout.php">ออกจากระบบ</a>&nbsp;&nbsp;<a href="reset.php">เปลี่ยนรหัสผ่าน</a>&nbsp;</p>
        <p align="left"><a href="welcome.php"><strong><<< กลับเมนูหลัก</strong></a></p>
      </div>
      <div class="alert alert-success">
        <button type="button" class="btn btn-warning"><a href="addpatient.php">เพิ่มข้อมูลผู้ป่วยใหม่</a></button>
      </div>
      <div class="jumbotron">
        <table class="table table-striped" align="center">
          <tr>
            <td><strong>รหัสบัตรประชาชน</strong></td>
            <td><strong>ชื่อ-สกุล</strong></td>
            <td><strong>อาการแพ้ยา</strong></td>
            <td><strong>เบอร์โทรศัพท์</strong></td>
            <td><strong><center>ที่อยู่</center></strong></td>
          </tr>
        <?php
          $servername = "localhost";
          $username = "root";
          $password = "root";
          $dbname = "clinicman";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้" . $conn->connect_error);
          }

          $sql = "SELECT ID_NO,PA_NAME,PA_SPEC,PA_TEL,PA_ADDR FROM PATIENT";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr>"."<td>". $row["ID_NO"]."</td>"."<td>" . $row["PA_NAME"]."</td>". "<td>" . $row["PA_SPEC"]."</td>"."<td>".$row["PA_TEL"]."</td>"."<td>".$row["PA_ADDR"]."</td>"."</tr>". "<br>";
              }
          } else {
              echo "ไม่มีคนไข้ในระบบ";
          }
          $conn->close();
        ?>
      </table>
      </div>
</body>
</html>
