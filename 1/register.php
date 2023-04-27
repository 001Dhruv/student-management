<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    ?>
    <div class="alert alert-danger" role="alert">
        Connection error: <?php echo $conn->connect_error; ?>
        Some Error Occured please try again later..
    </div>
    <?php
}

$user_id = $_POST['user_id'];
$password = $_POST['password'];

$sql = "INSERT INTO `student_management`.`login` (`user_id`, `password`) VALUES (?, ?);";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user_id, $password);

if ($stmt->execute()) {
    session_start();
    if(!isset($_SESSION['user_id'])){$_SESSION('user_id')=$user_id}
    header("Location: home.php");
    exit;
} else {
    ?>
    <div class="alert alert-danger" role="alert">
        Insertion error: <?php echo $stmt->error; ?>
        Some Error Occured please try again later..
    </div>
    <?php
    $stmt->close();
}

$conn->close();
?>
