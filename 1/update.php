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
 $query = "SELECT * FROM student WHERE srno=" . $_GET['srno'];
 $servername = "localhost";
 $username = "root";
 $password = "123456";
 $conn = new mysqli($servername, $username, $password, "student_management");
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 $result = mysqli_query($conn, $query);
 if (!$result) {
     die("Query execution failed: " . mysqli_error($conn));
 }
 $row = mysqli_fetch_assoc($result); 
?>
<div class="container my-3 card p-3">
  <form style="padding-left: 20px;" class="form-inline" action="updatedb.php">
    <fieldset>
      <legend><b>Update Page</b></legend>
      <input type="hidden" value="<?php echo $_GET['srno']; ?> " name="srno">
      Name:
      <input type="text" class="form-control" placeholder="Enter your Name here" name="name" value="<?php echo $row['name']; ?>" />
      <br/>
      Email:
      <input type="email" class="form-control" placeholder="Enter your Email here" name="email" value="<?php echo $row['email']; ?>" />
      <br/>
      Gender:
      <input type="radio" class="form-check-input" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?> />Male
      <input type="radio" class="form-check-input" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?> />Female
      <input type="radio" class="form-check-input" name="gender" value="other" <?php echo ($row['gender'] == 'other') ? 'checked' : ''; ?> />Other
      <br/>
      <br/>
      BirthDate:
      <input type="date" name="birthdate" value="<?php echo $row['birthdate']; ?>">
      <br/>
      <br/>
      Address:
      <textarea name="address" cols="90" rows="5" class="form-control"><?php echo $row['address']; ?></textarea>
      <br/>
      Country:
      <select name="country" class="form-control" required>
        <option value="<?php echo $row['country']; ?>" selected>None</option>
        <option value="India">India</option>
        <option value="usa">USA</option>
        <option value="japan">Japan</option>
        <option value="china">China</option>
      </select>
      <br/>
      <input type="submit" class="btn btn-primary">
      <input type="reset" class="btn btn-primary">
    </fieldset>
  </form>
</div>

</body>
<script>
    const form = document.querySelector('form');
    const nameInput = document.querySelector('input[name="name"]');
    const emailInput = document.querySelector('input[name="email"]');
    const birthdateInput = document.querySelector('input[name="birthdate"]');
    const addressTextarea = document.querySelector('textarea[name="address"]');
    const submitButton = document.querySelector('input[type="submit"]');
    
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      if (nameInput.value.trim() === '') {
        alert('Please enter your name');
        return;
      }
      const emailRegex = /^\S+@\S+\.\S+$/;
      if (!emailRegex.test(emailInput.value.trim())) {
        alert('Please enter a valid email address');
        return;
      }
      const birthdate = new Date(birthdateInput.value);
      const now = new Date();
      if (birthdate >= now) {
        alert('Please enter a valid birthdate');
        return;
      }
      if (addressTextarea.value.trim() === '') {
        alert('Please enter your address');
        return;
      }
      form.submit();
    });
  </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</html>