<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .main{
        font-size: 30px;
        height:auto;
        width:750px;
        margin-left: 20px;
        margin-top: 20px;
    }
    </style>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="home.php">Student Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" href="show_list.php">Show List</a>
              </li>
          </ul>
            <div style="font-size:18px ; font-weight: bolder; color:white;" class="mx-3">
            Welcome
            <?php
            session_start();
            echo $_SESSION['user_id'];?>
            </div>
            <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
        </div>
    </nav>


<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$conn = new mysqli($servername, $username, $password,"student_management");
if ($conn->connect_error) {?>
<div class="alert alert-danger" role="alert">
  Some Error Occured while Deleting the data..
</div>
 <?php
}
else{
    $srno=$_GET['srno'];
    $sql = "DELETE FROM `student` WHERE `srno` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $srno);
    $result = $stmt->execute();
    if ($result) {?>
        <div class="alert alert-success my-3" role="alert">
  Data Deleted Successfully..
</div><?php
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
?>
<table class="table table-striped  my-4" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">student ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Country</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query="select * from student;";
      $servername = "localhost";
      $username = "root";
      $password = "123456";
      $conn = new mysqli($servername, $username, $password,"student_management");
      $result=mysqli_query($conn,$query);
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
            <th>".$row['srno']."</th>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['gender']."</td>
            <td>".$row['country']."</td>
            <td><a href='update.php?srno=".$row['srno']."'><button type='button' class='btn btn-success'>Edit</button></a></td>
            <td><a href='delete.php?srno=".$row['srno']."'><button type='button' class='btn btn-danger'>Delete</button></a></td>
        </tr>";
    }
    
    ?>
  </tbody>
</table>
<?php

$stmt->close();
$conn->close();
}
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</html>
